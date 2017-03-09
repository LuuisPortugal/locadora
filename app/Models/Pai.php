<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pai
 * 
 * @property int $pais_id
 * @property string $pais
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cidades
 *
 * @package App\Models
 */
class Pai extends Eloquent
{
	protected $primaryKey = 'pais_id';
	public $timestamps = false;

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'pais',
		'ultima_atualizacao'
	];

	public function cidades()
	{
		return $this->hasMany(\App\Models\Cidade::class, 'pais_id');
	}
}
