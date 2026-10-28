# EmailJS Auto-Reply Setup Guide

## What EmailJS does
When a student fills the form, EmailJS sends them an **instant auto-reply email** from your address.
It's free for up to 200 emails/month. No server needed.

---

## Step 1 — Create an EmailJS account
1. Go to https://www.emailjs.com → Sign Up (free)
2. After login, go to **Email Services** → Add New Service
3. Choose **Gmail** (easiest) → Connect your `hello@shreyanamankan.com` account
4. Note down the **Service ID** (e.g. `service_abc123`)

---

## Step 2 — Create the Email Template

Go to **Email Templates** → Create New Template

Fill in:

**To:** `{{to_email}}`  
**From name:** Shreya Namankan  
**Reply To:** `hello@shreyanamankan.com`  
**Subject:**
```
Your study abroad enquiry is confirmed ✦ Shreya Namankan
```

**Body (HTML):**
```html
<div style="font-family: 'Segoe UI', Arial, sans-serif; max-width: 600px; margin: 0 auto; background: #faf7f2; border-radius: 12px; overflow: hidden; border: 1px solid #e8e0d4;">
  
  <!-- Header -->
  <div style="background: #061522; padding: 32px 40px; text-align: center;">
    <h1 style="color: #c9a84c; font-size: 22px; margin: 0; letter-spacing: -0.5px;">Shreya Namankan</h1>
    <p style="color: rgba(255,255,255,0.6); font-size: 13px; margin: 6px 0 0;">Free Study Abroad Consultancy</p>
  </div>

  <!-- Body -->
  <div style="padding: 36px 40px;">
    <h2 style="color: #061522; font-size: 20px; margin: 0 0 16px;">Hi {{to_name}} 👋</h2>
    <p style="color: #64748b; line-height: 1.7; margin: 0 0 20px;">
      Thank you for reaching out! We've received your enquiry and our team will get back to you within <strong>24 hours</strong>.
    </p>
    <p style="color: #64748b; line-height: 1.7; margin: 0 0 28px;">
      In the meantime, feel free to WhatsApp us directly at 
      <a href="https://wa.me/919135288718" style="color: #c9a84c; font-weight: 600;">+91-9135288718</a> 
      for a faster response.
    </p>

    <!-- Summary box -->
    <div style="background: #fff; border-radius: 10px; border: 1px solid #e8e0d4; padding: 20px 24px; margin-bottom: 28px;">
      <h3 style="color: #061522; font-size: 14px; font-weight: 700; margin: 0 0 14px; text-transform: uppercase; letter-spacing: 1px;">Your Enquiry Summary</h3>
      <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <tr><td style="padding: 6px 0; color: #94a3b8; width: 140px;">Phone</td><td style="color: #1e293b; font-weight: 500;">{{phone}}</td></tr>
        <tr><td style="padding: 6px 0; color: #94a3b8;">City / State</td><td style="color: #1e293b; font-weight: 500;">{{city}}</td></tr>
        <tr><td style="padding: 6px 0; color: #94a3b8;">Qualification</td><td style="color: #1e293b; font-weight: 500;">{{qualification}}</td></tr>
        <tr><td style="padding: 6px 0; color: #94a3b8;">Target Country</td><td style="color: #1e293b; font-weight: 500;">{{target_country}}</td></tr>
        <tr><td style="padding: 6px 0; color: #94a3b8;">Submitted At</td><td style="color: #1e293b; font-weight: 500;">{{submitted_at}}</td></tr>
      </table>
    </div>

    <!-- CTA -->
    <div style="text-align: center; margin-bottom: 28px;">
      <a href="https://wa.me/919135288718" style="display: inline-block; background: #25D366; color: #fff; padding: 14px 28px; border-radius: 50px; font-weight: 700; font-size: 15px; text-decoration: none;">
        💬 Chat on WhatsApp
      </a>
    </div>

    <p style="color: #94a3b8; font-size: 13px; line-height: 1.6; margin: 0;">
      Our consultancy is <strong>100% free for students</strong>. Universities partner with us, so you never pay us anything.<br>
      We're available Mon–Sat, 10am–7pm IST.
    </p>
  </div>

  <!-- Footer -->
  <div style="background: #061522; padding: 20px 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 12px; margin: 0;">
      © 2026 Shreya Namankan · Patna, Bihar, India<br>
      <a href="https://www.instagram.com/shreya_namankan" style="color: #c9a84c;">Instagram</a> · 
      <a href="https://wa.me/919135288718" style="color: #c9a84c;">WhatsApp</a>
    </p>
  </div>

</div>
```

Click **Save** → Note down the **Template ID** (e.g. `template_xyz789`)

---

## Step 3 — Get your Public Key
Go to **Account** → **General** → Copy the **Public Key** (e.g. `abc123XYZ`)

---

## Step 4 — Update index.html
Open `index.html` and replace the three placeholder values near the top of the `<script>` block:

```js
const EMAILJS_SERVICE_ID  = 'service_abc123';    // ← your Service ID
const EMAILJS_TEMPLATE_ID = 'template_xyz789';   // ← your Template ID
const EMAILJS_PUBLIC_KEY  = 'abc123XYZ';         // ← your Public Key
```

---

## Done!
Every student who fills the form will now receive an instant branded confirmation email with their enquiry summary and a WhatsApp CTA.
