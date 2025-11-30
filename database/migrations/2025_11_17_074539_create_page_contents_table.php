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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page'); // e.g., 'home', 'about', 'contact'
            $table->string('section'); // e.g., 'hero', 'features', 'testimonials'
            $table->string('content_key')->unique(); // unique identifier for the content block
            $table->longText('content'); // the actual content
            $table->string('content_type')->default('text'); // text, html, markdown
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['page', 'section']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
