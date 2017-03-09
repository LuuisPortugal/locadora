<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagamento', function(Blueprint $table)
		{
			$table->smallInteger('pagamento_id', true)->unsigned();
			$table->smallInteger('cliente_id')->unsigned()->index('idx_fk_cliente_id');
			$table->boolean('funcionario_id')->index('idx_fk_funcionario_id');
			$table->integer('aluguel_id')->nullable()->index('fk_pagamento_aluguel');
			$table->decimal('valor', 5);
			$table->dateTime('data_de_pagamento');
			$table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pagamento');
	}

}
