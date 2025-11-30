{{-- resources/views/gallery.blade.php --}}
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-900 to-primary-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ \App\Models\PageContent::getContent('gallery_hero_title', 'Galeri Mobiku') }}</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                {{ \App\Models\PageContent::getContent('gallery_hero_description', 'Jelajahi koleksi foto dan video mobil Mobiku terbaru.') }}
            </p>
        </div>
    </div>
</section>

<!-- Gallery Filters -->
<section class="py-8 bg-white dark:bg-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active px-6 py-2 rounded-full bg-primary-600 text-white font-medium">
                Semua
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-600">
                Mobil
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-600">
                Interior
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-600">
                Eksterior
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-200 dark:hover:bg-gray-600">
                Video
            </button>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Gallery Item 1 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="mobil">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Gambar Depan Mobiku
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(0)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 2 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="interior">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Interior Mobil
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(1)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 3 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="eksterior">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Samping Mobil
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(2)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 4 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="video">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Video Test Drive
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openVideoModal(0)" class="text-white text-2xl">
                        <i class="fas fa-play-circle"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 5 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="mobil">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Belakang Mobil
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(4)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 6 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="interior">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Dashboard Interior
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(5)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 7 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="eksterior">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Roda Mobil
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openLightbox(6)" class="text-white text-2xl">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Gallery Item 8 -->
            <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md card-hover" data-category="video">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64 flex items-center justify-center text-gray-500">
                    Video Fitur
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <button onclick="openVideoModal(1)" class="text-white text-2xl">
                        <i class="fas fa-play-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors btn-hover">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
    <div class="relative max-w-4xl w-full p-4">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-2xl z-10">
            <i class="fas fa-times"></i>
        </button>
        <button onclick="prevImage()" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-10">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextImage()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-10">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center text-gray-500">
            Gambar Besar
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-center">
            <div class="text-sm mb-2">Gambar <span id="current-index">1</span> dari <span id="total-images">8</span></div>
            <div class="flex space-x-1">
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="video-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
    <div class="relative max-w-4xl w-full p-4">
        <button onclick="closeVideoModal()" class="absolute top-4 right-4 text-white text-2xl z-10">
            <i class="fas fa-times"></i>
        </button>
        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center text-gray-500">
            Video Player
        </div>
    </div>
</div>

<script>
    // Gallery filter functionality
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-primary-600', 'text-white');
                btn.classList.add('bg-gray-100', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
            });
            
            // Add active class to clicked button
            this.classList.add('bg-primary-600', 'text-white');
            this.classList.remove('bg-gray-100', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
        });
    });
    
    // Lightbox functionality
    let currentImageIndex = 0;
    const totalImages = 8;
    
    function openLightbox(index) {
        currentImageIndex = index;
        updateLightbox();
        document.getElementById('lightbox-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        document.getElementById('lightbox-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        updateLightbox();
    }
    
    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % totalImages;
        updateLightbox();
    }
    
    function updateLightbox() {
        document.getElementById('current-index').textContent = currentImageIndex + 1;
        document.getElementById('total-images').textContent = totalImages;
    }
    
    // Video modal functionality
    function openVideoModal(index) {
        document.getElementById('video-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeVideoModal() {
        document.getElementById('video-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Close modals when clicking outside
    document.getElementById('lightbox-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLightbox();
        }
    });
    
    document.getElementById('video-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!document.getElementById('lightbox-modal').classList.contains('hidden')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                prevImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            }
        }
    });
</script>
@endsection