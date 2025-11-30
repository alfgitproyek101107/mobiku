<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('models', function (Blueprint $table) {
            // Tambahkan kolom-kolom baru di akhir tabel (tanpa menentukan posisi after)
            $table->string('category')->default('sedan')->after('status'); // tambahkan kolom category
            $table->text('additional_images')->nullable(); // tambahkan kolom additional_images jika belum ada
            $table->string('badge_text')->nullable(); // tambahkan badge text
            $table->string('badge_color')->nullable(); // tambahkan badge color
        });
    }

    public function down()
    {
        Schema::table('models', function (Blueprint $table) {
            $table->dropColumn(['category', 'additional_images', 'badge_text', 'badge_color']);
        });
    }
};