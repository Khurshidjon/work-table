<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoorFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poor_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unemployed_count')->nullable();
            $table->string('disable_people_count')->nullable();
            $table->string('low_income_families_count')->nullable();
            $table->string('large_families_count')->nullable();
            $table->string('lost_breadwinner_count')->nullable();
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
        Schema::dropIfExists('poor_families');
    }
}
