@extends('layouts.app')

@section('content')
<!-- Hero Section - Premium Detail -->
<section class="relative min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 pt-24 pb-32 overflow-hidden">
    <!-- Elegant Background Patterns -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.2),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.3),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-grid-16"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center pt-20">
            <!-- Left: Model Info -->
            <div class="space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500/10 to-orange-500/10 border border-amber-500/20 rounded-full text-sm font-medium text-amber-400 backdrop-blur-sm">
                    <i class="fas fa-award mr-2"></i>
                    Best Seller 2024
                </div>

                <h1 class="text-5xl md:text-6xl font-light text-white leading-tight">
                    <span class="block font-medium">{{ $car->name }}</span>
                    <span class="block bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400 bg-clip-text text-transparent">
                        {{ $car->tag_label ?? 'Premium Series' }}
                    </span>
                </h1>

                <p class="text-xl text-gray-300 max-w-xl leading-relaxed font-light">
                    {{ $car->description ?? 'Experience the pinnacle of automotive excellence with our premium collection.' }}
                </p>

                <!-- Key Specs -->
                <div class="flex flex-wrap gap-6">
                    @php
                        $specs = json_decode($car->specifications ?? '{}', true);
                    @endphp
                    @if(isset($specs['horsepower']))
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-tachometer-alt text-amber-400"></i>
                        <span class="text-gray-300">{{ $specs['horsepower'] }} HP</span>
                    </div>
                    @endif
                    @if(isset($specs['engine']))
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-gas-pump text-amber-400"></i>
                        <span class="text-gray-300">{{ $specs['engine'] }}</span>
                    </div>
                    @endif
                    @if(isset($specs['transmission']))
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-cogs text-amber-400"></i>
                        <span class="text-gray-300">{{ $specs['transmission'] }}</span>
                    </div>
                    @endif
                </div>

                <!-- Price -->
                <div class="flex items-center space-x-4">
                    <span class="text-4xl font-light text-white">Rp {{ number_format($car->price ?? 0, 0, ',', '.') }}</span>
                    <span class="px-3 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-light rounded-full">
                        On The Road
                    </span>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/contact" class="group relative px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20 text-center">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-phone mr-2"></i> Private Consultation
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                    </a>
                    <button id="test-drive-btn" class="px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-xl font-light hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-calendar-check mr-2"></i> Test Drive
                    </button>
                </div>
            </div>

            <!-- Right: Car Visual -->
            <div class="flex justify-center">
                <div class="relative w-full max-w-lg">
                    <div class="relative">
                        <!-- Floating Badge -->
                        <div class="absolute -top-4 -right-4 z-20">
                            <span class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-xs font-bold rounded-full shadow-lg">
                                LIMITED EDITION
                            </span>
                        </div>

                        <!-- Car Card -->
                        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-96 flex items-center justify-center shadow-2xl border border-gray-700/50 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-800"></div>
                            <div class="relative z-10 text-center">
                                <div class="mb-6">
                                    <img src="{{ asset($car->image ?? 'images/placeholder-car.jpg') }}"
                                         alt="{{ $car->name }}"
                                         class="w-full h-full object-cover object-center rounded-3xl">
                                    <!-- Reflection -->
                                    <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 w-48 h-2 bg-gradient-to-r from-amber-400/20 to-orange-400/20 rounded-full blur-xl"></div>
                                </div>
                                <h3 class="text-3xl font-light text-white mb-2">{{ $car->name }}</h3>
                                <p class="text-amber-400/80 font-light">{{ $car->tag_label ?? 'Premium Series' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <i class="fas fa-chevron-down text-white/30 text-2xl"></i>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-light text-white mb-6">
                Premium <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">Features</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400/20 to-transparent mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $features = [
                    ['icon' => 'fa-microchip', 'title' => 'AI-Powered Cockpit', 'desc' => 'Advanced AI assistant with voice control.', 'highlight' => 'Neural Interface'],
                    ['icon' => 'fa-sun', 'title' => 'Panoramic Sunroof', 'desc' => 'Smart-tint glass roof for optimal comfort.', 'highlight' => '360° View'],
                    ['icon' => 'fa-shield-alt', 'title' => 'Advanced Safety Suite', 'desc' => '8 airbags + autonomous emergency braking.', 'highlight' => '5-Star Rated'],
                    ['icon' => 'fa-wind', 'title' => 'Aerodynamic Design', 'desc' => 'Optimized airflow for efficiency.', 'highlight' => '0.27 Cd'],
                    ['icon' => 'fa-battery-full', 'title' => 'Eco Mode Plus', 'desc' => '20% more efficient energy management.', 'highlight' => '20% More Efficient'],
                    ['icon' => 'fa-couch', 'title' => 'Luxury Interior', 'desc' => 'Premium Nappa leather & ergonomic design.', 'highlight' => 'Nappa Leather'],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="group relative animate-on-scroll">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8 hover:border-amber-500/30 transition-all duration-500 h-full">
                        <!-- Icon -->
                        <div class="w-16 h-16 mx-auto mb-6 relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl blur-lg opacity-20"></div>
                            <div class="relative bg-gray-900 rounded-2xl w-full h-full flex items-center justify-center border border-gray-700">
                                <i class="fas {{ $feature['icon'] }} text-amber-400 text-2xl"></i>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <span class="inline-block px-3 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-light rounded-full">
                                {{ $feature['highlight'] }}
                            </span>
                        </div>

                        <h3 class="text-xl font-medium text-white mb-2 text-center">{{ $feature['title'] }}</h3>
                        <p class="text-gray-400 text-sm font-light text-center">{{ $feature['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Specs & Actions -->
<section class="py-20 bg-gradient-to-b from-slate-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Specs -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl border border-gray-700/50">
                    <h3 class="text-2xl font-medium text-white mb-8">Technical Specifications</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-medium mb-4 text-amber-400">Engine & Performance</h4>
                            <div class="space-y-4 text-gray-300">
                                @php
                                    $specs = json_decode($car->specifications ?? '{}', true);
                                @endphp
                                <div class="flex justify-between"><span>Engine Type</span> <span class="font-light">{{ $specs['engine'] ?? 'N/A' }}</span></div>
                                <div class="flex justify-between"><span>Max Power</span> <span class="font-light">{{ $specs['horsepower'] ?? 'N/A' }} HP</span></div>
                                <div class="flex justify-between"><span>Max Torque</span> <span class="font-light">{{ $specs['torque'] ?? 'N/A' }} Nm</span></div>
                                <div class="flex justify-between"><span>Transmission</span> <span class="font-light">{{ $specs['transmission'] ?? 'N/A' }}</span></div>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-medium mb-4 text-amber-400">Dimensions</h4>
                            <div class="space-y-4 text-gray-300">
                                @php
                                    $dimensions = $specs['dimensions'] ?? [];
                                @endphp
                                <div class="flex justify-between"><span>Length</span> <span class="font-light">{{ $dimensions['length'] ?? 'N/A' }}</span></div>
                                <div class="flex justify-between"><span>Width</span> <span class="font-light">{{ $dimensions['width'] ?? 'N/A' }}</span></div>
                                <div class="flex justify-between"><span>Height</span> <span class="font-light">{{ $dimensions['height'] ?? 'N/A' }}</span></div>
                                <div class="flex justify-between"><span>Wheelbase</span> <span class="font-light">{{ $dimensions['wheelbase'] ?? 'N/A' }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions & Warranty -->
            <div class="lg:col-span-1 space-y-6">
                <!-- CTA Card -->
                <div class="bg-gradient-to-br from-amber-900/20 to-orange-900/20 p-6 rounded-2xl border border-amber-500/20">
                    <div class="text-center mb-4">
                        <p class="text-sm text-gray-400">Starting From</p>
                        <p class="text-3xl font-light text-white">Rp {{ number_format($car->price ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <a href="/contact" class="text-center px-4 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg transition">Contact Sales</a>
                        <button class="favorite-btn w-full py-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-xl hover:bg-white/20 transition"
                                data-model="{{ $car->name }}">
                            <i class="far fa-heart text-gray-300"></i> Add to Favorites
                        </button>
                    </div>
                </div>

                <!-- Warranty -->
                <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-700/50">
                    <h4 class="text-lg font-medium text-white mb-4">Warranty & Service</h4>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li class="flex items-start"><i class="fas fa-check text-green-500 mr-2 mt-0.5"></i> 5 Years Engine Warranty</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-500 mr-2 mt-0.5"></i> 3 Years Paint Warranty</li>
                        <li class="flex items-start"><i class="fas fa-check text-green-500 mr-2 mt-0.5"></i> 24/7 Roadside Assistance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Styles & Scripts -->
<style>
.bg-grid-16 {
    background-size: 16px 16px;
    background-image: 
        linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
}
/* Scroll animations */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}
.animate-on-scroll.is-visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll observer for animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

    // Favorite button
    const favBtn = document.querySelector('.favorite-btn');
    const modelName = favBtn.dataset.model;
    const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    const icon = favBtn.querySelector('i');

    if (favorites.includes(modelName)) {
        icon.classList.replace('far', 'fas');
        icon.classList.add('text-amber-400');
    }

    favBtn.addEventListener('click', () => {
        if (favorites.includes(modelName)) {
            favorites.splice(favorites.indexOf(modelName), 1);
            icon.classList.replace('fas', 'far');
            icon.classList.remove('text-amber-400');
        } else {
            favorites.push(modelName);
            icon.classList.replace('far', 'fas');
            icon.classList.add('text-amber-400');
        }
        localStorage.setItem('favorites', JSON.stringify(favorites));
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            e.preventDefault();
            document.querySelector(anchor.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
        });
    });
});
</script>
@endsection