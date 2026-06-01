# Moving The Bandit to WordPress — two approaches

You asked to see both so you can compare. Here they are, side by side.

## Option A — Custom theme (`thebandit-theme/`)

The static site ported into a proper WordPress theme. Pixel-for-pixel
identical, because it *is* the same HTML/CSS, just split into PHP templates.

**Pros**
- Exact design, nothing to rebuild or polish.
- Fast: zip the folder, upload, activate.
- Custom contact form kept, wired to `wp_mail()` → Resend, **including the
  branded customer auto-reply**.
- Lightweight, no page-builder overhead.

**Cons**
- Editing section copy means editing `front-page.php` (until we wire sections
  to the Customizer/ACF, which we can do later).
- Not drag-and-drop for a non-developer.

→ Install steps in `thebandit-theme/README.md`.

## Option B — Divi layout (`divi/thebandit-divi-layout.json`)

The site rebuilt as a Divi layout you import in the Divi Builder. Uses native
Divi modules so you can drag-and-drop edit everything afterwards.

**Pros**
- Fully editable in the Divi Visual Builder by anyone.
- Native Divi Contact Form, Testimonials, Video, Blurbs.

**Cons**
- Needs images uploaded + reselected after import.
- Expect minor visual touch-ups after import (Divi converts the legacy
  layout format into Divi 5's on first save).
- Divi's form doesn't send the branded auto-reply by itself.

→ Import steps in `divi/README.md`.

## Both use Resend the same way

Install the **Resend** plugin, add your API key, set the from address to
`noreply@thebandit.co.za` (verify the domain in Resend first). Every email
WordPress sends — from either approach — then routes through Resend.

## Recommendation

Start with **Option A** to get the exact site live quickly, then decide if you
want the drag-and-drop editing of **Option B**. They're not mutually exclusive
— you can trial the Divi layout on a draft page while the theme runs the live
site.
