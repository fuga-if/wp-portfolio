/**
 * Developer Portfolio Theme JavaScript
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

(function() {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.getElementById('main-nav');

    if (mobileMenuToggle && mainNav) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mainNav.classList.toggle('main-nav--open');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mainNav.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('main-nav--open');
            }
        });

        // Close menu when clicking on a link
        const navLinks = mainNav.querySelectorAll('.main-nav__link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mainNav.classList.remove('main-nav--open');
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');

            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                e.preventDefault();

                const headerHeight = document.getElementById('site-header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    /**
     * Header Scroll Effect
     */
    const header = document.getElementById('site-header');
    let lastScroll = 0;

    if (header) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                header.style.boxShadow = '0 4px 6px -1px rgb(0 0 0 / 0.1)';
            } else {
                header.style.boxShadow = '0 1px 2px 0 rgb(0 0 0 / 0.05)';
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Accordion Functionality
     */
    const accordionHeaders = document.querySelectorAll('.accordion__header');

    accordionHeaders.forEach(function(header) {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const isOpen = item.classList.contains('accordion__item--open');

            // Close all items
            document.querySelectorAll('.accordion__item').forEach(function(accItem) {
                accItem.classList.remove('accordion__item--open');
            });

            // Toggle clicked item
            if (!isOpen) {
                item.classList.add('accordion__item--open');
            }
        });
    });

    /**
     * Intersection Observer for Animations
     */
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const animationObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                animationObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements with data-animate attribute
    document.querySelectorAll('[data-animate]').forEach(function(el) {
        el.style.opacity = '0';
        animationObserver.observe(el);
    });

    /**
     * Skill Bar Animation
     */
    const skillBars = document.querySelectorAll('.skill-bar__fill');

    const skillObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const width = entry.target.style.width;
                entry.target.style.width = '0';
                setTimeout(function() {
                    entry.target.style.width = width;
                }, 100);
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    skillBars.forEach(function(bar) {
        skillObserver.observe(bar);
    });

    /**
     * Counter Animation for Stats
     */
    const statNumbers = document.querySelectorAll('.stat__number');

    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const target = entry.target;
                const text = target.textContent;
                const number = parseInt(text.replace(/\D/g, ''));
                const suffix = text.replace(/[0-9]/g, '');

                if (number) {
                    animateCounter(target, number, suffix);
                }

                counterObserver.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    function animateCounter(element, target, suffix) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(function() {
            current += increment;
            if (current >= target) {
                element.textContent = target + suffix;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + suffix;
            }
        }, 30);
    }

    statNumbers.forEach(function(stat) {
        counterObserver.observe(stat);
    });

    /**
     * Form Validation (Basic)
     */
    const contactForm = document.querySelector('.contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(function(field) {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--color-danger)';
                } else {
                    field.style.borderColor = 'var(--color-gray-200)';
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('必須項目を入力してください。');
            }
        });

        // Remove error style on input
        contactForm.querySelectorAll('input, textarea').forEach(function(field) {
            field.addEventListener('input', function() {
                this.style.borderColor = 'var(--color-gray-200)';
            });
        });
    }

    /**
     * Lazy Loading Images
     */
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(function(img) {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback for browsers without native lazy loading
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    }

})();
