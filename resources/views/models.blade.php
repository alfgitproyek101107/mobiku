@extends('layouts.app')

@section('content')
<!-- Hero Section - Premium Models -->
<section class="relative min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 pt-24 pb-32 overflow-hidden">
    <!-- Elegant Background Pattern -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.2),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.3),transparent_50%)]"></div>
    </div>
    
    <!-- Subtle Grid Overlay -->
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-grid-16"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center pt-20 pb-32">
            <!-- Premium Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500/10 to-orange-500/10 border border-amber-500/20 rounded-full text-sm font-medium text-amber-400 backdrop-blur-sm mb-8 animate-fade-in">
                <i class="fas fa-award mr-2"></i>
                Premium Collection 2024
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-white leading-tight tracking-tight mb-8 animate-slide-up">
                <span class="block font-medium">{{ \App\Models\PageContent::getContent('models_hero_main-title', 'Our') }}</span>
                <span class="block bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400 bg-clip-text text-transparent">
                    {{ \App\Models\PageContent::getContent('models_hero_highlight-title', 'Collection') }}
                </span>
            </h1>

            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed font-light mb-12 animate-slide-up animation-delay-200">
                {{ \App\Models\PageContent::getContent('models_hero_description', 'Discover our exclusive range of premium vehicles, each meticulously crafted to deliver exceptional performance and sophisticated design.') }}
            </p>
            
            <!-- Elegant Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto animate-slide-up animation-delay-400">
                <div>
                    <div class="text-3xl font-light text-white counter" data-target="{{ $cars->total() }}">{{ $cars->total() }}</div>
                    <div class="text-sm text-gray-400 font-light">Premium Models</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-amber-400 counter" data-target="4.9">0</div>
                    <div class="text-sm text-gray-400 font-light">Average Rating</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-white">5Y</div>
                    <div class="text-sm text-gray-400 font-light">Warranty</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 scroll-indicator">
        <div class="animate-bounce">
            <i class="fas fa-chevron-down text-white/30 text-2xl"></i>
        </div>
    </div>
</section>

