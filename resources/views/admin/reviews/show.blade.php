@extends('admin.layouts.app')

@section('title', 'View Review')

@section('content')
<!-- View Review - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Review Details</h1>
            <p class="text-gray-400">Review #{{ $review->id }}</p>
        </div>

        <!-- Review Details -->
        <div class="max-w-4xl">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Review Card -->
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-light text-white">
                                        @if($review->user)
                                            {{ $review->user->name }}
                                        @else
                                            {{ $review->customer_name }}
                                        @endif
                                    </h3>
                                    <p class="text-gray-400">
                                        @if($review->user)
                                            {{ $review->user->email }}
                                        @else
                                            Custom Customer
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if($review->is_verified)
                                <span class="px-3 py-1 bg-green-500/10 border border-green-500/20 text-green-400 text-xs rounded-full">
                                    <i class="fas fa-check-circle mr-1"></i>Verified
                                </span>
                            @else
                                <span class="px-3 py-1 bg-gray-500/10 border border-gray-500/20 text-gray-400 text-xs rounded-full">
                                    Unverified
                                </span>
                            @endif
                        </div>

                        <!-- Rating -->
                        <div class="mb-6">
                            <div class="flex items-center space-x-2 mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-600' }}"></i>
                                @endfor
                                <span class="text-gray-400 ml-2">{{ $review->rating }}/5</span>
                            </div>
                        </div>

                        <!-- Comment -->
                        @if($review->comment)
                            <div class="mb-6">
                                <h4 class="text-lg font-light text-white mb-3">Review Comment</h4>
                                <div class="bg-gray-900/50 rounded-xl p-4">
                                    <p class="text-gray-300 leading-relaxed">{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Car Information -->
                        <div class="mb-6">
                            <h4 class="text-lg font-light text-white mb-3">Reviewed Car</h4>
                            <div class="bg-gray-900/50 rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-car text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="text-white font-light">{{ $review->car->name }}</h5>
                                        <p class="text-gray-400">{{ ucfirst($review->car->category) }}</p>
                                        <p class="text-amber-400 font-light">Rp {{ number_format($review->car->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Information -->
                        @if($review->booking)
                            <div class="mb-6">
                                <h4 class="text-lg font-light text-white mb-3">Related Booking</h4>
                                <div class="bg-gray-900/50 rounded-xl p-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-calendar-check text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-white font-light">Booking #{{ $review->booking->id }}</p>
                                            <p class="text-gray-400">{{ $review->booking->status }}</p>
                                            <p class="text-gray-400">{{ $review->booking->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Timestamps -->
                        <div class="border-t border-gray-700/50 pt-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-400">Created:</span>
                                    <span class="text-white ml-2">{{ $review->created_at->format('M d, Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400">Last Updated:</span>
                                    <span class="text-white ml-2">{{ $review->updated_at->format('M d, Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Actions -->
                <div class="space-y-6">
                    <!-- Actions -->
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                        <h4 class="text-lg font-light text-white mb-4">Actions</h4>
                        <div class="space-y-3">
                            <a href="{{ route('admin.reviews.edit', $review) }}" class="w-full flex items-center justify-center px-4 py-3 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-xl font-light hover:bg-amber-500/20 transition-colors">
                                <i class="fas fa-edit mr-2"></i>Edit Review
                            </a>
                            <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('Are you sure you want to delete this review?')" class="w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center px-4 py-3 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl font-light hover:bg-red-500/20 transition-colors">
                                    <i class="fas fa-trash mr-2"></i>Delete Review
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Back to List -->
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                        <a href="{{ route('admin.reviews.index') }}" class="w-full flex items-center justify-center px-4 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Reviews
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection