@extends('admin.layouts.app')

@section('title', 'Edit Page Content')

@section('content')
<!-- Edit Page Content - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Edit Page Content</h1>
            <p class="text-gray-400">Content Key: <span class="text-amber-400 font-mono">{{ $content->content_key }}</span></p>
        </div>

        <!-- Form -->
        <div class="max-w-4xl">
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

                <form method="POST" action="{{ route('admin.page-contents.update', $content) }}">
                    @csrf
                    @method('PUT')

                    <!-- Content Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-4">Content Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="page" class="block text-sm font-light text-gray-300 mb-2">Page *</label>
                                <select id="page" name="page" required
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="">Select Page</option>
                                    <option value="home" {{ old('page', $content->page) == 'home' ? 'selected' : '' }}>Home</option>
                                    <option value="about" {{ old('page', $content->page) == 'about' ? 'selected' : '' }}>About</option>
                                    <option value="contact" {{ old('page', $content->page) == 'contact' ? 'selected' : '' }}>Contact</option>
                                    <option value="models" {{ old('page', $content->page) == 'models' ? 'selected' : '' }}>Models</option>
                                    <option value="gallery" {{ old('page', $content->page) == 'gallery' ? 'selected' : '' }}>Gallery</option>
                                    <option value="faq" {{ old('page', $content->page) == 'faq' ? 'selected' : '' }}>FAQ</option>
                                    <option value="testimonials" {{ old('page', $content->page) == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                                </select>
                            </div>

                            <div>
                                <label for="section" class="block text-sm font-light text-gray-300 mb-2">Section *</label>
                                <input type="text" id="section" name="section" value="{{ old('section', $content->section) }}" required
                                    placeholder="e.g., hero, features, testimonials"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>

                            <div class="md:col-span-2">
                                <label for="content_key" class="block text-sm font-light text-gray-300 mb-2">Content Key *</label>
                                <input type="text" id="content_key" name="content_key" value="{{ old('content_key', $content->content_key) }}" required
                                    placeholder="e.g., home_hero_title, about_mission_text"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition font-mono">
                                <p class="text-xs text-gray-400 mt-1">Unique identifier for this content block</p>
                            </div>

                            <div>
                                <label for="content_type" class="block text-sm font-light text-gray-300 mb-2">Content Type *</label>
                                <select id="content_type" name="content_type" required
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="text" {{ old('content_type', $content->content_type) == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="html" {{ old('content_type', $content->content_type) == 'html' ? 'selected' : '' }}>HTML</option>
                                    <option value="markdown" {{ old('content_type', $content->content_type) == 'markdown' ? 'selected' : '' }}>Markdown</option>
                                </select>
                            </div>

                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $content->is_active) ? 'checked' : '' }}
                                    class="w-5 h-5 bg-gray-900/70 border border-gray-700 rounded focus:ring-amber-500/50 focus:border-amber-500/50">
                                <label for="is_active" class="text-sm font-light text-gray-300 cursor-pointer">Active Content</label>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-4">Content</h3>
                        <div>
                            <label for="content" class="block text-sm font-light text-gray-300 mb-2">Content Text *</label>
                            <textarea id="content" name="content" rows="8" required
                                class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition"
                                placeholder="Enter the content text here...">{{ old('content', $content->content) }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">
                                <span id="content-count">0</span> characters
                                @if((old('content_type', $content->content_type)) === 'html')
                                    - HTML tags are allowed
                                @elseif((old('content_type', $content->content_type)) === 'markdown')
                                    - Markdown formatting supported
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.page-contents.show', $content) }}" class="px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                            View
                        </a>
                        <a href="{{ route('admin.page-contents.index') }}" class="px-6 py-3 bg-gray-700/50 text-gray-300 rounded-xl font-light hover:bg-gray-700 hover:text-white transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                            Update Content Block
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Character counter for content
document.getElementById('content').addEventListener('input', function() {
    document.getElementById('content-count').textContent = this.value.length;
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('content-count').textContent = document.getElementById('content').value.length;
});
</script>
@endsection