<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrCargo
 * 
 * @property int $id
 * @property string|null $cargo
 *
 * @package App\Models
 */
class PrCargo extends Model
{
	protected $table = 'pr_cargos';
	public $timestamps = false;

	protected $fillable = [
		'cargo'
	];
}
