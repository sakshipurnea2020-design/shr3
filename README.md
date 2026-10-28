# Shreya Namankan Website v2

100% free study abroad consultancy website — raw PHP, no framework, no Composer.

## Quick Start

1. Upload all files to your shared hosting public_html (or subdirectory)
2. Add your images to `assets/images/` (see `assets/images/README.txt`)
3. Edit `config.php` to update contact info, social URLs, and content
4. **Change the admin password** — see `admin/credentials.php`
5. Ensure `config.php` is writable by the web server for the admin panel

## Admin Panel

Access at `/admin/index.php` — default credentials:
- Username: `admin`
- Password: `changeme123` ← **CHANGE THIS BEFORE GOING LIVE**

## File Structure

```
shreyanamankan-v2/
├── config.php              ← All site content (edit this)
├── index.php               ← Main entry point
├── contact.php             ← Form submission endpoint
├── .htaccess               ← Apache config
├── partials/
│   ├── header.php          ← <head> + all CSS
│   ├── nav.php             ← Navigation
│   ├── hero.php            ← Hero section
│   ├── about.php           ← About section
│   ├── countries.php       ← Countries marquee
│   ├── services.php        ← Services grid
│   ├── process.php         ← Process steps
│   ├── community.php       ← Community perks
│   ├── reviews.php         ← Testimonials
│   ├── faq.php             ← FAQ accordion
│   ├── contact.php         ← Contact form section
│   ├── social-strip.php    ← Social icons bar
│   ├── footer.php          ← Footer
│   └── wa-float.php        ← WhatsApp floating button
├── admin/
│   ├── index.php           ← Admin content editor
│   ├── auth.php            ← Login & session management
│   ├── credentials.php     ← Hashed admin password
│   └── .htaccess           ← Protects credentials.php
└── assets/
    └── images/             ← Add hero-bg.jpg, about-consultant.jpg, og-image.jpg
```

## Requirements

- PHP ≥ 7.4
- Apache with mod_rewrite (standard shared hosting)
- No Composer, no Node.js, no build step needed
