<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers');            
            $table->integer('id_apartment')->unsigned();            
            $table->foreign('id_apartment')->references('id')->on('apartments');            
            $table->integer('id_payment_type')->unsigned();
            $table->foreign('id_payment_type')->references('id')->on('payment_types');            
            $table->float('final_price');
            $table->float('paid_value');
            $table->float('missing_value');
            $table->boolean('status');//0: still paying, 1: paid 
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
        Schema::dropIfExists('sales');
    }
}
