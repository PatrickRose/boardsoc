<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameGeekGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_geek_games', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
            $table->string('name');
            $table->integer('minplayers');
            $table->integer('maxplayers');
            $table->string('image');
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
		Schema::drop('board_game_geek_games');
	}

}
