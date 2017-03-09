<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmeTextoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filme_texto', function(Blueprint $table)
		{
			$table->smallInteger('filme_id')->primary();
			$table->string('titulo');
			$table->text('descricao', 65535)->nullable();
			$table->index(['titulo','descricao'], 'idx_titulo_descricao');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filme_texto');
	}

}
