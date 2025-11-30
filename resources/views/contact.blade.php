@extends('layouts.app')

@section('content')
<!-- Hero Section - Premium Contact -->
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
                <i class="fas fa-headset mr-2"></i>
                We're Here To Help
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-light text-white leading-tight tracking-tight mb-8 animate-slide-up">
                <span class="block font-medium">{{ \App\Models\PageContent::getContent('contact_hero_main-title', 'Get In') }}</span>
                <span class="block bg-gradient-to-r from-amber-400 via-orange-400 to-amber-400 bg-clip-text text-transparent">
                    {{ \App\Models\PageContent::getContent('contact_hero_highlight-title', 'Touch') }}
                </span>
            </h1>

            <p class="text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-light mb-12 animate-slide-up animation-delay-200">
                {{ \App\Models\PageContent::getContent('contact_hero_description', 'Connect with our team of experts who are ready to assist you with your automotive needs.') }}
            </p>

            <!-- Elegant Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto animate-slide-up animation-delay-400">
                <div>
                    <div class="text-3xl font-light text-white">24/7</div>
                    <div class="text-sm text-gray-300 font-light">Support</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-amber-400">< 1hr</div>
                    <div class="text-sm text-gray-300 font-light">Response Time</div>
                </div>
                <div>
                    <div class="text-3xl font-light text-white">100%</div>
                    <div class="text-sm text-gray-300 font-light">Satisfaction</div>
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

