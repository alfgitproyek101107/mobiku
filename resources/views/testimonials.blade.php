{{-- resources/views/testimonials.blade.php --}}
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-900 to-primary-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ \App\Models\PageContent::getContent('testimonials_hero_title', 'Testimoni Pelanggan') }}</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                {{ \App\Models\PageContent::getContent('testimonials_hero_description', 'Pengalaman nyata dari pelanggan kami yang telah mempercayai Mobiku.') }}
            </p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold text-primary-600 dark:text-primary-400 mb-2">100K+</div>
                <div class="text-gray-600 dark:text-gray-300">Pelanggan Terpuaskan</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-primary-600 dark:text-primary-400 mb-2">4.8/5</div>
                <div class="text-gray-600 dark:text-gray-300">Rating Rata-rata</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-primary-600 dark:text-primary-400 mb-2">98%</div>
                <div class="text-gray-600 dark:text-gray-300">Rekomendasi</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-primary-600 dark:text-primary-400 mb-2">15+</div>
                <div class="text-gray-600 dark:text-gray-300">Tahun Pengalaman</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Budi Santoso</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Mobilnya sangat nyaman dan teknologi yang ditawarkan benar-benar canggih. Pelayanan sales-nya juga ramah dan informatif. Saya sangat puas dengan pembelian saya."
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku SUV Elite
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Siti Nurhaliza</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Desainnya elegan dan fitur keamanannya membuat saya merasa aman di jalan. Interior mobilnya juga sangat nyaman untuk perjalanan jauh. Worth it banget!"
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku Sedan Pro
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Ahmad Fauzi</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Efisiensi bahan bakarnya luar biasa. Layanan purna jualnya juga sangat membantu. Bengkel resmi mudah dijangkau dan sparepart tersedia."
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku Hatchback
                </div>
            </div>
            
            <!-- Testimonial 4 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Dewi Lestari</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Pilihan warna dan fitur sangat lengkap. Proses pembelian juga mudah dan cepat. Customer service-nya sangat membantu sepanjang proses."
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku MPV Family
                </div>
            </div>
            
            <!-- Testimonial 5 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Rizki Pratama</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Performa mobil sangat baik, akselerasinya cepat dan handlingnya sangat responsif. Ini mobil terbaik yang pernah saya miliki."
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku Sport
                </div>
            </div>
            
            <!-- Testimonial 6 -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md card-hover">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-12 h-12 mr-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Maya Sari</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic">
                    "Lingkungan dalam mobil sangat tenang dan nyaman. Sistem hiburan juga lengkap dan mudah digunakan. Sangat cocok untuk keluarga."
                </p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-car mr-2"></i>Mobiku Electric
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors btn-hover">
                Lihat Lebih Banyak Testimoni
            </button>
        </div>
    </div>
</section>

<!-- Video Testimonials Section -->
<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Video Testimoni</h2>
            <p class="text-gray-600 dark:text-gray-300">
                Dengarkan langsung pengalaman pelanggan kami dalam video singkat.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="relative group">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 flex items-center justify-center text-gray-500">
                    Video Testimoni 1
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button class="bg-red-600 text-white p-4 rounded-full">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
            
            <div class="relative group">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 flex items-center justify-center text-gray-500">
                    Video Testimoni 2
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button class="bg-red-600 text-white p-4 rounded-full">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-primary-900 to-primary-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-6">Bergabunglah dengan Ribuan Pelanggan Puas Kami</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Temukan mobil impian Anda dan rasakan pengalaman berkendara yang luar biasa bersama Mobiku.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="/models" class="bg-secondary-600 hover:bg-secondary-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors btn-hover">
                Lihat Model Kami
            </a>
            <a href="/contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 px-8 py-3 rounded-lg font-semibold transition-colors btn-hover">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection