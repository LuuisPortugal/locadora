<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilmeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('filme', function(Blueprint $table)
		{
			$table->foreign('idioma_id', 'fk_filme_idioma')->references('idioma_id')->on('idioma')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('idioma_original_id', 'fk_filme_idioma_original')->references('idioma_id')->on('idioma')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('filme', function(Blueprint $table)
		{
			$table->dropForeign('fk_filme_idioma');
			$table->dropForeign('fk_filme_idioma_original');
		});
	}

}
