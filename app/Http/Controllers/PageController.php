<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class PageController extends Controller
{

    

    public function models(Request $request)
    {
        // Get categories for filter
        $categories = Car::select('category')
                        ->whereNotNull('category')
                        ->distinct()
                        ->get();

        // Build query with filters
        $query = Car::where('status', 'active');

        // Apply category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Apply sorting
        switch ($request->get('sort')) {
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

        // Paginate results
        $cars = $query->paginate(12)->withQueryString();

        return view('models', compact('cars', 'categories'));
    }

    // ... method lainnya ...


    public function index()
    {
        // Get featured car for hero section (using tag_label as featured indicator)
        $featuredCar = Car::where('status', 'active')
                          ->where('tag_label', 'FEATURED')
                          ->first();

        // Get latest cars for the featured section
        $latestCars = Car::where('status', 'active')
                        ->latest()
                        ->limit(3)
                        ->get();

        // Get reviews for testimonials section (show all reviews with comments)
        $reviews = \App\Models\Review::with(['user', 'car'])
                    ->whereNotNull('comment')
                    ->where('comment', '!=', '')
                    ->latest()
                    ->limit(6)
                    ->get();

        return view('home', compact('featuredCar', 'latestCars', 'reviews'));
    }

    public function about()
    {
        return view('about');
    }



    public function modelDetail($slug)
    {
        $car = Car::where('slug', $slug)->where('status', 'active')->firstOrFail();

        return view('model-detail', compact('car'));
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('contact');
    }

    public function bookTestDrive(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:models,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Generate booking number
        $bookingNumber = 'TD-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Create booking
        $booking = \App\Models\Booking::create([
            'car_id' => $request->car_id,
            'booking_number' => $bookingNumber,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        // Here you could add email notification logic
        // For now, we'll just return success

        return response()->json([
            'success' => true,
            'message' => 'Test drive booking submitted successfully!',
            'booking_number' => $bookingNumber
        ]);
    }
}