@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 flex items-center justify-center relative overflow-hidden">
    <!-- Background Patterns -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-grid-16"></div>

    <div class="relative z-10 w-full max-w-md px-4">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-amber-500 to-orange-600 rounded-2xl mb-6">
                <i class="fas fa-lock text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-light text-white mb-2">Admin Access</h1>
            <p class="text-gray-400">Enter your credentials to continue</p>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8">
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-900/30 border border-red-700 rounded-lg">
                    <ul class="text-red-300 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-900/30 border border-red-700 rounded-lg">
                    <p class="text-red-300 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.authenticate') }}">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-sm font-light text-gray-300 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', 'admin@mobiku.com') }}" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-light text-gray-300">Password</label>
                        <a href="#" class="text-xs text-amber-400 hover:text-amber-300">Forgot?</a>
                    </div>
                    <input type="password" id="password" name="password" value="{{ old('password', 'password') }}" required
                        class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                        class="w-4 h-4 text-amber-500 bg-gray-800 border-gray-600 rounded focus:ring-amber-500 focus:ring-2">
                    <label for="remember" class="ml-2 text-sm text-gray-300">Remember me</label>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                    Login to Dashboard
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-gray-500 mt-8">
            © {{ date('Y') }} Mobiku. All rights reserved.
        </p>
    </div>
</section>

<style>
.bg-grid-16 {
    background-size: 16px 16px;
    background-image:
        linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
}
</style>
@endsection

<style>
.error-message {
    animation: fadeIn 0.3s ease-in;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>