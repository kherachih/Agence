<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('destinations', 'tags')) {
            Schema::table('destinations', function (Blueprint $table) {
                $table->text('tags')->nullable()->after('image');
            });
        }
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('tags');
        });
    }
};
