<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFuncionarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('funcionario', function(Blueprint $table)
		{
			$table->foreign('endereco_id', 'fk_funcionario_endereco')->references('endereco_id')->on('endereco')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('loja_id', 'fk_funcionario_loja')->references('loja_id')->on('loja')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('funcionario', function(Blueprint $table)
		{
			$table->dropForeign('fk_funcionario_endereco');
			$table->dropForeign('fk_funcionario_loja');
		});
	}

}
