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
            if (!Schema::hasColumn('services', 'adult_discount_price')) {
                $table->decimal('adult_discount_price', 10, 2)->nullable()->after('price_per_person');
            }
            if (!Schema::hasColumn('services', 'child_discount_price')) {
                $table->decimal('child_discount_price', 10, 2)->nullable()->after('child_price');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('adult_discount_price');
            $table->dropColumn('child_discount_price');
        });
    }
};
