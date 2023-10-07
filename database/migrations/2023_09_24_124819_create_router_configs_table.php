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
        Schema::create('router_configs', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable()->unique();
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
        Schema::dropIfExists('router_configs');
    }
};
