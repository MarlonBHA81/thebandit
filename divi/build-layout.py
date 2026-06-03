#!/usr/bin/env python3
"""
Generate a Divi layout export JSON for The Bandit.

Output: thebandit-divi-layout.json — import via Divi Builder → portability →
Import. Uses the legacy (shortcode) layout format, which the Divi 5 builder
imports and converts to its new format automatically.

Images are referenced from a placeholder uploads path; upload the asset files
to your Media Library and adjust the IMG / LOGO base if needed (see README).
"""

import json

BV = "4.27.0"  # _builder_version stamped on every module
BLUE = "#05a0eb"
BLACK = "#000000"
DARK = "#080808"
DARK2 = "#111111"
WHITE = "#ffffff"
GREY = "#aaaaaa"

# Upload the theme's assets/images and assets/logos here, or edit each module.
IMG = "https://www.thebandit.co.za/wp-content/uploads/bandit/"
LOGO = IMG + "logos/"


def attrs(d):
    return "".join(f' {k}="{v}"' for k, v in d.items())


def section(inner, bg=BLACK, padding="80px|40px|80px|40px", extra=None):
    a = {"_builder_version": BV, "background_color": bg,
         "custom_padding": padding}
    if extra:
        a.update(extra)
    return f"[et_pb_section fb_built=\"1\"{attrs(a)}]{inner}[/et_pb_section]"


def row(inner, structure="1_1", extra=None):
    a = {"_builder_version": BV, "column_structure": structure}
    if extra:
        a.update(extra)
    return f"[et_pb_row{attrs(a)}]{inner}[/et_pb_row]"


def column(inner, ctype="4_4"):
    return f"[et_pb_column type=\"{ctype}\" _builder_version=\"{BV}\"]{inner}[/et_pb_column]"


def text(content, extra=None):
    a = {"_builder_version": BV, "text_text_color": "#c8c8c8",
         "text_font": "Inter||||||||"}
    if extra:
        a.update(extra)
    return f"[et_pb_text{attrs(a)}]{content}[/et_pb_text]"


def button(label, url, extra=None):
    a = {"_builder_version": BV, "button_text": label, "button_url": url,
         "button_bg_color": BLUE, "button_text_color": WHITE,
         "custom_button": "on", "button_border_width": "0px",
         "button_font": "Inter|600||on|||||", "button_use_icon": "off"}
    if extra:
        a.update(extra)
    return f"[et_pb_button{attrs(a)}][/et_pb_button]"


def image(src, alt="", extra=None):
    a = {"_builder_version": BV, "src": src, "alt": alt, "title_text": alt}
    if extra:
        a.update(extra)
    return f"[et_pb_image{attrs(a)}][/et_pb_image]"


def blurb(title, body, icon="%%84%%"):
    a = {"_builder_version": BV, "title": title, "use_icon": "on",
         "font_icon": icon, "icon_color": BLUE,
         "background_color": DARK2, "custom_padding": "40px|36px|40px|36px",
         "header_font": "Cinzel|700||on|||||", "header_text_color": WHITE,
         "body_text_color": GREY, "body_font": "Inter||||||||"}
    return f"[et_pb_blurb{attrs(a)}]{body}[/et_pb_blurb]"


def testimonial(author, role, body):
    a = {"_builder_version": BV, "author": author, "job_title": role,
         "background_color": DARK2, "body_text_color": "#d0d0d0",
         "custom_padding": "40px|40px|40px|40px", "quote_icon_color": BLUE,
         "use_background_color_gradient": "off"}
    return f"[et_pb_testimonial{attrs(a)}]{body}[/et_pb_testimonial]"


def video(youtube_url, overlay):
    a = {"_builder_version": BV, "src": youtube_url, "image_src": overlay,
         "thumbnail_overlay_color": "rgba(0,0,0,0.45)"}
    return f"[et_pb_video{attrs(a)}][/et_pb_video]"


def code(html):
    return f"[et_pb_code _builder_version=\"{BV}\"]{html}[/et_pb_code]"


def heading(label, title_html, center=False):
    align = "center" if center else "left"
    lbl = text(label, {"text_text_color": BLUE,
                       "text_font": "Inter|600||on|||||",
                       "text_letter_spacing": "3px", "text_orientation": align,
                       "text_font_size": "11px"})
    ttl = text(title_html, {"text_orientation": align,
                            "header_2_font": "Cinzel|700||||||",
                            "header_2_text_color": WHITE,
                            "header_2_font_size": "44px"})
    return lbl + ttl


