<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            // verweis auf andere Tabell? Foreign-Key?
            $table->integer('firstPlayerId');
            $table->foreign('firstPlayerId')->references('id')->on('players');
            $table->integer('secondPlayerId');
            $table->foreign('secondPlayerId')->references('id')->on('players');
            $table->integer('fieldId');
            $table->foreign('fieldId')->references('id')->on('fields');
            $table->time('time');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
