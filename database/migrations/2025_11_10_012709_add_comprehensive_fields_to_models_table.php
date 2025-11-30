<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('models', function (Blueprint $table) {
            // Tag Label
            $table->string('tag_label')->nullable()->after('name');

            // Detailed Description
            $table->longText('detailed_description')->nullable()->after('description');

            // Gallery Images (JSON array of image paths)
            $table->json('gallery_images')->nullable()->after('image');

            // Enhanced Specifications
            $table->integer('max_power_hp')->nullable()->after('specifications');
            $table->integer('max_torque_nm')->nullable()->after('max_power_hp');
            $table->enum('transmission_type', ['Manual', 'CVT', 'Automatic', 'DCT'])->nullable()->after('max_torque_nm');
            $table->enum('drivetrain', ['FWD', 'RWD', 'AWD', '4WD'])->nullable()->after('transmission_type');
            $table->enum('fuel_type', ['Bensin', 'Diesel', 'Hybrid', 'Electric'])->nullable()->after('drivetrain');
            $table->integer('seating_capacity')->nullable()->after('fuel_type');

            // Dimensions
            $table->integer('length_mm')->nullable()->after('seating_capacity');
            $table->integer('width_mm')->nullable()->after('length_mm');
            $table->integer('height_mm')->nullable()->after('width_mm');
            $table->integer('wheelbase_mm')->nullable()->after('height_mm');

            // Price Label
            $table->string('price_label')->nullable()->after('price');

            // Features & Warranty
            $table->json('key_features')->nullable()->after('price_label');
            $table->string('warranty')->nullable()->after('key_features');
            $table->boolean('roadside_assistance')->default(false)->after('warranty');

            // CTA Links
            $table->string('test_drive_url')->nullable()->after('roadside_assistance');
            $table->string('consultation_url')->nullable()->after('test_drive_url');
            $table->string('contact_sales_url')->nullable()->after('consultation_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('models', function (Blueprint $table) {
            $table->dropColumn([
                'tag_label',
                'detailed_description',
                'gallery_images',
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
                'price_label',
                'key_features',
                'warranty',
                'roadside_assistance',
                'test_drive_url',
                'consultation_url',
                'contact_sales_url'
            ]);
        });
    }
};
