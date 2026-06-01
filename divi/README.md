# The Bandit — Divi Layout

`thebandit-divi-layout.json` recreates the site as a **Divi layout** using
native Divi modules (Sections, Rows, Blurbs, Testimonials, Video, Contact
Form) plus a couple of Code modules for the marquee and logo grid.

> **Format note:** This is exported in Divi's legacy (shortcode) layout
> format. The **Divi 5** builder imports legacy layouts and converts them to
> its new format on the fly, so this is the most reliable way to hand a
> pre-built layout to Divi 5 today. After import, open the page in the
> builder and save once to let Divi 5 finalise the conversion.

## Import steps

1. WordPress Admin → **Pages → Add New**. Give it a title (e.g. "Home").
2. Click **Use Divi Builder** → **Build From Scratch** → enter the builder.
3. In the builder, open the **portability** menu:
   bottom purple toolbar → the **⋯** (or the layout settings gear) →
   **Portability** icon (the up/down arrows) → **Import** tab.
4. Upload `thebandit-divi-layout.json` → **Import Divi Builder Layout**.
5. **Save**. Then set this page as your homepage under
   **Settings → Reading → Homepage displays → A static page**.

## Before it looks right — upload the images

The layout references images at:

```
https://www.thebandit.co.za/wp-content/uploads/bandit/
https://www.thebandit.co.za/wp-content/uploads/bandit/logos/
```

You have two options:

- **Easiest:** upload all files from the theme's `assets/images/` and
  `assets/logos/` folders into your Media Library, then in the builder click
  each Image / Video-overlay module and reselect the image from the library.
- **Or:** match the path above (upload into a `bandit/` and `bandit/logos/`
  folder under `wp-content/uploads/`) and the URLs resolve automatically.

Files needed: `hero-cards.jpg`, `about-illusion.jpg`, `contact-hands-up.png`,
`yt-thumbnail.png`, and every logo in `assets/logos/`.

## Email (Resend)

The **Contact Form** module sends to `info@thebandit.co.za` via `wp_mail()`,
so the **Resend** plugin handles delivery automatically (see the theme README
for Resend setup). Divi's contact form does not send the branded customer
auto-reply on its own — if you want that, either:

- use the custom theme instead (it includes the auto-reply), or
- add a Divi automation / a plugin like WP Mail SMTP + an autoresponder, or
- keep a WPForms form here instead of the Divi module.

## What's covered

| Section        | Divi module(s) used                          |
|----------------|----------------------------------------------|
| Hero           | Section + Row (1/2,1/2), Text, Button, Image |
| Marquee        | Code module (self-contained CSS animation)   |
| Pull quote     | Text                                         |
| About          | Image + Text, then a 3-col stats row         |
| Services       | 6 × Blurb (icon + title + body)              |
| Clients        | Code module (8-col logo grid)                |
| Video          | Video module (overlay + play button)         |
| Testimonials   | 3 × Testimonial                              |
| Venues         | 4 × Text (styled lists)                      |
| Contact        | Image + Contact Form module                  |

## Regenerating

Edit `build-layout.py` and run `python3 build-layout.py` to rebuild the JSON.
The script guarantees valid JSON escaping of the Divi markup.

## Honest caveat

Hand-built Divi layouts can need small touch-ups after import (spacing, font
sizes, a module that didn't carry an attribute across the version conversion).
Budget a little time in the Visual Builder to polish. If pixel-perfect parity
with zero fiddling matters more than using Divi, the custom theme in
`../thebandit-theme/` is the safer choice.
