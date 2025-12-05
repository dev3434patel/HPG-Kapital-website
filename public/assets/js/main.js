// Main JavaScript for HPG Kapital Website

// ScrollToTop - Matches React ScrollToTop component
(function() {
    // Scroll to top on route change (handled by page navigation)
    // For SPA-like behavior, we scroll to top when page loads
    if (window.location.hash === '') {
        window.scrollTo(0, 0);
    }
    
    // Also handle hash changes
    window.addEventListener('hashchange', function() {
        if (window.location.hash === '') {
            window.scrollTo(0, 0);
        }
    });
})();

// Mobile Menu Toggle
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const button = document.getElementById('mobile-menu-button');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    if (menu && button) {
        const isOpen = !menu.classList.contains('hidden');
        
        if (isOpen) {
            menu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        } else {
            menu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            button.setAttribute('aria-expanded', 'true');
        }
    }
}

// Keyboard accessibility for mobile menu button
(function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleMobileMenu();
            }
            if (e.key === 'Escape') {
                const menu = document.getElementById('mobile-menu');
                if (menu && !menu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            }
        });
    }
})();

// Header scroll effect
(function() {
    const header = document.getElementById('main-header');
    if (!header) return;
    
    let lastScroll = 0;
    const handleScroll = () => {
        const currentScroll = window.scrollY;
        if (currentScroll > 20) {
            header.classList.remove('bg-white/95', 'backdrop-blur-sm');
            header.classList.add('bg-background/95', 'backdrop-blur-xl', 'shadow-lg');
        } else {
            header.classList.remove('bg-background/95', 'backdrop-blur-xl', 'shadow-lg');
            header.classList.add('bg-white/95', 'backdrop-blur-sm');
        }
        lastScroll = currentScroll;
    };
    
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll(); // Initial check
})();

// Hero Parallax Effect - Enhanced smooth parallax
(function() {
    const heroSection = document.getElementById('hero-section');
    if (!heroSection) return;
    
    const parallaxElement = heroSection.querySelector('.hero-parallax');
    if (!parallaxElement) return;
    
    // Enhanced parallax with smooth interpolation
    let parallaxOffset = 0;
    let rafId = null;
    let isRunning = false;
    
    const updateParallax = () => {
        const currentScrollY = window.scrollY;
        const heroHeight = heroSection.offsetHeight || window.innerHeight;
        
        // Only apply parallax within hero section
        if (currentScrollY < heroHeight) {
            // Parallax intensity: 10% of scroll (slightly more noticeable)
            const targetOffset = currentScrollY * 0.10;
            
            // Ultra-smooth interpolation (exponential smoothing)
            const diff = targetOffset - parallaxOffset;
            parallaxOffset += diff * 0.15; // Smooth interpolation factor (slightly faster for responsiveness)
            
            // Apply transform with hardware acceleration
            parallaxElement.style.transform = `translate3d(0, ${parallaxOffset}px, 0)`;
            parallaxElement.style.transformStyle = 'preserve-3d';
            parallaxElement.style.webkitTransformStyle = 'preserve-3d';
            
            // Continue animation loop
            rafId = requestAnimationFrame(updateParallax);
        } else {
            // Lock to max when scrolled past hero
            const maxOffset = heroHeight * 0.10;
            if (parallaxOffset < maxOffset) {
                parallaxOffset = maxOffset;
                parallaxElement.style.transform = `translate3d(0, ${parallaxOffset}px, 0)`;
            }
            isRunning = false;
            rafId = null;
        }
    };
    
    const handleScroll = () => {
        // Trigger animation frame if not already running
        if (!isRunning) {
            isRunning = true;
            rafId = requestAnimationFrame(updateParallax);
        }
    };
    
    const handleResize = () => {
        // Recalculate on resize
        if (!isRunning) {
            handleScroll();
        }
    };
    
    // Start the smooth animation loop on page load
    if (window.scrollY < (heroSection.offsetHeight || window.innerHeight)) {
        isRunning = true;
        rafId = requestAnimationFrame(updateParallax);
    }
    
    // Event listeners with passive for better performance
    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('resize', handleResize, { passive: true });
    
    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        if (rafId !== null) {
            cancelAnimationFrame(rafId);
            rafId = null;
        }
        isRunning = false;
    });
})();

