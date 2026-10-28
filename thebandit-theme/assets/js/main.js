/* The Bandit — front-end interactions */
(function () {
  'use strict';

  // ─── Nav scroll ───────────────────────────────────────
  var navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', function () {
      navbar.classList.toggle('scrolled', window.scrollY > 60);
    });
  }

  // ─── Mobile menu ───────────────────────────────────────
  var hamburger = document.getElementById('hamburger');
  var mobileMenu = document.getElementById('mobileMenu');
  function setMenu(open) {
    if (!mobileMenu) { return; }
    mobileMenu.classList.toggle('open', open);
    if (hamburger) { hamburger.setAttribute('aria-expanded', open ? 'true' : 'false'); }
  }
  // The hamburger is the toggle (it sits above the open menu, so it is also what closes it); Escape closes too.
  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () { setMenu(!mobileMenu.classList.contains('open')); });
  }
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setMenu(false); } });
  document.querySelectorAll('.mobile-link').forEach(function (link) {
    link.addEventListener('click', function () { setMenu(false); });
  });

  // ─── Scroll reveal ─────────────────────────────────────
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('visible'); }
      });
    }, { threshold: 0.1 });
    reveals.forEach(function (el) { observer.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('visible'); });
  }

  // ─── Video play ────────────────────────────────────────
  window.playVideo = function () {
    var thumb = document.getElementById('videoThumb');
    var iframe = document.getElementById('videoIframe');
    var player = document.getElementById('ytPlayer');
    if (player) { player.src = player.dataset.src; }
    if (thumb) { thumb.style.display = 'none'; }
    if (iframe) { iframe.classList.add('active'); }
  };
  // Make the play overlay operable from the keyboard (Enter / Space).
  var videoThumb = document.getElementById('videoThumb');
  if (videoThumb) {
    videoThumb.setAttribute('tabindex', '0');
    videoThumb.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); window.playVideo(); }
    });
  }

  // ─── Contact form (WordPress AJAX → wp_mail → Resend) ──
  var form = document.getElementById('contact-form');
  if (form && typeof theBandit !== 'undefined') {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn = form.querySelector('.btn-submit');
      var formData = new FormData(form);
      formData.append('action', 'thebandit_enquiry');
      formData.append('nonce', theBandit.nonce);

      btn.textContent = 'Sending…';
      btn.disabled = true;

      fetch(theBandit.ajaxUrl, { method: 'POST', body: formData })
        .then(function (res) { return res.json(); })
        .then(function (json) {
          if (!json.success) { throw new Error('send failed'); }
          btn.textContent = 'Enquiry Sent ✓';
          btn.style.background = '#0a7a2e';
          btn.style.color = '#fff';
          form.reset();
          setTimeout(function () {
            btn.textContent = 'Send Enquiry';
            btn.style.background = '';
            btn.style.color = '';
            btn.disabled = false;
          }, 5000);
        })
        .catch(function () {
          btn.textContent = 'Error — try again';
          btn.style.background = '#c0392b';
          btn.style.color = '#fff';
          btn.disabled = false;
          setTimeout(function () {
            btn.textContent = 'Send Enquiry';
            btn.style.background = '';
            btn.style.color = '';
          }, 4000);
        });
    });
  }
})();
