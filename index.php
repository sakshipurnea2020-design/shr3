<?php
/**
 * index.php — Shreya Namankan Website Entry Point
 * All content is driven from config.php
 */
declare(strict_types=1);

require_once __DIR__ . '/config.php';

// Start session early (needed for CSRF token generation in contact partial)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include all partials in order
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/nav.php';
require_once __DIR__ . '/partials/hero.php';
require_once __DIR__ . '/partials/about.php';
require_once __DIR__ . '/partials/countries.php';
require_once __DIR__ . '/partials/services.php';
require_once __DIR__ . '/partials/process.php';
require_once __DIR__ . '/partials/community.php';
require_once __DIR__ . '/partials/reviews.php';
require_once __DIR__ . '/partials/faq.php';
require_once __DIR__ . '/partials/contact.php';
require_once __DIR__ . '/partials/social-strip.php';
require_once __DIR__ . '/partials/footer.php';
// Note: WhatsApp floating button is included within footer.php before </body>
