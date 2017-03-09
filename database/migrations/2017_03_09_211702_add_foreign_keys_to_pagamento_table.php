<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPagamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pagamento', function(Blueprint $table)
		{
			$table->foreign('aluguel_id', 'fk_pagamento_aluguel')->references('aluguel_id')->on('aluguel')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('cliente_id', 'fk_pagamento_cliente')->references('cliente_id')->on('cliente')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('funcionario_id', 'fk_pagamento_funcionario')->references('funcionario_id')->on('funcionario')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pagamento', function(Blueprint $table)
		{
			$table->dropForeign('fk_pagamento_aluguel');
			$table->dropForeign('fk_pagamento_cliente');
			$table->dropForeign('fk_pagamento_funcionario');
		});
	}

}