<!-- Contact Section - Premium Design -->
<section class="py-20 bg-gradient-to-b from-slate-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Contact Information -->
            <div class="space-y-12">
                <div>
                    <h2 class="text-4xl font-light text-white mb-6">
                        {{ \App\Models\PageContent::getContent('contact_info_title', 'Contact') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('contact_info_highlight', 'Information') }}</span>
                    </h2>
                    <div class="w-32 h-px bg-gradient-to-r from-amber-400 to-transparent mb-8"></div>
                </div>
                
                <div class="space-y-8">
                    <!-- Address -->
                    <div class="group">
                        <div class="flex items-start space-x-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                                <i class="fas fa-map-marker-alt text-amber-400 text-xl group-hover:text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium text-white mb-2">Address</h3>
                                <p class="text-gray-200 leading-relaxed font-light">
                                    Jl. Sudirman Kav. 52-53<br>
                                    Jakarta Selatan, DKI Jakarta<br>
                                    Indonesia 12190
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="group">
                        <div class="flex items-start space-x-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                                <i class="fas fa-phone-alt text-amber-400 text-xl group-hover:text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium text-white mb-2">Phone</h3>
                                <div class="space-y-1">
                                    <p class="text-gray-200 font-light">Customer Service: <a href="tel:+6281234567890" class="text-amber-400 hover:text-amber-300 transition-colors">+62 812 3456 7890</a></p>
                                    <p class="text-gray-200 font-light">Sales: <a href="tel:+6281234567891" class="text-amber-400 hover:text-amber-300 transition-colors">+62 812 3456 7891</a></p>
                                    <p class="text-gray-200 font-light">Service: <a href="tel:+6281234567892" class="text-amber-400 hover:text-amber-300 transition-colors">+62 812 3456 7892</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="group">
                        <div class="flex items-start space-x-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                                <i class="fas fa-envelope text-amber-400 text-xl group-hover:text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium text-white mb-2">Email</h3>
                                <div class="space-y-1">
                                    <p class="text-gray-200 font-light">General: <a href="mailto:info@mobiku.com" class="text-amber-400 hover:text-amber-300 transition-colors">info@mobiku.com</a></p>
                                    <p class="text-gray-200 font-light">Sales: <a href="mailto:sales@mobiku.com" class="text-amber-400 hover:text-amber-300 transition-colors">sales@mobiku.com</a></p>
                                    <p class="text-gray-200 font-light">Service: <a href="mailto:service@mobiku.com" class="text-amber-400 hover:text-amber-300 transition-colors">service@mobiku.com</a></p>
                                    <p class="text-gray-200 font-light">Careers: <a href="mailto:career@mobiku.com" class="text-amber-400 hover:text-amber-300 transition-colors">career@mobiku.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="group">
                        <div class="flex items-start space-x-6">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                                <i class="fas fa-clock text-amber-400 text-xl group-hover:text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium text-white mb-2">Operating Hours</h3>
                                <div class="space-y-1">
                                    <p class="text-gray-200 font-light">Monday - Friday: <span class="text-amber-400">08:00 - 17:00</span></p>
                                    <p class="text-gray-200 font-light">Saturday: <span class="text-amber-400">09:00 - 16:00</span></p>
                                    <p class="text-gray-200 font-light">Sunday: <span class="text-red-400">Closed</span> (Emergency Service 24/7)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="pt-8 border-t border-gray-800">
                    <h3 class="text-xl font-medium text-white mb-6">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 rounded-2xl flex items-center justify-center transition-all duration-300">
                            <i class="fab fa-facebook-f text-gray-400 group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 rounded-2xl flex items-center justify-center transition-all duration-300">
                            <i class="fab fa-twitter text-gray-400 group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 rounded-2xl flex items-center justify-center transition-all duration-300">
                            <i class="fab fa-instagram text-gray-400 group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 rounded-2xl flex items-center justify-center transition-all duration-300">
                            <i class="fab fa-youtube text-gray-400 group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group w-12 h-12 bg-gray-800/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 rounded-2xl flex items-center justify-center transition-all duration-300">
                            <i class="fab fa-linkedin-in text-gray-400 group-hover:text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Forms -->
            <div>
                <!-- Form Tabs -->
                <div class="mb-8" id="form-tabs">
                    <div class="flex space-x-1 bg-gray-800/50 p-1 rounded-2xl backdrop-blur-sm">
                        <button type="button" id="message-tab" class="flex-1 px-6 py-3 text-sm font-medium rounded-xl tab-active">
                            <i class="fas fa-envelope mr-2"></i>Send Message
                        </button>
                        <button type="button" id="booking-tab" class="flex-1 px-6 py-3 text-sm font-medium rounded-xl tab-inactive">
                            <i class="fas fa-calendar-alt mr-2"></i>Test Drive Booking
                        </button>
                    </div>
                </div>

                <!-- Message Form -->
                <div id="message-form-container" style="display: block;">
                    <div>
                        <h2 class="text-4xl font-light text-white mb-6">
                            {{ \App\Models\PageContent::getContent('contact_message_title', 'Send Us a') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('contact_message_highlight', 'Message') }}</span>
                        </h2>
                        <div class="w-32 h-px bg-gradient-to-r from-amber-400 to-transparent mb-8"></div>
                    </div>

                    <form id="contact-form" class="space-y-6" method="POST" action="/api/contact-messages">
                        @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-200 mb-2">Full Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                placeholder="Enter your name"
                                required
                            >
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-200 mb-2">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                placeholder="Enter your email"
                                required
                            >
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-200 mb-2">Phone Number</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                            placeholder="Enter your phone number"
                        >
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-200 mb-2">Subject</label>
                        <select
                            id="subject"
                            name="subject"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                            required
                        >
                            <option value="">Select a subject</option>
                            <option value="sales" {{ old('subject') == 'sales' ? 'selected' : '' }}>Sales Information</option>
                            <option value="service" {{ old('subject') == 'service' ? 'selected' : '' }}>After-Sales Service</option>
                            <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint</option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Business Partnership</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-200 mb-2">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                            placeholder="Write your message"
                            required
                        >{{ old('message') }}</textarea>
                    </div>
                    
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="newsletter"
                            name="newsletter"
                            {{ old('newsletter') ? 'checked' : '' }}
                            class="h-5 w-5 text-amber-500 focus:ring-amber-500 border-gray-600 rounded bg-gray-800"
                        >
                        <label for="newsletter" class="ml-3 block text-sm text-gray-200">
                            Subscribe to our newsletter for the latest updates
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="privacy"
                            name="privacy"
                            {{ old('privacy') ? 'checked' : '' }}
                            class="h-5 w-5 text-amber-500 focus:ring-amber-500 border-gray-600 rounded bg-gray-800"
                            required
                        >
                        <label for="privacy" class="ml-3 block text-sm text-gray-200">
                            I agree to the <a href="#" class="text-amber-400 hover:text-amber-300 transition-colors">Privacy Policy</a>
                        </label>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full group relative px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-2xl font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/20 flex items-center justify-center"
                    >
                        <span class="relative z-10 flex items-center">
                            Send Message
                            <i class="fas fa-paper-plane ml-3 group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                    </button>
                    </form>

                    <!-- Success Message for Contact -->
                    @if(session('success') && !str_contains(session('success'), 'Test drive'))
                    <div id="contact-success-message" class="mt-6 p-6 bg-green-500/10 border border-green-500/30 rounded-2xl">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-400 text-xl mr-3"></i>
                            <p class="text-green-400">{{ session('success') }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Validation Errors for Contact -->
                    @if($errors->any() && !$errors->has('customer_name'))
                    <div id="contact-error-message" class="mt-6 p-6 bg-red-500/10 border border-red-500/30 rounded-2xl">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-400 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <p class="text-red-400 font-medium mb-2">Please fix the following errors:</p>
                                <ul class="text-red-300 text-sm space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- General Error Message for Contact -->
                    @if(session('error') && !str_contains(session('error'), 'test drive') && !str_contains(session('error'), 'time slot'))
                    <div id="contact-error-message" class="mt-6 p-6 bg-red-500/10 border border-red-500/30 rounded-2xl">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-400 text-xl mr-3"></i>
                            <p class="text-red-400">{{ session('error') }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Booking Form -->
                <div id="booking-form-container" style="display: none;">
                    <div>
                        <h2 class="text-4xl font-light text-white mb-6">
                            {{ \App\Models\PageContent::getContent('contact_booking_title', 'Book a') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('contact_booking_highlight', 'Test Drive') }}</span>
                        </h2>
                        <div class="w-32 h-px bg-gradient-to-r from-amber-400 to-transparent mb-8"></div>
                    </div>

                    <form id="booking-form" class="space-y-6" method="POST" action="/api/book-test-drive">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="booking-name" class="block text-sm font-medium text-gray-200 mb-2">Full Name</label>
                                <input
                                    type="text"
                                    id="booking-name"
                                    name="customer_name"
                                    value="{{ old('customer_name') }}"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    placeholder="Enter your name"
                                    required
                                >
                            </div>
                            <div>
                                <label for="booking-email" class="block text-sm font-medium text-gray-200 mb-2">Email</label>
                                <input
                                    type="email"
                                    id="booking-email"
                                    name="customer_email"
                                    value="{{ old('customer_email') }}"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    placeholder="Enter your email"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="booking-phone" class="block text-sm font-medium text-gray-200 mb-2">Phone Number</label>
                                <input
                                    type="tel"
                                    id="booking-phone"
                                    name="customer_phone"
                                    value="{{ old('customer_phone') }}"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    placeholder="Enter your phone number"
                                    required
                                >
                            </div>
                            <div>
                                <label for="booking-model" class="block text-sm font-medium text-gray-200 mb-2">Preferred Model</label>
                                <select
                                    id="booking-model"
                                    name="car_id"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    required
                                >
                                    <option value="">Select a model</option>
                                    @foreach(\App\Models\Car::where('status', 'active')->get() as $model)
                                        <option value="{{ $model->id }}" {{ old('car_id') == $model->id ? 'selected' : '' }}>{{ $model->name }} - {{ $model->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="booking-date" class="block text-sm font-medium text-gray-200 mb-2">Preferred Date</label>
                                <input
                                    type="date"
                                    id="booking-date"
                                    name="booking_date"
                                    value="{{ old('booking_date') }}"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    required
                                >
                            </div>
                            <div>
                                <label for="booking-time" class="block text-sm font-medium text-gray-200 mb-2">Preferred Time</label>
                                <select
                                    id="booking-time"
                                    name="booking_time"
                                    class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                    required
                                >
                                    <option value="">Select time</option>
                                    <option value="09:00" {{ old('booking_time') == '09:00' ? 'selected' : '' }}>09:00 AM</option>
                                    <option value="10:00" {{ old('booking_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="11:00" {{ old('booking_time') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="13:00" {{ old('booking_time') == '13:00' ? 'selected' : '' }}>01:00 PM</option>
                                    <option value="14:00" {{ old('booking_time') == '14:00' ? 'selected' : '' }}>02:00 PM</option>
                                    <option value="15:00" {{ old('booking_time') == '15:00' ? 'selected' : '' }}>03:00 PM</option>
                                    <option value="16:00" {{ old('booking_time') == '16:00' ? 'selected' : '' }}>04:00 PM</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="booking-notes" class="block text-sm font-medium text-gray-200 mb-2">Additional Notes</label>
                            <textarea
                                id="booking-notes"
                                name="notes"
                                rows="4"
                                class="w-full px-6 py-4 rounded-2xl bg-gray-700/80 backdrop-blur-sm border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50 transition-all duration-300"
                                placeholder="Any special requests or questions about the test drive?"
                            >{{ old('notes') }}</textarea>
                        </div>

                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="booking-privacy"
                                name="privacy_agreed"
                                {{ old('privacy_agreed') ? 'checked' : '' }}
                                class="h-5 w-5 text-amber-500 focus:ring-amber-500 border-gray-600 rounded bg-gray-800"
                                required
                            >
                            <label for="booking-privacy" class="ml-3 block text-sm text-gray-200">
                                I agree to the <a href="#" class="text-amber-400 hover:text-amber-300 transition-colors">Privacy Policy</a> and understand the test drive terms
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="w-full group relative px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-2xl font-medium transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/20 flex items-center justify-center"
                        >
                            <span class="relative z-10 flex items-center">
                                Book Test Drive
                                <i class="fas fa-car-side ml-3 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                        </button>
                    </form>

                    <!-- Success Message for Booking -->
                    @if(session('success') && str_contains(session('success'), 'Test drive'))
                    <div id="booking-success-message" class="mt-6 p-6 bg-green-500/10 border border-green-500/30 rounded-2xl">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-400 text-xl mr-3"></i>
                            <p class="text-green-400">{{ session('success') }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Validation Errors for Booking -->
                    @if($errors->has('customer_name'))
                    <div id="booking-error-message" class="mt-6 p-6 bg-red-500/10 border border-red-500/30 rounded-2xl">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-400 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <p class="text-red-400 font-medium mb-2">Please fix the following errors:</p>
                                <ul class="text-red-300 text-sm space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- General Error Message for Booking -->
                    @if(session('error') && (str_contains(session('error'), 'test drive') || str_contains(session('error'), 'time slot')))
                    <div id="booking-error-message" class="mt-6 p-6 bg-red-500/10 border border-red-500/30 rounded-2xl">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-400 text-xl mr-3"></i>
                            <p class="text-red-400">{{ session('error') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section - Premium Design -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('contact_location_title', 'Find') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('contact_location_highlight', 'Our Location') }}</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
        </div>
        
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-orange-500/10 rounded-3xl blur-3xl"></div>
            <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl overflow-hidden border border-gray-700/50">
                <!-- Map Placeholder -->
                <div class="relative h-96 bg-gray-800 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-6xl text-amber-400/30 mb-4"></i>
                        <p class="text-gray-400">Interactive Map</p>
                    </div>
                </div>
                
                <!-- Location Info -->
                <div class="p-6 bg-gray-900/50 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-medium text-white mb-1">Mobiku Headquarters</h3>
                            <p class="text-gray-300">Jl. Sudirman Kav. 52-53, Jakarta Selatan</p>
                        </div>
                        <a href="https://maps.google.com/?q=Jl.+Sudirman+Kav.+52-53,+Jakarta+Selatan" target="_blank" class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-medium transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20">
                            <i class="fas fa-directions mr-2"></i>
                            Get Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Service Section - Premium Design -->
<section class="py-20 bg-gradient-to-b from-slate-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-br from-red-600/20 to-red-800/20 rounded-3xl blur-3xl"></div>
            <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-12 border border-gray-700/50 text-center">
                <div class="mb-8">
                    <i class="fas fa-exclamation-triangle text-6xl text-red-400/60"></i>
                </div>
                
                <h2 class="text-4xl font-light text-white mb-6">
                    {{ \App\Models\PageContent::getContent('contact_emergency_title', 'Emergency') }} <span class="font-medium text-red-400">{{ \App\Models\PageContent::getContent('contact_emergency_highlight', '24/7') }}</span> {{ \App\Models\PageContent::getContent('contact_emergency_subtitle', 'Service') }}
                </h2>
                <p class="text-xl text-gray-200 mb-12 max-w-2xl mx-auto font-light">
                    {{ \App\Models\PageContent::getContent('contact_emergency_description', 'Need emergency assistance on the road? Contact us anytime, anywhere!') }}
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
                    <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 border border-gray-700/50">
                        <i class="fas fa-phone-alt text-3xl text-red-400 mb-4"></i>
                        <p class="text-2xl font-medium text-white mb-2">+62 800 123 4567</p>
                        <p class="text-gray-300">Emergency Service</p>
                    </div>
                    <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 border border-gray-700/50">
                        <i class="fas fa-life-ring text-3xl text-red-400 mb-4"></i>
                        <p class="text-2xl font-medium text-white mb-2">+62 800 123 4568</p>
                        <p class="text-gray-300">Roadside Assistance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dealership Locations - Premium Design -->
<section class="py-20 bg-gradient-to-b from-gray-900 to-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-light text-white mb-6">
                {{ \App\Models\PageContent::getContent('contact_dealerships_title', 'Official') }} <span class="font-medium bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">{{ \App\Models\PageContent::getContent('contact_dealerships_highlight', 'Dealerships') }}</span>
            </h2>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Jakarta -->
            <div class="group">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center mb-6 group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                            <i class="fas fa-building text-amber-400 text-2xl group-hover:text-white"></i>
                        </div>
                        
                        <h3 class="text-2xl font-medium text-white mb-4">Jakarta</h3>
                        <p class="text-gray-200 mb-6 font-light">Jl. Sudirman Kav. 52-53, Jakarta Selatan</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-phone text-amber-400 mr-3 w-5"></i>
                                <a href="tel:+622112345678" class="hover:text-amber-400 transition-colors">+62 21 1234 5678</a>
                            </div>
                            <div class="flex items-center text-gray-400">
                                <i class="fas fa-clock text-amber-400 mr-3 w-5"></i>
                                <span>08:00 - 17:00</span>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <a href="https://maps.google.com/?q=Jl.+Sudirman+Kav.+52-53,+Jakarta+Selatan" target="_blank" class="inline-flex items-center text-amber-400 hover:text-amber-300 transition-colors">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Get Directions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Surabaya -->
            <div class="group" style="animation-delay: 100ms">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center mb-6 group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                            <i class="fas fa-building text-amber-400 text-2xl group-hover:text-white"></i>
                        </div>
                        
                        <h3 class="text-2xl font-medium text-white mb-4">Surabaya</h3>
                        <p class="text-gray-200 mb-6 font-light">Jl. Pahlawan No. 123, Surabaya</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-400">
                                <i class="fas fa-phone text-amber-400 mr-3 w-5"></i>
                                <a href="tel:+623112345678" class="hover:text-amber-400 transition-colors">+62 31 1234 5678</a>
                            </div>
                            <div class="flex items-center text-gray-400">
                                <i class="fas fa-clock text-amber-400 mr-3 w-5"></i>
                                <span>08:00 - 17:00</span>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <a href="https://maps.google.com/?q=Jl.+Pahlawan+No.+123,+Surabaya" target="_blank" class="inline-flex items-center text-amber-400 hover:text-amber-300 transition-colors">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Get Directions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bandung -->
            <div class="group" style="animation-delay: 200ms">
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-8 border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center mb-6 group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-orange-600 transition-all duration-300">
                            <i class="fas fa-building text-amber-400 text-2xl group-hover:text-white"></i>
                        </div>
                        
                        <h3 class="text-2xl font-medium text-white mb-4">Bandung</h3>
                        <p class="text-gray-200 mb-6 font-light">Jl. Asia Afrika No. 456, Bandung</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-400">
                                <i class="fas fa-phone text-amber-400 mr-3 w-5"></i>
                                <a href="tel:+622212345678" class="hover:text-amber-400 transition-colors">+62 22 1234 5678</a>
                            </div>
                            <div class="flex items-center text-gray-400">
                                <i class="fas fa-clock text-amber-400 mr-3 w-5"></i>
                                <span>08:00 - 17:00</span>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <a href="https://maps.google.com/?q=Jl.+Asia+Afrika+No.+456,+Bandung" target="_blank" class="inline-flex items-center text-amber-400 hover:text-amber-300 transition-colors">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Get Directions
                            </a>
                        </div>
                    </div>
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
    
    /* Form input focus effects */
    .form-input:focus {
        box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.1);
    }
    
    /* Button loading state */
    .btn-loading {
        position: relative;
        color: transparent !important;
        pointer-events: none;
    }

    .btn-loading::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
    }

    /* Tab switching styles */
    .tab-active {
        background: linear-gradient(to right, #f59e0b, #ea580c);
        color: white;
    }

    .tab-inactive {
        color: #9ca3af;
        background: transparent;
        transition: color 0.3s ease;
    }

    .tab-inactive:hover {
        color: white;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
    
    // Tab switching functionality
    const messageTab = document.getElementById('message-tab');
    const bookingTab = document.getElementById('booking-tab');
    const messageForm = document.getElementById('message-form-container');
    const bookingForm = document.getElementById('booking-form-container');

    function switchToMessageTab() {
        // Update tab styles using simpler class approach
        messageTab.classList.add('tab-active');
        messageTab.classList.remove('tab-inactive');
        bookingTab.classList.add('tab-inactive');
        bookingTab.classList.remove('tab-active');

        // Show/hide forms
        messageForm.style.display = 'block';
        bookingForm.style.display = 'none';
    }

    function switchToBookingTab() {
        // Update tab styles using simpler class approach
        bookingTab.classList.add('tab-active');
        bookingTab.classList.remove('tab-inactive');
        messageTab.classList.add('tab-inactive');
        messageTab.classList.remove('tab-active');

        // Show/hide forms
        bookingForm.style.display = 'block';
        messageForm.style.display = 'none';
    }

    messageTab.addEventListener('click', switchToMessageTab);
    bookingTab.addEventListener('click', switchToBookingTab);

    // Check URL hash for auto-switching to booking tab
    if (window.location.hash === '#booking') {
        setTimeout(function() {
            switchToBookingTab();
            // Smooth scroll to form tabs
            document.getElementById('form-tabs').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    }

    // Contact Form Submission - Add loading state
    const contactForm = document.getElementById('contact-form');

    contactForm.addEventListener('submit', function(e) {
        // Add loading state to button
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        submitBtn.classList.add('btn-loading');
        submitBtn.disabled = true;

        // Let the form submit normally - no preventDefault()
        // The form will submit with CSRF token and redirect back with flash messages
    });

    // Booking Form Submission - Add loading state
    const bookingForm = document.getElementById('booking-form');

    bookingForm.addEventListener('submit', function(e) {
        // Add loading state to button
        const submitBtn = bookingForm.querySelector('button[type="submit"]');
        submitBtn.classList.add('btn-loading');
        submitBtn.disabled = true;

        // Let the form submit normally - no preventDefault()
        // The form will submit with CSRF token and redirect back with flash messages
    });
    
    // Form validation
    const inputs = contactForm.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                validateField(this);
            }
        });
    });
    
    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        
        // Remove previous validation classes
        field.classList.remove('border-red-500', 'border-green-500');
        
        // Check if field is required and empty
        if (field.hasAttribute('required') && !value) {
            field.classList.add('border-red-500');
            isValid = false;
        }
        
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.classList.add('border-red-500');
                isValid = false;
            }
        }
        
        // Phone validation
        if (field.type === 'tel' && value) {
            const phoneRegex = /^[\d\s\-\+\(\)]+$/;
            if (!phoneRegex.test(value)) {
                field.classList.add('border-red-500');
                isValid = false;
            }
        }
        
        // Add success class if valid
        if (isValid && value) {
            field.classList.add('border-green-500');
        }
        
        return isValid;
    }
    
    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            // Format as Indonesian phone number
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = value;
                } else if (value.length <= 7) {
                    value = value.slice(0, 3) + ' ' + value.slice(3);
                } else {
                    value = value.slice(0, 3) + ' ' + value.slice(3, 7) + ' ' + value.slice(7, 11);
                }
            }
            
            e.target.value = value;
        });
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
    
    // Copy to clipboard functionality for phone numbers
    document.querySelectorAll('a[href^="tel:"]').forEach(link => {
        link.addEventListener('click', function(e) {
            // Check if it's a desktop device
            if (window.innerWidth > 768) {
                e.preventDefault();
                
                const phoneNumber = this.getAttribute('href').replace('tel:', '');
                
                // Create temporary input to copy to clipboard
                const tempInput = document.createElement('input');
                tempInput.value = phoneNumber;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                
                // Show notification
                showNotification(`Phone number ${phoneNumber} copied to clipboard`);
            }
        });
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
});
</script>
@endsection
