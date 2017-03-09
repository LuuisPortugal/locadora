<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Aluguel
 * 
 * @property int $aluguel_id
 * @property \Carbon\Carbon $data_de_aluguel
 * @property int $inventario_id
 * @property int $cliente_id
 * @property \Carbon\Carbon $data_de_devolucao
 * @property int $funcionario_id
 * @property \Carbon\Carbon $ultima_atualizacao
 * 
 * @property \App\Models\Cliente $cliente
 * @property \App\Models\Funcionario $funcionario
 * @property \App\Models\Inventario $inventario
 * @property \Illuminate\Database\Eloquent\Collection $pagamentos
 *
 * @package App\Models
 */
class Aluguel extends Eloquent
{
	protected $table = 'aluguel';
	protected $primaryKey = 'aluguel_id';
	public $timestamps = false;

	protected $casts = [
		'inventario_id' => 'int',
		'cliente_id' => 'int',
		'funcionario_id' => 'int'
	];

	protected $dates = [
		'data_de_aluguel',
		'data_de_devolucao',
		'ultima_atualizacao'
	];

	protected $fillable = [
		'data_de_aluguel',
		'inventario_id',
		'cliente_id',
		'data_de_devolucao',
		'funcionario_id',
		'ultima_atualizacao'
	];

	public function cliente()
	{
		return $this->belongsTo(\App\Models\Cliente::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(\App\Models\Funcionario::class);
	}

	public function inventario()
	{
		return $this->belongsTo(\App\Models\Inventario::class);
	}

	public function pagamentos()
	{
		return $this->hasMany(\App\Models\Pagamento::class);
	}
}
