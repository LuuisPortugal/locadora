<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ator
 * 
 * @property int $ator_id
 * @property string $primeiro_nome
 * @property string $ultimo_nome
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $filmes
 *
 * @package App\Models
 */
class Ator extends Eloquent
{
	protected $table = 'ator';
	protected $primaryKey = 'ator_id';
	public $timestamps = false;

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'primeiro_nome',
		'ultimo_nome',
		'ultima_atualizacao'
	];

	public function filmes()
	{
		return $this->belongsToMany(\App\Models\Filme::class, 'filme_ator')
					->withPivot('ultima_atualizacao');
	}
}
