<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('age');
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('pidname')->nullable();
            $table->string('dob')->nullable();
            $table->string('pidno')->nullable();
            $table->string('pied')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
