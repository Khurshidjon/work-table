<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('status')->nullable()->default(0)->comment("0 - unpublished, 1 - published");
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
        Schema::dropIfExists('unit_measurements');
    }
}
