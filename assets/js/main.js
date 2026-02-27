/**
 * Fuga Portfolio - メインスクリプト
 *
 * @package Fuga_Portfolio
 */

(function () {
  'use strict';

  /* ========================================
   * ヘッダースクロール制御
   * ======================================== */
  const header = document.getElementById('site-header');
  let lastScrollY = 0;

  function handleScroll() {
    const currentScrollY = window.scrollY;

    if (currentScrollY > 80) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }

    if (currentScrollY > lastScrollY && currentScrollY > 200) {
      header.classList.add('is-hidden');
    } else {
      header.classList.remove('is-hidden');
    }

    lastScrollY = currentScrollY;
  }

  window.addEventListener('scroll', handleScroll, { passive: true });

  /* ========================================
   * モバイルメニュー
   * ======================================== */
  const menuToggle = document.getElementById('menu-toggle');
  const mainNav = document.getElementById('main-navigation');

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', function () {
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', !isExpanded);
      this.classList.toggle('is-active');
      mainNav.classList.toggle('is-open');
      document.body.classList.toggle('menu-open');
    });

    mainNav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        menuToggle.classList.remove('is-active');
        menuToggle.setAttribute('aria-expanded', 'false');
        mainNav.classList.remove('is-open');
        document.body.classList.remove('menu-open');
      });
    });
  }

  /* ========================================
   * スムーススクロール
   * ======================================== */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const target = document.querySelector(targetId);
      if (!target) return;

      e.preventDefault();
      const headerHeight = header ? header.offsetHeight : 0;
      const targetPosition = target.getBoundingClientRect().top + window.scrollY - headerHeight;

      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth',
      });
    });
  });

  /* ========================================
   * スクロールアニメーション（Intersection Observer）
   * ======================================== */
  const animateElements = document.querySelectorAll('[data-animate]');

  if ('IntersectionObserver' in window && animateElements.length > 0) {
    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const el = entry.target;
            const animationType = el.getAttribute('data-animate');

            if (animationType === 'fade-up-stagger') {
              Array.from(el.children).forEach(function (child, index) {
                setTimeout(function () {
                  child.classList.add('is-visible');
                }, index * 120);
              });
            }

            el.classList.add('is-visible');
            observer.unobserve(el);
          }
        });
      },
      {
        threshold: 0.15,
        rootMargin: '0px 0px -40px 0px',
      }
    );

    animateElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ========================================
   * 実績フィルター（archive-work.php用）
   * ======================================== */
  const filterBtns = document.querySelectorAll('.filter-btn');
  const workCards = document.querySelectorAll('.works-grid .work-card');

  if (filterBtns.length > 0 && workCards.length > 0) {
    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-filter');

        filterBtns.forEach(function (b) {
          b.classList.remove('active');
        });
        this.classList.add('active');

        workCards.forEach(function (card) {
          if (filter === 'all') {
            card.style.display = '';
            return;
          }

          const categories = card.getAttribute('data-categories') || '';
          card.style.display = categories.includes(filter) ? '' : 'none';
        });
      });
    });
  }
})();
