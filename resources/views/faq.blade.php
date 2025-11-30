@extends('layouts.app')

@section('content')
<!-- Hero Section - Premium FAQ -->
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
                <i class="fas fa-question-circle mr-2"></i>
                Knowledge Center
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-white leading-tight tracking-tight mb-8 animate-slide-up">
                <span class="block font-medium">{{ \App\Models\PageContent::getContent('faq_hero_main-title', 'Frequently') }}</span>
                <span class="block bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400 bg-clip-text text-transparent">
                    {{ \App\Models\PageContent::getContent('faq_hero_highlight-title', 'Asked Questions') }}
                </span>
            </h1>

            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed font-light mb-12 animate-slide-up animation-delay-200">
                {{ \App\Models\PageContent::getContent('faq_hero_description', 'Find answers to common questions about Mobiku vehicles, services, and ownership experience.') }}
            </p>
            
            <!-- Elegant Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto animate-slide-up animation-delay-400">
                <div>
                    <div class="text-3xl font-light text-white counter" data-target="50">0</div>
                    <div class="text-sm text-gray-400 font-light">FAQ Topics</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-amber-400">24/7</div>
                    <div class="text-sm text-gray-400 font-light">Support</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-white">98%</div>
                    <div class="text-sm text-gray-400 font-light">Satisfaction</div>
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

<!-- FAQ Search - Premium Design -->
<section class="py-12 bg-gradient-to-b from-slate-900 to-gray-900 sticky top-0 z-40 backdrop-blur-lg border-b border-gray-800/50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative animate-on-scroll">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-2xl blur-xl"></div>
            <div class="relative">
                <input 
                    id="faq-search"
                    type="text" 
                    placeholder="Search for answers..." 
                    class="w-full px-6 py-4 pl-14 rounded-2xl bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 placeholder-gray-500 focus:outline-none focus:border-amber-500/30 focus:ring-2 focus:ring-amber-500/20 transition-all duration-300"
                >
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-amber-400/60"></i>
                <div id="search-results-count" class="absolute right-5 top-1/2 transform -translate-y-1/2 text-sm text-gray-400 hidden">
                    <span id="results-count">0</span> results
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories - Premium Design -->
<section class="py-8 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4 animate-on-scroll">
            <button class="category-btn active px-6 py-3 rounded-full bg-gradient-to-r from-amber-500 to-orange-600 text-white font-light transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20" data-category="all">
                All Topics
            </button>
            <button class="category-btn px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light hover:border-amber-500/30 hover:text-amber-400 transition-all duration-300" data-category="purchase">
                <i class="fas fa-shopping-cart mr-2"></i>Purchase
            </button>
            <button class="category-btn px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light hover:border-amber-500/30 hover:text-amber-400 transition-all duration-300" data-category="service">
                <i class="fas fa-wrench mr-2"></i>Service
            </button>
            <button class="category-btn px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light hover:border-amber-500/30 hover:text-amber-400 transition-all duration-300" data-category="technology">
                <i class="fas fa-microchip mr-2"></i>Technology
            </button>
            <button class="category-btn px-6 py-3 rounded-full bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-gray-300 font-light hover:border-amber-500/30 hover:text-amber-400 transition-all duration-300" data-category="warranty">
                <i class="fas fa-shield-alt mr-2"></i>Warranty
            </button>
        </div>
    </div>
</section>

