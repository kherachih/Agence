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
        Schema::create('availability_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_people')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['service_id', 'start_date', 'end_date']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability_periods');
    }
};
