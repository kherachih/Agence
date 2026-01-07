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
        // Check if column already exists before adding
        if (!Schema::hasColumn('bookings', 'room_type_id')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->foreignId('room_type_id')->nullable()->after('user_id')->constrained('room_types')->onDelete('set null');
                $table->index('room_type_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop if column exists
        if (Schema::hasColumn('bookings', 'room_type_id')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropForeign(['room_type_id']);
                $table->dropIndex(['room_type_id']);
                $table->dropColumn('room_type_id');
            });
        }
    }
};
