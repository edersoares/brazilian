<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrazilianStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brazilian_state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('abbreviation');
            $table->unsignedInteger('capital_id');
            $table->foreign('capital_id')->on('brazilian_city')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brazilian_state');
    }
}
