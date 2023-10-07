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
        Schema::create('ticket_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id');

            $table->string('code')->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedDecimal('duration_consumed')->default(0)->nullable();
            $table->boolean('connected')->default(0)->nullable();
            $table->boolean('exerted')->default(0)->nullable();
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
        Schema::dropIfExists('ticket_devices');
    }
};