# ─── Build each section ────────────────────────────────────────────────
sections = []

# HERO — 3 cols (heading / image / body) so mobile stacks in correct order.
# A CSS code row overrides to a 2-col grid-template-areas layout on desktop.
hero_css = code(
    "<style>"
    "@media(min-width:768px){"
    "#hero .et_pb_row{"
    "display:grid!important;"
    "grid-template-columns:1fr 1fr!important;"
    "grid-template-areas:'hd img' 'bd img'!important;"
    "width:100%!important;}"
    "#hero .et_pb_column:nth-child(1){grid-area:hd!important;align-self:end!important;}"
    "#hero .et_pb_column:nth-child(2){grid-area:img!important;align-self:center!important;}"
    "#hero .et_pb_column:nth-child(3){grid-area:bd!important;align-self:start!important;}"
    "}"
    "</style>"
)
hero_heading = column(
    text("South Africa's #1 Magician", {"text_text_color": BLUE,
         "text_font": "Inter|600||on|||||", "text_letter_spacing": "4px",
         "text_font_size": "12px"})
    + text("<h1>THE <span style=\"color:#05a0eb;\">BANDIT</span></h1>",
           {"header_font": "Cinzel|900||on|||||", "header_text_color": WHITE,
            "header_font_size": "84px"})
    + text("His Magic Is Criminal", {"text_text_color": GREY,
           "text_font": "Cinzel||||||||", "text_letter_spacing": "3px"}),
    "1_3")
hero_img = column(image(IMG + "hero-cards.jpg", "The Bandit"), "1_3")
hero_body = column(
    text("South Africa's #1 magician. A master of close-up magic, pickpocket "
         "entertainment and hypnosis, from intimate table magic to commanding "
         "the stage. Expect the unexpected.")
    + button("Book The Bandit", "#contact")
    + button("Watch Him Work", "#video",
             {"button_bg_color": "rgba(0,0,0,0)", "button_border_width": "1px",
              "button_border_color": "rgba(255,255,255,0.25)"}),
    "1_3")
sections.append(section(
    row(column(hero_css), extra={"custom_padding": "0px|0px|0px|0px"})
    + row(hero_heading + hero_img + hero_body, "1_3,1_3,1_3"),
    bg=BLACK, padding="160px|40px|100px|40px",
    extra={"module_id": "hero"}))

# MARQUEE
marquee_items = ["Close-Up Magic", "Stage Shows", "Pickpocket Entertainment",
                 "Hypnotism", "Corporate Events", "Roaming Magic", "MC Services",
                 "Illusion Shows"]
chips = " &#9670; ".join(marquee_items * 2)
marquee_html = (
    "<style>.bandit-marquee{overflow:hidden;background:#05a0eb;}"
    ".bandit-marquee div{display:inline-block;white-space:nowrap;"
    "animation:bmar 30s linear infinite;font-family:Cinzel,serif;"
    "letter-spacing:.3em;text-transform:uppercase;color:#fff;font-size:12px;"
    "padding:14px 0;}@keyframes bmar{from{transform:translateX(0);}"
    "to{transform:translateX(-50%);}}</style>"
    f"<div class=\"bandit-marquee\"><div>{chips} &#9670; {chips} &#9670; </div></div>")
sections.append(section(row(column(code(marquee_html))), bg=BLUE,
                        padding="0px|0px|0px|0px"))

# QUOTE
sections.append(section(
    row(column(
        text("&ldquo;The <span style=\"color:#05a0eb;\">best pickpocket "
             "magician</span> in South Africa&rdquo;",
             {"text_orientation": "center", "header_font": "Cinzel|700||||||",
              "text_text_color": WHITE, "text_font_size": "40px",
              "text_font": "Cinzel||||||||"})
        + text("Darren &ldquo;Whackhead&rdquo; Simpson, South African Radio Legend",
               {"text_orientation": "center", "text_text_color": GREY,
                "text_letter_spacing": "2px", "text_font_size": "13px"}))),
    bg=DARK2, padding="70px|40px|70px|40px"))

