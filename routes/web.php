<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminWishlistController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminPageContentController;
use App\Http\Controllers\AdminThemeController;

// Public routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/models', [PageController::class, 'models'])->name('models');
Route::get('/models/{slug}', [PageController::class, 'modelDetail'])->name('model.detail');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Test Drive Booking
Route::post('/book-test-drive', [PageController::class, 'bookTestDrive'])->name('book.test.drive');

// Admin auth routes (public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
});

// Protected admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Models (Cars) Management
    Route::resource('models', AdminCarController::class);

    // Users Management
    Route::resource('users', AdminUserController::class);

    // Bookings Management
    Route::resource('bookings', AdminBookingController::class);

    // Contact Messages Management
    Route::resource('contact-messages', AdminContactController::class);

    // Wishlists Management - REMOVED as requested
    // Route::resource('wishlists', AdminWishlistController::class);

    // Reviews Management
    Route::resource('reviews', AdminReviewController::class);

    // Page Content Management
    Route::resource('page-contents', AdminPageContentController::class);
    Route::post('page-contents/quick-edit', [AdminPageContentController::class, 'quickEdit'])->name('page-contents.quick-edit');

    // Theme Management
    Route::get('themes', [AdminThemeController::class, 'index'])->name('themes.index');
    Route::post('themes/update', [AdminThemeController::class, 'update'])->name('themes.update');
    Route::post('themes/preview', [AdminThemeController::class, 'preview'])->name('themes.preview');

    // Legacy routes (can be removed after updating views)
    Route::get('/bookings-old', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        $bookings = \App\Models\Booking::with(['car'])->paginate(10);
        return view('admin.bookings', compact('bookings'));
    })->name('bookings.old');

    Route::get('/settings', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin.setting');
    })->name('settings');

    Route::post('/settings', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        // Handle settings update logic here
        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    })->name('settings.update');

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

// Optional: Redirect admin root to login
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// API routes for contact forms (stateless)
Route::prefix('api')->middleware([])->group(function () {
    Route::post('/contact-messages', [App\Http\Controllers\Api\ContactController::class, 'storeMessage']);
    Route::post('/book-test-drive', [App\Http\Controllers\Api\ContactController::class, 'bookTestDrive']);
});
