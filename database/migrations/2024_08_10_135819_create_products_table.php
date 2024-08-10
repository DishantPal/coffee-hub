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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id'); // Foreign Key to Coffee Shops
            $table->string('name'); // Product Name
            $table->text('description')->nullable(); // Product Description
            $table->decimal('price', 8, 2); // Product Price
            $table->string('sku')->nullable(); // Product SKU
            $table->string('category'); // Product Category
            $table->string('subcategory')->nullable(); // Product Subcategory
            $table->json('ingredients')->nullable(); // Ingredients
            $table->json('allergens')->nullable(); // Allergen Information
            $table->json('nutritional_info')->nullable(); // Nutritional Information
            $table->string('image', 1000)->nullable(); // Product Image
            $table->float('ratings', 2, 1)->default(0); // Product Ratings
            $table->integer('reviews_count')->default(0); // Number of Reviews
            $table->boolean('is_featured')->default(false); // Is Featured
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
