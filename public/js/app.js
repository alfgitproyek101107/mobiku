// public/js/app.js - Additional JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        el.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-500');
        observer.observe(el);
    });
    
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Dark mode toggle
    const darkModeToggle = document.querySelector('[onclick*="toggleDarkMode"]');
    if (darkModeToggle) {
        // The toggleDarkMode function is already defined in the layout
    }
    
    // Check for saved theme preference
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else if (localStorage.getItem('theme') === 'light') {
        document.documentElement.classList.remove('dark');
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    }
});