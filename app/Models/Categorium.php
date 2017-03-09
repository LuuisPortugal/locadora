<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Categorium
 * 
 * @property int $categoria_id
 * @property string $nome
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $filme_categoria
 *
 * @package App\Models
 */
class Categorium extends Eloquent
{
	protected $primaryKey = 'categoria_id';
	public $timestamps = false;

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'nome',
		'ultima_atualizacao'
	];

	public function filme_categoria()
	{
		return $this->hasMany(\App\Models\FilmeCategorium::class, 'categoria_id');
	}
}
