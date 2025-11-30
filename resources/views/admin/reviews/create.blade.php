@extends('admin.layouts.app')

@section('title', 'Create Review')

@section('content')
<!-- Create Review - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Create New Review</h1>
            <p class="text-gray-400">Add a customer review for a car model</p>
        </div>

        <!-- Form -->
        <div class="max-w-2xl">
            <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-900/30 border border-red-700 rounded-lg">
                        <ul class="text-red-300 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.reviews.store') }}">
                    @csrf

                    <!-- Review Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-4">Review Information</h3>
                        <div class="space-y-6">
                            <!-- Customer Type Selection -->
                            <div>
                                <label class="block text-sm font-light text-gray-300 mb-3">Customer Type *</label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="customer_type" value="existing" {{ old('customer_type', 'existing') == 'existing' ? 'checked' : '' }}
                                            class="w-4 h-4 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                                        <span class="text-sm text-gray-300">Existing User</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="customer_type" value="custom" {{ old('customer_type') == 'custom' ? 'checked' : '' }}
                                            class="w-4 h-4 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                                        <span class="text-sm text-gray-300">Custom Customer</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Existing User Selection -->
                            <div id="existing-user-section" class="customer-section">
                                <label for="user_id" class="block text-sm font-light text-gray-300 mb-2">Select Existing User *</label>
                                <select id="user_id" name="user_id"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Custom Customer Name -->
                            <div id="custom-customer-section" class="customer-section hidden">
                                <label for="customer_name" class="block text-sm font-light text-gray-300 mb-2">Customer Name *</label>
                                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" placeholder="Enter customer name"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>

                            <div>
                                <label for="car_id" class="block text-sm font-light text-gray-300 mb-2">Car Model *</label>
                                <select id="car_id" name="car_id" required
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="">Select Car Model</option>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                            {{ $car->name }} - {{ $car->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="booking_id" class="block text-sm font-light text-gray-300 mb-2">Related Booking (Optional)</label>
                                <select id="booking_id" name="booking_id"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="">Select Booking (Optional)</option>
                                    @foreach($bookings as $booking)
                                        <option value="{{ $booking->id }}" {{ old('booking_id') == $booking->id ? 'selected' : '' }}>
                                            Booking #{{ $booking->id }} - {{ $booking->car->name ?? 'Unknown Car' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-light text-gray-300 mb-2">Rating *</label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button" class="star-btn text-2xl {{ old('rating', 0) >= $i ? 'text-amber-400' : 'text-gray-600' }}" data-rating="{{ $i }}">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        @endfor
                                    </div>
                                    <span class="text-gray-400" id="rating-display">{{ old('rating', 0) }}/5</span>
                                    <input type="hidden" id="rating" name="rating" value="{{ old('rating', 0) }}" required>
                                </div>
                            </div>

                            <div>
                                <label for="comment" class="block text-sm font-light text-gray-300 mb-2">Review Comment</label>
                                <textarea id="comment" name="comment" rows="4" maxlength="1000"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ old('comment') }}</textarea>
                                <div class="text-xs text-gray-400 mt-1"><span id="comment-count">0</span>/1000 characters</div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="is_verified" name="is_verified" value="1" {{ old('is_verified') ? 'checked' : '' }}
                                    class="w-5 h-5 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                                <label for="is_verified" class="text-sm font-light text-gray-300 cursor-pointer">Mark as Verified Review</label>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.reviews.index') }}" class="px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-green-500/20 transition-all">
                            Create Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Character counter for comment
document.getElementById('comment').addEventListener('input', function() {
    document.getElementById('comment-count').textContent = this.value.length;
});

// Star rating system
document.querySelectorAll('.star-btn').forEach((btn, index) => {
    btn.addEventListener('click', function() {
        const rating = parseInt(this.dataset.rating);
        document.getElementById('rating').value = rating;
        document.getElementById('rating-display').textContent = rating + '/5';

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

// Customer type toggle
document.querySelectorAll('input[name="customer_type"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        const customerType = this.value;
        const existingUserSection = document.getElementById('existing-user-section');
        const customCustomerSection = document.getElementById('custom-customer-section');
        const userIdField = document.getElementById('user_id');
        const customerNameField = document.getElementById('customer_name');

        if (customerType === 'existing') {
            existingUserSection.classList.remove('hidden');
            customCustomerSection.classList.add('hidden');
            userIdField.setAttribute('required', 'required');
            customerNameField.removeAttribute('required');
            customerNameField.value = '';
        } else {
            existingUserSection.classList.add('hidden');
            customCustomerSection.classList.remove('hidden');
            userIdField.removeAttribute('required');
            customerNameField.setAttribute('required', 'required');
            userIdField.value = '';
        }
    });
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set initial comment count
    document.getElementById('comment-count').textContent = document.getElementById('comment').value.length;

    // Set initial customer type
    const initialCustomerType = document.querySelector('input[name="customer_type"]:checked').value;
    if (initialCustomerType === 'custom') {
        document.getElementById('existing-user-section').classList.add('hidden');
        document.getElementById('custom-customer-section').classList.remove('hidden');
        document.getElementById('user_id').removeAttribute('required');
        document.getElementById('customer_name').setAttribute('required', 'required');
    }
});
</script>
@endsection