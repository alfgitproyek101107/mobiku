@extends('admin.layouts.app')

@section('title', 'Bookings Management')

@section('content')
<!-- Bookings Management - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Bookings Management</h1>
            <p class="text-gray-400">Manage all test drive bookings and customer requests</p>
        </div>

        <!-- Search & Filters -->
        <div class="mb-6 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
            <form method="GET" class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-64">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by customer name, email, or phone..."
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="min-w-48">
                    <select name="status" class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="min-w-48">
                    <input type="date" name="date_from" value="{{ request('date_from') }}"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="min-w-48">
                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                    <a href="{{ route('admin.bookings.index') }}" class="px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                </div>
            </form>
        </div>

        <!-- Add New Booking Button -->
        <div class="mb-6">
            <a href="{{ route('admin.bookings.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-green-500/20 transition-all">
                <i class="fas fa-plus mr-2"></i>Add New Booking
            </a>
        </div>

        <!-- Bookings Table -->
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-900/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Car Model</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Booking Date</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Time</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="text-white font-light">{{ $booking->customer_name }}</div>
                                        <div class="text-gray-400 text-sm">{{ $booking->customer_email }}</div>
                                        <div class="text-gray-400 text-sm">{{ $booking->customer_phone }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-white font-light">{{ $booking->car->name ?? 'N/A' }}</div>
                                <div class="text-gray-400 text-sm">{{ $booking->car->category ?? '' }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-500/10 border border-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-500/20 text-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : ($booking->status === 'completed' ? 'blue' : 'red')) }}-400 text-xs rounded-full capitalize">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.bookings.show', $booking) }}" class="px-3 py-1 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs rounded-lg hover:bg-blue-500/20 transition-colors">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </a>
                                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="px-3 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs rounded-lg hover:bg-amber-500/20 transition-colors">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-lg hover:bg-red-500/20 transition-colors">
                                            <i class="fas fa-trash mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-calendar-check text-4xl mb-4"></i>
                                <p>No bookings found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($bookings->hasPages())
            <div class="px-6 py-4 bg-gray-900/50 border-t border-gray-700/50">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
            @endif
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