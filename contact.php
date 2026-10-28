<?php
/**
 * contact.php — Contact Form Server-Side Endpoint
 * Accepts POST only. Returns JSON responses.
 */
declare(strict_types=1);

// Always return JSON
header('Content-Type: application/json; charset=utf-8');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// Start session for CSRF
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/config.php';

// ── CSRF Check ────────────────────────────────────────────────────
$submitted_token = trim($_POST['csrf_token'] ?? '');
$session_token   = $_SESSION['csrf_token'] ?? '';
if (empty($submitted_token) || !hash_equals($session_token, $submitted_token)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid or expired form token. Please refresh the page and try again.']);
    exit;
}

// ── Honeypot Check ────────────────────────────────────────────────
if (!empty($_POST['website'])) {
    // Bot detected — return fake success so bots don't retry
    echo json_encode(['success' => true]);
    exit;
}

// ── Sanitise Inputs ───────────────────────────────────────────────
function clean(string $val): string {
    return htmlspecialchars(trim($val), ENT_QUOTES, 'UTF-8');
}

$name         = clean($_POST['name']           ?? '');
$phone        = clean($_POST['phone']          ?? '');
$city         = clean($_POST['city']           ?? '');
$qualification= clean($_POST['qualification']  ?? '');
$country      = clean($_POST['target_country'] ?? '');
$message      = clean($_POST['message']        ?? '');

// ── Server-Side Validation ────────────────────────────────────────
$errors = [];
if (empty($name)) {
    $errors[] = 'Full name is required.';
}
if (empty($phone)) {
    $errors[] = 'Phone number is required.';
}
if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// ── Build Email Body ──────────────────────────────────────────────
$to      = $config['site']['email'];
$subject = "New Study Abroad Enquiry from {$name}";

$body  = "New enquiry received via shreyanamankan.com\n";
$body .= str_repeat('-', 50) . "\n\n";
$body .= "Name:          {$name}\n";
$body .= "Phone:         {$phone}\n";
if (!empty($city))         $body .= "City/State:    {$city}\n";
if (!empty($qualification))$body .= "Qualification: {$qualification}\n";
if (!empty($country))      $body .= "Target Country:{$country}\n";
if (!empty($message)) {
    $body .= "\nMessage:\n{$message}\n";
}
$body .= "\n" . str_repeat('-', 50) . "\n";
$body .= "Sent at: " . date('Y-m-d H:i:s T') . "\n";

$headers  = "From: Shreya Namankan Website <{$to}>\r\n";
$headers .= "Reply-To: {$name} <{$phone}>\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// ── Send via SMTP or mail() ───────────────────────────────────────
$sent = false;

if (!empty($config['smtp']['enabled']) && $config['smtp']['enabled'] === true) {
    // ── Lightweight inline SMTP (no Composer) ────────────────────
    $sent = send_smtp(
        $config['smtp'],
        $to,
        $subject,
        $body,
        $name,
        $phone
    );
} else {
    // ── PHP mail() ────────────────────────────────────────────────
    $sent = @mail($to, $subject, $body, $headers);
}

// ── Respond ───────────────────────────────────────────────────────
if ($sent) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'We could not send your enquiry at this time. Please contact us directly on WhatsApp at +91-9135288718.',
    ]);
}
exit;

// ── Inline SMTP function (no Composer, no external deps) ──────────
function send_smtp(array $smtp, string $to, string $subject, string $body, string $reply_name, string $reply_contact): bool {
    $host     = $smtp['host'];
    $port     = (int)($smtp['port'] ?? 587);
    $username = $smtp['username'];
    $password = $smtp['password'];
    $from     = $smtp['from'];
    $from_name= $smtp['from_name'] ?? 'Shreya Namankan';

    $errno  = 0;
    $errstr = '';
    $timeout= 15;

    // Connect
    $prefix = ($port === 465) ? 'ssl://' : '';
    $conn = @fsockopen($prefix . $host, $port, $errno, $errstr, $timeout);
    if (!$conn) { return false; }

    $read = function() use ($conn): string {
        $data = '';
        while ($line = fgets($conn, 515)) {
            $data .= $line;
            if ($line[3] === ' ') break;
        }
        return $data;
    };
    $write = function(string $cmd) use ($conn): void { fputs($conn, $cmd . "\r\n"); };

    $read(); // banner
    $write("EHLO " . gethostname());
    $ehlo = $read();

    // STARTTLS if needed
    if ($port === 587 && strpos($ehlo, 'STARTTLS') !== false) {
        $write('STARTTLS');
        $read();
        stream_socket_enable_crypto($conn, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        $write("EHLO " . gethostname());
        $read();
    }

    // AUTH LOGIN
    $write('AUTH LOGIN');
    $read();
    $write(base64_encode($username));
    $read();
    $write(base64_encode($password));
    $auth_response = $read();
    if (strpos($auth_response, '235') === false) {
        fclose($conn);
        return false;
    }

    $write("MAIL FROM:<{$from}>");
    $read();
    $write("RCPT TO:<{$to}>");
    $read();
    $write('DATA');
    $read();

    $email_headers  = "From: {$from_name} <{$from}>\r\n";
    $email_headers .= "To: {$to}\r\n";
    $email_headers .= "Reply-To: {$reply_name} <{$reply_contact}>\r\n";
    $email_headers .= "Subject: {$subject}\r\n";
    $email_headers .= "MIME-Version: 1.0\r\n";
    $email_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_headers .= "Date: " . date('r') . "\r\n";

    $write($email_headers . "\r\n" . $body . "\r\n.");
    $data_response = $read();
    $write('QUIT');
    fclose($conn);

    return strpos($data_response, '250') !== false;
}
