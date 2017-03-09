<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 21:36:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FilmeTexto
 * 
 * @property int $filme_id
 * @property string $titulo
 * @property string $descricao
 *
 * @package App\Models
 */
class FilmeTexto extends Eloquent
{
	protected $table = 'filme_texto';
	protected $primaryKey = 'filme_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'filme_id' => 'int'
	];

	protected $fillable = [
		'titulo',
		'descricao'
	];
}
