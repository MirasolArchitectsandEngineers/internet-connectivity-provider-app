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
        Schema::create('routers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable()->unique();
            $table->string('model')->nullable();
            $table->string('host')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routers');
    }
};
