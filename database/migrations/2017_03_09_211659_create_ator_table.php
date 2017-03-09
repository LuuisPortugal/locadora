<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAtorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ator', function(Blueprint $table)
		{
			$table->smallInteger('ator_id', true)->unsigned();
			$table->string('primeiro_nome', 45);
			$table->string('ultimo_nome', 45)->index('idx_ator_ultimo_nome');
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
		Schema::drop('ator');
	}

}
