<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('device_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_user_group_id');

            $table->string('username')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->boolean('connected')->nullable()->default(0);
            $table->boolean('data_limit_reached')->nullable()->default(0);
            
            $table->unsignedDecimal('data_used')->nullable()->default(0);
            $table->json('data_limit')->nullable();
            $table->json('download_speed_limit')->nullable();
            $table->json('upload_speed_limit')->nullable();
            $table->json('disable_access')->nullable();
            $table->json('sites_allowed')->nullable();
            $table->json('sites_denied')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_users');
    }
};
