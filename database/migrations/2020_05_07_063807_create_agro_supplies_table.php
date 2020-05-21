<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgroSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agro_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sotix')->nullable();
            $table->string('sum')->nullable();
            $table->integer('form_of_supply_id');
            $table->integer('data_collection_id');
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
        Schema::dropIfExists('agro_supplies');
    }
}
