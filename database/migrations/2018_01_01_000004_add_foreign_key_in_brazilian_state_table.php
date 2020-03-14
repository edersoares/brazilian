<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInBrazilianStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brazilian_state', function (Blueprint $table) {
            $table->foreign('capital_id')
                ->on('brazilian_city')
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
        Schema::table('brazilian_state', function (Blueprint $table) {
            $table->dropForeign(['capital_id']);
        });
    }
}
