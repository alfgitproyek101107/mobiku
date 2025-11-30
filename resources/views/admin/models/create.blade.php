@extends('admin.layouts.app')

@section('title', 'Add New Model')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Add New Model</h1>
        <p class="text-gray-400">Create a comprehensive car model entry with detailed specifications.</p>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-900/30 border border-green-700/50 text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-900/30 border border-red-700/50 text-red-400 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.models.store') }}" enctype="multipart/form-data" class="max-w-6xl mx-auto">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Form (2 columns) -->
            <div class="lg:col-span-2 space-y-8">

                <!-- 📌 Basic Information -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-info-circle text-amber-400 mr-3"></i>
                        Basic Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-light text-gray-300 mb-2">Model Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Tag Label -->
                        <div>
                            <label for="tag_label" class="block text-sm font-light text-gray-300 mb-2">Tag Label</label>
                            <input type="text" id="tag_label" name="tag_label" value="{{ old('tag_label') }}" placeholder="e.g. NEW, LUXURY, ECO"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-light text-gray-300 mb-2">Category *</label>
                            <select id="category" name="category" required
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="">Select Category</option>
                                <option value="sedan" {{ old('category') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                                <option value="suv" {{ old('category') == 'suv' ? 'selected' : '' }}>SUV</option>
                                <option value="electric" {{ old('category') == 'electric' ? 'selected' : '' }}>Electric</option>
                                <option value="hybrid" {{ old('category') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                <option value="truck" {{ old('category') == 'truck' ? 'selected' : '' }}>Truck</option>
                                <option value="hatchback" {{ old('category') == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-light text-gray-300 mb-2">Status *</label>
                            <select id="status" name="status" required
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-light text-gray-300 mb-2">Short Description (max 300 chars)</label>
                        <textarea id="description" name="description" rows="3" maxlength="300"
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ old('description') }}</textarea>
                        <div class="text-xs text-gray-400 mt-1"><span id="description-count">0</span>/300 characters</div>
                    </div>

                    <!-- Detailed Description -->
                    <div class="mt-6">
                        <label for="detailed_description" class="block text-sm font-light text-gray-300 mb-2">Detailed Description</label>
                        <textarea id="detailed_description" name="detailed_description" rows="6"
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ old('detailed_description') }}</textarea>
                    </div>
                </div>

                <!-- ⚙️ Technical Specifications -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-cogs text-amber-400 mr-3"></i>
                        Technical Specifications
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Engine Type -->
                        <div>
                            <label for="specifications_engine" class="block text-sm font-light text-gray-300 mb-2">Engine Type</label>
                            <input type="text" id="specifications_engine" name="specifications_engine" value="{{ old('specifications_engine') }}" placeholder="e.g. 2.0L Turbo / Electric Motor"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Max Power -->
                        <div>
                            <label for="max_power_hp" class="block text-sm font-light text-gray-300 mb-2">Max Power (HP)</label>
                            <input type="number" id="max_power_hp" name="max_power_hp" value="{{ old('max_power_hp') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Max Torque -->
                        <div>
                            <label for="max_torque_nm" class="block text-sm font-light text-gray-300 mb-2">Max Torque (Nm)</label>
                            <input type="number" id="max_torque_nm" name="max_torque_nm" value="{{ old('max_torque_nm') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Transmission -->
                        <div>
                            <label for="transmission_type" class="block text-sm font-light text-gray-300 mb-2">Transmission</label>
                            <select id="transmission_type" name="transmission_type"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="">Select Transmission</option>
                                <option value="Manual" {{ old('transmission_type') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                <option value="CVT" {{ old('transmission_type') == 'CVT' ? 'selected' : '' }}>CVT</option>
                                <option value="Automatic" {{ old('transmission_type') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                <option value="DCT" {{ old('transmission_type') == 'DCT' ? 'selected' : '' }}>DCT</option>
                            </select>
                        </div>

                        <!-- Drivetrain -->
                        <div>
                            <label for="drivetrain" class="block text-sm font-light text-gray-300 mb-2">Drivetrain</label>
                            <select id="drivetrain" name="drivetrain"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="">Select Drivetrain</option>
                                <option value="FWD" {{ old('drivetrain') == 'FWD' ? 'selected' : '' }}>FWD (Front Wheel Drive)</option>
                                <option value="RWD" {{ old('drivetrain') == 'RWD' ? 'selected' : '' }}>RWD (Rear Wheel Drive)</option>
                                <option value="AWD" {{ old('drivetrain') == 'AWD' ? 'selected' : '' }}>AWD (All Wheel Drive)</option>
                                <option value="4WD" {{ old('drivetrain') == '4WD' ? 'selected' : '' }}>4WD (4 Wheel Drive)</option>
                            </select>
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label for="fuel_type" class="block text-sm font-light text-gray-300 mb-2">Fuel Type</label>
                            <select id="fuel_type" name="fuel_type"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="">Select Fuel Type</option>
                                <option value="Bensin" {{ old('fuel_type') == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                                <option value="Diesel" {{ old('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="Hybrid" {{ old('fuel_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                <option value="Electric" {{ old('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                            </select>
                        </div>

                        <!-- Seating Capacity -->
                        <div>
                            <label for="seating_capacity" class="block text-sm font-light text-gray-300 mb-2">Seating Capacity</label>
                            <input type="number" id="seating_capacity" name="seating_capacity" value="{{ old('seating_capacity') }}" min="1" max="20"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>
                    </div>
                </div>

                <!-- 📏 Dimensions -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-ruler-combined text-amber-400 mr-3"></i>
                        Dimensions (mm)
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="length_mm" class="block text-sm font-light text-gray-300 mb-2">Length</label>
                            <input type="number" id="length_mm" name="length_mm" value="{{ old('length_mm') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="width_mm" class="block text-sm font-light text-gray-300 mb-2">Width</label>
                            <input type="number" id="width_mm" name="width_mm" value="{{ old('width_mm') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="height_mm" class="block text-sm font-light text-gray-300 mb-2">Height</label>
                            <input type="number" id="height_mm" name="height_mm" value="{{ old('height_mm') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="wheelbase_mm" class="block text-sm font-light text-gray-300 mb-2">Wheelbase</label>
                            <input type="number" id="wheelbase_mm" name="wheelbase_mm" value="{{ old('wheelbase_mm') }}" min="0"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>
                    </div>
                </div>

                <!-- 💰 Pricing & Rating -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-tags text-amber-400 mr-3"></i>
                        Pricing & Rating
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-light text-gray-300 mb-2">Price (IDR) *</label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" required
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Price Label -->
                        <div>
                            <label for="price_label" class="block text-sm font-light text-gray-300 mb-2">Price Label</label>
                            <input type="text" id="price_label" name="price_label" value="{{ old('price_label') }}" placeholder="e.g. On The Road"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <!-- Rating -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-light text-gray-300 mb-2">Rating (1-5 stars)</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" class="star-btn text-2xl {{ old('rating', 0) >= $i ? 'text-amber-400' : 'text-gray-600' }}" data-rating="{{ $i }}">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    @endfor
                                </div>
                                <span class="text-gray-400" id="rating-display">{{ old('rating', 0) }}/5</span>
                                <input type="hidden" id="rating" name="rating" value="{{ old('rating', 0) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 🧩 Features & Warranty -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-shield-alt text-amber-400 mr-3"></i>
                        Features & Warranty
                    </h3>

                    <!-- Key Features -->
                    <div class="mb-6">
                        <label class="block text-sm font-light text-gray-300 mb-3">Key Features (Select multiple)</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @php
                                $features = ['Premium Performance', 'Zero Emission', 'Luxury Comfort', 'Advanced Safety', 'Smart Technology', 'Sport Design', 'Eco Friendly', 'High Efficiency', 'All Terrain', 'Family Friendly'];
                                $selectedFeatures = old('key_features', []);
                            @endphp
                            @foreach($features as $feature)
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="key_features[]" value="{{ $feature }}"
                                        {{ in_array($feature, $selectedFeatures) ? 'checked' : '' }}
                                        class="w-4 h-4 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                                    <span class="text-sm text-gray-300">{{ $feature }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Warranty & Roadside Assistance -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="warranty" class="block text-sm font-light text-gray-300 mb-2">Warranty</label>
                            <input type="text" id="warranty" name="warranty" value="{{ old('warranty') }}" placeholder="e.g. 5 Years Engine Warranty"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="roadside_assistance" name="roadside_assistance" value="1" {{ old('roadside_assistance') ? 'checked' : '' }}
                                class="w-5 h-5 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                            <label for="roadside_assistance" class="text-sm font-light text-gray-300 cursor-pointer">Roadside Assistance Available</label>
                        </div>
                    </div>
                </div>

                <!-- 🔗 CTA Links -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-link text-amber-400 mr-3"></i>
                        Call-to-Action Links
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label for="test_drive_url" class="block text-sm font-light text-gray-300 mb-2">Test Drive URL</label>
                            <input type="url" id="test_drive_url" name="test_drive_url" value="{{ old('test_drive_url') }}" placeholder="https://..."
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="consultation_url" class="block text-sm font-light text-gray-300 mb-2">Consultation URL</label>
                            <input type="url" id="consultation_url" name="consultation_url" value="{{ old('consultation_url') }}" placeholder="https://..."
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="contact_sales_url" class="block text-sm font-light text-gray-300 mb-2">Contact Sales URL</label>
                            <input type="url" id="contact_sales_url" name="contact_sales_url" value="{{ old('contact_sales_url') }}" placeholder="https://..."
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar (1 column) -->
            <div class="space-y-8">

                <!-- 🖼️ Image Management -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-images text-amber-400 mr-3"></i>
                        Images
                    </h3>

                    <!-- Main Image -->
                    <div class="mb-6">
                        <label class="block text-sm font-light text-gray-300 mb-3">Main Image *</label>
                        <div class="border-2 border-dashed border-gray-700 rounded-xl p-4 text-center hover:border-amber-500/50 transition-colors">
                            <input type="file" id="image" name="image" accept="image/*" required class="hidden" onchange="previewMainImage(event)">
                            <div id="main-image-preview" class="mb-4">
                                <i class="fas fa-camera text-4xl text-gray-600 mb-2"></i>
                                <p class="text-gray-400">Click to upload main image</p>
                            </div>
                            <label for="image" class="cursor-pointer px-4 py-2 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-lg hover:bg-amber-500/20 transition-colors">
                                Choose File
                            </label>
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div>
                        <label class="block text-sm font-light text-gray-300 mb-3">Gallery Images</label>
                        <div class="border-2 border-dashed border-gray-700 rounded-xl p-4 text-center hover:border-amber-500/50 transition-colors">
                            <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple class="hidden" onchange="previewGalleryImages(event)">
                            <div id="gallery-preview" class="mb-4">
                                <i class="fas fa-images text-4xl text-gray-600 mb-2"></i>
                                <p class="text-gray-400">Click to upload gallery images</p>
                            </div>
                            <label for="gallery_images" class="cursor-pointer px-4 py-2 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-lg hover:bg-amber-500/20 transition-colors">
                                Choose Files
                            </label>
                        </div>
                        <div id="gallery-files" class="mt-3 space-y-2"></div>
                    </div>
                </div>

                <!-- 🏷️ Badge Settings -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-tag text-amber-400 mr-3"></i>
                        Badge Settings
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label for="badge_text" class="block text-sm font-light text-gray-300 mb-2">Badge Text</label>
                            <input type="text" id="badge_text" name="badge_text" value="{{ old('badge_text') }}" placeholder="e.g. NEW"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        </div>

                        <div>
                            <label for="badge_color" class="block text-sm font-light text-gray-300 mb-2">Badge Color</label>
                            <select id="badge_color" name="badge_color"
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                <option value="from-amber-500 to-orange-600" {{ old('badge_color') == 'from-amber-500 to-orange-600' ? 'selected' : '' }}>Amber to Orange</option>
                                <option value="from-green-500 to-emerald-600" {{ old('badge_color') == 'from-green-500 to-emerald-600' ? 'selected' : '' }}>Green to Emerald</option>
                                <option value="from-red-500 to-pink-600" {{ old('badge_color') == 'from-red-500 to-pink-600' ? 'selected' : '' }}>Red to Pink</option>
                                <option value="from-blue-500 to-indigo-600" {{ old('badge_color') == 'from-blue-500 to-indigo-600' ? 'selected' : '' }}>Blue to Indigo</option>
                                <option value="from-purple-500 to-pink-600" {{ old('badge_color') == 'from-purple-500 to-pink-600' ? 'selected' : '' }}>Purple to Pink</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 📊 Summary -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                    <h3 class="text-xl font-light text-white mb-6 flex items-center">
                        <i class="fas fa-chart-line text-amber-400 mr-3"></i>
                        Summary
                    </h3>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Model Name:</span>
                            <span class="text-white" id="summary-name">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Category:</span>
                            <span class="text-white" id="summary-category">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Price:</span>
                            <span class="text-white" id="summary-price">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Rating:</span>
                            <span class="text-white" id="summary-rating">-</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                        <i class="fas fa-save mr-2"></i>Create Model
                    </button>

                    <a href="{{ route('admin.models.index') }}" class="w-full py-4 bg-gray-700/50 text-white rounded-xl font-light hover:bg-gray-600/50 transition-all text-center block">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Auto-generate slug from name
document.getElementById('name').addEventListener('input', function() {
    const slug = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
    // Note: Slug will be auto-generated in controller
});

// Character counter for description
document.getElementById('description').addEventListener('input', function() {
    document.getElementById('description-count').textContent = this.value.length;
});

// Star rating system
document.querySelectorAll('.star-btn').forEach((btn, index) => {
    btn.addEventListener('click', function() {
        const rating = parseInt(this.dataset.rating);
        document.getElementById('rating').value = rating;
        document.getElementById('rating-display').textContent = rating + '/5';
        document.getElementById('summary-rating').textContent = rating + '/5';

        // Update star colors
        document.querySelectorAll('.star-btn').forEach((star, i) => {
            if (i < rating) {
                star.classList.remove('text-gray-600');
                star.classList.add('text-amber-400');
            } else {
                star.classList.remove('text-amber-400');
                star.classList.add('text-gray-600');
            }
        });
    });
});

// Update summary
document.getElementById('name').addEventListener('input', function() {
    document.getElementById('summary-name').textContent = this.value || '-';
});

document.getElementById('category').addEventListener('change', function() {
    document.getElementById('summary-category').textContent = this.options[this.selectedIndex].text || '-';
});

document.getElementById('price').addEventListener('input', function() {
    const price = this.value ? 'Rp ' + new Intl.NumberFormat('id-ID').format(this.value) : '-';
    document.getElementById('summary-price').textContent = price;
});

// Image preview functions
function previewMainImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('main-image-preview').innerHTML = `
                <img src="${e.target.result}" alt="Main Image" class="w-full h-32 object-cover rounded-lg">
                <p class="text-sm text-gray-400 mt-2">${file.name}</p>
            `;
        };
        reader.readAsDataURL(file);
    }
}

function previewGalleryImages(event) {
    const files = event.target.files;
    const container = document.getElementById('gallery-files');
    container.innerHTML = '';

    if (files.length > 0) {
        document.getElementById('gallery-preview').innerHTML = `
            <i class="fas fa-images text-4xl text-amber-400 mb-2"></i>
            <p class="text-gray-400">${files.length} image(s) selected</p>
        `;

        Array.from(files).forEach((file, index) => {
            const div = document.createElement('div');
            div.className = 'flex items-center justify-between bg-gray-800/50 rounded-lg p-2';
            div.innerHTML = `
                <span class="text-sm text-gray-300">${file.name}</span>
                <button type="button" onclick="removeGalleryImage(${index})" class="text-red-400 hover:text-red-300">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
        });
    } else {
        document.getElementById('gallery-preview').innerHTML = `
            <i class="fas fa-images text-4xl text-gray-600 mb-2"></i>
            <p class="text-gray-400">Click to upload gallery images</p>
        `;
    }
}

function removeGalleryImage(index) {
    const input = document.getElementById('gallery_images');
    const files = Array.from(input.files);
    files.splice(index, 1);

    // Create new FileList (this is a bit hacky but works)
    const dt = new DataTransfer();
    files.forEach(file => dt.items.add(file));
    input.files = dt.files;

    previewGalleryImages({target: input});
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set initial summary values
    document.getElementById('summary-name').textContent = document.getElementById('name').value || '-';
    document.getElementById('summary-category').textContent = document.getElementById('category').options[document.getElementById('category').selectedIndex].text || '-';
    document.getElementById('summary-price').textContent = document.getElementById('price').value ? 'Rp ' + new Intl.NumberFormat('id-ID').format(document.getElementById('price').value) : '-';
    document.getElementById('summary-rating').textContent = document.getElementById('rating').value + '/5' || '0/5';

    // Set initial description count
    document.getElementById('description-count').textContent = document.getElementById('description').value.length;
});
</script>
@endsection