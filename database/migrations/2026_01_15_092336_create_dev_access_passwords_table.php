<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dev_access_passwords', function (Blueprint $table) {
            $table->id();
            $table->string('password')->comment('Hashed password for development section access');
            $table->timestamps();
        });

        // Insert default password: D3v@2026!Secure#Archive
        DB::table('dev_access_passwords')->insert([
            'password' => Hash::make('D3v@2026!Secure#Archive'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_access_passwords');
    }
};
