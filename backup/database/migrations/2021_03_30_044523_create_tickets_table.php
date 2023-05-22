<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
             $table->id();
            $table->string('user_id')->nullable();
            $table->longText('details');
            $table->string('prn_no');
            $table->string('status')->default(false);
            $table->boolean('payment_status')->default(false);
            $table->string('payment_method');
            $table->float('amount',36);
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
        Schema::dropIfExists('tickets');
    }
}
