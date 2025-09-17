/**
 * Batterra Main JavaScript
 */

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize mobile menu
    initMobileMenu();
    
    // Initialize smooth scrolling
    initSmoothScrolling();
    
    // Initialize form handling
    initForms();
    
    // Initialize animations
    initScrollAnimations();
});

/**
 * Mobile Menu Functionality
 */
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('.main-nav');
    
    if (!mobileToggle || !nav) return;
    
    mobileToggle.addEventListener('click', function() {
        const isOpen = nav.classList.contains('mobile-open');
        
        if (isOpen) {
            nav.classList.remove('mobile-open');
            mobileToggle.setAttribute('aria-label', 'Otevřít menu');
            document.body.classList.remove('menu-open');
        } else {
            nav.classList.add('mobile-open');
            mobileToggle.setAttribute('aria-label', 'Zavřít menu');
            document.body.classList.add('menu-open');
        }
    });
    
    // Close menu when clicking on nav links
    const navLinks = nav.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            nav.classList.remove('mobile-open');
            mobileToggle.setAttribute('aria-label', 'Otevřít menu');
            document.body.classList.remove('menu-open');
        });
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!nav.contains(e.target) && !mobileToggle.contains(e.target)) {
            nav.classList.remove('mobile-open');
            mobileToggle.setAttribute('aria-label', 'Otevřít menu');
            document.body.classList.remove('menu-open');
        }
    });
}

/**
 * Smooth Scrolling for Anchor Links
 */
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (!target) return;
            
            e.preventDefault();
            
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        });
    });
}

/**
 * Form Handling
 */
function initForms() {
    // Contact form
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
    
    // Newsletter form
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', handleNewsletterForm);
    }
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', validateInput);
            input.addEventListener('input', clearValidationError);
        });
    });
}

/**
 * Handle Contact Form Submission
 */
function handleContactForm(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Disable submit button
    submitBtn.disabled = true;
    submitBtn.textContent = 'Odesílám...';
    
    // Send form data
    fetch('/api/contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('Děkujeme! Vaše zpráva byla odeslána.', 'success');
            form.reset();
        } else {
            showMessage(data.message || 'Nastala chyba při odesílání formuláře.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showMessage('Nastala chyba při odesílání formuláře.', 'error');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Odeslat zprávu';
    });
}

/**
 * Handle Newsletter Form Submission
 */
function handleNewsletterForm(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Disable submit button
    submitBtn.disabled = true;
    submitBtn.textContent = 'Přihlašuji...';
    
    // Send form data
    fetch('/api/newsletter.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('Děkujeme! Byl jste přihlášen k odběru novinek.', 'success');
            form.reset();
        } else {
            showMessage(data.message || 'Nastala chyba při přihlašování k odběru.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showMessage('Nastala chyba při přihlašování k odběru.', 'error');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Přihlásit se';
    });
}

/**
 * Input Validation
 */
function validateInput() {
    const input = this;
    const value = input.value.trim();
    
    // Clear previous errors
    clearValidationError.call(input);
    
    // Required field validation
    if (input.required && !value) {
        showInputError(input, 'Toto pole je povinné');
        return false;
    }
    
    // Email validation
    if (input.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            showInputError(input, 'Zadejte platnou e-mailovou adresu');
            return false;
        }
    }
    
    // Phone validation
    if (input.type === 'tel' && value) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{9,}$/;
        if (!phoneRegex.test(value)) {
            showInputError(input, 'Zadejte platné telefonní číslo');
            return false;
        }
    }
    
    return true;
}

/**
 * Show Input Error
 */
function showInputError(input, message) {
    input.classList.add('error');
    
    // Remove existing error message
    const existingError = input.parentNode.querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }
    
    // Add error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    errorDiv.style.color = 'var(--color-error, #EF4444)';
    errorDiv.style.fontSize = 'var(--font-size-sm)';
    errorDiv.style.marginTop = 'var(--spacing-xs)';
    
    input.parentNode.appendChild(errorDiv);
}

/**
 * Clear Validation Error
 */
function clearValidationError() {
    const input = this;
    input.classList.remove('error');
    
    const errorMessage = input.parentNode.querySelector('.error-message');
    if (errorMessage) {
        errorMessage.remove();
    }
}

/**
 * Show Message
 */
function showMessage(message, type = 'info') {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.message');
    existingMessages.forEach(msg => msg.remove());
    
    // Create message element
    const messageDiv = document.createElement('div');
    messageDiv.className = `message message-${type}`;
    messageDiv.textContent = message;
    
    // Style message
    Object.assign(messageDiv.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        padding: 'var(--spacing-base) var(--spacing-lg)',
        borderRadius: 'var(--border-radius)',
        color: 'white',
        fontWeight: 'var(--font-weight-medium)',
        zIndex: '1000',
        animation: 'slideIn 0.3s ease-out',
        maxWidth: '400px',
        boxShadow: 'var(--shadow-lg)'
    });
    
    // Set background color based on type
    if (type === 'success') {
        messageDiv.style.backgroundColor = 'var(--color-primary)';
    } else if (type === 'error') {
        messageDiv.style.backgroundColor = '#EF4444';
    } else {
        messageDiv.style.backgroundColor = 'var(--color-secondary)';
    }
    
    document.body.appendChild(messageDiv);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.style.animation = 'slideOut 0.3s ease-in forwards';
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 300);
    }, 5000);
}

/**
 * Scroll Animations
 */
function initScrollAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('scroll-animate')) {
                    entry.target.classList.add('in-view');
                }
                
                if (entry.target.classList.contains('stagger-animation')) {
                    const children = entry.target.children;
                    Array.from(children).forEach((child, index) => {
                        setTimeout(() => {
                            child.style.opacity = '1';
                            child.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all scroll-animate elements
    document.querySelectorAll('.scroll-animate').forEach(el => {
        observer.observe(el);
    });
}

/**
 * Utility Functions
 */

// Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    /* Mobile menu styles */
    @media (max-width: 768px) {
        .main-nav {
            position: fixed;
            top: 0;
            left: -100%;
            width: 280px;
            height: 100vh;
            background-color: var(--color-white);
            box-shadow: var(--shadow-xl);
            transition: left 0.3s ease-in-out;
            z-index: 200;
        }
        
        .main-nav.mobile-open {
            left: 0;
        }
        
        .nav-list {
            flex-direction: column;
            padding: var(--spacing-4xl) var(--spacing-xl);
            height: 100%;
            align-items: flex-start;
        }
        
        .nav-item {
            width: 100%;
        }
        
        .nav-link {
            display: block;
            padding: var(--spacing-base) 0;
            border-bottom: 1px solid var(--color-gray-lighter);
            font-size: var(--font-size-lg);
        }
        
        body.menu-open::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 150;
        }
    }
    
    .form-input.error,
    .form-textarea.error {
        border-color: #EF4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }
`;
document.head.appendChild(style);