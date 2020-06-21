<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/**
 * Class TbIngreso
 * 
 * @property int $id
 * @property int|null $monto
 * @property string|null $comentario
 * @property int|null $creado_por
 * @property bool|null $anulado
 * @property int|null $anulado_por
 * @property Carbon|null $fecha_ingreso
 * @property Carbon|null $fecha_creacion
 * @property Carbon|null $fecha_actualizacion
 * @property Carbon|null $fecha_anulacion
 * 
 * @property TbUsuario $tb_usuario
 *
 * @package App\Models
 */
class TbIngreso extends Model
{
	protected $table = 'tb_ingresos';
	//public $timestamps = false;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
	protected $casts = [
		'monto' => 'int',
		'creado_por' => 'int',
		'anulado' => 'bool',
		'anulado_por' => 'int'
	];

	protected $dates = [
		'fecha_ingreso',
		'fecha_creacion',
		'fecha_actualizacion',
		'fecha_anulacion'
	];

	protected $fillable = [
		'monto',
		'comentario',
		'creado_por',
		'anulado',
		'anulado_por',
		'fecha_ingreso',
		'fecha_creacion',
		'fecha_actualizacion',
		'fecha_anulacion'
	];

	public function tb_usuario()
	{
		return $this->belongsTo(TbUsuario::class, 'anulado_por');
	}

	public function resumen($desde , $hasta){
		// SELECT anulado, count(id) as cantidad, SUM(monto) as total FROM finanzas.tb_ingresos group by anulado;
		return TbIngreso::Select("anulado",  DB::raw("count(id) as cantidad"),  DB::raw("SUM(monto) as total "))
		->where('fecha_ingreso','>=',$desde)
		->where('fecha_ingreso','<=',$hasta)
		->groupBy('anulado')
		->getQuery()
		->get();
	}
}
