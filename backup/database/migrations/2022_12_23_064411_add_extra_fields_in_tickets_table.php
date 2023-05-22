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
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('ticket_num')->nullable();
            $table->string('company')->nullable();
            $table->string('destination')->nullable();
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('issued_from')->nullable();
            $table->string('ticket_status')->default("pending")->nullable();
            $table->float('collector_profit',16,2)->nullable();
            $table->float('total_amount',16,2)->nullable();
            $table->float('admin_price',16,2)->nullable();
            $table->float('admin_profit',16,2)->nullable();
            $table->float('payment_iata',16,2)->nullable();
            $table->longText('Remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('ticket_num');
            $table->dropColumn('company');
            $table->dropColumn('destination');
            $table->dropColumn('departure_date');
            $table->dropColumn('return_date');
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('contact_no');
            $table->dropColumn('issued_from');
            $table->dropColumn('ticket_status');
            $table->dropColumn('collector_profit');
            $table->dropColumn('total_amount');
            $table->dropColumn('admin_price');
            $table->dropColumn('admin_profit');
            $table->dropColumn('payment_iata');
            $table->dropColumn('Remarks');
        });
    }
};
