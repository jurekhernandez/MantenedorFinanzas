<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class TbEgreso
 * 
 * @property int $id
 * @property int|null $monto
 * @property string|null $comentario
 * @property int|null $creado_por
 * @property bool|null $anulado
 * @property int|null $anulado_por
 * @property Carbon|null $fecha_egreso
 * @property Carbon|null $fecha_creacion
 * @property Carbon|null $fecha_anulacion
 * @property Carbon|null $fecha_actualizacion
 * 
 * @property TbUsuario $tb_usuario
 *
 * @package App\Models
 */
class TbEgreso extends Model
{
	protected $table = 'tb_egresos';
	// public $timestamps = false;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
	protected $casts = [
		'monto' => 'int',
		'creado_por' => 'int',
		'anulado' => 'bool',
		'anulado_por' => 'int'
	];

	protected $dates = [
		'fecha_egreso',
		'fecha_creacion',
		'fecha_anulacion',
		'fecha_actualizacion'
	];

	protected $fillable = [
		'monto',
		'comentario',
		'creado_por',
		'anulado',
		'anulado_por',
		'fecha_egreso',
		'fecha_creacion',
		'fecha_anulacion',
		'fecha_actualizacion'
	];

	public function tb_usuario()
	{
		return $this->belongsTo(TbUsuario::class, 'anulado_por');
	}

	
	public function resumen($desde , $hasta){
		// SELECT anulado, count(id) as cantidad, SUM(monto) as total FROM finanzas.tb_ingresos group by anulado;
		return TbEgreso::Select("anulado",  DB::raw("count(id) as cantidad"),  DB::raw("SUM(monto) as total "))
		->where('fecha_egreso','>=',$desde)
		->where('fecha_egreso','<=',$hasta)
		->groupBy('anulado')
		->getQuery()
		->get();
	}
}
