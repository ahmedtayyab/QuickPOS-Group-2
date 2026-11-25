/**
 * QuickPOS landing page behaviour.
 * The page works without JavaScript; scripts only add progressive enhancements.
 */
(function () {
  'use strict';
  document.documentElement.classList.add('js');

  var header = document.querySelector('.site-header');
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('site-nav');

  /* POS2-14: mobile menu toggle */
  function setMenu(open) {
    if (!toggle || !nav) return;
    toggle.setAttribute('aria-expanded', String(open));
    toggle.querySelector('.visually-hidden').textContent = open ? 'Close menu' : 'Open menu';
    nav.classList.toggle('is-open', open);
  }

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });
    // Choosing a link closes the menu (the browser then scrolls to the section)
    nav.addEventListener('click', function (event) {
      if (event.target.closest('a')) setMenu(false);
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setMenu(false);
        toggle.focus();
      }
    });
    // Reset the menu when resizing up to the desktop layout
    window.matchMedia('(min-width: 768px)').addEventListener('change', function (mq) {
      if (mq.matches) setMenu(false);
    });
  }

  /* POS2-13: header shadow once the page is scrolled */
  if (header) {
    var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 8); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* POS2-13: highlight the nav link of the section currently in view */
  var links = document.querySelectorAll('.site-nav__link[href^="#"]');
  if ('IntersectionObserver' in window && links.length) {
    var byId = {};
    links.forEach(function (link) { byId[link.getAttribute('href').slice(1)] = link; });
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var link = byId[entry.target.id];
        if (link) link.classList.toggle('is-active', entry.isIntersecting);
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    Object.keys(byId).forEach(function (id) {
      var section = document.getElementById(id);
      if (section) observer.observe(section);
    });
  }

  /* POS2-19: monthly / yearly billing toggle (prices are rendered by PHP in data attributes) */
  var billing = document.querySelector('.billing-toggle');
  if (billing) {
    billing.hidden = false; // only shown when JavaScript can make it work
    var buttons = billing.querySelectorAll('[data-billing]');
    billing.addEventListener('click', function (event) {
      var button = event.target.closest('[data-billing]');
      if (!button) return;
      var period = button.getAttribute('data-billing');
      buttons.forEach(function (b) {
        var active = b === button;
        b.classList.toggle('is-active', active);
        b.setAttribute('aria-pressed', String(active));
      });
      document.querySelectorAll('.plan__amount, .plan__billing').forEach(function (el) {
        el.textContent = el.getAttribute('data-' + period);
      });
    });
  }
})();
