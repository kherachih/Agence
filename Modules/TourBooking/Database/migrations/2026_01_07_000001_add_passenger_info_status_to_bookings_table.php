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
        // Check if columns already exist before adding
        if (!Schema::hasColumn('bookings', 'passenger_info_status')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->enum('passenger_info_status', ['pending', 'completed'])->default('pending')->after('meta_data');
                $table->timestamp('passenger_info_completed_at')->nullable()->after('passenger_info_status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop if columns exist
        if (Schema::hasColumn('bookings', 'passenger_info_status')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn(['passenger_info_status', 'passenger_info_completed_at']);
            });
        }
    }
};
