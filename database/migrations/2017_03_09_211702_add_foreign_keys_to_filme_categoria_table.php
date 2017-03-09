<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilmeCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('filme_categoria', function(Blueprint $table)
		{
			$table->foreign('categoria_id', 'fk_filme_categoria_categoria')->references('categoria_id')->on('categoria')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('filme_id', 'fk_filme_categoria_filme')->references('filme_id')->on('filme')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('filme_categoria', function(Blueprint $table)
		{
			$table->dropForeign('fk_filme_categoria_categoria');
			$table->dropForeign('fk_filme_categoria_filme');
		});
	}

}
