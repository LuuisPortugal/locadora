<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Idioma
 * 
 * @property int $idioma_id
 * @property string $nome
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $filmes
 *
 * @package App\Models
 */
class Idioma extends Eloquent
{
	protected $table = 'idioma';
	protected $primaryKey = 'idioma_id';
	public $timestamps = false;

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'nome',
		'ultima_atualizacao'
	];

	public function filmes()
	{
		return $this->hasMany(\App\Models\Filme::class, 'idioma_original_id');
	}
}
