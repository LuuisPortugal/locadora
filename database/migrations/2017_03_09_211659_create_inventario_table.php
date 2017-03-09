<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventario', function(Blueprint $table)
		{
			$table->increments('inventario_id');
			$table->smallInteger('filme_id')->unsigned()->index('idx_fk_filme_id');
			$table->boolean('loja_id');
			$table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->index(['loja_id','filme_id'], 'idx_loja_id_filme_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inventario');
	}

}
