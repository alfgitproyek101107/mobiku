@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
<!-- User Details - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-light text-white mb-2">User Details</h1>
                    <p class="text-gray-400">View complete user information and activity</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.users.edit', $user) }}" class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-lg font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                        <i class="fas fa-edit mr-2"></i>Edit User
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-700/50 text-gray-300 rounded-lg font-light hover:bg-gray-700 hover:text-white transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- User Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-{{ $user->role === 'admin' ? 'red' : ($user->role === 'editor' ? 'blue' : ($user->role === 'viewer' ? 'gray' : 'green')) }}-500 to-{{ $user->role === 'admin' ? 'pink' : ($user->role === 'editor' ? 'indigo' : ($user->role === 'viewer' ? 'slate' : 'emerald')) }}-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <h2 class="text-xl font-light text-white mb-1">{{ $user->name }}</h2>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Role</span>
                            <p class="text-white font-light">
                                <span class="px-2 py-1 bg-{{ $user->role === 'admin' ? 'red' : ($user->role === 'editor' ? 'blue' : ($user->role === 'viewer' ? 'gray' : 'green')) }}-500/10 border border-{{ $user->role === 'admin' ? 'red' : ($user->role === 'editor' ? 'blue' : ($user->role === 'viewer' ? 'gray' : 'green')) }}-500/20 text-{{ $user->role === 'admin' ? 'red' : ($user->role === 'editor' ? 'blue' : ($user->role === 'viewer' ? 'gray' : 'green')) }}-400 text-xs rounded-full capitalize">
                                    {{ $user->role }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Status</span>
                            <p class="text-white font-light">
                                <span class="px-2 py-1 bg-{{ $user->status === 'active' ? 'green' : ($user->status === 'inactive' ? 'yellow' : 'red') }}-500/10 border border-{{ $user->status === 'active' ? 'green' : ($user->status === 'inactive' ? 'yellow' : 'red') }}-500/20 text-{{ $user->status === 'active' ? 'green' : ($user->status === 'inactive' ? 'yellow' : 'red') }}-400 text-xs rounded-full capitalize">
                                    {{ $user->status }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Joined</span>
                            <p class="text-white font-light">{{ $user->created_at->format('M d, Y') }}</p>
                        </div>

                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Phone</span>
                            <p class="text-white font-light">{{ $user->phone ?: '-' }}</p>
                        </div>

                        <div>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Address</span>
                            <p class="text-white font-light">{{ $user->address ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Activity -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Bookings -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                    <h3 class="text-lg font-light text-white mb-4">Recent Bookings ({{ $user->bookings->count() }})</h3>

                    @if($user->bookings->count() > 0)
                        <div class="space-y-3">
                            @foreach($user->bookings->take(5) as $booking)
                            <div class="flex items-center justify-between p-4 bg-gray-700/30 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-calendar-check text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-white font-light">{{ $booking->car->name }}</p>
                                        <p class="text-gray-400 text-sm">{{ $booking->booking_date }} at {{ $booking->booking_time }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-500/10 border border-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-500/20 text-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-400 text-xs rounded-full capitalize">
                                    {{ $booking->status }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-400">
                            <i class="fas fa-calendar-check text-4xl mb-4"></i>
                            <p>No bookings found for this user.</p>
                        </div>
                    @endif
                </div>

                <!-- Wishlist -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                    <h3 class="text-lg font-light text-white mb-4">Wishlist ({{ $user->wishlists->count() }})</h3>

                    @if($user->wishlists->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($user->wishlists->take(6) as $wishlist)
                            <div class="flex items-center space-x-3 p-3 bg-gray-700/30 rounded-xl">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-heart text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-white font-light text-sm">{{ $wishlist->car->name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $wishlist->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-400">
                            <i class="fas fa-heart text-4xl mb-4"></i>
                            <p>No items in wishlist.</p>
                        </div>
                    @endif
                </div>

                <!-- Reviews -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                    <h3 class="text-lg font-light text-white mb-4">Reviews ({{ $user->reviews->count() }})</h3>

                    @if($user->reviews->count() > 0)
                        <div class="space-y-3">
                            @foreach($user->reviews->take(3) as $review)
                            <div class="p-4 bg-gray-700/30 rounded-xl">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-white font-light">{{ $review->car->name }}</span>
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star text-xs {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="px-2 py-1 bg-{{ $review->is_verified ? 'green' : 'gray' }}-500/10 border border-{{ $review->is_verified ? 'green' : 'gray' }}-500/20 text-{{ $review->is_verified ? 'green' : 'gray' }}-400 text-xs rounded-full">
                                        {{ $review->is_verified ? 'Verified' : 'Unverified' }}
                                    </span>
                                </div>
                                @if($review->comment)
                                    <p class="text-gray-300 text-sm">{{ Str::limit($review->comment, 100) }}</p>
                                @endif
                                <p class="text-gray-400 text-xs mt-2">{{ $review->created_at->format('M d, Y') }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-400">
                            <i class="fas fa-star text-4xl mb-4"></i>
                            <p>No reviews from this user.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-grid-16 {
    background-size: 16px 16px;
    background-image:
        linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
}
</style>
@endsection