<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cliente', function(Blueprint $table)
		{
			$table->foreign('endereco_id', 'fk_cliente_endereco')->references('endereco_id')->on('endereco')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('loja_id', 'fk_cliente_loja')->references('loja_id')->on('loja')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cliente', function(Blueprint $table)
		{
			$table->dropForeign('fk_cliente_endereco');
			$table->dropForeign('fk_cliente_loja');
		});
	}

}
