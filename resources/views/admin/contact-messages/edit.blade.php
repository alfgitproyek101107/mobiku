@extends('admin.layouts.app')

@section('title', 'Edit Contact Message')

@section('content')
<!-- Edit Contact Message - Premium Design -->
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit Contact Message</h1>
            <p class="text-gray-400">Update status and add notes for message from {{ $contactMessage->name }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.contact-messages.show', $contactMessage) }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-eye mr-2"></i>View Message
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Back to Messages
            </a>
        </div>
    </div>

    <!-- Message Preview -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold text-white mb-4">Message Preview</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-400">From</label>
                <p class="text-white">{{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400">Subject</label>
                <p class="text-white">{{ $contactMessage->subject }}</p>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Message</label>
            <div class="bg-gray-700 rounded-lg p-4">
                <p class="text-gray-200 whitespace-pre-line">{{ Str::limit($contactMessage->message, 200) }}</p>
                @if(strlen($contactMessage->message) > 200)
                <p class="text-gray-400 text-sm mt-2">... (view full message for complete content)</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold text-white mb-6">Update Message Status</h3>

        <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-200 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/50 transition">
                        <option value="unread" {{ $contactMessage->status == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ $contactMessage->status == 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $contactMessage->status == 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ $contactMessage->status == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    <p class="text-gray-400 text-sm mt-1">Update the status of this message</p>
                </div>

                <!-- Current Status Display -->
                <div>
                    <label class="block text-sm font-medium text-gray-200 mb-2">Current Status</label>
                    <div class="flex items-center">
                        <span class="px-3 py-1 bg-{{ $contactMessage->status_color }}-500/20 text-{{ $contactMessage->status_color }}-400 text-sm rounded-full capitalize">
                            {{ $contactMessage->status }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="mt-6">
                <label for="admin_notes" class="block text-sm font-medium text-gray-200 mb-2">Admin Notes</label>
                <textarea
                    id="admin_notes"
                    name="admin_notes"
                    rows="4"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/50 transition"
                    placeholder="Add internal notes about this message (optional)"
                >{{ old('admin_notes', $contactMessage->admin_notes) }}</textarea>
                <p class="text-gray-400 text-sm mt-1">Internal notes for admin reference only</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 mt-8">
                <a href="{{ route('admin.contact-messages.show', $contactMessage) }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Update Message
                </button>
            </div>
        </form>
    </div>

    <!-- Quick Status Actions -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold text-white mb-4">Quick Status Updates</h3>
        <p class="text-gray-400 mb-6">Or use these quick actions to update status without notes:</p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            @if($contactMessage->status !== 'read')
            <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="read">
                <button type="submit" class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                    <i class="fas fa-envelope-open mr-1"></i>Mark Read
                </button>
            </form>
            @endif

            @if($contactMessage->status !== 'replied')
            <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="replied">
                <button type="submit" class="w-full px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm">
                    <i class="fas fa-reply mr-1"></i>Mark Replied
                </button>
            </form>
            @endif

            @if($contactMessage->status !== 'archived')
            <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="archived">
                <button type="submit" class="w-full px-4 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors text-sm">
                    <i class="fas fa-archive mr-1"></i>Archive
                </button>
            </form>
            @endif

            <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="unread">
                <button type="submit" class="w-full px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm">
                    <i class="fas fa-envelope mr-1"></i>Mark Unread
                </button>
            </form>
        </div>
    </div>
</div>
@endsection