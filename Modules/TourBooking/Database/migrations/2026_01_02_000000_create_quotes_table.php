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
        if (!Schema::hasTable('quotes')) {
            Schema::create('quotes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('service_id');
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
                $table->string('first_name');
                $table->string('last_name');
                $table->integer('number_of_persons');
                $table->string('phone');
                $table->string('email');
                $table->text('message')->nullable();
                $table->enum('status', ['pending', 'contacted', 'completed'])->default('pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
