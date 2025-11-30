<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Car; // Pastikan model Car sudah ada

class AdminCarController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $models = Car::latest()->paginate(10);
        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.models.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'tag_label' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:300',
            'detailed_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'category' => 'required|in:sedan,suv,electric,hybrid,truck,hatchback',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images' => 'nullable|array|max:10',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'max_power_hp' => 'nullable|integer|min:0',
            'max_torque_nm' => 'nullable|integer|min:0',
            'transmission_type' => 'nullable|in:Manual,CVT,Automatic,DCT',
            'drivetrain' => 'nullable|in:FWD,RWD,AWD,4WD',
            'fuel_type' => 'nullable|in:Bensin,Diesel,Hybrid,Electric',
            'seating_capacity' => 'nullable|integer|min:1|max:20',
            'length_mm' => 'nullable|integer|min:0',
            'width_mm' => 'nullable|integer|min:0',
            'height_mm' => 'nullable|integer|min:0',
            'wheelbase_mm' => 'nullable|integer|min:0',
            'key_features' => 'nullable|array',
            'key_features.*' => 'string|max:100',
            'warranty' => 'nullable|string|max:255',
            'roadside_assistance' => 'nullable|boolean',
            'test_drive_url' => 'nullable|url',
            'consultation_url' => 'nullable|url',
            'contact_sales_url' => 'nullable|url',
            'badge_text' => 'nullable|string|max:50',
            'badge_color' => 'nullable|in:from-amber-500 to-orange-600,from-green-500 to-emerald-600,from-red-500 to-pink-600,from-blue-500 to-indigo-600,from-purple-500 to-pink-600',
        ]);

        $data = $request->except(['image', 'gallery_images']); // Ambil semua data kecuali file

        // Auto-generate slug from name
        $data['slug'] = Str::slug($request->name);

        // Handle key_features array
        if ($request->has('key_features')) {
            $data['key_features'] = json_encode($request->key_features);
        }

        // Upload main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $data['slug'] . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/models'), $imageName);
            $data['image'] = $imageName;
        }

        // Upload gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $file) {
                $filename = time() . '_' . uniqid() . '_' . $data['slug'] . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/models'), $filename);
                $galleryImages[] = $filename;
            }
            $data['gallery_images'] = json_encode($galleryImages);
        }

        Car::create($data);

        return redirect()->route('admin.models.index')->with('success', 'Model created successfully.');
    }

    public function show(Car $model)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Decode JSON fields untuk ditampilkan
        $model->key_features = json_decode($model->key_features, true);
        $model->gallery_images = json_decode($model->gallery_images, true);

        return view('admin.models.show', compact('model'));
    }

    public function edit(Car $model)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Decode JSON fields untuk ditampilkan di form
        $model->key_features = json_decode($model->key_features, true);
        $model->gallery_images = json_decode($model->gallery_images, true);

        return view('admin.models.edit', compact('model'));
    }

    public function update(Request $request, Car $model)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'tag_label' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:300',
            'detailed_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'category' => 'required|in:sedan,suv,electric,hybrid,truck,hatchback',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images' => 'nullable|array|max:10',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'max_power_hp' => 'nullable|integer|min:0',
            'max_torque_nm' => 'nullable|integer|min:0',
            'transmission_type' => 'nullable|in:Manual,CVT,Automatic,DCT',
            'drivetrain' => 'nullable|in:FWD,RWD,AWD,4WD',
            'fuel_type' => 'nullable|in:Bensin,Diesel,Hybrid,Electric',
            'seating_capacity' => 'nullable|integer|min:1|max:20',
            'length_mm' => 'nullable|integer|min:0',
            'width_mm' => 'nullable|integer|min:0',
            'height_mm' => 'nullable|integer|min:0',
            'wheelbase_mm' => 'nullable|integer|min:0',
            'key_features' => 'nullable|array',
            'key_features.*' => 'string|max:100',
            'warranty' => 'nullable|string|max:255',
            'roadside_assistance' => 'nullable|boolean',
            'test_drive_url' => 'nullable|url',
            'consultation_url' => 'nullable|url',
            'contact_sales_url' => 'nullable|url',
            'badge_text' => 'nullable|string|max:50',
            'badge_color' => 'nullable|in:from-amber-500 to-orange-600,from-green-500 to-emerald-600,from-red-500 to-pink-600,from-blue-500 to-indigo-600,from-purple-500 to-pink-600',
        ]);

        $data = $request->except(['image', 'gallery_images']); // Ambil semua data kecuali file

        // Auto-generate slug from name
        $data['slug'] = Str::slug($request->name);

        // Handle key_features array
        if ($request->has('key_features')) {
            $data['key_features'] = json_encode($request->key_features);
        }

        // Handle specifications (legacy field)
        if ($request->has('specifications_engine')) {
            $data['specifications'] = json_encode([
                'engine' => $request->specifications_engine,
                'horsepower' => $request->max_power_hp,
                'transmission' => $request->transmission_type,
                'fuel_type' => $request->fuel_type,
                'seats' => $request->seating_capacity,
                'drivetrain' => $request->drivetrain,
            ]);
        }

        // Handle specifications (legacy field)
        if ($request->has('specifications_engine')) {
            $data['specifications'] = json_encode([
                'engine' => $request->specifications_engine,
                'horsepower' => $request->max_power_hp,
                'transmission' => $request->transmission_type,
                'fuel_type' => $request->fuel_type,
                'seats' => $request->seating_capacity,
                'drivetrain' => $request->drivetrain,
            ]);
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($model->image) {
                $oldImagePath = public_path('images/models/' . $model->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $data['slug'] . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/models'), $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('gallery_images')) {
            // Hapus gallery images lama jika ada
            if ($model->gallery_images) {
                $oldGalleryImages = json_decode($model->gallery_images, true);
                if (is_array($oldGalleryImages)) {
                    foreach ($oldGalleryImages as $oldImage) {
                        $oldImagePath = public_path('images/models/' . $oldImage);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                }
            }

            $galleryImages = [];
            foreach ($request->file('gallery_images') as $file) {
                $filename = time() . '_' . uniqid() . '_' . $data['slug'] . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/models'), $filename);
                $galleryImages[] = $filename;
            }
            $data['gallery_images'] = json_encode($galleryImages);
        }

        $model->update($data);

        return redirect()->route('admin.models.index')->with('success', 'Model updated successfully.');
    }

    public function destroy(Car $model)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Hapus gambar jika ada
        if ($model->image) {
            $imagePath = public_path('images/models/' . $model->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($model->gallery_images) {
            $galleryImages = json_decode($model->gallery_images, true);
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $image) {
                    $imagePath = public_path('images/models/' . $image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }

        $model->delete();

        return redirect()->route('admin.models.index')->with('success', 'Model deleted successfully.');
    }
}