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
        Schema::create('dev_access_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->comment('Admin who accessed the development section');
            $table->string('ip_address', 45)->comment('IP address of the access');
            $table->text('user_agent')->nullable()->comment('Browser user agent');
            $table->string('action')->comment('Action performed (login, update_menu, etc.)');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_access_logs');
    }
};
