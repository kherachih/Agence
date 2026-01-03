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
        Schema::table('services', function (Blueprint $table) {
            // Add new pricing fields
            $table->decimal('adult_price', 10, 2)->nullable()->after('price_from');
            $table->decimal('discount_adult_price', 10, 2)->nullable()->after('adult_price');
            $table->decimal('discount_child_price', 10, 2)->nullable()->after('child_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Remove new pricing fields
            $table->dropColumn(['adult_price', 'discount_adult_price', 'discount_child_price']);
        });
    }
};
