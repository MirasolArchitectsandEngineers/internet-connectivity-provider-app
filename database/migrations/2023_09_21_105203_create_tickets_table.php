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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('router_id');

            $table->unsignedDecimal('bandwidth')->nullable();
            $table->unsignedDecimal('data_limit')->default(0)->nullable();
            $table->unsignedDecimal('duration')->nullable();
            $table->string('duration_unit')->nullable();
            $table->json('sites_blacklist')->nullable();
            $table->json('sites_whitelist')->nullable();
            $table->unsignedInteger('count')->nullable(); // number of users/devices that can connect
            $table->unsignedInteger('used')->default(0)->nullable(); // number of users/devices that has already connected
            $table->unsignedDecimal('duration_consumed')->default(0)->nullable(); // total duration by device count
            $table->unsignedInteger('connected')->default(0)->nullable();
            $table->unsignedInteger('exerted')->default(0)->nullable();
            $table->unsignedDecimal('usage_average')->default(0)->nullable(); // data consumed per certain amount of time
            $table->json('sites_visited')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