# ABOUT
about_left = column(image(IMG + "about-illusion.jpg", "The Bandit performing"), "1_2")
about_right = column(
    heading("The Story", "<h2>Born to <span style=\"color:#05a0eb;\">Steal</span> the Show</h2>")
    + text("Raised in the heart of Johannesburg, The Bandit is a world-class "
           "comedy magician who has spent years entertaining audiences young "
           "and old, across South Africa and internationally.")
    + text("Trained under private tutelage by some of the world's finest, "
           "including Troye the Mentalist (SA) and Gregory Wilson (USA), this "
           "former magic kid has evolved into a renowned seasoned professional.")
    + text("His unique blend of comedy and dramatic magic makes him one of the "
           "firm favourites amongst numerous private and corporate clients."),
    "1_2")
stat = lambda n, l: column(
    text(f"<span style=\"font-family:Cinzel;font-size:34px;color:#05a0eb;\">{n}</span>"
         f"<br/><span style=\"font-size:11px;letter-spacing:2px;color:#666;"
         f"text-transform:uppercase;\">{l}</span>",
         {"text_orientation": "center"}), "1_3")
about_stats = row(stat("20+", "Years Experience") + stat("SA's #1", "Pickpocket Act")
                  + stat("100+", "Corporate Brands"), "1_3,1_3,1_3")
sections.append(section(row(about_left + about_right, "1_2,1_2") + about_stats,
                        bg=DARK, extra={"module_id": "about"}))

# SERVICES
services = [
    ("&#127183; Close-Up &amp; Roaming Magic",
     "The ultimate ice-breaker. The Bandit moves among your guests creating "
     "intimate moments of astonishment with cards, coins and everyday objects."),
    ("&#127917; Professional Stage Shows",
     "The Bandit commands the room, holding larger audiences captive with "
     "riveting illusions, comedy, and dramatic magic."),
    ("&#128092; Pickpocket Entertainment",
     "Southern Africa's only pickpocket entertainer. Wallets, watches, belts, "
     "ties. All returned, all hilarious."),
    ("&#129504; Hypnotism",
     "A certified hypnotist, The Bandit takes willing volunteers on an "
     "unforgettable journey, live on stage. Hilarious, mind-bending and "
     "completely unique."),
    ("&#127908; MC Services",
     "A natural on any stage, The Bandit keeps the flow seamless and the "
     "audience engaged from start to finish."),
    ("&#10024; Family &amp; Promotional Shows",
     "Magic for all ages, adapted for any setting, from family events to brand "
     "activations."),
]
svc_rows = heading("What He Does", "<h2>Performance <span style=\"color:#05a0eb;\">Offerings</span></h2>")
for i in range(0, 6, 3):
    cells = "".join(column(blurb(t, b), "1_3") for t, b in services[i:i+3])
    svc_rows += row(cells, "1_3,1_3,1_3")
sections.append(section(row(column(svc_rows)) if False else svc_rows, bg=BLACK,
                        extra={"module_id": "services"}))

# CLIENTS
logos = [
    ("absa_white.webp", "ABSA"), ("toyota_white.webp", "Toyota"),
    ("mtn_white.webp", "MTN"), ("anglo_american_white.webp", "Anglo American"),
    ("discovery_white.webp", "Discovery"), ("barclays_white.webp", "Barclays"),
    ("FNB.png", "FNB"), ("KFC.png", "KFC"), ("land-rover.png", "Land Rover"),
    ("Sanlam.png", "Sanlam"), ("Vodacom.png", "Vodacom"),
    ("sasol_white.webp", "Sasol"), ("bat_white.webp", "BAT"),
    ("centriq_insurance_white.webp", "Centriq"),
    ("dainfern_college_white.webp", "Dainfern"), ("mni_white.webp", "MNI"),
]
logo_imgs = "".join(
    f"<img src=\"{LOGO}{f}\" alt=\"{a}\" style=\"height:45px;max-width:172px;"
    f"object-fit:contain;opacity:.55;\" />" for f, a in logos)
logos_html = (
    "<div style=\"display:grid;grid-template-columns:repeat(8,1fr);gap:28px 32px;"
    "align-items:center;justify-items:center;max-width:900px;margin:0 auto;\">"
    f"{logo_imgs}</div>")
sections.append(section(
    row(column(heading("Trusted By", "<h2>Clients &amp; <span style=\"color:#05a0eb;\">Brands</span></h2>", center=True)
               + code(logos_html))),
    bg=BLACK, extra={"module_id": "clients"}))

