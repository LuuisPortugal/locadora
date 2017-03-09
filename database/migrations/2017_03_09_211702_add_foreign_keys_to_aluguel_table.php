<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAluguelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aluguel', function(Blueprint $table)
		{
			$table->foreign('cliente_id', 'fk_aluguel_cliente')->references('cliente_id')->on('cliente')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('funcionario_id', 'fk_aluguel_funcionario')->references('funcionario_id')->on('funcionario')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('inventario_id', 'fk_aluguel_inventario')->references('inventario_id')->on('inventario')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aluguel', function(Blueprint $table)
		{
			$table->dropForeign('fk_aluguel_cliente');
			$table->dropForeign('fk_aluguel_funcionario');
			$table->dropForeign('fk_aluguel_inventario');
		});
	}

}
