<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cliente
 * 
 * @property int $cliente_id
 * @property int $loja_id
 * @property string $primeiro_nome
 * @property string $ultimo_nome
 * @property string $email
 * @property int $endereco_id
 * @property bool $ativo
 * @property \Carbon\Carbon $data_criacao
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Endereco $endereco
 * @property \App\Models\Loja $loja
 * @property \Illuminate\Database\Eloquent\Collection $aluguels
 * @property \Illuminate\Database\Eloquent\Collection $pagamentos
 *
 * @package App\Models
 */
class Cliente extends Eloquent
{
	protected $table = 'cliente';
	protected $primaryKey = 'cliente_id';
	public $timestamps = false;

	protected $casts = [
		'loja_id' => 'int',
		'endereco_id' => 'int',
		'ativo' => 'bool'
	];

	protected $dates = [
		'data_criacao',
		'ultima_atualizacao'
	];

	protected $fillable = [
		'loja_id',
		'primeiro_nome',
		'ultimo_nome',
		'email',
		'endereco_id',
		'ativo',
		'data_criacao',
		'ultima_atualizacao'
	];

	public function endereco()
	{
		return $this->belongsTo(\App\Models\Endereco::class);
	}

	public function loja()
	{
		return $this->belongsTo(\App\Models\Loja::class);
	}

	public function aluguels()
	{
		return $this->hasMany(\App\Models\Aluguel::class);
	}

	public function pagamentos()
	{
		return $this->hasMany(\App\Models\Pagamento::class);
	}
}
