<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = Wishlist::with(['user', 'car']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhereHas('car', function($carQuery) use ($search) {
                    $carQuery->where('name', 'like', "%{$search}%");
                });
            });
        }

        $wishlists = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.wishlists.index', compact('wishlists'));
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

        return view('admin.wishlists.create', compact('users', 'cars'));
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
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:models,id',
        ]);

        // Check if wishlist already exists
        $existingWishlist = Wishlist::where('user_id', $request->user_id)
                                   ->where('car_id', $request->car_id)
                                   ->first();

        if ($existingWishlist) {
            return redirect()->back()->with('error', 'This car is already in the user\'s wishlist.');
        }

        Wishlist::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
        ]);

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $wishlist = Wishlist::with(['user', 'car'])->findOrFail($id);

        return view('admin.wishlists.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $wishlist = Wishlist::findOrFail($id);
        $users = User::where('status', 'active')->get();
        $cars = Car::where('status', 'active')->get();

        return view('admin.wishlists.edit', compact('wishlist', 'users', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $wishlist = Wishlist::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:models,id',
        ]);

        // Check if the new combination already exists (excluding current record)
        $existingWishlist = Wishlist::where('user_id', $request->user_id)
                                   ->where('car_id', $request->car_id)
                                   ->where('id', '!=', $id)
                                   ->first();

        if ($existingWishlist) {
            return redirect()->back()->with('error', 'This car is already in the user\'s wishlist.');
        }

        $wishlist->update([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
        ]);

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item deleted successfully.');
    }
}
