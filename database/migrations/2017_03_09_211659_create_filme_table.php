<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilmeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filme', function(Blueprint $table)
		{
			$table->smallInteger('filme_id', true)->unsigned();
			$table->string('titulo')->index('idx_titulo');
			$table->text('descricao', 65535)->nullable();
			$table->date('ano_de_lancamento')->nullable();
			$table->boolean('idioma_id')->index('idx_fk_idioma_id');
			$table->boolean('idioma_original_id')->nullable()->index('idx_fk_idioma_original_id');
			$table->boolean('duracao_da_locacao')->default(3);
			$table->decimal('preco_da_locacao', 4)->default(4.99);
			$table->smallInteger('duracao_do_filme')->unsigned()->nullable();
			$table->decimal('custo_de_substituicao', 5)->default(19.99);
			$table->enum('classificacao', array('G','PG','PG-13','R','NC-17'))->nullable()->default('G');
			$table->simple_array('recursos_especiais')->nullable();
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
		Schema::drop('filme');
	}

}
