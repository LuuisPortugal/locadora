<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FilmeAtor
 * 
 * @property int $ator_id
 * @property int $filme_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Ator $ator
 * @property \App\Models\Filme $filme
 *
 * @package App\Models
 */
class FilmeAtor extends Eloquent
{
	protected $table = 'filme_ator';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ator_id' => 'int',
		'filme_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'ultima_atualizacao'
	];

	public function ator()
	{
		return $this->belongsTo(\App\Models\Ator::class);
	}

	public function filme()
	{
		return $this->belongsTo(\App\Models\Filme::class);
	}
}
