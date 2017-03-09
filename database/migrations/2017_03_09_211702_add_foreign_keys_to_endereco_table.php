<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('endereco', function(Blueprint $table)
		{
			$table->foreign('cidade_id', 'fk_endereco_cidade')->references('cidade_id')->on('cidade')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('endereco', function(Blueprint $table)
		{
			$table->dropForeign('fk_endereco_cidade');
		});
	}

}
