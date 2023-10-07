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
        Schema::create('ticket_templates', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->unsignedDecimal('bandwidth')->nullable();
            $table->unsignedDecimal('data_limit')->default(0)->nullable();
            $table->unsignedDecimal('duration')->nullable();
            $table->string('duration_unit')->nullable();
            $table->json('sites_blacklist')->nullable();
            $table->json('sites_whitelist')->nullable();
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
        Schema::dropIfExists('ticket_templates');
    }
};
