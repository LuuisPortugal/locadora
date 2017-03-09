<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Endereco
 * 
 * @property int $endereco_id
 * @property string $endereco
 * @property string $endereco2
 * @property string $bairro
 * @property int $cidade_id
 * @property string $cep
 * @property string $telefone
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Cidade $cidade
 * @property \Illuminate\Database\Eloquent\Collection $clientes
 * @property \Illuminate\Database\Eloquent\Collection $funcionarios
 * @property \Illuminate\Database\Eloquent\Collection $lojas
 *
 * @package App\Models
 */
class Endereco extends Eloquent
{
	protected $table = 'endereco';
	protected $primaryKey = 'endereco_id';
	public $timestamps = false;

	protected $casts = [
		'cidade_id' => 'int'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'endereco',
		'endereco2',
		'bairro',
		'cidade_id',
		'cep',
		'telefone',
		'ultima_atualizacao'
	];

	public function cidade()
	{
		return $this->belongsTo(\App\Models\Cidade::class);
	}

	public function clientes()
	{
		return $this->hasMany(\App\Models\Cliente::class);
	}

	public function funcionarios()
	{
		return $this->hasMany(\App\Models\Funcionario::class);
	}

	public function lojas()
	{
		return $this->hasMany(\App\Models\Loja::class);
	}
}
