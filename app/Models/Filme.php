<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Filme
 * 
 * @property int $filme_id
 * @property string $titulo
 * @property string $descricao
 * @property \Carbon\Carbon $ano_de_lancamento
 * @property int $idioma_id
 * @property int $idioma_original_id
 * @property int $duracao_da_locacao
 * @property float $preco_da_locacao
 * @property int $duracao_do_filme
 * @property float $custo_de_substituicao
 * @property string $classificacao
 * @property set $recursos_especiais
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Idioma $idioma
 * @property \Illuminate\Database\Eloquent\Collection $ators
 * @property \Illuminate\Database\Eloquent\Collection $filme_categoria
 * @property \Illuminate\Database\Eloquent\Collection $inventarios
 *
 * @package App\Models
 */
class Filme extends Eloquent
{
	protected $table = 'filme';
	protected $primaryKey = 'filme_id';
	public $timestamps = false;

	protected $casts = [
		'idioma_id' => 'int',
		'idioma_original_id' => 'int',
		'duracao_da_locacao' => 'int',
		'preco_da_locacao' => 'float',
		'duracao_do_filme' => 'int',
		'custo_de_substituicao' => 'float',
		'recursos_especiais' => 'set'
	];

	protected $dates = [
		'ano_de_lancamento',
		'ultima_atualizacao'
	];

	protected $fillable = [
		'titulo',
		'descricao',
		'ano_de_lancamento',
		'idioma_id',
		'idioma_original_id',
		'duracao_da_locacao',
		'preco_da_locacao',
		'duracao_do_filme',
		'custo_de_substituicao',
		'classificacao',
		'recursos_especiais',
		'ultima_atualizacao'
	];

	public function idioma()
	{
		return $this->belongsTo(\App\Models\Idioma::class, 'idioma_original_id');
	}

	public function ators()
	{
		return $this->belongsToMany(\App\Models\Ator::class, 'filme_ator')
					->withPivot('ultima_atualizacao');
	}

	public function filme_categoria()
	{
		return $this->hasMany(\App\Models\FilmeCategorium::class);
	}

	public function inventarios()
	{
		return $this->hasMany(\App\Models\Inventario::class);
	}
}
