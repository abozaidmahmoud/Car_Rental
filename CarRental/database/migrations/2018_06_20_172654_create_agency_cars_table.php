<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agency_id');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('agency_cars');
    }
}
