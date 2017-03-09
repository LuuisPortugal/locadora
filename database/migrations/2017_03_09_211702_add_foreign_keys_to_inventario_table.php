<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInventarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('inventario', function(Blueprint $table)
		{
			$table->foreign('filme_id', 'fk_inventario_filme')->references('filme_id')->on('filme')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('loja_id', 'fk_inventario_loja')->references('loja_id')->on('loja')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('inventario', function(Blueprint $table)
		{
			$table->dropForeign('fk_inventario_filme');
			$table->dropForeign('fk_inventario_loja');
		});
	}

}
