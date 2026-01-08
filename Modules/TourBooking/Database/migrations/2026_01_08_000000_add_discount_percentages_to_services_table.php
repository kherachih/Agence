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
            // Add discount percentage fields
            $table->decimal('adult_discount_percentage', 5, 2)->nullable()->after('adult_price');
            $table->decimal('child_discount_percentage', 5, 2)->nullable()->after('child_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['adult_discount_percentage', 'child_discount_percentage']);
        });
    }
};
