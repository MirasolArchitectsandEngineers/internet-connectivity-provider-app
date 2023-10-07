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
        Schema::create('device_user_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('router_id')->nullable();

            $table->string('name')->nullable()->unique();
            $table->unsignedBigInteger('connected_count')->nullable()->default(0);
            $table->unsignedBigInteger('data_limit_reached_count')->nullable()->default(0);

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
        Schema::dropIfExists('device_user_groups');
    }
};
