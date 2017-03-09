<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Funcionario
 * 
 * @property int $funcionario_id
 * @property string $primeiro_nome
 * @property string $ultimo_nome
 * @property int $endereco_id
 * @property boolean $foto
 * @property string $email
 * @property int $loja_id
 * @property bool $ativo
 * @property string $usuario
 * @property string $senha
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Endereco $endereco
 * @property \App\Models\Loja $loja
 * @property \Illuminate\Database\Eloquent\Collection $aluguels
 * @property \Illuminate\Database\Eloquent\Collection $pagamentos
 *
 * @package App\Models
 */
class Funcionario extends Eloquent
{
	protected $table = 'funcionario';
	protected $primaryKey = 'funcionario_id';
	public $timestamps = false;

	protected $casts = [
		'endereco_id' => 'int',
		'foto' => 'boolean',
		'loja_id' => 'int',
		'ativo' => 'bool'
	];

	protected $dates = [
		'ultima_atualizacao'
	];

	protected $fillable = [
		'primeiro_nome',
		'ultimo_nome',
		'endereco_id',
		'foto',
		'email',
		'loja_id',
		'ativo',
		'usuario',
		'senha',
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
