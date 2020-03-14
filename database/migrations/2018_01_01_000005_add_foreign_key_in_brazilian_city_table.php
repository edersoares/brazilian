<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInBrazilianCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brazilian_city', function (Blueprint $table) {
            $table->foreign('state_id')
                ->on('brazilian_state')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brazilian_city', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
        });
    }
}
