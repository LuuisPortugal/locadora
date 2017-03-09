<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAluguelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluguel', function(Blueprint $table)
		{
			$table->integer('aluguel_id', true);
			$table->dateTime('data_de_aluguel');
			$table->integer('inventario_id')->unsigned()->index('idx_fk_inventario_id');
			$table->smallInteger('cliente_id')->unsigned()->index('idx_fk_cliente_id');
			$table->dateTime('data_de_devolucao')->nullable();
			$table->boolean('funcionario_id')->index('idx_fk_funcionario_id');
			$table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['data_de_aluguel','inventario_id','cliente_id'], 'data_de_aluguel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluguel');
	}

}
