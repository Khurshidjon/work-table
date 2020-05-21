<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('colspan')->nullable();
            $table->integer('rowspan')->nullable();
            $table->string('order')->nullable();
            $table->string('position')->nullable();
            $table->integer('table_id')->nullable();
            $table->integer('formula_id')->nullable();
            $table->string('head_style')->nullable()->default('horizontal')->comment("vertical or horizontal text in table head");
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
        Schema::dropIfExists('sections');
    }
}
