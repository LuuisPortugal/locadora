<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmeAtorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filme_ator', function(Blueprint $table)
		{
			$table->smallInteger('ator_id')->unsigned();
			$table->smallInteger('filme_id')->unsigned()->index('idx_fk_filme_id');
			$table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->primary(['ator_id','filme_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filme_ator');
	}

}
