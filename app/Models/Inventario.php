<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Inventario
 * 
 * @property int $inventario_id
 * @property int $filme_id
 * @property int $loja_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Filme $filme
 * @property \App\Models\Loja $loja
 * @property \Illuminate\Database\Eloquent\Collection $aluguels
 *
 * @package App\Models
 */
class Inventario extends Eloquent
{
	protected $table = 'inventario';
	protected $primaryKey = 'inventario_id';
	public $timestamps = false;

	protected $casts = [
		'filme_id' => 'int',
		'loja_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'filme_id',
		'loja_id',
		'ultima_atualizacao'
	];

	public function filme()
	{
		return $this->belongsTo(\App\Models\Filme::class);
	}

	public function loja()
	{
		return $this->belongsTo(\App\Models\Loja::class);
	}

	public function aluguels()
	{
		return $this->hasMany(\App\Models\Aluguel::class);
	}
}