<!-- Filter Section - Premium Design -->
<section class="py-8 bg-gradient-to-b from-slate-900 to-gray-900 sticky top-0 z-40 backdrop-blur-lg border-b border-gray-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0">
            <!-- Category Filters -->
            <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                <a href="{{ route('models', request()->except('category')) }}"
                   class="filter-btn {{ !request('category') ? 'active' : '' }} px-6 py-3 rounded-full bg-gradient-to-r from-amber-500 to-orange-600 text-white font-light transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20">
                    All Models
                </a>
                @foreach($categories as $category)
                <a href="{{ route('models', array_merge(request()->all(), ['category' => $category->name])) }}"
                   class="filter-btn {{ request('category') === $category->name ? 'active' : '' }} px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light hover:border-amber-500/30 hover:text-amber-400 transition-all duration-300">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
            
            <!-- Sort Dropdown -->
            <div class="flex items-center space-x-4">
                <label class="text-gray-400 font-light">Sort by:</label>
                <form method="GET" action="{{ route('models') }}" class="flex items-center space-x-4">
                    @foreach(request()->all() as $key => $value)
                        @if($key !== 'sort')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <select name="sort" onchange="this.form.submit()" id="sort-select" class="px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light focus:border-amber-500/30 focus:outline-none transition-all duration-300">
                        <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Rating</option>
                        <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Models Grid - Premium Cards -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="models-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($cars as $m)
            <div class="model-card group relative animate-on-scroll" 
                 data-category="{{ $m->category }}"
                 data-price="{{ $m->price }}"
                 data-rating="{{ $m->rating }}">
                 
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Badge -->
                    <div class="absolute top-6 right-6 z-20">
                        <span class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-xs font-bold rounded-full shadow-lg">
                            {{ $m->tag_label ?? 'FEATURED' }}
                        </span>
                    </div>

                    <!-- Gambar -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset($m->image ?? 'images/placeholder-car.jpg') }}"
                                 alt="{{ $m->name }}"
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700"
                                 loading="lazy">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 to-transparent h-32"></div>
                    </div>

                    <!-- Konten -->
                    <div class="relative p-8 z-10">
                        <div class="mb-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <h3 class="text-2xl font-light text-white mb-2">{{ $m->name }}</h3>
                                    <p class="text-gray-400 text-sm font-light">{{ $m->category ?? 'Luxury' }}</p>
                                </div>
                                <!-- Rating Stars - Moved to top right -->
                                <div class="flex items-center space-x-1 bg-amber-500/10 px-3 py-1 rounded-full rating-badge">
                                    @php
                                        $rating = $m->rating ?? 0;
                                        $fullStars = floor($rating);
                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp
                                    @for($i = 0; $i < $fullStars; $i++)
                                        <i class="fas fa-star text-amber-400 text-sm"></i>
                                    @endfor
                                    @if($halfStar)
                                        <i class="fas fa-star-half-alt text-amber-400 text-sm"></i>
                                    @endif
                                    @for($i = 0; $i < $emptyStars; $i++)
                                        <i class="far fa-star text-amber-400/60 text-sm"></i>
                                    @endfor
                                    <span class="text-amber-400 text-sm font-medium ml-1">{{ number_format($rating, 1) }}</span>
                                </div>
                            </div>
                            <div class="flex items-center text-sm text-gray-400 font-light">
                                <i class="fas fa-cog mr-2 text-amber-400/60"></i>{{ $m->description ?? 'Premium automotive excellence' }}
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-amber-400/20 to-transparent mb-6"></div>

                        <div class="flex items-end justify-between mb-6">
                            <div>
                                <p class="text-sm text-gray-400 font-light mb-1">Starting from</p>
                                <p class="text-3xl font-light text-white">Rp {{ number_format($m->price ?? 0, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-6">
                            @php
                                $specifications = $m->specifications ?? '{}';
                                // Check if specifications is already an array or needs to be decoded
                                if (is_array($specifications)) {
                                    $specs = $specifications;
                                } else {
                                    $specs = json_decode($specifications, true) ?? [];
                                }
                                $fuelType = $specs['fuel_type'] ?? 'Electric';
                                $transmission = $specs['transmission'] ?? 'Automatic';
                                $seats = $specs['seats'] ?? '5 Seats';
                            @endphp
                            <span class="px-3 py-1 bg-gray-700/50 text-gray-300 text-xs rounded-full">{{ $fuelType }}</span>
                            <span class="px-3 py-1 bg-gray-700/50 text-gray-300 text-xs rounded-full">{{ $transmission }}</span>
                            <span class="px-3 py-1 bg-gray-700/50 text-gray-300 text-xs rounded-full">{{ $seats }}</span>
                        </div>

                        <div class="flex space-x-3">
                            <a href="{{ route('model.detail', $m->slug ?? 'placeholder') }}"
                               class="flex-1 bg-gradient-to-r from-amber-500 to-orange-600 text-white py-3 rounded-xl font-light transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20 text-center">
                                View Details
                            </a>
                            <button class="test-drive-btn w-12 h-12 bg-gray-700/50 hover:bg-blue-500/20 rounded-xl flex items-center justify-center transition-all duration-300"
                                    data-model="{{ $m->name }}"
                                    data-model-id="{{ $m->id }}"
                                    onclick="openTestDriveModal('{{ $m->name }}', '{{ $m->id }}')">
                                <i class="fas fa-calendar-check text-gray-400 hover:text-blue-400"></i>
                            </button>
                            <button class="favorite-btn w-12 h-12 bg-gray-700/50 hover:bg-amber-500/20 rounded-xl flex items-center justify-center transition-all duration-300"
                                    data-model="{{ $m->name }}">
                                <i class="far fa-heart text-gray-400 hover:text-amber-400"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Pagination -->
        @if($cars->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $cars->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Custom Styles -->
<style>
    .bg-grid-16 {
        background-size: 16px 16px;
        background-image: 
            linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    }
    
    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideUp {
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
        animation: fadeIn 1s ease-out;
    }
    
    .animate-slide-up {
        animation: slideUp 1s ease-out;
    }
    
    .animation-delay-200 {
        animation-delay: 200ms;
    }
    
    .animation-delay-400 {
        animation-delay: 400ms;
    }
    
    /* Scroll animations */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    
    .animate-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Filter animation */
    .model-card {
        transition: all 0.5s ease-out;
    }
    
    .model-card.hiding {
        opacity: 0;
        transform: scale(0.8);
        position: absolute;
        pointer-events: none;
    }
    
    .model-card.showing {
        opacity: 0;
        transform: scale(0.8);
        animation: showCard 0.5s ease-out forwards;
    }
    
    @keyframes showCard {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Heart animation */
    .favorite-btn.active i {
        color: #f59e0b;
        animation: heartBeat 0.5s ease-out;
    }
    
    @keyframes heartBeat {
        0% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1); }
        75% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }
    
    /* Loading spinner */
    .spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Test Drive Modal Styles */
    #test-drive-modal {
        animation: modalFadeIn 0.3s ease-out;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Rating badge hover effect */
    .rating-badge {
        transition: all 0.3s ease;
    }

    .model-card:hover .rating-badge {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.3);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    let currentFilter = 'all';
    let currentSort = 'newest';
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    let isLoading = false;
    
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    const animateCounters = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;
            
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(() => animateCounters(), 10);
            } else {
                counter.innerText = target;
            }
        });
    };
    
    // Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                
                // Start counter animation when stats section is visible
                if (entry.target.querySelector('.counter')) {
                    animateCounters();
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
    
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const modelCards = document.querySelectorAll('.model-card');
    const noResults = document.getElementById('no-results');
    const modelsContainer = document.getElementById('models-container');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active state
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-amber-500', 'to-orange-600', 'text-white');
                btn.classList.add('bg-gray-800/50', 'backdrop-blur-sm', 'border', 'border-gray-700/50', 'text-gray-300');
            });
            
            this.classList.add('bg-gradient-to-r', 'from-amber-500', 'to-orange-600', 'text-white');
            this.classList.remove('bg-gray-800/50', 'backdrop-blur-sm', 'border', 'border-gray-700/50', 'text-gray-300');
            
            // Apply filter
            currentFilter = this.getAttribute('data-filter');
            filterModels();
        });
    });
    
    // Sort functionality
    const sortSelect = document.getElementById('sort-select');
    sortSelect.addEventListener('change', function() {
        currentSort = this.value;
        sortModels();
    });
    
    // Filter models function
    function filterModels() {
        let visibleCount = 0;
        
        modelCards.forEach(card => {
            const category = card.getAttribute('data-category');
            
            if (currentFilter === 'all' || category === currentFilter) {
                card.classList.remove('hiding');
                card.classList.add('showing');
                visibleCount++;
                
                setTimeout(() => {
                    card.classList.remove('showing');
                }, 500);
            } else {
                card.classList.add('hiding');
                card.classList.remove('showing');
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
    
    // Sort models function
    function sortModels() {
        const cardsArray = Array.from(modelCards);
        
        cardsArray.sort((a, b) => {
            switch (currentSort) {
                case 'price-low':
                    return parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute('data-price'));
                case 'price-high':
                    return parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute('data-price'));
                case 'rating':
                    return parseFloat(b.getAttribute('data-rating')) - parseFloat(a.getAttribute('data-rating'));
                default: // newest
                    return 0; // Keep original order
            }
        });
        
        // Re-append sorted cards
        cardsArray.forEach(card => {
            modelsContainer.appendChild(card);
        });
    }
    
    // Favorite functionality
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    // Update favorite buttons on page load
    updateFavoriteButtons();
    
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modelName = this.getAttribute('data-model');
            
            if (this.classList.contains('active')) {
                // Remove from favorites
                this.classList.remove('active');
                this.querySelector('i').classList.remove('fas');
                this.querySelector('i').classList.add('far');
                
                // Update favorites array
                favorites = favorites.filter(fav => fav !== modelName);
            } else {
                // Add to favorites
                this.classList.add('active');
                this.querySelector('i').classList.remove('far');
                this.querySelector('i').classList.add('fas');
                
                // Update favorites array
                favorites.push(modelName);
                
                // Show notification
                showNotification(`${modelName} added to favorites`);
            }
            
            // Save to localStorage
            localStorage.setItem('favorites', JSON.stringify(favorites));
        });
    });
    
    // Update favorite buttons based on stored favorites
    function updateFavoriteButtons() {
        favoriteButtons.forEach(button => {
            const modelName = button.getAttribute('data-model');
            
            if (favorites.includes(modelName)) {
                button.classList.add('active');
                button.querySelector('i').classList.remove('far');
                button.querySelector('i').classList.add('fas');
            }
        });
    }
    
    // Load more functionality
    const loadMoreBtn = document.getElementById('load-more-btn');
    loadMoreBtn.addEventListener('click', function() {
        if (isLoading) return;
        
        isLoading = true;
        
        // Show loading state
        this.innerHTML = '<span class="flex items-center"><span class="spinner mr-2"></span>Loading...</span>';
        this.disabled = true;
        
        // Simulate loading more models
        setTimeout(() => {
            // In a real app, this would load more models from the server
            // For demo purposes, we'll just show a notification
            showNotification('No more models available at the moment');
            
            // Reset button state
            this.innerHTML = '<span class="flex items-center">Load More Models<i class="fas fa-arrow-down ml-3 group-hover:translate-y-1 transition-transform"></i></span>';
            this.disabled = false;
            isLoading = false;
        }, 1500);
    });
    
    // Reset filters functionality
    const resetFiltersBtn = document.getElementById('reset-filters');
    resetFiltersBtn.addEventListener('click', function() {
        // Reset to "All Models" filter
        document.querySelector('[data-filter="all"]').click();
        
        // Reset sort to "Newest"
        sortSelect.value = 'newest';
        currentSort = 'newest';
    });
    
    // Notification function
    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-amber-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center';
        notification.innerHTML = `
            <i class="fas fa-check-circle mr-2"></i>
            <span>${message}</span>
        `;
        
        // Add to DOM
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateY(0)';
            notification.style.opacity = '1';
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateY(20px)';
            notification.style.opacity = '0';
            
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Parallax effect on scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.bg-grid-16');

        parallaxElements.forEach(el => {
            const speed = 0.5;
            el.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // Test Drive Modal Functions
    function openTestDriveModal(carName, carId) {
        // Create modal HTML
        const modalHTML = `
            <div id="test-drive-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl max-w-md w-full border border-gray-700/50 shadow-2xl">
                    <div class="p-8">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-calendar-check text-3xl text-blue-400"></i>
                            </div>
                            <h3 class="text-2xl font-light text-white mb-2">Book Test Drive</h3>
                            <p class="text-gray-400 text-sm">Experience the ${carName} firsthand</p>
                        </div>

                        <!-- Form -->
                        <form id="test-drive-form" class="space-y-4">
                            <input type="hidden" name="car_id" value="${carId}">

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                                <input type="text" name="customer_name" required
                                       class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white placeholder-gray-500 focus:border-blue-500/50 focus:outline-none transition-all duration-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                                <input type="tel" name="customer_phone" required
                                       class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white placeholder-gray-500 focus:border-blue-500/50 focus:outline-none transition-all duration-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                <input type="email" name="customer_email" required
                                       class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white placeholder-gray-500 focus:border-blue-500/50 focus:outline-none transition-all duration-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Preferred Date</label>
                                <input type="date" name="booking_date" required min="${new Date(Date.now() + 86400000).toISOString().split('T')[0]}"
                                       class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white focus:border-blue-500/50 focus:outline-none transition-all duration-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Preferred Time</label>
                                <select name="booking_time" required
                                        class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white focus:border-blue-500/50 focus:outline-none transition-all duration-300">
                                    <option value="">Select time</option>
                                    <option value="09:00">09:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="14:00">02:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                    <option value="16:00">04:00 PM</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Additional Notes (Optional)</label>
                                <textarea name="notes" rows="3"
                                          class="w-full px-4 py-3 rounded-xl bg-gray-700/50 border border-gray-600/50 text-white placeholder-gray-500 focus:border-blue-500/50 focus:outline-none transition-all duration-300 resize-none"
                                          placeholder="Any special requests or questions..."></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="flex space-x-3 pt-4">
                                <button type="button" onclick="closeTestDriveModal()"
                                        class="flex-1 px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light transition-all duration-300 hover:bg-gray-600/50">
                                    Cancel
                                </button>
                                <button type="submit"
                                        class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-light transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/20">
                                    <span class="flex items-center justify-center">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Book Now
                                    </span>
                                </button>
                            </div>
                        </form>

                        <!-- Success Message -->
                        <div id="success-message" class="hidden mt-4 p-4 bg-green-500/10 border border-green-500/30 rounded-xl">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-400 text-xl mr-3"></i>
                                <div>
                                    <p class="text-green-400 font-medium">Booking Submitted!</p>
                                    <p class="text-green-400/80 text-sm">We'll contact you soon to confirm your test drive.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);

        // Add form submission handler
        document.getElementById('test-drive-form').addEventListener('submit', handleTestDriveSubmit);
    }

    function closeTestDriveModal() {
        const modal = document.getElementById('test-drive-modal');
        if (modal) {
            modal.remove();
        }
    }

    async function handleTestDriveSubmit(e) {
        e.preventDefault();

        const form = e.target;
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalHTML = submitBtn.innerHTML;

        // Show loading state
        submitBtn.innerHTML = '<span class="flex items-center justify-center"><span class="spinner mr-2"></span>Submitting...</span>';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(form);
            const response = await fetch('/book-test-drive', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const result = await response.json();

            if (result.success) {
                // Show success message
                document.getElementById('success-message').classList.remove('hidden');
                form.style.display = 'none';

                // Close modal after 3 seconds
                setTimeout(() => {
                    closeTestDriveModal();
                }, 3000);
            } else {
                throw new Error('Booking failed');
            }
        } catch (error) {
            console.error('Error:', error);
            showNotification('Failed to submit booking. Please try again.');
            submitBtn.innerHTML = originalHTML;
            submitBtn.disabled = false;
        }
    }
});
</script>
@endsection