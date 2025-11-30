{{-- resources/views/components/navbar.blade.php --}}
<nav class="fixed w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <span class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                    <i class="fas fa-car mr-2"></i>Mobiku
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/" class="text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium">Beranda</a>
                    <a href="/about" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium">Tentang Kami</a>
                    <a href="/models" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium">Model Mobil</a>
                    <a href="/faq" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium">FAQ</a>
                    <a href="/contact" class="text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium">Kontak</a>
                </div>
            </div>

            <!-- CTA Button & Dark Mode Toggle & Mobile menu button -->
            <div class="flex items-center space-x-4">
                <!-- Test Drive Button -->
                <a href="/contact#booking" class="hidden md:inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-sm font-medium rounded-lg hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                    <i class="fas fa-car-side mr-2"></i>
                    Test Drive
                </a>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="p-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-base font-medium text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400">Beranda</a>
                <a href="/about" class="block px-3 py-2 text-base font-medium text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Tentang Kami</a>
                <a href="/models" class="block px-3 py-2 text-base font-medium text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Model Mobil</a>
                <a href="/faq" class="block px-3 py-2 text-base font-medium text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">FAQ</a>
                <a href="/contact" class="block px-3 py-2 text-base font-medium text-gray-500 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Kontak</a>
                <!-- Mobile Test Drive Button -->
                <a href="/contact#booking" class="block px-3 py-2 text-base font-medium bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-lg text-center mt-3">
                    <i class="fas fa-car-side mr-2"></i>Test Drive
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>