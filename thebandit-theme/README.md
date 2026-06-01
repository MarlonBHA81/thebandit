# The Bandit — WordPress Theme

A custom one-page WordPress theme, ported pixel-for-pixel from the static site.
Brand colours `#05a0eb` / `#000000`, fonts Cinzel + Inter.

## What's inside

```
thebandit-theme/
├── style.css         Theme header + all the design CSS
├── functions.php     Asset loading, menus, contact-form AJAX handler
├── header.php        <head>, nav bar, mobile menu
├── footer.php        Footer + wp_footer()
├── front-page.php    The full one-page site (all sections)
├── index.php         Fallback template for any other pages
└── assets/
    ├── js/main.js    Nav, mobile menu, scroll reveal, video, form
    ├── images/       Hero, about, contact, logo, video thumbnail
    └── logos/        Client brand logos (white)
```

## Install

1. Zip the `thebandit-theme` folder so you have `thebandit-theme.zip`.
2. WordPress Admin → **Appearance → Themes → Add New → Upload Theme**.
3. Choose the zip, **Install**, then **Activate**.
4. Go to **Settings → Reading → Your homepage displays → A static page**, and
   set it to any page (the theme's `front-page.php` renders automatically).
   Or just leave it on "Your latest posts" — `front-page.php` still loads on `/`.

## Email (Resend)

The contact form posts via AJAX to WordPress and sends through `wp_mail()`.
Install the **Resend** plugin and every email routes through Resend automatically:

1. Plugins → Add New → search **Resend** → Install & Activate.
2. Settings → Resend → paste your `RESEND_API_KEY`.
3. Set the from address to `noreply@thebandit.co.za`
   (verify the `thebandit.co.za` domain in your Resend dashboard first).

Two emails are sent on every enquiry:
- A notification to **info@thebandit.co.za** (change via the
  `thebandit_owner_email` filter, or edit `functions.php`).
- A branded dark-theme auto-reply to the customer.

### Prefer WPForms or Contact Form 7?

Open `front-page.php`, find the `<form id="contact-form">` block in the
contact section, and replace it with your shortcode, e.g.:

```php
echo do_shortcode( '[wpforms id="123"]' );
```

The theme already styles WPForms and CF7 fields to match the brand.
Resend still handles delivery because those plugins use `wp_mail()` too.

## Editing content

For now the copy lives in `front-page.php`. If you want any section to be
editable from the WordPress admin (e.g. testimonials, venues), that can be
wired to the Customizer or ACF on request.

## Logo / Favicon

The logo and favicon use `assets/images/bandit-logo.png`. To swap them,
replace that file or use **Appearance → Customize → Site Identity**.
