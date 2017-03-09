<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLojaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('loja', function(Blueprint $table)
		{
			$table->foreign('endereco_id', 'fk_loja_endereco')->references('endereco_id')->on('endereco')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('loja', function(Blueprint $table)
		{
			$table->dropForeign('fk_loja_endereco');
		});
	}

}
