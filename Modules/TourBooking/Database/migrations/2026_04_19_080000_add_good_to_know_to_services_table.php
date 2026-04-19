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
            $table->json('good_to_know')->nullable()->after('google_map_url');
        });

        Schema::table('service_translations', function (Blueprint $table) {
            $table->json('good_to_know')->nullable()->after('cancellation_policy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('good_to_know');
        });

        Schema::table('service_translations', function (Blueprint $table) {
            $table->dropColumn('good_to_know');
        });
    }
};
