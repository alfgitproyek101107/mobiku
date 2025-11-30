@extends('admin.layouts.app')

@section('title', 'Edit Model: ' . $model->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Edit Model: {{ $model->name }}</h1>
        <p class="text-gray-400">Update the details of this car model.</p>
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

    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50 max-w-4xl">
        <form method="POST" action="{{ route('admin.models.update', $model->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-sm font-light text-gray-300 mb-2">Model Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $model->name) }}" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
                <div>
                    <label for="slug" class="block text-sm font-light text-gray-300 mb-2">Slug (URL-friendly) *</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $model->slug) }}" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-light text-gray-300 mb-2">Price (IDR) *</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $model->price) }}" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
                <div>
                    <label for="status" class="block text-sm font-light text-gray-300 mb-2">Status *</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        <option value="active" {{ old('status', $model->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $model->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div>
                    <label for="category" class="block text-sm font-light text-gray-300 mb-2">Category *</label>
                    <select id="category" name="category" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        <option value="sedan" {{ old('category', $model->category) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="suv" {{ old('category', $model->category) == 'suv' ? 'selected' : '' }}>SUV</option>
                        <option value="hatchback" {{ old('category', $model->category) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                        <option value="hybrid" {{ old('category', $model->category) == 'hybrid' ? 'selected' : '' }}>Hybrid/Electric</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="specifications_engine" class="block text-sm font-light text-gray-300 mb-2">Engine Specification</label>
                    <input type="text" id="specifications_engine" name="specifications[engine]" value="{{ old('specifications.engine', $model->specifications['engine'] ?? '') }}"
                        placeholder="e.g. 2.0L Turbo"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
                <div>
                    <label for="specifications_horsepower" class="block text-sm font-light text-gray-300 mb-2">Horsepower (HP)</label>
                    <input type="number" id="specifications_horsepower" name="specifications[horsepower]" value="{{ old('specifications.horsepower', $model->specifications['horsepower'] ?? '') }}"
                        placeholder="e.g. 250"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
                <div>
                    <label for="specifications_transmission" class="block text-sm font-light text-gray-300 mb-2">Transmission</label>
                    <select id="specifications_transmission" name="specifications[transmission]"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        <option value="manual" {{ old('specifications.transmission', $model->specifications['transmission'] ?? '') == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic" {{ old('specifications.transmission', $model->specifications['transmission'] ?? '') == 'automatic' ? 'selected' : '' }}>Automatic (CVT)</option>
                        <option value="automated_manual" {{ old('specifications.transmission', $model->specifications['transmission'] ?? '') == 'automated_manual' ? 'selected' : '' }}>Automated Manual</option>
                        <option value="dual_clutch" {{ old('specifications.transmission', $model->specifications['transmission'] ?? '') == 'dual_clutch' ? 'selected' : '' }}>Dual Clutch</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="specifications_fuel_type" class="block text-sm font-light text-gray-300 mb-2">Fuel Type</label>
                    <select id="specifications_fuel_type" name="specifications[fuel_type]"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        <option value="gasoline" {{ old('specifications.fuel_type', $model->specifications['fuel_type'] ?? '') == 'gasoline' ? 'selected' : '' }}>Gasoline</option>
                        <option value="diesel" {{ old('specifications.fuel_type', $model->specifications['fuel_type'] ?? '') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="hybrid" {{ old('specifications.fuel_type', $model->specifications['fuel_type'] ?? '') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="electric" {{ old('specifications.fuel_type', $model->specifications['fuel_type'] ?? '') == 'electric' ? 'selected' : '' }}>Electric</option>
                        <option value="plug_in_hybrid" {{ old('specifications.fuel_type', $model->specifications['fuel_type'] ?? '') == 'plug_in_hybrid' ? 'selected' : '' }}>Plug-in Hybrid</option>
                    </select>
                </div>
                <div>
                    <label for="specifications_seats" class="block text-sm font-light text-gray-300 mb-2">Seating Capacity</label>
                    <input type="number" id="specifications_seats" name="specifications[seats]" value="{{ old('specifications.seats', $model->specifications['seats'] ?? '') }}"
                        placeholder="e.g. 5"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>
                <div>
                    <label for="specifications_drivetrain" class="block text-sm font-light text-gray-300 mb-2">Drivetrain</label>
                    <select id="specifications_drivetrain" name="specifications[drivetrain]"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                        <option value="fwd" {{ old('specifications.drivetrain', $model->specifications['drivetrain'] ?? '') == 'fwd' ? 'selected' : '' }}>Front-Wheel Drive (FWD)</option>
                        <option value="rwd" {{ old('specifications.drivetrain', $model->specifications['drivetrain'] ?? '') == 'rwd' ? 'selected' : '' }}>Rear-Wheel Drive (RWD)</option>
                        <option value="awd" {{ old('specifications.drivetrain', $model->specifications['drivetrain'] ?? '') == 'awd' ? 'selected' : '' }}>All-Wheel Drive (AWD)</option>
                        <option value="4wd" {{ old('specifications.drivetrain', $model->specifications['drivetrain'] ?? '') == '4wd' ? 'selected' : '' }}>4WD</option>
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-light text-gray-300 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ old('description', $model->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-light text-gray-300 mb-2">Main Image (Current: {{ $model->image ? $model->image : 'None' }})</label>
                @if($model->image)
                    <div class="mb-2">
                        <img src="{{ asset('images/models/' . $model->image) }}" alt="{{ $model->name }}" class="w-32 h-24 object-cover rounded-lg border border-gray-700">
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current image.</p>
            </div>

            <div class="mb-6">
                <label for="additional_images" class="block text-sm font-light text-gray-300 mb-2">Additional Images (Current: {{ $model->additional_images ? count(json_decode($model->additional_images, true)) : 0 }})</label>
                @if($model->additional_images)
                    <div class="mb-2 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2">
                        @foreach(json_decode($model->additional_images, true) as $image)
                            <div class="relative">
                                <img src="{{ asset('images/models/' . $image) }}" alt="{{ $model->name }} - Additional" class="w-full h-16 object-cover rounded-lg border border-gray-700">
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="file" id="additional_images" name="additional_images[]" multiple accept="image/*"
                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current images. Max 5 new files.</p>
            </div>

            <div class="mb-6">
                <label for="badge_text" class="block text-sm font-light text-gray-300 mb-2">Badge Text (e.g. NEW, LUXURY, ECO)</label>
                <input type="text" id="badge_text" name="badge_text" value="{{ old('badge_text', $model->badge_text) }}" placeholder="e.g. NEW"
                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
            </div>

            <div class="mb-6">
                <label for="badge_color" class="block text-sm font-light text-gray-300 mb-2">Badge Color</label>
                <select id="badge_color" name="badge_color"
                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                    <option value="from-amber-500 to-orange-600" {{ old('badge_color', $model->badge_color) == 'from-amber-500 to-orange-600' ? 'selected' : '' }}>Amber to Orange</option>
                    <option value="from-green-500 to-emerald-600" {{ old('badge_color', $model->badge_color) == 'from-green-500 to-emerald-600' ? 'selected' : '' }}>Green to Emerald</option>
                    <option value="from-red-500 to-pink-600" {{ old('badge_color', $model->badge_color) == 'from-red-500 to-pink-600' ? 'selected' : '' }}>Red to Pink</option>
                    <option value="from-blue-500 to-indigo-600" {{ old('badge_color', $model->badge_color) == 'from-blue-500 to-indigo-600' ? 'selected' : '' }}>Blue to Indigo</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="flex-1 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                    Update Model
                </button>
                <a href="{{ route('admin.models.show', $model->id) }}"
                   class="flex-1 py-3 bg-gray-700/50 text-white rounded-xl font-light hover:bg-gray-600/50 transition-all duration-300 text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection