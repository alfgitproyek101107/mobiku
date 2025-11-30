@extends('admin.layouts.app')

@section('title', 'Contact Messages Management')

@section('content')
<!-- Contact Messages Management - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Contact Messages Management</h1>
            <p class="text-gray-400">Manage all customer contact messages and inquiries</p>
        </div>

        <!-- Search & Filters -->
        <div class="mb-6 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
            <form method="GET" class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-64">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by name, email, subject, or message..."
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="min-w-48">
                    <select name="status" class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                        <option value="">All Status</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                    <a href="{{ route('admin.contact-messages.index') }}" class="px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                </div>
            </form>
        </div>

        <!-- Messages Table -->
        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-900/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Sender</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Subject</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        @forelse($contactMessages as $message)
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-{{ $message->status_icon }} text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="text-white font-light">{{ $message->name }}</div>
                                        <div class="text-gray-400 text-sm">{{ $message->email }}</div>
                                        <div class="text-gray-400 text-sm">{{ $message->phone }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-white font-light">{{ Str::limit($message->subject, 50) }}</div>
                                <div class="text-gray-400 text-sm">{{ Str::limit($message->message, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ $message->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-{{ $message->status_color }}-500/10 border border-{{ $message->status_color }}-500/20 text-{{ $message->status_color }}-400 text-xs rounded-full capitalize">
                                    {{ $message->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="px-3 py-1 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs rounded-lg hover:bg-blue-500/20 transition-colors">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </a>
                                    <a href="{{ route('admin.contact-messages.edit', $message) }}" class="px-3 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs rounded-lg hover:bg-amber-500/20 transition-colors">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-envelope text-4xl mb-4"></i>
                                <p>No contact messages found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($contactMessages->hasPages())
            <div class="px-6 py-4 bg-gray-900/50 border-t border-gray-700/50">
                {{ $contactMessages->appends(request()->query())->links() }}
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