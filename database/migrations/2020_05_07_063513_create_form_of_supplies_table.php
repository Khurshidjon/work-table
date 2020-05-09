<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormOfSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_of_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cash')->nullable();
            $table->string('money_transfer')->nullable();
            $table->string('foods')->nullable();
            $table->string('employment')->nullable();
            $table->string('training')->nullable();
            $table->integer('data_collection_id')->nullable();
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
        Schema::dropIfExists('form_of_supplies');
    }
}
