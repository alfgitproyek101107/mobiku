@extends('admin.layouts.app')

@section('title', 'View Contact Message')

@section('content')
<!-- View Contact Message - Premium Design -->
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">View Contact Message</h1>
            <p class="text-gray-400">Message from {{ $contactMessage->name }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Back to Messages
            </a>
            <a href="{{ route('admin.contact-messages.edit', $contactMessage) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>Update Status
            </a>
        </div>
    </div>

    <!-- Message Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Message Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Message Card -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-{{ $contactMessage->status_icon }} text-white text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-white">{{ $contactMessage->subject }}</h3>
                        <p class="text-gray-400">From {{ $contactMessage->name }} • {{ $contactMessage->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 bg-{{ $contactMessage->status_color }}-500/20 text-{{ $contactMessage->status_color }}-400 text-sm rounded-full capitalize">
                        {{ $contactMessage->status }}
                    </span>
                </div>

                <div class="prose prose-invert max-w-none">
                    <p class="text-gray-200 leading-relaxed whitespace-pre-line">{{ $contactMessage->message }}</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-4">Contact Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-400">Name</label>
                        <p class="text-white">{{ $contactMessage->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400">Email</label>
                        <p class="text-white">
                            <a href="mailto:{{ $contactMessage->email }}" class="text-blue-400 hover:text-blue-300">{{ $contactMessage->email }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400">Phone</label>
                        <p class="text-white">
                            <a href="tel:{{ $contactMessage->phone }}" class="text-green-400 hover:text-green-300">{{ $contactMessage->phone }}</a>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400">Subject</label>
                        <p class="text-white">{{ $contactMessage->subject }}</p>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-700">
                    <div class="flex items-center space-x-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-400">Newsletter Subscription</label>
                            <p class="text-white">{{ $contactMessage->newsletter ? 'Yes' : 'No' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400">Privacy Policy Agreed</label>
                            <p class="text-white">{{ $contactMessage->privacy_agreed ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status & Actions Sidebar -->
        <div class="space-y-6">
            <!-- Quick Status Update -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-4">Quick Actions</h4>
                <div class="space-y-3">
                    @if($contactMessage->status !== 'read')
                    <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="read">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-envelope-open mr-2"></i>Mark as Read
                        </button>
                    </form>
                    @endif

                    @if($contactMessage->status !== 'replied')
                    <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="replied">
                        <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-reply mr-2"></i>Mark as Replied
                        </button>
                    </form>
                    @endif

                    @if($contactMessage->status !== 'archived')
                    <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="archived">
                        <button type="submit" class="w-full px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                            <i class="fas fa-archive mr-2"></i>Archive
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <!-- Admin Notes -->
            @if($contactMessage->admin_notes)
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-4">Admin Notes</h4>
                <p class="text-gray-200 whitespace-pre-line">{{ $contactMessage->admin_notes }}</p>
            </div>
            @endif

            <!-- Timestamps -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-4">Timeline</h4>
                <div class="space-y-2 text-sm">
                    <div>
                        <span class="text-gray-400">Created:</span>
                        <span class="text-white">{{ $contactMessage->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400">Last Updated:</span>
                        <span class="text-white">{{ $contactMessage->updated_at->format('M d, Y H:i') }}</span>
                    </div>
                    @if($contactMessage->replied_at)
                    <div>
                        <span class="text-gray-400">Replied:</span>
                        <span class="text-white">{{ $contactMessage->replied_at->format('M d, Y H:i') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Delete Action -->
            <div class="bg-red-900/20 rounded-lg p-6 border border-red-700/50">
                <h4 class="text-lg font-semibold text-white mb-4">Danger Zone</h4>
                <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-trash mr-2"></i>Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection