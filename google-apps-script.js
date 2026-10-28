/**
 * ═══════════════════════════════════════════════════════════════════════════
 * SHREYA NAMANKAN — Google Apps Script (CRM / Lead Sheet Webhook)
 * ═══════════════════════════════════════════════════════════════════════════
 *
 * SETUP INSTRUCTIONS (one-time, takes ~5 minutes):
 *
 * 1. Go to https://sheets.google.com → Create a new spreadsheet
 *    Name it: "Shreya Namankan Leads"
 *
 * 2. Add these headers in Row 1 (A1 onwards):
 *    Timestamp | Name | Email | Phone | City | Qualification | Target Country | Message | Source
 *
 * 3. Go to https://script.google.com → New Project
 *    Paste this entire file contents, replacing any existing code
 *
 * 4. In the script, replace SPREADSHEET_ID below with your Google Sheet ID
 *    (The Sheet ID is in the URL: https://docs.google.com/spreadsheets/d/SPREADSHEET_ID/edit)
 *
 * 5. Click Deploy → New Deployment
 *    - Type: Web App
 *    - Execute as: Me
 *    - Who has access: Anyone
 *    Click Deploy → Copy the Web App URL
 *
 * 6. Paste that URL into index.html as the SHEETS_WEBHOOK_URL value
 *
 * ═══════════════════════════════════════════════════════════════════════════
 */

// ── REPLACE THIS WITH YOUR GOOGLE SHEET ID ──────────────────────────────────
const SPREADSHEET_ID = 'YOUR_GOOGLE_SHEET_ID_HERE';
const SHEET_NAME     = 'Sheet1'; // Change if your sheet tab has a different name
// ────────────────────────────────────────────────────────────────────────────

/**
 * Handles POST requests from the contact form.
 * Appends lead data as a new row in the Google Sheet.
 */
function doPost(e) {
  const headers = { 'Access-Control-Allow-Origin': '*' };

  try {
    // Parse incoming JSON body
    const data = JSON.parse(e.postData.contents);

    // Open the spreadsheet and target sheet
    const ss    = SpreadsheetApp.openById(SPREADSHEET_ID);
    const sheet = ss.getSheetByName(SHEET_NAME) || ss.getSheets()[0];

    // Build the row — order matches the header columns
    const row = [
      data.submitted_at   || new Date().toLocaleString('en-IN'),
      data.name           || '',
      data.email          || '',
      data.phone          || '',
      data.city           || '',
      data.qualification  || '',
      data.target_country || '',
      data.message        || '',
      data.source         || 'shreyanamankan.com',
    ];

    sheet.appendRow(row);

    // Optional: Also send internal notification email to the consultant
    sendInternalNotification(data);

    return ContentService
      .createTextOutput(JSON.stringify({ success: true, message: 'Lead recorded.' }))
      .setMimeType(ContentService.MimeType.JSON);

  } catch (err) {
    return ContentService
      .createTextOutput(JSON.stringify({ success: false, error: err.message }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}

/**
 * Handles GET/OPTIONS preflight requests (needed for CORS).
 */
function doGet(e) {
  return ContentService
    .createTextOutput(JSON.stringify({ status: 'Shreya Namankan Leads webhook is active.' }))
    .setMimeType(ContentService.MimeType.JSON);
}

/**
 * Sends an internal notification email to the consultant
 * whenever a new lead comes in.
 * Replace the email below if different from config.
 */
function sendInternalNotification(data) {
  const CONSULTANT_EMAIL = 'hello@shreyanamankan.com';

  const subject = `🎓 New Lead: ${data.name} — ${data.target_country || 'Country TBD'}`;

  const body = `
New study abroad enquiry received via shreyanamankan.com

──────────────────────────────────
Name:           ${data.name}
Email:          ${data.email}
Phone:          ${data.phone}
City / State:   ${data.city           || 'Not specified'}
Qualification:  ${data.qualification  || 'Not specified'}
Target Country: ${data.target_country || 'Not decided yet'}
──────────────────────────────────
Message:
${data.message || '(No message provided)'}

──────────────────────────────────
Submitted at: ${data.submitted_at}
Source:       ${data.source}

Reply directly to: ${data.email}
  `;

  try {
    MailApp.sendEmail({
      to:      CONSULTANT_EMAIL,
      subject: subject,
      body:    body,
      replyTo: data.email,
    });
  } catch (err) {
    console.warn('Could not send internal notification:', err.message);
  }
}
