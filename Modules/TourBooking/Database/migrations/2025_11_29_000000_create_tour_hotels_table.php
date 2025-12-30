<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('tour_hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
        });

        // Add foreign keys separately
        Schema::table('tour_hotels', function (Blueprint $table) {
            $table->foreign('tour_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_hotels');
    }
};
