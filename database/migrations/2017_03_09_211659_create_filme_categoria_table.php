<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmeCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filme_categoria', function(Blueprint $table)
		{
			$table->smallInteger('filme_id')->unsigned();
			$table->boolean('categoria_id')->index('fk_filme_categoria_categoria');
			$table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->primary(['filme_id','categoria_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filme_categoria');
	}

}
