<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrazilianCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brazilian_city', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('name');
            $table->foreign('state_id')->on('brazilian_state')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brazilian_city');
    }
}
