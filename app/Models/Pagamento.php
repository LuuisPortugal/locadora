<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pagamento
 * 
 * @property int $pagamento_id
 * @property int $cliente_id
 * @property int $funcionario_id
 * @property int $aluguel_id
 * @property float $valor
 * @property \Carbon\Carbon $data_de_pagamento
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Aluguel $aluguel
 * @property \App\Models\Cliente $cliente
 * @property \App\Models\Funcionario $funcionario
 *
 * @package App\Models
 */
class Pagamento extends Eloquent
{
	protected $table = 'pagamento';
	protected $primaryKey = 'pagamento_id';
	public $timestamps = false;

	protected $casts = [
		'cliente_id' => 'int',
		'funcionario_id' => 'int',
		'aluguel_id' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'data_de_pagamento',
		'ultima_atualizacao'
	];

	protected $fillable = [
		'cliente_id',
		'funcionario_id',
		'aluguel_id',
		'valor',
		'data_de_pagamento',
		'ultima_atualizacao'
	];

	public function aluguel()
	{
		return $this->belongsTo(\App\Models\Aluguel::class);
	}

	public function cliente()
	{
		return $this->belongsTo(\App\Models\Cliente::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(\App\Models\Funcionario::class);
	}
}
