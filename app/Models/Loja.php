<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Loja
 * 
 * @property int $loja_id
 * @property int $gerente_id
 * @property int $endereco_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Endereco $endereco
 * @property \Illuminate\Database\Eloquent\Collection $clientes
 * @property \Illuminate\Database\Eloquent\Collection $funcionarios
 * @property \Illuminate\Database\Eloquent\Collection $inventarios
 *
 * @package App\Models
 */
class Loja extends Eloquent
{
	protected $table = 'loja';
	protected $primaryKey = 'loja_id';
	public $timestamps = false;

	protected $casts = [
		'gerente_id' => 'int',
		'endereco_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'gerente_id',
		'endereco_id',
		'ultima_atualizacao'
	];

	public function endereco()
	{
		return $this->belongsTo(\App\Models\Endereco::class);
	}

	public function clientes()
	{
		return $this->hasMany(\App\Models\Cliente::class);
	}

	public function funcionarios()
	{
		return $this->hasMany(\App\Models\Funcionario::class);
	}

	public function inventarios()
	{
		return $this->hasMany(\App\Models\Inventario::class);
	}
}
