<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sale')->unsigned();
            $table->foreign('id_sale')->references('id')->on('sales');
            $table->date('limit_date');
            $table->float('interest_payment');
            $table->float('capital_payment');
            $table->boolean('status');//0:unconfirmed, 1: payment confirmed
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
        Schema::dropIfExists('scheduled_payments');
    }
}
