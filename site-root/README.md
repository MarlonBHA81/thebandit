# Site-root files for thebandit.co.za

These live in the **web root** (the folder that contains `wp-config.php`, usually
`public_html`), not inside the WordPress theme. Upload with cPanel File Manager or FTP.

| File | Why |
|---|---|
| `robots.txt` | PageSpeed reported `robots.txt` returning **HTTP 500**. A real file is served by Apache directly, so it no longer depends on WordPress. |
| `llms.txt` | PageSpeed's new "Agentic Browsing" check also got a 500 for it. Describes the site for AI assistants (validated against the llms.txt spec). Update it when services or contact details change. |
| `htaccess-caching-snippet.txt` | Optional. Adds browser-cache headers for static files. |

## The underlying 500 (needs your host)

On 28 Oct 2026, `https://thebandit.co.za/` returned 200 but `/robots.txt` and a made-up
URL (`/this-page-does-not-exist-test-404`) both returned **Apache's generic "500 Internal
Server Error" page**. So any visitor who mistypes a URL gets a server error, and Google
may treat a failing `robots.txt` as "do not crawl". The theme can't cause an Apache-level
500, so check, in this order:

1. **Error log**: cPanel → Metrics → Errors (or ask the host for the Apache error log for
   `thebandit.co.za`). The line logged at the time of the request names the cause.
2. WP Admin → **Settings → Permalinks → Save Changes** (rewrites the rules in `.htaccess`).
3. Open the root `.htaccess` and compare it with the standard WordPress block:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```
4. Temporarily deactivate plugins (a security or mail plugin can crash non-home requests).
