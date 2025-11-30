@extends('layouts.app')

@section('content')
<?php
// Get featured car for hero section (using tag_label as featured indicator)
$featuredCar = \App\Models\Car::where('status', 'active')
              ->where('tag_label', 'FEATURED')
              ->first();

// Get latest cars for the featured section
$latestCars = \App\Models\Car::where('status', 'active')
            ->latest()
            ->limit(3)
            ->get();
?>
<!-- Hero Section - Esthetic & Professional -->
<section class="relative min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 pt-24 pb-32 overflow-hidden">
    <!-- Elegant Background Pattern -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.blue.900/0.3),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.4),transparent_50%)]"></div>
    </div>
    
    <!-- Subtle Grid Overlay -->
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-grid-16"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center min-h-[80vh]">
            <div class="space-y-8">
                <!-- Premium Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500/10 to-orange-500/10 border border-amber-500/20 rounded-full text-sm font-medium text-amber-400 backdrop-blur-sm">
                    <i class="fas fa-award mr-2"></i>
                    Award-Winning Excellence 2024
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-white leading-tight tracking-tight">
                    <span class="block font-medium">{{ \App\Models\PageContent::getContent('home_hero_main-title', 'The Art of Automotive Perfection') }}</span>
                </h1>

                <p class="text-xl text-gray-300 max-w-2xl leading-relaxed font-light">
                    {{ \App\Models\PageContent::getContent('home_hero_description', 'Where precision engineering meets sophisticated design. Experience the pinnacle of automotive excellence with our exclusive collection.') }}
                </p>
                
                <!-- Elegant Stats -->
                <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-800">
                    <div>
                        <div class="text-3xl font-light text-white counter" data-target="{{ $latestCars->count() }}">{{ $latestCars->count() }}</div>
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
                
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="/models" class="group relative px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-lg font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/20 flex items-center justify-center">
                        <span class="relative z-10">Discover Collection</span>
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="/contact" class="px-8 py-4 bg-white/5 backdrop-blur-sm border border-white/10 text-white rounded-lg font-medium hover:bg-white/10 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-phone mr-3"></i>
                        Private Consultation
                    </a>
                </div>
            </div>
            
            <div class="flex justify-center lg:justify-end">
    <div class="relative w-full max-w-lg">
        <!-- Premium Car Display -->
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 to-orange-500/20 rounded-3xl blur-3xl"></div>
            <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-96 flex items-center justify-center shadow-2xl border border-gray-700/50 overflow-hidden">
                <!-- Elegant Pattern Overlay -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(0,0,0,0.4)_100%)]"></div>
                
                <!-- ✅ Dynamic Featured Car from Database -->
                @if($featuredCar)
                <div class="relative w-full h-full">
                    <img
                        src="{{ asset($featuredCar->image ?? 'images/placeholder-car.jpg') }}"
                        alt="{{ $featuredCar->name }}"
                        class="w-full h-full object-cover object-center opacity-90 hover:opacity-100 transition duration-500"
                        loading="lazy">
                </div>

                <!-- Dynamic Featured Car Info -->
                <div class="absolute bottom-6 left-0 right-0 text-center z-10">
                    <h3 class="text-3xl font-light text-white mb-2">{{ $featuredCar->name }}</h3>
                    <p class="text-amber-400/80 font-light">{{ $featuredCar->tag_label ?? 'Premium Series' }}</p>
                    <div class="mt-2">
                        <span class="inline-block px-3 py-1 bg-amber-500/20 border border-amber-500/30 text-amber-400 text-xs font-light rounded-full">
                            From Rp {{ number_format($featuredCar->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                @else
                <!-- Fallback Static Content -->
                <div class="relative w-full h-full">
                    <img
                        src="{{ asset('https://i.pinimg.com/736x/12/4c/94/124c94ba7f6a72ed560880f130a15e7c.jpg') }}"
                        alt="Mobiku Grand"
                        class="w-full h-full object-cover object-center opacity-90 hover:opacity-100 transition duration-500"
                        loading="lazy">
                </div>

                <div class="absolute bottom-6 left-0 right-0 text-center z-10">
                    <h3 class="text-3xl font-light text-white mb-2">Mobiku Grand</h3>
                    <p class="text-amber-400/80 font-light">Masterpiece Series</p>
                </div>
                @endif
            </div>
            
            <!-- Floating Elements -->
            <div class="absolute -top-4 -right-4 bg-gradient-to-r from-amber-500 to-orange-600 px-4 py-2 rounded-full shadow-xl">
                <span class="text-white text-xs font-bold">LIMITED EDITION</span>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</section>

<!-- Features Section - Premium Design -->
<section class="py-24 bg-gradient-to-b from-gray-900 to-slate-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('home_features_section-title', 'The Mobiku Promise') }}
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('home_features_description', 'Uncompromising quality, exceptional service, and timeless elegance in every detail.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $features = [
                    [
                        'icon' => 'fa-gem', 
                        'title' => 'Craftsmanship', 
                        'desc' => 'Meticulously handcrafted with the finest materials and attention to detail.',
                        'highlight' => 'Bespoke Options'
                    ],
                    [
                        'icon' => 'fa-shield-halved', 
                        'title' => 'Lifetime Support', 
                        'desc' => 'Comprehensive warranty and dedicated concierge service for life.',
                        'highlight' => 'Premium Care'
                    ],
                    [
                        'icon' => 'fa-bolt', 
                        'title' => 'Innovation', 
                        'desc' => 'Cutting-edge technology seamlessly integrated with classic design.',
                        'highlight' => 'Future-Ready'
                    ],
                    [
                        'icon' => 'fa-crown', 
                        'title' => 'Exclusivity', 
                        'desc' => 'Limited production runs ensuring uniqueness and value retention.',
                        'highlight' => 'Collector\'s Choice'
                    ],
                ];
            @endphp
            @foreach($features as $feature)
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8 hover:border-amber-500/30 transition-all duration-500">
                    <!-- Icon with Premium Effect -->
                    <div class="w-16 h-16 mx-auto mb-6 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl w-full h-full flex items-center justify-center border border-gray-700">
                            <i class="fas {{ $feature['icon'] }} text-amber-400 text-2xl"></i>
                        </div>
                    </div>
                    
                    <!-- Highlight Badge -->
                    <div class="text-center mb-4">
                        <span class="inline-block px-3 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-light rounded-full">
                            {{ $feature['highlight'] }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-medium text-white mb-3 text-center">{{ $feature['title'] }}</h3>
                    <p class="text-gray-400 leading-relaxed text-center text-sm font-light">{{ $feature['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Models - Esthetic Cards -->
<section class="py-24 bg-gradient-to-b from-slate-900 to-gray-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('home_collection_section-title', 'Exclusive Collection') }}
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('home_collection_description', 'Each model a masterpiece, meticulously designed for the discerning enthusiast.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
    @foreach($latestCars as $model)
    <div class="group relative animate-on-scroll">
        <!-- Premium Card -->
        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <!-- Badge -->
            <div class="absolute top-6 right-6 z-20">
                <span class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-xs font-bold rounded-full shadow-lg">
                    {{ $model->tag_label ?? 'FEATURED' }}
                </span>
            </div>

            <!-- ✅ Dynamic Image from Database -->
            <div class="relative h-80 overflow-hidden">
                <img
                    src="{{ asset($model->image ?? 'images/placeholder-car.jpg') }}"
                    alt="{{ $model->name }}"
                    class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
                    loading="lazy">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 to-transparent h-32"></div>
            </div>

            <!-- Content -->
            <div class="relative p-8 z-10">
                <div class="mb-6">
                    <h3 class="text-3xl font-light text-white mb-2">
                        {{ $model->name }}
                    </h3>
                    <p class="text-amber-400/80 text-sm font-light mb-4">
                        {{ $model->description ?? 'Premium automotive excellence' }}
                    </p>
                    <div class="flex items-center text-sm text-gray-400 font-light">
                        <i class="fas fa-cog mr-2 text-amber-400/60"></i>
                        {{ $model->category ?? 'Luxury' }}
                        <span class="mx-3 text-amber-400/40">•</span>
                        <i class="fas fa-star mr-2 text-amber-400/60"></i>
                        {{ number_format($model->rating ?? 0, 1) }}/5
                    </div>
                </div>

                <!-- Elegant Divider -->
                <div class="h-px bg-gradient-to-r from-transparent via-amber-400/20 to-transparent mb-6"></div>

                <!-- Price & CTA -->
                <div class="flex items-end justify-between mb-6">
                    <div>
                        <p class="text-sm text-gray-400 font-light mb-1">From</p>
                        <p class="text-3xl font-light text-white">
                            Rp {{ number_format($model->price ?? 0, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- Premium Icons -->
                    <div class="flex space-x-3">
                        <div class="w-10 h-10 bg-amber-500/10 border border-amber-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-amber-400 text-xs"></i>
                        </div>
                        <div class="w-10 h-10 bg-amber-500/10 border border-amber-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-shield-alt text-amber-400 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Premium CTA -->
                <a href="{{ route('model.detail', $model->slug ?? 'placeholder') }}"
                   class="w-full group/btn relative bg-gradient-to-r from-amber-500 to-orange-600 text-white py-4 rounded-xl font-medium transition-all duration-300 flex items-center justify-center overflow-hidden">
                    <span class="relative z-10 flex items-center">
                        Request Private Viewing
                        <i class="fas fa-arrow-right ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
        
        <!-- Hover Info -->
        <div class="mt-6 text-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <p class="text-sm text-gray-400 font-light">
                <i class="fas fa-lock mr-2 text-amber-400/60"></i>
                Exclusive limited availability
            </p>
        </div>
    </div>
    @endforeach
</div>

        
        <!-- Elegant CTA -->
        <div class="text-center mt-20">
            <a href="/models" class="inline-flex items-center px-12 py-4 border border-gray-700 text-white rounded-full font-light hover:border-amber-500 hover:text-amber-400 transition-all duration-300">
                <span>View Complete Portfolio</span>
                <i class="fas fa-arrow-right ml-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section - Premium -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-amber-900 via-orange-900 to-amber-900"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,0,0,0.3),rgba(0,0,0,0.6)_100%)]"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="mb-8">
            <i class="fas fa-crown text-5xl text-amber-400/60"></i>
        </div>
        
        <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
            {{ \App\Models\PageContent::getContent('home_cta_section-title', 'Begin Your Journey') }}
        </h2>
        <p class="text-xl text-amber-100/80 mb-12 max-w-2xl mx-auto font-light">
            {{ \App\Models\PageContent::getContent('home_cta_description', 'Experience the extraordinary. Schedule your exclusive consultation and discover automotive perfection.') }}
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="/contact" class="group px-8 py-4 bg-white text-gray-900 rounded-lg font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-white/20 flex items-center justify-center">
                <i class="fas fa-phone mr-3"></i>
                Exclusive Consultation
            </a>
            <a href="/models" class="group px-8 py-4 bg-transparent border-2 border-white/30 hover:border-white text-white rounded-lg font-medium transition-all duration-300 flex items-center justify-center">
                <i class="fas fa-book-open mr-3"></i>
                Request Brochure
            </a>
        </div>
        
        <!-- Trust Indicators -->
        <div class="flex justify-center items-center space-x-12 mt-16 pt-8 border-t border-white/20">
            <div class="flex items-center space-x-2 text-amber-100/60">
                <i class="fas fa-award text-amber-400"></i>
                <span class="text-sm font-light">Award Winning</span>
            </div>
            <div class="flex items-center space-x-2 text-amber-100/60">
                <i class="fas fa-globe text-amber-400"></i>
                <span class="text-sm font-light">Global Presence</span>
            </div>
            <div class="flex items-center space-x-2 text-amber-100/60">
                <i class="fas fa-certificate text-amber-400"></i>
                <span class="text-sm font-light">Certified Excellence</span>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials - Elegant -->
<section class="py-24 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('home_testimonials_section-title', 'Distinctive Voices') }}
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('home_testimonials_description', 'Insights from those who have experienced the Mobiku difference.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($reviews as $review)
            <div class="group">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-8 rounded-2xl border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 relative overflow-hidden">
                    <!-- Quote Mark -->
                    <div class="text-amber-400/20 mb-6">
                        <i class="fas fa-quote-left text-3xl"></i>
                    </div>

                    <div class="flex items-start mb-6">
                        <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-full w-12 h-12 mr-4 flex items-center justify-center text-white font-bold shadow-lg">
                            @if($review->user)
                                {{ substr($review->user->name, 0, 1) }}
                            @else
                                {{ substr($review->customer_name, 0, 1) }}
                            @endif
                        </div>
                        <div>
                            <h4 class="font-medium text-white text-lg">
                                @if($review->user)
                                    {{ $review->user->name }}
                                @else
                                    {{ $review->customer_name }}
                                @endif
                            </h4>
                            <p class="text-sm text-gray-400 font-light">
                                @if($review->car)
                                    {{ $review->car->name }} Owner
                                @else
                                    Valued Customer
                                @endif
                            </p>
                            <div class="flex text-amber-400 mt-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-sm {{ $i <= $review->rating ? '' : 'text-gray-600' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-300 font-light leading-relaxed">
                        "{{ $review->comment }}"
                    </p>

                    <!-- Review Badge -->
                    <div class="absolute bottom-4 right-4">
                        <div class="flex items-center text-amber-400/60 text-xs">
                            <i class="fas fa-star mr-1"></i>
                            <span>Customer Review</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400">
                    <i class="fas fa-star text-4xl mb-4"></i>
                    <p>Customer reviews will appear here once available.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Overall Rating -->
        <div class="mt-20 text-center p-10 bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl border border-gray-700/50">
            <div class="flex items-center justify-center space-x-4 mb-4">
                <span class="text-5xl font-light text-white">
                    @if($reviews->count() > 0)
                        {{ number_format($reviews->avg('rating'), 1) }}
                    @else
                        0.0
                    @endif
                </span>
                <div class="flex text-amber-400 text-2xl">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $reviews->count() > 0 && $i <= round($reviews->avg('rating')) ? '' : 'text-gray-600' }}"></i>
                    @endfor
                </div>
            </div>
            <p class="text-gray-400 font-light">
                @if($reviews->count() > 0)
                    Based on {{ $reviews->count() }} verified customer review{{ $reviews->count() > 1 ? 's' : '' }}
                @else
                    No reviews yet
                @endif
            </p>
        </div>
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

    /* Counter Animation */
    .counter {
        transition: all 0.5s ease-out;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>
@endsection