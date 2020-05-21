<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestockSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestock_supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('large_horned')->nullable();
            $table->string('small_horned')->nullable();
            $table->string('birds')->nullable();
            $table->integer('form_of_supply_id')->nullable();
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
        Schema::dropIfExists('livestock_supplies');
    }
}
