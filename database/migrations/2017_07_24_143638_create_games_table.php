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
            // $table->primary('id');

            $table->integer('first_player_id')->unsigned();

            $table->integer('second_player_id')->unsigned();

            $table->integer('field_id')->unsigned();

            $table->time('time');
            $table->date('date');


        });
          // verweis auf andere Tabell? Foreign-Key?
        Schema::table('games', function (Blueprint $table) {
          $table->foreign('first_player_id')->references('id')->on('players');
          $table->foreign('second_player_id')->references('id')->on('players');
          $table->foreign('field_id')->references('id')->on('fields');
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
