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
        // Check if table already exists (from previous failed migration attempt)
        if (!Schema::hasTable('passengers')) {
            Schema::create('passengers', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('booking_id');
                $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('date_of_birth')->nullable();
                $table->string('gender')->nullable();
                $table->string('nationality')->nullable();
                $table->string('passport_number')->nullable();
                $table->date('passport_expiry_date')->nullable();
                $table->string('passport_file')->nullable();
                $table->string('insurance_file')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->text('special_requirements')->nullable();
                $table->boolean('is_primary')->default(false);
                $table->timestamps();
                $table->softDeletes();
            });
        } else {
            // Table exists, try to add the foreign key
            try {
                Schema::table('passengers', function (Blueprint $table) {
                    $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
                });
            } catch (\Exception $e) {
                // Foreign key might already exist, ignore error
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
