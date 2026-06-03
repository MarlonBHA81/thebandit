export const config = { runtime: 'edge' };

const OWNER_EMAIL = 'info@thebandit.co.za';
const FROM_ADDRESS = 'The Bandit <noreply@updates.thebandit.co.za>';

export default async function handler(req) {
  if (req.method !== 'POST') {
    return new Response('Method Not Allowed', { status: 405 });
  }

  let data;
  try {
    data = await req.json();
  } catch {
    return new Response('Bad Request', { status: 400 });
  }

  const { name, email, company, date, eventType, message } = data;

  if (!name || !email) {
    return new Response(JSON.stringify({ error: 'Missing required fields' }), {
      status: 400,
      headers: { 'Content-Type': 'application/json' }
    });
  }

  const apiKey = process.env.RESEND_API_KEY;
  if (!apiKey) {
    return new Response(JSON.stringify({ error: 'Server configuration error' }), {
      status: 500,
      headers: { 'Content-Type': 'application/json' }
    });
  }

  const ownerHtml = `
    <div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;color:#111;">
      <h2 style="color:#05a0eb;">New Booking Enquiry</h2>
      <table style="width:100%;border-collapse:collapse;">
        <tr><td style="padding:8px 0;font-weight:bold;width:140px;">Name</td><td>${name}</td></tr>
        <tr><td style="padding:8px 0;font-weight:bold;">Email</td><td><a href="mailto:${email}">${email}</a></td></tr>
        ${company ? `<tr><td style="padding:8px 0;font-weight:bold;">Company</td><td>${company}</td></tr>` : ''}
        ${date ? `<tr><td style="padding:8px 0;font-weight:bold;">Event Date</td><td>${date}</td></tr>` : ''}
        ${eventType ? `<tr><td style="padding:8px 0;font-weight:bold;">Event Type</td><td>${eventType}</td></tr>` : ''}
        ${message ? `<tr><td style="padding:8px 0;font-weight:bold;vertical-align:top;">Message</td><td style="white-space:pre-wrap;">${message}</td></tr>` : ''}
      </table>
    </div>
  `;

  const customerHtml = `
    <!DOCTYPE html>
    <html>
    <head><meta charset="UTF-8" /></head>
    <body style="margin:0;padding:0;background:#0a0a0a;font-family:Arial,sans-serif;">
      <div style="max-width:600px;margin:0 auto;background:#111;color:#fff;">

        <!-- Header -->
        <div style="background:#000;padding:32px 40px;text-align:center;border-bottom:2px solid #05a0eb;">
          <p style="font-size:11px;letter-spacing:0.3em;color:#05a0eb;text-transform:uppercase;margin:0 0 8px;">South Africa's Magic Outlaw</p>
          <h1 style="font-family:Georgia,serif;font-size:36px;letter-spacing:0.12em;color:#fff;margin:0;">THE BANDIT</h1>
        </div>

        <!-- Body -->
        <div style="padding:40px 40px 32px;">
          <p style="font-size:16px;color:#ccc;margin:0 0 24px;">Hi ${name},</p>
          <p style="font-size:15px;line-height:1.7;color:#ccc;margin:0 0 24px;">
            Thank you for reaching out. Your enquiry has been received and The Bandit's team will be in touch shortly to discuss your event.
          </p>

          <div style="background:#1a1a1a;border-left:3px solid #05a0eb;padding:20px 24px;margin:0 0 32px;border-radius:0 4px 4px 0;">
            <p style="font-size:13px;letter-spacing:0.15em;text-transform:uppercase;color:#05a0eb;margin:0 0 12px;">Your Enquiry Summary</p>
            ${company ? `<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Company:</strong> ${company}</p>` : ''}
            ${date ? `<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Event Date:</strong> ${date}</p>` : ''}
            ${eventType ? `<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Event Type:</strong> ${eventType}</p>` : ''}
          </div>

          <!-- What to expect -->
          <h2 style="font-family:Georgia,serif;font-size:20px;letter-spacing:0.08em;color:#fff;margin:0 0 16px;">What to Expect</h2>
          <div style="display:flex;flex-direction:column;gap:12px;margin:0 0 32px;">
            ${['Close-Up Magic & Pickpocket Entertainment', 'Stage Shows & Grand Illusions', 'Comedy MC Services', 'Fully customised to your event'].map(item => `
            <div style="display:flex;align-items:flex-start;gap:12px;">
              <span style="color:#05a0eb;font-size:16px;line-height:1.4;">&#9670;</span>
              <p style="margin:0;font-size:14px;color:#ccc;line-height:1.6;">${item}</p>
            </div>`).join('')}
          </div>

          <!-- CTA -->
          <div style="text-align:center;margin:32px 0;">
            <a href="https://www.thebandit.co.za" style="display:inline-block;background:#05a0eb;color:#fff;text-decoration:none;font-size:13px;letter-spacing:0.2em;text-transform:uppercase;padding:14px 36px;border-radius:2px;">Visit The Website</a>
          </div>
        </div>

        <!-- Footer -->
        <div style="background:#000;padding:24px 40px;text-align:center;border-top:1px solid #222;">
          <p style="font-size:12px;color:#555;margin:0;">The Bandit &nbsp;|&nbsp; Johannesburg, South Africa &nbsp;|&nbsp; <a href="mailto:info@thebandit.co.za" style="color:#555;">info@thebandit.co.za</a></p>
        </div>

      </div>
    </body>
    </html>
  `;

  const [ownerRes, customerRes] = await Promise.all([
    fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: { Authorization: `Bearer ${apiKey}`, 'Content-Type': 'application/json' },
      body: JSON.stringify({
        from: FROM_ADDRESS,
        to: [OWNER_EMAIL],
        reply_to: email,
        subject: `New Booking Enquiry — ${name}${company ? ` (${company})` : ''}`,
        html: ownerHtml
      })
    }),
    fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: { Authorization: `Bearer ${apiKey}`, 'Content-Type': 'application/json' },
      body: JSON.stringify({
        from: FROM_ADDRESS,
        to: [email],
        subject: "Thanks for reaching out — The Bandit",
        html: customerHtml
      })
    })
  ]);

  if (!ownerRes.ok || !customerRes.ok) {
    const failedRes = ownerRes.ok ? customerRes : ownerRes;
    const errBody = await failedRes.text();
    console.error('Resend error', failedRes.status, errBody);
    return new Response(JSON.stringify({ error: 'Email send failed', detail: errBody }), {
      status: 500,
      headers: { 'Content-Type': 'application/json' }
    });
  }

  return new Response(JSON.stringify({ ok: true }), {
    status: 200,
    headers: { 'Content-Type': 'application/json' }
  });
}
