<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_visibility_settings', function (Blueprint $table) {
            $table->id();
            $table->string('menu_key')->unique()->comment('Unique identifier for menu section');
            $table->string('menu_label')->comment('Display label for the menu');
            $table->boolean('is_enabled')->default(true)->comment('Whether the menu is visible');
            $table->integer('order')->default(0)->comment('Display order');
            $table->string('parent_key')->nullable()->comment('Parent menu key for nested menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_visibility_settings');
    }
};
