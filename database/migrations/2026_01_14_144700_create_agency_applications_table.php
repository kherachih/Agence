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
        Schema::create('agency_applications', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('agency_name');
            $table->string('agency_slug')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password'); // Hashed password for the agency account

            // Agency Description
            $table->text('about_agency')->nullable();

            // Location
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();

            // Additional Information
            $table->string('website')->nullable();
            $table->text('location_map')->nullable();

            // Social Media
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();

            // Document Uploads
            $table->string('agency_logo')->nullable();
            $table->string('business_license')->nullable(); // Required document
            $table->string('id_document')->nullable(); // Required document (ID of manager)
            $table->string('tax_certificate')->nullable();
            $table->string('insurance_document')->nullable();
            $table->json('other_documents')->nullable(); // Array of additional documents

            // Application Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable(); // Admin notes during review
            $table->unsignedBigInteger('reviewed_by')->nullable(); // Admin ID who reviewed
            $table->timestamp('reviewed_at')->nullable();

            // User Reference (created after approval)
            $table->unsignedBigInteger('user_id')->nullable(); // Links to users table after approval

            $table->timestamps();

            // Foreign keys
            $table->foreign('reviewed_by')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_applications');
    }
};
