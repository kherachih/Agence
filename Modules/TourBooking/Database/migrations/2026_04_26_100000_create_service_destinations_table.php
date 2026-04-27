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
        if (!Schema::hasTable('service_destinations')) {
            Schema::create('service_destinations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
                $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_destinations');
    }
};
