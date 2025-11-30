@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<!-- Settings - Premium Design -->
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900">
    <!-- Background Pattern -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,theme(colors.amber.900/0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,theme(colors.slate.800/0.2),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-light text-white mb-2">System Settings</h1>
            <p class="text-gray-400">Configure system preferences and settings</p>
        </div>

        <!-- Settings Form -->
        <div class="max-w-4xl">
            <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-900/30 border border-green-700 rounded-lg text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.settings.update') }}">
                    @csrf

                    <!-- General Settings -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-6">General Settings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="site_name" class="block text-sm font-light text-gray-300 mb-2">Site Name</label>
                                <input type="text" id="site_name" name="site_name" value="{{ config('app.name', 'Mobiku') }}"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>

                            <div>
                                <label for="site_description" class="block text-sm font-light text-gray-300 mb-2">Site Description</label>
                                <input type="text" id="site_description" name="site_description" value="{{ config('app.description', 'Premium Car Dealership') }}"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-6">Contact Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_email" class="block text-sm font-light text-gray-300 mb-2">Contact Email</label>
                                <input type="email" id="contact_email" name="contact_email" value="{{ config('mail.from.address', 'info@mobiku.com') }}"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>

                            <div>
                                <label for="contact_phone" class="block text-sm font-light text-gray-300 mb-2">Contact Phone</label>
                                <input type="text" id="contact_phone" name="contact_phone" value="{{ config('app.phone', '+62 123 456 7890') }}"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">
                            </div>

                            <div class="md:col-span-2">
                                <label for="contact_address" class="block text-sm font-light text-gray-300 mb-2">Address</label>
                                <textarea id="contact_address" name="contact_address" rows="3"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-amber-500/50 transition">{{ config('app.address', 'Jakarta, Indonesia') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- System Settings -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-6">System Settings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="timezone" class="block text-sm font-light text-gray-300 mb-2">Timezone</label>
                                <select id="timezone" name="timezone"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="Asia/Jakarta" {{ config('app.timezone') == 'Asia/Jakarta' ? 'selected' : '' }}>Asia/Jakarta (WIB)</option>
                                    <option value="Asia/Makassar" {{ config('app.timezone') == 'Asia/Makassar' ? 'selected' : '' }}>Asia/Makassar (WITA)</option>
                                    <option value="Asia/Jayapura" {{ config('app.timezone') == 'Asia/Jayapura' ? 'selected' : '' }}>Asia/Jayapura (WIT)</option>
                                    <option value="UTC" {{ config('app.timezone') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                </select>
                            </div>

                            <div>
                                <label for="currency" class="block text-sm font-light text-gray-300 mb-2">Currency</label>
                                <select id="currency" name="currency"
                                    class="w-full px-4 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white focus:outline-none focus:border-amber-500/50 transition">
                                    <option value="IDR" {{ config('app.currency', 'IDR') == 'IDR' ? 'selected' : '' }}>Indonesian Rupiah (IDR)</option>
                                    <option value="USD" {{ config('app.currency') == 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                    <option value="EUR" {{ config('app.currency') == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Toggles -->
                    <div class="mb-8">
                        <h3 class="text-lg font-light text-white mb-6">Features</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-700/30 rounded-xl">
                                <div>
                                    <h4 class="text-white font-light">User Registration</h4>
                                    <p class="text-gray-400 text-sm">Allow users to register accounts</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="user_registration" value="1" {{ config('app.user_registration', true) ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-700/30 rounded-xl">
                                <div>
                                    <h4 class="text-white font-light">Test Drive Bookings</h4>
                                    <p class="text-gray-400 text-sm">Enable test drive booking system</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="test_drive_enabled" value="1" {{ config('app.test_drive_enabled', true) ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-700/30 rounded-xl">
                                <div>
                                    <h4 class="text-white font-light">Reviews & Ratings</h4>
                                    <p class="text-gray-400 text-sm">Allow customers to leave reviews</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="reviews_enabled" value="1" {{ config('app.reviews_enabled', true) ? 'checked' : '' }} class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all">
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
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