<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Highlight;
use App\Models\Setting;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the home page with featured car and highlights
     */
    public function home()
    {
        // Get featured car for hero section
        $featuredCar = Car::where('status', 'active')
                          ->where('rating', '>=', 4.5)
                          ->orderBy('rating', 'desc')
                          ->first();

        // Get active highlights for hero section
        $heroHighlights = Highlight::active()
                                  ->position('hero')
                                  ->ordered()
                                  ->get();

        // Get latest cars for featured section
        $latestCars = Car::where('status', 'active')
                        ->latest()
                        ->limit(6)
                        ->get();

        // Get categories for navigation
        $categories = Category::active()->ordered()->get();

        // Get brand settings
        $brandName = Setting::get('brand_name', 'Mobiku');
        $brandLogo = Setting::get('brand_logo', '/images/logo.png');

        return view('home', compact(
            'featuredCar',
            'heroHighlights',
            'latestCars',
            'categories',
            'brandName',
            'brandLogo'
        ));
    }

    /**
     * Display all car models with filtering
     */
    public function models(Request $request)
    {
        $query = Car::where('status', 'active')->with(['reviews']);

        // Filter by category
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        // Filter by price range
        if ($request->has('price_min') && is_numeric($request->price_min)) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->has('price_max') && is_numeric($request->price_max)) {
            $query->where('price', '<=', $request->price_max);
        }

        // Search by name or description
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('detailed_description', 'like', "%{$search}%");
            });
        }

        // Sort options
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
        }

        $cars = $query->paginate(12);
        $categories = Category::active()->ordered()->get();

        return view('models', compact('cars', 'categories'));
    }

    /**
     * Display specific car model details
     */
    public function modelDetail($slug)
    {
        $car = Car::where('slug', $slug)
                 ->where('status', 'active')
                 ->with(['reviews' => function($query) {
                     $query->where('is_verified', true)->latest()->limit(10);
                 }])
                 ->firstOrFail();

        // Decode JSON fields
        $car->key_features = json_decode($car->key_features, true) ?? [];
        $car->gallery_images = json_decode($car->gallery_images, true) ?? [];
        $car->specifications = json_decode($car->specifications, true) ?? [];

        // Get related cars (same category)
        $relatedCars = Car::where('category', $car->category)
                         ->where('id', '!=', $car->id)
                         ->where('status', 'active')
                         ->limit(4)
                         ->get();

        // Calculate average rating
        $averageRating = $car->reviews->avg('rating') ?? $car->rating ?? 0;
        $totalReviews = $car->reviews->count();

        return view('model-detail', compact('car', 'relatedCars', 'averageRating', 'totalReviews'));
    }

    /**
     * Display gallery page
     */
    public function gallery()
    {
        $cars = Car::where('status', 'active')
                  ->whereNotNull('gallery_images')
                  ->with(['reviews'])
                  ->get();

        $galleryImages = [];
        foreach ($cars as $car) {
            $images = json_decode($car->gallery_images, true) ?? [];
            foreach ($images as $image) {
                $galleryImages[] = [
                    'image' => $image,
                    'car_name' => $car->name,
                    'car_slug' => $car->slug,
                    'category' => $car->category
                ];
            }
        }

        return view('gallery', compact('galleryImages'));
    }

    /**
     * Display testimonials/reviews page
     */
    public function testimonials()
    {
        $reviews = \App\Models\Review::with(['user', 'car'])
                                    ->where('is_verified', true)
                                    ->where('rating', '>=', 4)
                                    ->latest()
                                    ->paginate(12);

        return view('testimonials', compact('reviews'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        $contactEmail = Setting::get('contact_email', 'info@mobiku.com');
        $whatsappNumber = Setting::get('whatsapp_number', '+6281234567890');

        return view('contact', compact('contactEmail', 'whatsappNumber'));
    }

    /**
     * Display FAQ page
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Display about page
     */
    public function about()
    {
        $brandName = Setting::get('brand_name', 'Mobiku');

        return view('about', compact('brandName'));
    }
}
