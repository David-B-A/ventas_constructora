<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->integer('id_document_type')->unsigned();
            $table->foreign('id_document_type')->references('id')->on('document_types');            
            $table->string('link');
            $table->smallinteger('status'); //0: not reviewed, 1: acepted, 2: rejected.
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
        Schema::dropIfExists('documents');
    }
}
