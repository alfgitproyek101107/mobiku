{{-- resources/views/components/footer.blade.php --}}
<footer class="bg-gray-800 text-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-4">
                    <i class="fas fa-car mr-2"></i>Mobiku
                </h3>
                <p class="text-gray-300 mb-4">
                    Inovasi Dalam Setiap Perjalanan. Membawa teknologi dan kenyamanan terbaik dalam setiap mobil yang kami tawarkan.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Tautan</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-300 hover:text-white">Beranda</a></li>
                    <li><a href="/about" class="text-gray-300 hover:text-white">Tentang Kami</a></li>
                    <li><a href="/models" class="text-gray-300 hover:text-white">Model Mobil</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <ul class="space-y-2 text-gray-300">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Jakarta, Indonesia</li>
                    <li><i class="fas fa-phone mr-2"></i> +62 812 3456 7890</li>
                    <li><i class="fas fa-envelope mr-2"></i> info@mobiku.com</li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 Mobiku. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>