<!-- FAQ Accordion - Premium Design -->
<section class="py-16 bg-gradient-to-b from-slate-900 to-gray-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="faq-container" class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="faq-item group animate-on-scroll" data-category="purchase">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-car text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">What models are available at Mobiku?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                We offer a wide range of vehicle models including Sedans, SUVs, Hatchbacks, MPVs, and electric vehicles. 
                                Each model is equipped with the latest technology and comprehensive safety features. 
                                You can explore all our models on the Models page.
                            </p>
                            <div class="flex items-center text-amber-400/80 text-sm font-light">
                                <i class="fas fa-link mr-2"></i>
                                <a href="/models" class="hover:text-amber-400 transition-colors">Browse all models</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="faq-item group animate-on-scroll" data-category="purchase">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-shopping-cart text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">How does the car purchase process work at Mobiku?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                The car purchase process at Mobiku is very easy and transparent:
                            </p>
                            <ol class="list-decimal list-inside text-gray-300 space-y-2 font-light">
                                <li>Select the car model you're interested in</li>
                                <li>Consult with our sales team for more information</li>
                                <li>Choose a payment scheme (cash or credit)</li>
                                <li>Administrative process and document handling</li>
                                <li>Car pickup according to the agreed schedule</li>
                            </ol>
                            <div class="mt-6 p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl">
                                <p class="text-amber-400 text-sm font-light">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Our sales team will guide you through every step of the process.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="faq-item group animate-on-scroll" data-category="warranty">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-shield-alt text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">What warranty is offered for Mobiku cars?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                We offer comprehensive warranty for all Mobiku cars:
                            </p>
                            <ul class="list-disc list-inside text-gray-300 space-y-2 font-light">
                                <li>Engine warranty: 5 years or 100,000 km (whichever comes first)</li>
                                <li>Paint warranty: 3 years unlimited mileage</li>
                                <li>Electrical components warranty: 3 years or 60,000 km</li>
                                <li>24/7 emergency service during warranty period</li>
                            </ul>
                            <div class="mt-6 grid grid-cols-2 gap-4">
                                <div class="bg-gray-800/50 p-4 rounded-xl text-center">
                                    <i class="fas fa-tools text-amber-400 text-2xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">Free Service</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl text-center">
                                    <i class="fas fa-headset text-amber-400 text-2xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">24/7 Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="faq-item group animate-on-scroll" data-category="service">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-road text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">Is test drive service available?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                Yes, we provide free test drive service for all our car models. 
                                You can schedule a test drive through:
                            </p>
                            <ul class="list-disc list-inside text-gray-300 space-y-2 font-light">
                                <li>Our website - click the "Schedule Test Drive" button</li>
                                <li>Contact our customer service</li>
                                <li>Visit the nearest official dealer</li>
                            </ul>
                            <p class="text-gray-300 leading-relaxed font-light mt-4">
                                Test drives can be done during dealer operating hours (08:00 - 17:00).
                            </p>
                            <div class="mt-6">
                                <a href="/contact" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20">
                                    <i class="fas fa-calendar-check mr-2"></i>
                                    Schedule Test Drive
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="faq-item group animate-on-scroll" data-category="service">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-wrench text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">How much is the regular maintenance cost?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                Regular maintenance costs for Mobiku cars are very affordable and competitive:
                            </p>
                            <div class="bg-gray-800/50 p-4 rounded-xl mb-4">
                                <ul class="space-y-2">
                                    <li class="flex justify-between text-gray-300">
                                        <span class="font-light">First 10,000 km service:</span>
                                        <span class="text-amber-400 font-light">Free</span>
                                    </li>
                                    <li class="flex justify-between text-gray-300">
                                        <span class="font-light">20,000 km service:</span>
                                        <span class="text-amber-400 font-light">Rp 2,500,000</span>
                                    </li>
                                    <li class="flex justify-between text-gray-300">
                                        <span class="font-light">30,000 km service:</span>
                                        <span class="text-amber-400 font-light">Rp 3,200,000</span>
                                    </li>
                                    <li class="flex justify-between text-gray-300">
                                        <span class="font-light">40,000 km service:</span>
                                        <span class="text-amber-400 font-light">Rp 4,500,000</span>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-gray-300 leading-relaxed font-light">
                                We also offer annual maintenance packages that are more economical and practical.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 6 -->
            <div class="faq-item group animate-on-scroll" data-category="technology">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-shield-virus text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">What safety features are available?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light mb-4">
                                Every Mobiku car is equipped with comprehensive safety features:
                            </p>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-airbag text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">Dual & Side Airbags</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-car-crash text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">ABS with EBD</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-route text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">ESC</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-eye text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">Blind Spot Monitoring</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-road text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">Lane Assist</p>
                                </div>
                                <div class="bg-gray-800/50 p-4 rounded-xl">
                                    <i class="fas fa-exclamation-triangle text-amber-400 text-xl mb-2"></i>
                                    <p class="text-gray-300 text-sm font-light">Collision Warning</p>
                                </div>
                            </div>
                            <p class="text-gray-300 leading-relaxed font-light">
                                All models also come with 360-degree camera and parking sensors.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 7 -->
            <div class="faq-item group animate-on-scroll" data-category="purchase">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <button class="faq-question w-full px-8 py-6 text-left flex justify-between items-center focus:outline-none">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mr-4 group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fas fa-exchange-alt text-amber-400"></i>
                            </div>
                            <span class="text-xl font-light text-white pr-4">Is there a trade-in program for old cars?</span>
                        </div>
                        <i class="fas fa-chevron-down text-amber-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-6">
                            <p class="text-gray-300 leading-relaxed font-light">
                                Yes, we have a trade-in program that allows you to exchange your old car 
                                for a new Mobiku car. Our appraisal team will evaluate the condition of your car 
                                and offer the best price. This program applies to all car brands.
                            </p>
                            <div class="mt-6 p-4 bg-amber-500/10 border border-amber-500/20 rounded-xl">
                                <p class="text-amber-400 text-sm font-light">
                                    <i class="fas fa-gift mr-2"></i>
                                    Special bonus available for trade-in customers this month!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-16">
            <i class="fas fa-search text-6xl text-gray-600 mb-4"></i>
            <h3 class="text-2xl font-light text-white mb-2">No matching questions found</h3>
            <p class="text-gray-400 mb-6">Try different keywords or browse all categories</p>
            <button id="clear-search" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-full font-light transition-colors">
                Clear Search
            </button>
        </div>
    </div>
