@extends('layouts.app')

@section('content')
<!-- Hero Section - Premium About -->
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
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500/10 to-orange-500/10 border border-amber-500/20 rounded-full text-sm font-medium text-amber-400 backdrop-blur-sm mb-8">
                <i class="fas fa-award mr-2"></i>
                Excellence Since 2010
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-white leading-tight tracking-tight mb-8">
                <span class="block font-medium">{{ \App\Models\PageContent::getContent('about_hero_main-title', 'Our') }}</span>
                <span class="block bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400 bg-clip-text text-transparent">
                    {{ \App\Models\PageContent::getContent('about_hero_highlight-title', 'Legacy') }}
                </span>
                <span class="block font-medium">{{ \App\Models\PageContent::getContent('about_hero_sub-title', 'of Excellence') }}</span>
            </h1>

            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed font-light mb-12">
                {{ \App\Models\PageContent::getContent('about_hero_description', 'A journey of innovation, craftsmanship, and unwavering commitment to automotive perfection.') }}
            </p>
            
            <!-- Elegant Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto">
                <div>
                    <div class="text-3xl font-light text-white">15+</div>
                    <div class="text-sm text-gray-400 font-light">Years Heritage</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-white">100K+</div>
                    <div class="text-sm text-gray-400 font-light">Distinguished Clients</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-amber-400">50+</div>
                    <div class="text-sm text-gray-400 font-light">Premium Models</div>
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

<!-- Company Story - Premium Design -->
<section class="py-24 bg-gradient-to-b from-slate-900 to-gray-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
    <!-- Premium Image Display -->
    <div class="relative">
        <!-- Background Glow -->
        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 to-orange-500/20 rounded-3xl blur-3xl"></div>
        
        <!-- Image Container -->
        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-96 flex items-center justify-center shadow-2xl border border-gray-700/50 overflow-hidden">
            <!-- Elegant Pattern Overlay -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(0,0,0,0.4)_100%)]"></div>

            <!-- ✅ Ganti icon jadi gambar gedung -->
            <div class="relative w-full h-full">
                <img 
                    src="{{ asset('https://i.pinimg.com/1200x/7b/40/fe/7b40fe917e0aa971737ef774eea0a8c8.jpg') }}" 
                    alt="Mobiku Headquarters" 
                    class="w-full h-full object-cover object-center opacity-90 hover:opacity-100 transition duration-500"
                    loading="lazy">
            </div>

            <!-- Text Overlay -->
            <div class="absolute bottom-6 left-0 right-0 text-center z-10">
                <h3 class="text-2xl font-light text-white mb-2">Mobiku Headquarters</h3>
                <p class="text-amber-400/80 font-light">Jakarta, Indonesia</p>
            </div>
        </div>
        
        <!-- Floating Badge -->
        <div class="absolute -top-4 -right-4 bg-gradient-to-r from-amber-500 to-orange-600 px-4 py-2 rounded-full shadow-xl">
            <span class="text-white text-xs font-bold">EST. 2010</span>
        </div>
    </div>
</div>

            
            <div class="space-y-6">
                <div>
                    <h2 class="text-4xl font-light text-white mb-6">
                        {{ \App\Models\PageContent::getContent('about_heritage_title', 'Our') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('about_heritage_highlight', 'Heritage') }}</span>
                    </h2>
                    <div class="w-32 h-px bg-gradient-to-r from-amber-400 to-transparent mb-8"></div>
                </div>

                <p class="text-gray-300 leading-relaxed font-light text-lg">
                    {{ \App\Models\PageContent::getContent('about_heritage_paragraph-1', 'Founded in 2010, Mobiku emerged from a passion for innovation and a commitment to delivering exceptional vehicles equipped with cutting-edge technology to the Indonesian market.') }}
                </p>

                <p class="text-gray-300 leading-relaxed font-light text-lg">
                    {{ \App\Models\PageContent::getContent('about_heritage_paragraph-2', 'With over 15 years of experience in the automotive industry, we have served more than 100,000 customers across Indonesia with various models that suit their needs and lifestyle preferences.') }}
                </p>

                <p class="text-gray-300 leading-relaxed font-light text-lg">
                    {{ \App\Models\PageContent::getContent('about_heritage_paragraph-3', 'We continue to innovate to create vehicles that are not only comfortable and safe, but also environmentally friendly and efficient in fuel consumption.') }}
                </p>
                
                <!-- Achievement Badges -->
                <div class="flex flex-wrap gap-4 pt-6">
                    <div class="flex items-center px-4 py-2 bg-amber-500/10 border border-amber-500/20 rounded-full">
                        <i class="fas fa-award text-amber-400 mr-2"></i>
                        <span class="text-amber-400 text-sm font-light">Industry Leader</span>
                    </div>
                    <div class="flex items-center px-4 py-2 bg-amber-500/10 border border-amber-500/20 rounded-full">
                        <i class="fas fa-globe text-amber-400 mr-2"></i>
                        <span class="text-amber-400 text-sm font-light">Global Standards</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission - Premium Cards -->
