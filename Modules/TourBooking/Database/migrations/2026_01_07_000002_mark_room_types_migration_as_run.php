<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mark the room_types migration as already run
        // This prevents Laravel from trying to run it again
        DB::table('migrations')->insert([
            'migration' => '2025_11_29_000000_create_room_types_table',
            'batch' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the record from migrations table
        DB::table('migrations')
            ->where('migration', '2025_11_29_000000_create_room_types_table')
            ->delete();
    }
};
