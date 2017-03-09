<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCidadeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cidade', function(Blueprint $table)
		{
			$table->foreign('pais_id', 'fk_cidade_pais')->references('pais_id')->on('pais')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cidade', function(Blueprint $table)
		{
			$table->dropForeign('fk_cidade_pais');
		});
	}

}
