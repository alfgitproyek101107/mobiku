<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Mobiku</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900 text-white antialiased">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gradient-to-b from-slate-900 to-gray-900 border-r border-gray-800/50 fixed inset-y-0 left-0 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
            <div class="p-6">
                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-car text-white"></i>
                    </div>
                    <span class="text-xl font-light">Mobiku Admin</span>
                </a>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="font-light">Dashboard</span>
                    </a>

                    <!-- Models Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">Models</div>
                        <a href="{{ route('admin.models.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.models*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-car w-5"></i>
                            <span class="font-light">Car Models</span>
                        </a>
                    </div>

                    <!-- Bookings Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">Bookings</div>
                        <a href="{{ route('admin.bookings.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.bookings*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-calendar-check w-5"></i>
                            <span class="font-light">Test Drives</span>
                        </a>
                    </div>

                    <!-- Users Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">Users</div>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.users*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-users w-5"></i>
                            <span class="font-light">User Management</span>
                        </a>
                    </div>

                    <!-- Messages Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">Messages</div>
                        <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.contact-messages*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-envelope w-5"></i>
                            <span class="font-light">Contact Messages</span>
                        </a>
                    </div>

                    <!-- Content Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">Content</div>
                        <a href="{{ route('admin.reviews.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.reviews*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-star w-5"></i>
                            <span class="font-light">Customer Reviews</span>
                        </a>
                        <a href="{{ route('admin.page-contents.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.page-contents*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-edit w-5"></i>
                            <span class="font-light">Edit Page Content</span>
                        </a>
                    </div>

                    <!-- Settings Section -->
                    <div class="space-y-1">
                        <div class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">System</div>
                        <a href="{{ route('admin.themes.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.themes*') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-palette w-5"></i>
                            <span class="font-light">Theme Management</span>
                        </a>
                        <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.settings') ? 'bg-amber-500/10 border border-amber-500/20 text-amber-400' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl transition-colors">
                            <i class="fas fa-cog w-5"></i>
                            <span class="font-light">Settings</span>
                        </a>
                    </div>
                </nav>
            </div>
            
            <!-- User Profile -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-800/50">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="text-white font-light">{{ session('admin_user_name') }}</p>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 text-sm hover:text-amber-400 transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto lg:ml-64">
            <!-- Burger Menu (Mobile) -->
            <div class="lg:hidden p-4">
                <button id="burger-menu" class="text-white text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
            <div class="mx-6 mt-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 text-lg mr-3"></i>
                    <p class="text-green-400">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="mx-6 mt-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-400 text-lg mr-3"></i>
                    <p class="text-red-400">{{ session('error') }}</p>
                </div>
            </div>
            @endif

            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar on burger menu click
        document.getElementById('burger-menu').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const burgerMenu = document.getElementById('burger-menu');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnBurger = burgerMenu.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnBurger && window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>