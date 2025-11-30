<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Car;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = Review::with(['user', 'car', 'booking']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                              ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhere('customer_name', 'like', "%{$search}%")
                ->orWhereHas('car', function($carQuery) use ($search) {
                    $carQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhere('comment', 'like', "%{$search}%");
            });
        }

        // Filter by rating
        if ($request->has('rating') && !empty($request->rating)) {
            $query->where('rating', $request->rating);
        }

        // Filter by verification status
        if ($request->has('verified') && $request->verified !== '') {
            $query->where('is_verified', $request->verified === '1');
        }

        $reviews = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $users = User::where('status', 'active')->get();
        $cars = Car::where('status', 'active')->get();
        $bookings = Booking::where('status', 'completed')->get();

        return view('admin.reviews.create', compact('users', 'cars', 'bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'customer_name' => 'required_without:user_id|string|max:255',
            'user_id' => 'nullable|exists:users,id|required_without:customer_name',
            'car_id' => 'required|exists:models,id',
            'booking_id' => 'nullable|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'is_verified' => 'boolean',
        ]);

        // Check if review already exists (either by user or customer name)
        $existingReview = Review::where('car_id', $request->car_id)
                                ->where(function($query) use ($request) {
                                    if ($request->user_id) {
                                        $query->where('user_id', $request->user_id);
                                    } else {
                                        $query->where('customer_name', $request->customer_name);
                                    }
                                })
                                ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'This customer has already reviewed this car.');
        }

        Review::create([
            'user_id' => $request->user_id,
            'customer_name' => $request->customer_name,
            'car_id' => $request->car_id,
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_verified' => $request->has('is_verified'),
        ]);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $review = Review::with(['user', 'car', 'booking'])->findOrFail($id);

        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $review = Review::findOrFail($id);
        $users = User::where('status', 'active')->get();
        $cars = Car::where('status', 'active')->get();
        $bookings = Booking::where('status', 'completed')->get();

        return view('admin.reviews.edit', compact('review', 'users', 'cars', 'bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $review = Review::findOrFail($id);

        $request->validate([
            'customer_name' => 'required_without:user_id|string|max:255',
            'user_id' => 'nullable|exists:users,id|required_without:customer_name',
            'car_id' => 'required|exists:models,id',
            'booking_id' => 'nullable|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'is_verified' => 'boolean',
        ]);

        // Check if the new combination already exists (excluding current record)
        $existingReview = Review::where('car_id', $request->car_id)
                                ->where(function($query) use ($request) {
                                    if ($request->user_id) {
                                        $query->where('user_id', $request->user_id);
                                    } else {
                                        $query->where('customer_name', $request->customer_name);
                                    }
                                })
                                ->where('id', '!=', $id)
                                ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'This customer has already reviewed this car.');
        }

        $review->update([
            'user_id' => $request->user_id,
            'customer_name' => $request->customer_name,
            'car_id' => $request->car_id,
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_verified' => $request->has('is_verified'),
        ]);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
