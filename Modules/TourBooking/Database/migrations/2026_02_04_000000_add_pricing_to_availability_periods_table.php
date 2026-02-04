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
        Schema::table('availability_periods', function (Blueprint $table) {
            // Adult pricing
            $table->decimal('adult_price', 10, 2)->nullable()->after('max_people')->comment('Price per adult for this period');
            $table->decimal('adult_discount_percentage', 5, 2)->nullable()->after('adult_price')->comment('Discount percentage for adults');
            $table->decimal('discount_adult_price', 10, 2)->nullable()->after('adult_discount_percentage')->comment('Discounted price per adult');
            
            // Child pricing
            $table->decimal('child_price', 10, 2)->nullable()->after('discount_adult_price')->comment('Price per child for this period');
            $table->decimal('child_discount_percentage', 5, 2)->nullable()->after('child_price')->comment('Discount percentage for children');
            $table->decimal('discount_child_price', 10, 2)->nullable()->after('child_discount_percentage')->comment('Discounted price per child');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('availability_periods', function (Blueprint $table) {
            $table->dropColumn([
                'adult_price',
                'adult_discount_percentage',
                'discount_adult_price',
                'child_price',
                'child_discount_percentage',
                'discount_child_price',
            ]);
        });
    }
};
