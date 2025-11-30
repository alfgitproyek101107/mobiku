<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'models'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'name',
        'slug',
        'tag_label',
        'description',
        'detailed_description',
        'specifications', // JSON
        'price',
        'price_label',
        'image',
        'gallery_images', // JSON array of image paths
        'additional_images', // JSON (legacy)
        'status',
        'category',
        'badge_text',
        'badge_color',
        'rating',
        'max_power_hp',
        'max_torque_nm',
        'transmission_type',
        'drivetrain',
        'fuel_type',
        'seating_capacity',
        'length_mm',
        'width_mm',
        'height_mm',
        'wheelbase_mm',
        'key_features', // JSON
        'warranty',
        'roadside_assistance',
        'test_drive_url',
        'consultation_url',
        'contact_sales_url',
    ];

    protected $casts = [
        'specifications' => 'array',
        'additional_images' => 'array',
        'gallery_images' => 'array',
        'key_features' => 'array',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'roadside_assistance' => 'boolean',
    ];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'car_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'car_id');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}