@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-900/30 border border-green-700/50 text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Dashboard</h1>
        <p class="text-gray-400">Welcome back, {{ session('admin_user_name') }}. Here's what's happening with your store today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Models Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
            <div class="relative p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-car text-white"></i>
                    </div>
                    <span class="text-sm text-gray-400 font-light">+12% from last month</span>
                </div>
                <h3 class="text-lg font-light text-gray-400 mb-1">Total Models</h3>
                <p class="text-3xl font-light text-white mb-4">{{ $totalModels }}</p>
                <div class="h-12 flex items-end space-x-1">
                    @for($i = 0; $i < 7; $i++)
                        <div class="w-4 h-{{ rand(4, 12) }} bg-blue-500/30 rounded-t"></div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Total Bookings Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
            <div class="relative p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-check text-white"></i>
                    </div>
                    <span class="text-sm text-gray-400 font-light">+15% from last month</span>
                </div>
                <h3 class="text-lg font-light text-gray-400 mb-1">Total Test Drives</h3>
                <p class="text-3xl font-light text-white mb-4">{{ $totalBookings }}</p>
                <div class="h-12 flex items-end space-x-1">
                    @for($i = 0; $i < 7; $i++)
                        <div class="w-4 h-{{ rand(4, 12) }} bg-purple-500/30 rounded-t"></div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
            <div class="relative p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <span class="text-sm text-gray-400 font-light">+8% from last month</span>
                </div>
                <h3 class="text-lg font-light text-gray-400 mb-1">Total Users</h3>
                <p class="text-3xl font-light text-white mb-4">{{ \App\Models\User::count() }}</p>
                <div class="h-12 flex items-end space-x-1">
                    @for($i = 0; $i < 7; $i++)
                        <div class="w-4 h-{{ rand(3, 10) }} bg-green-500/30 rounded-t"></div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Total Contact Messages Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden border border-gray-700/50 hover:border-amber-500/30 transition-all duration-500 hover:shadow-2xl hover:shadow-amber-500/10">
            <div class="relative p-6 z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-envelope text-white"></i>
                    </div>
                    <span class="text-sm text-gray-400 font-light">+25% from last month</span>
                </div>
                <h3 class="text-lg font-light text-gray-400 mb-1">Contact Messages</h3>
                <p class="text-3xl font-light text-white mb-4">{{ $totalContactMessages }}</p>
                <div class="h-12 flex items-end space-x-1">
                    @for($i = 0; $i < 7; $i++)
                        <div class="w-4 h-{{ rand(1, 8) }} bg-teal-500/30 rounded-t"></div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Test Drives -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
            <h3 class="text-xl font-light text-white mb-6">Recent Test Drives</h3>
            <div class="space-y-4">
                @forelse($recentBookings as $booking)
                <div class="flex items-start p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-calendar-check text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-light">Test drive booked: <span class="text-amber-400">{{ $booking->car->name }}</span> by <span class="text-amber-400">{{ $booking->customer_name }}</span></p>
                        <p class="text-gray-400 text-sm">{{ $booking->booking_date }} at {{ $booking->booking_time }} • <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 text-green-400 text-xs rounded-full">{{ ucfirst($booking->status) }}</span></p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-calendar-check text-4xl mb-4"></i>
                    <p>No recent bookings found.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
            <h3 class="text-xl font-light text-white mb-6">Recent Messages</h3>
            <div class="space-y-4">
                @forelse($recentContactMessages as $message)
                <div class="flex items-start p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-envelope text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-light">Message from: <span class="text-amber-400">{{ $message->name }}</span></p>
                        <p class="text-gray-400 text-sm">{{ \Illuminate\Support\Str::limit($message->subject, 30) }} • <span class="px-2 py-1 bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-full">{{ ucfirst($message->status) }}</span></p>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-400">
                    <i class="fas fa-envelope text-4xl mb-4"></i>
                    <p>No recent messages found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
        <h3 class="text-xl font-light text-white mb-6">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.models.create') }}" class="flex items-center p-3 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-white text-sm"></i>
                </div>
                <span class="text-white font-light">Add New Model</span>
            </a>
            <a href="{{ route('admin.models.index') }}" class="flex items-center p-3 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3">
                    <i class="fas fa-car text-white text-sm"></i>
                </div>
                <span class="text-white font-light">Manage Models</span>
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="flex items-center p-3 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-3">
                    <i class="fas fa-calendar-check text-white text-sm"></i>
                </div>
                <span class="text-white font-light">Manage Test Drives</span>
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center p-3 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mr-3">
                    <i class="fas fa-envelope text-white text-sm"></i>
                </div>
                <span class="text-white font-light">Manage Messages</span>
            </a>
        </div>
    </div>
</div>
@endsection