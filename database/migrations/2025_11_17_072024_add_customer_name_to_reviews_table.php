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
        Schema::table('reviews', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['user_id']);

            // Drop the existing unique constraint
            $table->dropUnique(['user_id', 'car_id']);

            // Make user_id nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();

            // Add customer_name field
            $table->string('customer_name')->nullable()->after('user_id');

            // Recreate foreign key constraint (nullable)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Add new unique constraint that allows null user_id
            $table->unique(['user_id', 'car_id', 'customer_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Drop the new unique constraint
            $table->dropUnique(['user_id', 'car_id', 'customer_name']);

            // Drop foreign key constraint
            $table->dropForeign(['user_id']);

            // Remove customer_name field
            $table->dropColumn('customer_name');

            // Make user_id required again
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            // Recreate foreign key constraint (required)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Recreate original unique constraint
            $table->unique(['user_id', 'car_id']);
        });
    }
};
