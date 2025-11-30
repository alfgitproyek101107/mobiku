@extends('admin.layouts.app')

@section('title', 'Page Content Management')

@section('content')
<!-- Page Content Management - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Page Content Management</h1>
            <p class="text-gray-400">Edit text content across all pages and sections</p>
        </div>

        <!-- Page Selector -->
        <div class="mb-6 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
            <div class="text-center">
                <h3 class="text-lg font-light text-white mb-4">Select Page to Edit</h3>
                <div class="flex flex-wrap justify-center gap-4">
                    @php
                        $availablePages = ['home', 'about', 'contact', 'models', 'gallery', 'faq', 'testimonials'];
                    @endphp
                    @foreach($availablePages as $pageOption)
                        <a href="{{ route('admin.page-contents.index', ['page' => $pageOption]) }}"
                           class="px-6 py-3 rounded-xl font-light transition-all {{ request('page') == $pageOption ? 'bg-amber-500/20 border border-amber-500/30 text-amber-400' : 'bg-gray-700/50 text-gray-300 hover:bg-gray-600/50 hover:text-white' }}">
                            <i class="fas fa-{{ $pageOption == 'home' ? 'home' : ($pageOption == 'about' ? 'info-circle' : ($pageOption == 'contact' ? 'envelope' : ($pageOption == 'models' ? 'car' : ($pageOption == 'gallery' ? 'images' : ($pageOption == 'faq' ? 'question-circle' : 'star'))))) }} mr-2"></i>
                            {{ ucfirst($pageOption) }}
                        </a>
                    @endforeach
                </div>
                @if(request('page'))
                    <div class="mt-4">
                        <span class="text-amber-400 font-light">Currently editing: <strong>{{ ucfirst(request('page')) }}</strong></span>
                        <a href="{{ route('admin.page-contents.index') }}" class="ml-4 text-gray-400 hover:text-white">
                            <i class="fas fa-times mr-1"></i>Clear selection
                        </a>
                    </div>
                @endif
            </div>
        </div>

        @if(request('page'))
            <!-- Page Sections -->
            <div class="space-y-8">
                @php
                    $currentPage = request('page');
                    $pageContents = $contents->where('page', $currentPage)->groupBy('section');
                    $pageSections = [
                        'home' => ['hero', 'features', 'collection', 'testimonials', 'cta'],
                        'about' => ['hero', 'mission', 'team', 'values'],
                        'contact' => ['hero', 'info', 'form'],
                        'models' => ['hero', 'filters'],
                        'gallery' => ['hero'],
                        'faq' => ['hero'],
                        'testimonials' => ['hero']
                    ];
                @endphp

                @foreach($pageSections[$currentPage] ?? [] as $section)
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-light text-white">
                                <i class="fas fa-{{ $section == 'hero' ? 'star' : ($section == 'features' ? 'cogs' : ($section == 'collection' ? 'car' : ($section == 'testimonials' ? 'comments' : ($section == 'cta' ? 'bullhorn' : 'circle')))) }} text-amber-400 mr-3"></i>
                                {{ ucfirst($section) }} Section
                            </h3>
                            <a href="{{ route('admin.page-contents.create') }}?page={{ $currentPage }}&section={{ $section }}"
                               class="px-4 py-2 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-lg hover:bg-amber-500/20 transition-colors text-sm">
                                <i class="fas fa-plus mr-2"></i>Add Content
                            </a>
                        </div>

                        @php
                            $sectionContents = $pageContents[$section] ?? collect();
                        @endphp

                        @if($sectionContents->count() > 0)
                            <div class="space-y-4">
                                @foreach($sectionContents as $content)
                                    <div class="bg-gray-900/50 rounded-xl p-4 border border-gray-700/30">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    <span class="text-amber-400 font-mono text-sm">{{ $content->content_key }}</span>
                                                    <span class="px-2 py-1 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs rounded-full">
                                                        {{ ucfirst($content->content_type) }}
                                                    </span>
                                                    <span class="px-2 py-1 {{ $content->is_active ? 'bg-green-500/10 border border-green-500/20 text-green-400' : 'bg-red-500/10 border border-red-500/20 text-red-400' }} text-xs rounded-full">
                                                        {{ $content->is_active ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                                <div class="text-white font-light text-sm leading-relaxed max-w-2xl">
                                                    {{ Str::limit(strip_tags($content->content), 100) }}
                                                </div>
                                            </div>
                                            <div class="flex space-x-2 ml-4">
                                                <a href="{{ route('admin.page-contents.edit', $content) }}"
                                                   class="px-3 py-2 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-lg hover:bg-amber-500/20 transition-colors">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.page-contents.destroy', $content) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this content?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-2 bg-red-500/10 border border-red-500/20 text-red-400 rounded-lg hover:bg-red-500/20 transition-colors">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-plus-circle text-3xl mb-3"></i>
                                <p>No content blocks in this section yet.</p>
                                <p class="text-sm mt-1">Click "Add Content" to create your first content block.</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Page Selected -->
            <div class="text-center py-20">
                <i class="fas fa-hand-pointer text-6xl text-amber-400/30 mb-6"></i>
                <h3 class="text-2xl font-light text-white mb-4">Select a Page to Start Editing</h3>
                <p class="text-gray-400 max-w-md mx-auto">
                    Choose a page from the options above to view and edit all the content sections within that page.
                </p>
            </div>
        @endif
    </div>
</div>
@endsection