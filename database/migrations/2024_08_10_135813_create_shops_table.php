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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Coffee Shop Name
            $table->text('description')->nullable(); // Coffee Shop Description
            $table->string('address'); // Address
            $table->string('city'); // City
            $table->string('state')->nullable(); // State/Province
            $table->string('postal_code')->nullable(); // Postal Code
            $table->string('country'); // Country
            $table->string('phone')->nullable(); // Contact Phone
            $table->string('email')->nullable(); // Contact Email
            $table->json('business_hours')->nullable(); // Business Hours
            $table->json('service_areas')->nullable(); // Service Areas
            $table->json('amenities')->nullable(); // Amenities
            $table->string('logo')->nullable(); // Shop Logo/Image
            $table->string('website')->nullable(); // Website URL
            $table->json('social_links')->nullable(); // Social Media Links
            $table->json('loyalty_program')->nullable(); // Loyalty Program Details
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
