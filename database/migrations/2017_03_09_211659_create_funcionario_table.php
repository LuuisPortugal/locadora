<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuncionarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('funcionario', function(Blueprint $table)
		{
			$table->boolean('funcionario_id')->primary();
			$table->string('primeiro_nome', 45);
			$table->string('ultimo_nome', 45);
			$table->smallInteger('endereco_id')->unsigned()->index('idx_fk_endereco_id');
			$table->binary('foto', 65535)->nullable();
			$table->string('email', 50)->nullable();
			$table->boolean('loja_id')->index('idx_fk_loja_id');
			$table->boolean('ativo')->default(1);
			$table->string('usuario', 16);
			$table->string('senha', 40)->nullable();
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
		Schema::drop('funcionario');
	}

}