<section class="py-24 bg-gradient-to-b from-gray-900 to-slate-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('about_purpose_title', 'Our') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('about_purpose_highlight', 'Purpose') }}</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('about_purpose_description', 'The principles and goals that guide our journey forward.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Vision Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-12 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <!-- Icon with Premium Effect -->
                    <div class="w-20 h-20 mx-auto mb-8 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-full flex items-center justify-center border border-gray-700">
                            <i class="fas fa-eye text-amber-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-3xl font-light text-white mb-6 text-center">{{ \App\Models\PageContent::getContent('about_vision_title', 'Our Vision') }}</h3>
                    <p class="text-gray-300 leading-relaxed text-center font-light text-lg">
                        {{ \App\Models\PageContent::getContent('about_vision_content', 'To become the leading automotive company in Indonesia, providing the best mobility solutions through technological innovation and superior design.') }}
                    </p>
                </div>
            </div>
            
            <!-- Mission Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-12 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <!-- Icon with Premium Effect -->
                    <div class="w-20 h-20 mx-auto mb-8 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-full flex items-center justify-center border border-gray-700">
                            <i class="fas fa-bullseye text-amber-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-3xl font-light text-white mb-6 text-center">{{ \App\Models\PageContent::getContent('about_mission_title', 'Our Mission') }}</h3>
                    <ul class="text-gray-300 space-y-4 font-light text-lg">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-400 mt-1 mr-3"></i>
                            <span>{{ \App\Models\PageContent::getContent('about_mission_point-1', 'Deliver high-quality vehicles with the latest technology') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-400 mt-1 mr-3"></i>
                            <span>{{ \App\Models\PageContent::getContent('about_mission_point-2', 'Provide exceptional and reliable after-sales service') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-400 mt-1 mr-3"></i>
                            <span>{{ \App\Models\PageContent::getContent('about_mission_point-3', 'Create safe and comfortable driving experiences') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-400 mt-1 mr-3"></i>
                            <span>{{ \App\Models\PageContent::getContent('about_mission_point-4', 'Support sustainability and a better environment') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section - Premium Design -->
<section class="py-24 bg-gradient-to-b from-slate-900 to-gray-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('about_values_title', 'Core') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('about_values_highlight', 'Values') }}</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('about_values_description', 'The principles we uphold in every aspect of our business.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $values = [
                    [
                        'icon' => 'fa-handshake',
                        'title' => \App\Models\PageContent::getContent('about_values_integrity_title', 'Integrity'),
                        'desc' => \App\Models\PageContent::getContent('about_values_integrity_desc', 'We uphold honesty and trust in every relationship.')
                    ],
                    [
                        'icon' => 'fa-lightbulb',
                        'title' => \App\Models\PageContent::getContent('about_values_innovation_title', 'Innovation'),
                        'desc' => \App\Models\PageContent::getContent('about_values_innovation_desc', 'We continuously innovate to create the best solutions for our customers.')
                    ],
                    [
                        'icon' => 'fa-users',
                        'title' => \App\Models\PageContent::getContent('about_values_satisfaction_title', 'Customer Satisfaction'),
                        'desc' => \App\Models\PageContent::getContent('about_values_satisfaction_desc', 'Customer satisfaction is our top priority in every product and service.')
                    ],
                ];
            @endphp
            @foreach($values as $value)
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 text-center">
                    <!-- Icon with Premium Effect -->
                    <div class="w-20 h-20 mx-auto mb-8 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl w-full h-full flex items-center justify-center border border-gray-700">
                            <i class="fas {{ $value['icon'] }} text-amber-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-light text-white mb-4">{{ $value['title'] }}</h3>
                    <p class="text-gray-300 leading-relaxed font-light">{{ $value['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Team Section - Premium Design -->
<section class="py-24 bg-gradient-to-b from-gray-900 to-slate-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('about_team_title', 'Leadership') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('about_team_highlight', 'Team') }}</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            <p class="text-lg text-gray-400 max-w-3xl mx-auto mt-6 font-light">
                {{ \App\Models\PageContent::getContent('about_team_description', 'Experienced professionals supporting our vision and mission.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $team = [
                    [
                        'name' => 'Budi Prasetyo',
                        'role' => 'CEO & Founder',
                        'initial' => 'BP'
                    ],
                    [
                        'name' => 'Siti Aminah',
                        'role' => 'CTO',
                        'initial' => 'SA'
                    ],
                    [
                        'name' => 'Ahmad Fauzan',
                        'role' => 'Head of Design',
                        'initial' => 'AF'
                    ],
                    [
                        'name' => 'Lina Kartika',
                        'role' => 'Head of Sales',
                        'initial' => 'LK'
                    ],
                ];
            @endphp
            @foreach($team as $member)
            <div class="group relative">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 text-center">
                    <!-- Avatar with Premium Effect -->
                    <div class="w-24 h-24 mx-auto mb-6 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative bg-gradient-to-br from-gray-700 to-gray-800 rounded-full w-full h-full flex items-center justify-center border border-gray-600">
                            <span class="text-amber-400 text-2xl font-bold">{{ $member['initial'] }}</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-medium text-white mb-2">{{ $member['name'] }}</h3>
                    <p class="text-amber-400/80 font-light text-sm">{{ $member['role'] }}</p>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center space-x-3 mt-6">
                        <a href="#" class="w-8 h-8 bg-gray-700/50 hover:bg-amber-500/20 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in text-gray-400 hover:text-amber-400 text-xs"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-700/50 hover:bg-amber-500/20 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-envelope text-gray-400 hover:text-amber-400 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- CTA Section -->
        <div class="text-center mt-20">
            <a href="/contact" class="inline-flex items-center px-12 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-full font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/20">
                <span>Connect With Our Team</span>
                <i class="fas fa-arrow-right ml-3"></i>
            </a>
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
</style>
@endsection