# VIDEO
sections.append(section(
    row(column(
        heading("See It Live", "<h2>Watch The <span style=\"color:#05a0eb;\">Magic</span> Unfold</h2>", center=True)
        + video("https://www.youtube.com/watch?v=KXtSX7TxY1w", IMG + "yt-thumbnail.png")
        + button("Book Your Event", "#contact"))),
    bg=DARK, extra={"module_id": "video"}))

# TESTIMONIALS
tcells = (
    column(testimonial("Darren &ldquo;Whackhead&rdquo; Simpson",
           "SA Radio &amp; Comedy Legend",
           "The best pickpocket magician in South Africa. Absolutely incredible."), "1_3")
    + column(testimonial("Shakira Carlsen", "Mercedes-Benz",
             "The Bandit is absolutely amazing. Our guests couldn't stop "
             "talking about his performance."), "1_3")
    + column(testimonial("Mahlatse", "Gautrain",
             "I don't know how he does it. One of the best entertainers we "
             "have ever had at our events."), "1_3"))
sections.append(section(
    heading("What They Say", "<h2>The <span style=\"color:#05a0eb;\">Verdict</span></h2>")
    + row(tcells, "1_3,1_3,1_3"),
    bg=BLACK, extra={"module_id": "testimonials"}))

# VENUES
venues = [
    ("Comedy Clubs", ["Parkers Comedy Club", "Goliath Comedy Club",
                      "Whackhead's Comedy Club", "Cape Town Comedy Club"]),
    ("Casinos", ["Goldreef City", "Silverstar Casino", "Caesars Palace",
                 "Emperors Palace", "GrandWest Casino", "Montecasino",
                 "Carnival City", "Sibaya Casino"]),
    ("Theatres", ["The Joburg Theatre", "The Box", "Pop Art Theatre",
                  "The Cirk", "The Barnyard Theatre"]),
    ("Estates &amp; Resorts", ["Steyn City", "Sun City", "Fancourt",
                               "Blue Valley Estate", "Eagle Canyon", "The Fairway"]),
]
vcells = ""
for title, items in venues:
    lis = "".join(f"<li style=\"color:#aaa;font-size:13px;padding:4px 0;\">{i}</li>"
                  for i in items)
    block = (f"<h3 style=\"font-family:Cinzel;color:#05a0eb;font-size:13px;"
             f"letter-spacing:2px;text-transform:uppercase;border-bottom:1px "
             f"solid rgba(5,160,235,.2);padding-bottom:10px;\">{title}</h3>"
             f"<ul style=\"list-style:none;padding:0;margin:12px 0 0;\">{lis}</ul>")
    vcells += column(text(block, {"background_color": DARK2,
                                  "custom_padding": "28px|26px|28px|26px"}), "1_4")
sections.append(section(
    heading("Where He's Performed", "<h2>The <span style=\"color:#05a0eb;\">Stages</span></h2>")
    + row(vcells, "1_4,1_4,1_4,1_4"),
    bg=DARK, extra={"module_id": "venues"}))

# TIKTOK
tiktok_html = (
    "<style>"
    ".bandit-tt-win{max-width:780px;width:100%;margin:0 auto;"
    "border-top:2px solid #05a0eb;"
    "box-shadow:0 0 80px rgba(5,160,235,.12),0 8px 40px rgba(0,0,0,.6);"
    "border-radius:0 0 4px 4px;}"
    ".bandit-tt-hdr{display:flex;align-items:center;gap:.65rem;background:#000;"
    "padding:.75rem 1.1rem;border-bottom:1px solid rgba(255,255,255,.07);}"
    ".bandit-tt-handle{color:#fff;font-size:.82rem;letter-spacing:.06em;"
    "font-weight:500;flex:1;font-family:Inter,sans-serif;}"
    ".bandit-tt-follow{font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;"
    "color:#05a0eb;text-decoration:none;border:1px solid rgba(5,160,235,.4);"
    "padding:.3rem .75rem;border-radius:2px;transition:background .3s,color .3s;}"
    ".bandit-tt-follow:hover{background:#05a0eb;color:#fff;}"
    "</style>"
    "<div class=\"bandit-tt-win\">"
    "<div class=\"bandit-tt-hdr\">"
    "<svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"#fff\" aria-hidden=\"true\">"
    "<path d=\"M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 "
    "2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 "
    "6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 "
    "006.33-6.34V9.05a8.16 8.16 0 004.78 1.52V7.11a4.85 4.85 0 01-1.01-.42z\"/>"
    "</svg>"
    "<span class=\"bandit-tt-handle\">@kevinkeuvelaar</span>"
    "<a href=\"https://www.tiktok.com/@kevinkeuvelaar\" target=\"_blank\" "
    "class=\"bandit-tt-follow\">Follow</a>"
    "</div>"
    "<blockquote class=\"tiktok-embed\" cite=\"https://www.tiktok.com/@kevinkeuvelaar\" "
    "data-unique-id=\"kevinkeuvelaar\" data-embed-type=\"creator\" "
    "style=\"max-width:780px;min-width:288px;width:100%;margin:0;\">"
    "<section><a target=\"_blank\" href=\"https://www.tiktok.com/@kevinkeuvelaar\">"
    "@kevinkeuvelaar</a></section>"
    "</blockquote>"
    "<script async src=\"https://www.tiktok.com/embed.js\"></script>"
    "</div>"
)
sections.append(section(
    heading("Follow Along", "<h2>Latest on <span style=\"color:#05a0eb;\">TikTok</span></h2>", center=True)
    + row(column(code(tiktok_html))),
    bg=DARK, extra={"module_id": "tiktok"}))

