<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FilmeCategorium
 * 
 * @property int $filme_id
 * @property int $categoria_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Categorium $categorium
 * @property \App\Models\Filme $filme
 *
 * @package App\Models
 */
class FilmeCategorium extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'filme_id' => 'int',
		'categoria_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'ultima_atualizacao'
	];

	public function categorium()
	{
		return $this->belongsTo(\App\Models\Categorium::class, 'categoria_id');
	}

	public function filme()
	{
		return $this->belongsTo(\App\Models\Filme::class);
	}
}
