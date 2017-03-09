<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente', function(Blueprint $table)
		{
			$table->smallInteger('cliente_id', true)->unsigned();
			$table->boolean('loja_id')->index('idx_fk_loja_id');
			$table->string('primeiro_nome', 45);
			$table->string('ultimo_nome', 45)->index('idx_ultimo_nome');
			$table->string('email', 50)->nullable();
			$table->smallInteger('endereco_id')->unsigned()->index('idx_fk_endereco_id');
			$table->boolean('ativo')->default(1);
			$table->dateTime('data_criacao');
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
		Schema::drop('cliente');
	}

}
