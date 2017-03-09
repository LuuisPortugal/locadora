<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cidade
 * 
 * @property int $cidade_id
 * @property string $cidade
 * @property int $pais_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Pai $pai
 * @property \Illuminate\Database\Eloquent\Collection $enderecos
 *
 * @package App\Models
 */
class Cidade extends Eloquent
{
	protected $table = 'cidade';
	protected $primaryKey = 'cidade_id';
	public $timestamps = false;

	protected $casts = [
		'pais_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'cidade',
		'pais_id',
		'ultima_atualizacao'
	];

	public function pai()
	{
		return $this->belongsTo(\App\Models\Pai::class, 'pais_id');
	}

	public function enderecos()
	{
		return $this->hasMany(\App\Models\Endereco::class);
	}
}
