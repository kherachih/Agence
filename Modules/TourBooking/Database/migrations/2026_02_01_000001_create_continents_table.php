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
        Schema::create('continents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code', 10)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->integer('ordering')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // Create translations table for continents
        Schema::create('continent_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('continent_id')->constrained('continents')->onDelete('cascade');
            $table->string('lang_code', 5);
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['continent_id', 'lang_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('continent_translations');
        Schema::dropIfExists('continents');
    }
};
