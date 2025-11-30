@extends('admin.layouts.app')

@section('title', 'Create New Booking')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Create New Booking</h1>
        <p class="text-gray-400">Schedule a test drive booking for a customer.</p>
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

    <form method="POST" action="{{ route('admin.bookings.store') }}" class="max-w-4xl mx-auto">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Customer Information -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                <h3 class="text-xl font-light text-white mb-6 flex items-center">
                    <i class="fas fa-user text-amber-400 mr-3"></i>
                    Customer Information
                </h3>

                <div class="space-y-6">
                    <!-- User Selection (Optional) -->
                    <div>
                        <label for="user_id" class="block text-sm font-light text-gray-300 mb-2">
                            Registered User (Optional)
                        </label>
                        <select id="user_id" name="user_id"
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                            <option value="">Select registered user...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-400 mt-1">Leave empty for guest booking</p>
                    </div>

                    <!-- Customer Name -->
                    <div>
                        <label for="customer_name" class="block text-sm font-light text-gray-300 mb-2">Customer Name *</label>
                        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                    </div>

                    <!-- Customer Phone -->
                    <div>
                        <label for="customer_phone" class="block text-sm font-light text-gray-300 mb-2">Phone Number *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                    </div>

                    <!-- Customer Email -->
                    <div>
                        <label for="customer_email" class="block text-sm font-light text-gray-300 mb-2">Email Address *</label>
                        <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
                <h3 class="text-xl font-light text-white mb-6 flex items-center">
                    <i class="fas fa-calendar-check text-amber-400 mr-3"></i>
                    Booking Details
                </h3>

                <div class="space-y-6">
                    <!-- Car Selection -->
                    <div>
                        <label for="car_id" class="block text-sm font-light text-gray-300 mb-2">Select Car Model *</label>
                        <select id="car_id" name="car_id" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                            <option value="">Choose a car model...</option>
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                    {{ $car->name }} - {{ $car->category }} ({{ number_format($car->price, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Booking Date -->
                    <div>
                        <label for="booking_date" class="block text-sm font-light text-gray-300 mb-2">Test Drive Date *</label>
                        <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                    </div>

                    <!-- Booking Time -->
                    <div>
                        <label for="booking_time" class="block text-sm font-light text-gray-300 mb-2">Test Drive Time *</label>
                        <select id="booking_time" name="booking_time" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                            <option value="">Select time...</option>
                            @for($hour = 9; $hour <= 17; $hour++)
                                @for($minute = 0; $minute < 60; $minute += 30)
                                    @php
                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                        $displayTime = date('g:i A', strtotime($time));
                                    @endphp
                                    <option value="{{ $time }}" {{ old('booking_time') == $time ? 'selected' : '' }}>
                                        {{ $displayTime }}
                                    </option>
                                @endfor
                            @endfor
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-light text-gray-300 mb-2">Booking Status *</label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-light text-gray-300 mb-2">Additional Notes</label>
                        <textarea id="notes" name="notes" rows="4"
                            class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.bookings.index') }}"
                class="px-6 py-3 bg-gray-700/50 text-white rounded-xl font-light hover:bg-gray-600/50 transition-all">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>

            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                <i class="fas fa-calendar-plus mr-2"></i>Create Booking
            </button>
        </div>
    </form>
</div>

<script>
// Auto-fill customer details when user is selected
document.getElementById('user_id').addEventListener('change', function() {
    const userId = this.value;
    if (userId) {
        // In a real application, you might fetch user details via AJAX
        // For now, we'll just clear the fields to indicate they should be filled
        console.log('User selected:', userId);
    }
});

// Set minimum date to tomorrow
document.getElementById('booking_date').min = new Date(Date.now() + 24 * 60 * 60 * 1000).toISOString().split('T')[0];
</script>
@endsection
