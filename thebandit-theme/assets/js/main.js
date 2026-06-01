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
  var mobileClose = document.getElementById('mobileClose');
  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () { mobileMenu.classList.add('open'); });
  }
  if (mobileClose && mobileMenu) {
    mobileClose.addEventListener('click', function () { mobileMenu.classList.remove('open'); });
  }
  document.querySelectorAll('.mobile-link').forEach(function (link) {
    link.addEventListener('click', function () {
      if (mobileMenu) { mobileMenu.classList.remove('open'); }
    });
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
          form.reset();
          setTimeout(function () {
            btn.textContent = 'Send Enquiry';
            btn.style.background = '';
            btn.disabled = false;
          }, 5000);
        })
        .catch(function () {
          btn.textContent = 'Error — try again';
          btn.style.background = '#c0392b';
          btn.disabled = false;
          setTimeout(function () {
            btn.textContent = 'Send Enquiry';
            btn.style.background = '';
          }, 4000);
        });
    });
  }
})();