// Scroll-triggered animations - EXACT match to React Framer Motion
(function() {
    // Match Framer Motion's AnimatedSection: viewport={{ once: true, margin: "-100px" }}
    const observerOptions = {
        threshold: 0,
        rootMargin: '-100px 0px -100px 0px' // Match margin: "-100px"
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const delay = parseFloat(element.dataset.animationDelay || '0');
                
                // Match Framer Motion: initial={{ opacity: 0, y: 40 }}, animate={{ opacity: 1, y: 0 }}
                // transition={{ duration: 0.6, delay, ease: "easeOut" }}
                // Hero section uses y: 50, duration: 0.8
                const isHero = element.hasAttribute('data-hero-animation') || element.closest('#hero-section');
                const initialY = isHero ? '50px' : '40px';
                const duration = isHero ? '0.8s' : '0.6s';
                
                setTimeout(() => {
                    // Set initial state if not already set
                    if (element.style.opacity === '' || element.style.opacity === '1') {
                        element.style.opacity = '0';
                        element.style.transform = `translateY(${initialY})`;
                    }
                    element.style.transition = `opacity ${duration} ease-out, transform ${duration} ease-out`;
                    
                    // Trigger animation
                    requestAnimationFrame(() => {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    });
                }, delay * 1000);
                
                observer.unobserve(element);
            }
        });
    }, observerOptions);
    
    // Observe all elements with data-animate="fade-up" attribute
    document.querySelectorAll('[data-animate="fade-up"]').forEach(el => {
        // Set initial state (opacity: 0, y: 40)
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px)';
        observer.observe(el);
    });
    
    // Also support class-based animation for backward compatibility
    document.querySelectorAll('.animate-fade-up').forEach(el => {
        if (!el.hasAttribute('data-animate')) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(40px)';
            observer.observe(el);
        }
    });
})();

// Service Card Hover Effects - EXACT match to React ServiceCard
(function() {
    // Match Framer Motion: whileHover={{ y: -8, transition: { duration: 0.2 } }}
    const serviceCards = document.querySelectorAll('.service-card, .lender-card, [data-service-card]');
    
    serviceCards.forEach(card => {
        const image = card.querySelector('img');
        
        // Hover: y: -8 (translateY(-8px))
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)';
            card.style.transition = 'transform 0.2s ease-out';
            
            // Image: group-hover:scale-110 (scale(1.1))
            if (image) {
                image.style.transform = 'scale(1.1)';
                image.style.transition = 'transform 0.5s ease-out';
            }
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            
            if (image) {
                image.style.transform = 'scale(1)';
            }
        });
    });
})();

// Message character counter
(function() {
    const messageField = document.getElementById('contact-message') || document.getElementById('message');
    const counter = document.getElementById('message-count');
    
    if (messageField && counter) {
        const updateCounter = () => {
            counter.textContent = messageField.value.length;
        };
        
        messageField.addEventListener('input', updateCounter);
        updateCounter(); // Initial count (handles pre-filled values from server)
    }
})();

// Form validation feedback
(function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

// Toast notifications (simple implementation)
window.showToast = function(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-md shadow-lg transition-all ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-x-full');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
};

// Show success/error messages from PHP
(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    const error = urlParams.get('error');
    
    if (success) {
        showToast(decodeURIComponent(success), 'success');
    }
    if (error) {
        showToast(decodeURIComponent(error), 'error');
    }
})();

// Keyboard accessibility for Services dropdown
(function() {
    const servicesButton = document.getElementById('services-menu-button');
    const servicesMenu = servicesButton?.nextElementSibling;
    
    if (servicesButton && servicesMenu) {
        let isOpen = false;
        
        const openMenu = () => {
            servicesMenu.classList.remove('opacity-0', 'invisible');
            servicesMenu.classList.add('opacity-100', 'visible');
            servicesButton.setAttribute('aria-expanded', 'true');
            isOpen = true;
            
            // Focus first menu item
            const firstItem = servicesMenu.querySelector('a[role="menuitem"]');
            if (firstItem) {
                firstItem.focus();
            }
        };
        
        const closeMenu = () => {
            servicesMenu.classList.add('opacity-0', 'invisible');
            servicesMenu.classList.remove('opacity-100', 'visible');
            servicesButton.setAttribute('aria-expanded', 'false');
            isOpen = false;
        };
        
        // Keyboard support
        servicesButton.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                if (isOpen) {
                    closeMenu();
                } else {
                    openMenu();
                }
            }
            if (e.key === 'Escape' && isOpen) {
                e.preventDefault();
                closeMenu();
                servicesButton.focus();
            }
            if (e.key === 'ArrowDown' && !isOpen) {
                e.preventDefault();
                openMenu();
            }
        });
        
        // Close on outside click
        document.addEventListener('click', function(e) {
            if (isOpen && !servicesButton.contains(e.target) && !servicesMenu.contains(e.target)) {
                closeMenu();
            }
        });
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isOpen) {
                closeMenu();
                servicesButton.focus();
            }
        });
        
        // Arrow key navigation within menu
        const menuItems = servicesMenu.querySelectorAll('a[role="menuitem"]');
        menuItems.forEach((item, index) => {
            item.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const next = menuItems[index + 1] || menuItems[0];
                    next.focus();
                }
                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prev = menuItems[index - 1] || menuItems[menuItems.length - 1];
                    prev.focus();
                }
                if (e.key === 'Escape') {
                    e.preventDefault();
                    closeMenu();
                    servicesButton.focus();
                }
            });
        });
    }
})();