</section>

<!-- Contact CTA Section - Premium Design -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-slate-900 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-on-scroll">
            <div class="mb-8">
                <i class="fas fa-headset text-5xl text-amber-400/60"></i>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-light text-white mb-6">
                Still Have <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">Questions?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto font-light">
                Don't hesitate to contact our team. We're ready to help you 24/7.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="/contact" class="group px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/20 flex items-center justify-center">
                    <i class="fas fa-phone mr-3"></i>
                    Contact Us
                </a>
                <button id="live-chat-btn" class="group px-8 py-4 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 text-white rounded-xl font-medium hover:border-amber-500/30 transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-comments mr-3"></i>
                    Live Chat
                </button>
            </div>
            
            <!-- Contact Info -->
            <div class="flex justify-center items-center space-x-12 mt-16 pt-8 border-t border-gray-800">
                <div class="flex items-center space-x-2 text-gray-400">
                    <i class="fas fa-phone text-amber-400"></i>
                    <span class="text-sm font-light">+62 21 1234 5678</span>
                </div>
                <div class="flex items-center space-x-2 text-gray-400">
                    <i class="fas fa-envelope text-amber-400"></i>
                    <span class="text-sm font-light">info@mobiku.com</span>
                </div>
                <div class="flex items-center space-x-2 text-gray-400">
                    <i class="fas fa-clock text-amber-400"></i>
                    <span class="text-sm font-light">24/7 Support</span>
                </div>
            </div>
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
    
    /* FAQ item animations */
    .faq-item {
        transition: all 0.5s ease-out;
    }
    
    .faq-item.hiding {
        opacity: 0;
        transform: scale(0.95);
        height: 0;
        margin: 0;
        overflow: hidden;
    }
    
    .faq-item.showing {
        opacity: 0;
        transform: scale(0.95);
        animation: showItem 0.5s ease-out forwards;
    }
    
    @keyframes showItem {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Search highlight */
    .search-highlight {
        background-color: rgba(251, 191, 36, 0.2);
        padding: 0 2px;
        border-radius: 2px;
    }
    
    /* Live chat modal */
    .chat-modal {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        height: 500px;
        background: linear-gradient(to bottom right, #1e293b, #0f172a);
        border: 1px solid rgba(251, 191, 36, 0.2);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        transform: translateY(600px);
        transition: transform 0.3s ease-out;
    }
    
    .chat-modal.open {
        transform: translateY(0);
    }
    
    .chat-header {
        padding: 16px;
        background: linear-gradient(to right, #f59e0b, #f97316);
        color: white;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chat-body {
        flex: 1;
        padding: 16px;
        overflow-y: auto;
    }
    
    .chat-footer {
        padding: 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .chat-input {
        width: 100%;
        padding: 10px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: white;
        outline: none;
    }
    
    .chat-message {
        margin-bottom: 12px;
        padding: 10px;
        border-radius: 8px;
        max-width: 80%;
    }
    
    .chat-message.user {
        background: linear-gradient(to right, #f59e0b, #f97316);
        align-self: flex-end;
        margin-left: auto;
    }
    
    .chat-message.bot {
        background: rgba(255, 255, 255, 0.1);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    let currentCategory = 'all';
    let searchQuery = '';
    
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
    
    // FAQ Accordion functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(button => {
        button.addEventListener('click', function() {
            const faqItem = this.closest('.faq-item');
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            const isOpen = !answer.classList.contains('max-h-0');
            
            // Close all other answers
            faqQuestions.forEach(otherButton => {
                if (otherButton !== button) {
                    const otherAnswer = otherButton.nextElementSibling;
                    const otherIcon = otherButton.querySelector('i');
                    
                    otherAnswer.style.maxHeight = '0';
                    otherAnswer.classList.add('max-h-0');
                    otherIcon.classList.remove('fa-chevron-up');
                    otherIcon.classList.add('fa-chevron-down');
                }
            });
            
            // Toggle current answer
            if (isOpen) {
                answer.style.maxHeight = '0';
                answer.classList.add('max-h-0');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.classList.remove('max-h-0');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        });
    });
    
    // Category filter functionality
    const categoryButtons = document.querySelectorAll('.category-btn');
    const faqItems = document.querySelectorAll('.faq-item');
    const noResults = document.getElementById('no-results');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active state
            categoryButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-amber-500', 'to-orange-600', 'text-white');
                btn.classList.add('bg-gray-800/50', 'backdrop-blur-sm', 'border', 'border-gray-700/50', 'text-gray-300');
            });
            
            this.classList.add('bg-gradient-to-r', 'from-amber-500', 'to-orange-600', 'text-white');
            this.classList.remove('bg-gray-800/50', 'backdrop-blur-sm', 'border', 'border-gray-700/50', 'text-gray-300');
            
            // Apply filter
            currentCategory = this.getAttribute('data-category');
            filterFAQs();
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('faq-search');
    const searchResultsCount = document.getElementById('search-results-count');
    const resultsCount = document.getElementById('results-count');
    const clearSearchBtn = document.getElementById('clear-search');
    
    searchInput.addEventListener('input', function() {
        searchQuery = this.value.toLowerCase().trim();
        filterFAQs();
        
        // Show/hide results count
        if (searchQuery) {
            searchResultsCount.classList.remove('hidden');
        } else {
            searchResultsCount.classList.add('hidden');
        }
    });
    
    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchQuery = '';
        filterFAQs();
        searchResultsCount.classList.add('hidden');
    });
    
    // Filter FAQs function
    function filterFAQs() {
        let visibleCount = 0;
        
        faqItems.forEach(item => {
            const category = item.getAttribute('data-category');
            const question = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            const matchesCategory = currentCategory === 'all' || category === currentCategory;
            const matchesSearch = !searchQuery || question.includes(searchQuery) || answer.includes(searchQuery);
            
            if (matchesCategory && matchesSearch) {
                item.classList.remove('hiding');
                item.classList.add('showing');
                visibleCount++;
                
                // Highlight search terms
                if (searchQuery) {
                    highlightSearchTerms(item, searchQuery);
                } else {
                    removeHighlight(item);
                }
                
                setTimeout(() => {
                    item.classList.remove('showing');
                }, 500);
            } else {
                item.classList.add('hiding');
                item.classList.remove('showing');
            }
        });
        
        // Update results count
        if (searchQuery) {
            resultsCount.textContent = visibleCount;
        }
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
    
    // Highlight search terms
    function highlightSearchTerms(element, term) {
        const question = element.querySelector('.faq-question span');
        const answer = element.querySelector('.faq-answer');
        
        // Remove existing highlights
        removeHighlight(element);
        
        if (term) {
            // Add new highlights
            highlightText(question, term);
            highlightText(answer, term);
        }
    }
    
    function highlightText(element, term) {
        const text = element.textContent;
        const regex = new RegExp(`(${term})`, 'gi');
        
        if (text.match(regex)) {
            element.innerHTML = text.replace(regex, '<span class="search-highlight">$1</span>');
        }
    }
    
    function removeHighlight(element) {
        const highlights = element.querySelectorAll('.search-highlight');
        highlights.forEach(highlight => {
            const parent = highlight.parentNode;
            parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
            parent.normalize();
        });
    }
    
    // Live Chat functionality
    const liveChatBtn = document.getElementById('live-chat-btn');
    
    liveChatBtn.addEventListener('click', function() {
        openChatModal();
    });
    
    function openChatModal() {
        // Create chat modal if it doesn't exist
        if (!document.getElementById('chat-modal')) {
            createChatModal();
        }
        
        const chatModal = document.getElementById('chat-modal');
        chatModal.classList.add('open');
        
        // Simulate bot message
        setTimeout(() => {
            addBotMessage('Hello! How can I help you today?');
        }, 500);
    }
    
    function createChatModal() {
        const chatModal = document.createElement('div');
        chatModal.id = 'chat-modal';
        chatModal.className = 'chat-modal';
        
        chatModal.innerHTML = `
            <div class="chat-header">
                <h3 class="font-medium">Live Chat Support</h3>
                <button id="close-chat" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="chat-body" id="chat-messages">
                <!-- Messages will be added here -->
            </div>
            <div class="chat-footer">
                <input type="text" id="chat-input" class="chat-input" placeholder="Type your message...">
            </div>
        `;
        
        document.body.appendChild(chatModal);
        
        // Add event listeners
        document.getElementById('close-chat').addEventListener('click', function() {
            chatModal.classList.remove('open');
        });
        
        document.getElementById('chat-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const message = this.value.trim();
                if (message) {
                    addUserMessage(message);
                    this.value = '';
                    
                    // Simulate bot response
                    setTimeout(() => {
                        const responses = [
                            "Thank you for your question. Our team will get back to you shortly.",
                            "I'm connecting you with a specialist now. Please wait a moment.",
                            "That's a great question! Let me find the information for you.",
                            "I understand your concern. Let me help you with that."
                        ];
                        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                        addBotMessage(randomResponse);
                    }, 1000 + Math.random() * 2000);
                }
            }
        });
    }
    
    function addUserMessage(message) {
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.className = 'chat-message user';
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function addBotMessage(message) {
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.className = 'chat-message bot';
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
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
});
</script>
@endsection