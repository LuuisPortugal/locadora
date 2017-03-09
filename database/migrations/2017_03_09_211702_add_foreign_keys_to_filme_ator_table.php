<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilmeAtorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('filme_ator', function(Blueprint $table)
		{
			$table->foreign('ator_id', 'fk_filme_ator_ator')->references('ator_id')->on('ator')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('filme_id', 'fk_filme_ator_filme')->references('filme_id')->on('filme')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('filme_ator', function(Blueprint $table)
		{
			$table->dropForeign('fk_filme_ator_ator');
			$table->dropForeign('fk_filme_ator_filme');
		});
	}

}