# CONTACT
contact_form = (
    "[et_pb_contact_form _builder_version=\"" + BV + "\" "
    "email=\"info@thebandit.co.za\" title=\"Send A Message\" "
    "custom_button=\"on\" button_text=\"Send Enquiry\" "
    "button_bg_color=\"" + BLUE + "\" button_text_color=\"" + WHITE + "\" "
    "submit_button_text=\"Send Enquiry\"]"
    "[et_pb_contact_field field_id=\"Name\" field_title=\"Your Name\" "
    "_builder_version=\"" + BV + "\"][/et_pb_contact_field]"
    "[et_pb_contact_field field_id=\"Email\" field_title=\"Email Address\" "
    "field_type=\"email\" _builder_version=\"" + BV + "\"][/et_pb_contact_field]"
    "[et_pb_contact_field field_id=\"Company\" field_title=\"Company / Organisation\" "
    "required_mark=\"off\" _builder_version=\"" + BV + "\"][/et_pb_contact_field]"
    "[et_pb_contact_field field_id=\"EventDate\" field_title=\"Event Date\" "
    "required_mark=\"off\" _builder_version=\"" + BV + "\"][/et_pb_contact_field]"
    "[et_pb_contact_field field_id=\"Message\" field_title=\"Tell us about your event\" "
    "field_type=\"text\" fullwidth_field=\"on\" _builder_version=\"" + BV + "\"][/et_pb_contact_field]"
    "[/et_pb_contact_form]")
phone_cta = (
    "<div style=\"display:flex;align-items:center;justify-content:space-between;"
    "gap:.75rem;margin-top:1rem;font-size:.8rem;color:#aaa;letter-spacing:.04em;"
    "font-family:Inter,sans-serif;padding:0 4px;\">"
    "<span>Or call us directly</span>"
    "<a href=\"tel:+27879439435\" style=\"color:#05a0eb;text-decoration:none;"
    "font-weight:500;font-size:.95rem;letter-spacing:.05em;white-space:nowrap;\">"
    "+27 87 943 9435</a>"
    "</div>"
)
contact_cells = (column(image(IMG + "contact-hands-up.png", "The Bandit"), "1_2")
                 + column(contact_form + code(phone_cta), "1_2"))
sections.append(section(
    heading("Get In Touch", "<h2>Book The <span style=\"color:#05a0eb;\">Bandit</span></h2>", center=True)
    + row(contact_cells, "1_2,1_2"),
    bg=BLACK, extra={"module_id": "contact"}))

# ─── Assemble export ───────────────────────────────────────────────────
layout = "".join(sections)

export = {
    "context": "et_builder",
    "data": {"10": layout},
    "presets": {},
    "global_colors": [
        ["gcid-bandit-blue", {"color": BLUE, "active": "yes"}],
        ["gcid-bandit-black", {"color": BLACK, "active": "yes"}],
    ],
    "images": {},
    "thumbnails": [],
}

with open("thebandit-divi-layout.json", "w", encoding="utf-8") as fh:
    json.dump(export, fh, ensure_ascii=False, indent=2)

print("Wrote thebandit-divi-layout.json")
print("Sections:", len(sections), "| layout length:", len(layout), "chars")
