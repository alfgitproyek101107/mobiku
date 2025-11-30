@extends('admin.layouts.app')

@section('title', 'Test Drives')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Test Drive Bookings</h1>
        <p class="text-gray-400">Manage all test drive bookings from customers.</p>
    </div>

    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-light text-white">All Bookings</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-gray-300">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="py-3 px-4 text-left">Booking Number</th>
                        <th class="py-3 px-4 text-left">Customer</th>
                        <th class="py-3 px-4 text-left">Model</th>
                        <th class="py-3 px-4 text-left">Date & Time</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr class="border-b border-gray-700/50 hover:bg-gray-700/30 transition-colors">
                        <td class="py-3 px-4">{{ $booking->booking_number }}</td>
                        <td class="py-3 px-4">
                            <div>{{ $booking->customer_name }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->customer_phone }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->customer_email }}</div>
                        </td>
                        <td class="py-3 px-4">{{ $booking->car->name }}</td>
                        <td class="py-3 px-4">{{ $booking->booking_date }} at {{ $booking->booking_time }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : 'red') }}-500/10 border border-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : 'red') }}-500/20 text-{{ $booking->status === 'confirmed' ? 'green' : ($booking->status === 'pending' ? 'yellow' : 'red') }}-400 text-xs rounded-full">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="#" class="text-amber-400 hover:text-amber-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-blue-400 hover:text-blue-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-400">No bookings found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection