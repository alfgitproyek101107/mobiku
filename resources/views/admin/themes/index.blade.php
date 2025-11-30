@extends('admin.layouts.app')

@section('title', 'Theme Management')

@section('content')
<!-- Theme Management - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">Theme Management</h1>
            <p class="text-gray-400">Choose and customize the website theme design</p>
        </div>

        <!-- Current Theme Indicator -->
        <div class="mb-6 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-light text-white mb-2">Current Active Theme</h3>
                    <div class="flex items-center space-x-3">
                        <span class="px-4 py-2 bg-amber-500/20 border border-amber-500/30 text-amber-400 rounded-full text-sm font-medium capitalize">
                            <i class="fas fa-palette mr-2"></i>{{ ucfirst($currentTheme) }} Theme
                        </span>
                        <span class="text-gray-400 text-sm">
                            <i class="fas fa-info-circle mr-1"></i>
                            Applied to all public pages
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-400 mb-1">Last updated</div>
                    <div class="text-white">{{ now()->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>

        <!-- Theme Selection -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($themes as $themeKey => $theme)
            <div class="group relative">
                <!-- Theme Card -->
                <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl overflow-hidden border {{ $currentTheme === $themeKey ? 'border-amber-500/50 ring-2 ring-amber-500/20' : 'border-gray-700/50 hover:border-amber-500/30' }} transition-all duration-500">

                    <!-- Active Indicator -->
                    @if($currentTheme === $themeKey)
                    <div class="absolute top-4 right-4 z-20">
                        <div class="w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                    </div>
                    @endif

                    <!-- Theme Preview -->
                    <div class="relative h-48 overflow-hidden">
                        <!-- Mock Theme Preview -->
                        <div class="absolute inset-0 {{ $themeKey === 'dark' ? 'bg-gradient-to-br from-slate-900 to-gray-900' : ($themeKey === 'light' ? 'bg-gradient-to-br from-white to-gray-100' : 'bg-gradient-to-br from-purple-600 via-pink-600 to-blue-600') }}">
                            <!-- Mock UI Elements -->
                            <div class="absolute top-4 left-4 right-4">
                                <div class="h-3 {{ $themeKey === 'dark' ? 'bg-gray-700' : 'bg-gray-200' }} rounded mb-2"></div>
                                <div class="h-2 {{ $themeKey === 'dark' ? 'bg-gray-600' : 'bg-gray-300' }} rounded w-3/4"></div>
                            </div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="flex space-x-2">
                                    <div class="h-8 w-8 {{ $themeKey === 'dark' ? 'bg-gray-700' : 'bg-gray-200' }} rounded-lg"></div>
                                    <div class="h-8 w-8 {{ $themeKey === 'dark' ? 'bg-gray-700' : 'bg-gray-200' }} rounded-lg"></div>
                                    <div class="h-8 w-8 {{ $themeKey === 'dark' ? 'bg-gray-700' : 'bg-gray-200' }} rounded-lg"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Color Palette -->
                        <div class="absolute bottom-2 right-2 flex space-x-1">
                            @foreach($theme['colors'] as $color)
                            <div class="w-4 h-4 rounded-full border border-white/20" style="background-color: {{ $color }}"></div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Theme Info -->
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-medium text-white mb-2">{{ $theme['name'] }}</h3>
                                <p class="text-gray-400 text-sm leading-relaxed">{{ $theme['description'] }}</p>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex space-x-3">
                            @if($currentTheme === $themeKey)
                            <button class="flex-1 px-4 py-3 bg-amber-500/20 border border-amber-500/30 text-amber-400 rounded-xl font-medium cursor-not-allowed" disabled>
                                <i class="fas fa-check-circle mr-2"></i>
                                Active Theme
                            </button>
                            @else
                            <button onclick="previewTheme('{{ $themeKey }}')"
                                    class="px-4 py-3 bg-gray-700/50 hover:bg-gray-600/50 text-gray-300 hover:text-white rounded-xl font-medium transition-all duration-300">
                                <i class="fas fa-eye mr-2"></i>
                                Preview
                            </button>
                            <button onclick="activateTheme('{{ $themeKey }}')"
                                    class="flex-1 px-4 py-3 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white rounded-xl font-medium transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20">
                                <i class="fas fa-palette mr-2"></i>
                                Activate
                            </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Hover Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
            </div>
            @endforeach
        </div>

        <!-- Theme Information -->
        <div class="mt-12 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-6">
            <h3 class="text-lg font-light text-white mb-4">
                <i class="fas fa-info-circle text-amber-400 mr-2"></i>
                Theme Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-amber-400 font-medium mb-2">What Changes</h4>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>• Background colors and gradients</li>
                        <li>• Text and accent colors</li>
                        <li>• Card and component styling</li>
                        <li>• Button and interactive elements</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-amber-400 font-medium mb-2">Applied To</h4>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>• All public website pages</li>
                        <li>• Navigation and footer</li>
                        <li>• Forms and modals</li>
                        <li>• Admin panel interface</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Theme activation
function activateTheme(theme) {
    if (confirm(`Are you sure you want to activate the ${theme.charAt(0).toUpperCase() + theme.slice(1)} theme? This will change the appearance of your entire website.`)) {
        // Show loading
        const button = event.target.closest('button');
        const originalHTML = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Activating...';
        button.disabled = true;

        fetch('/admin/themes/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ theme: theme })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showNotification('Theme activated successfully!', 'success');

                // Reload page to show changes
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            } else {
                throw new Error(data.message || 'Failed to activate theme');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to activate theme. Please try again.', 'error');
            button.innerHTML = originalHTML;
            button.disabled = false;
        });
    }
}

// Theme preview
function previewTheme(theme) {
    // This would implement live preview functionality
    showNotification(`Previewing ${theme.charAt(0).toUpperCase() + theme.slice(1)} theme...`, 'info');
}

// Notification function
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 bg-${type === 'success' ? 'green' : type === 'error' ? 'red' : 'blue'}-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-2"></i>
        <span>${message}</span>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>

<style>
/* Custom animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}
</style>
@endsection