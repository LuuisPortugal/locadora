<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLojaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loja', function(Blueprint $table)
		{
			$table->boolean('loja_id')->primary();
			$table->boolean('gerente_id')->unique('idx_unique_manager');
			$table->smallInteger('endereco_id')->unsigned()->index('idx_fk_endereco_id');
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
		Schema::drop('loja');
	}

}
