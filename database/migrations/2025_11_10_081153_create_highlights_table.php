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
        Schema::create('highlights', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->default('Learn More');
            $table->string('button_url')->nullable();
            $table->string('background_image')->nullable();
            $table->string('background_color', 7)->default('#1F2937');
            $table->string('text_color', 7)->default('#FFFFFF');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->enum('position', ['hero', 'featured', 'banner', 'sidebar'])->default('hero');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlights');
    }
};
