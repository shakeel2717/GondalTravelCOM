<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('air_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('iata')->nullable();
            $table->string('icao')->nullable();
            $table->string('callsign')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('air_lines');
    }
};
