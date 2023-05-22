<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flightpackages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('flight_to');
            $table->string('flight_from');
            $table->text('image');
            $table->string('way_of_flight');
            $table->string('total_stops');
            $table->string('take_off_time');
            $table->string('land_time');
            $table->string('date_of_flight');
            $table->string('airline');
            $table->string('duration');
            $table->string('flight_number');
            $table->string('aircraft');
            $table->string('flight_type');
            $table->string('seats_left');
            $table->string('adult_baggage');
            $table->string('price');
            $table->string('adults');
            $table->string('childrens');
            $table->string('infants');
            $table->string('pnr_no');
            $table->integer('status');
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
        Schema::dropIfExists('flightpackages');
    }
}
