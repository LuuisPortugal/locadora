<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('endereco', function(Blueprint $table)
		{
			$table->smallInteger('endereco_id', true)->unsigned();
			$table->string('endereco', 50);
			$table->string('endereco2', 50)->nullable();
			$table->string('bairro', 20);
			$table->smallInteger('cidade_id')->unsigned()->index('idx_fk_cidade_id');
			$table->string('cep', 10)->nullable();
			$table->string('telefone', 20);
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
		Schema::drop('endereco');
	}

}
