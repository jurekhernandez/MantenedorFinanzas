<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
/**
 * Class TbUsuario
 * 
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string $correo
 * @property string $clave
 * @property int|null $id_cargo
 * @property string|null $red
 * @property string|null $token
 * @property int|null $creado_por
 * @property bool|null $activo
 * @property bool|null $bloqueado
 * @property Carbon|null $fecha_creacion
 * @property Carbon|null $fecha_actualizacion
 * @property Carbon|null $fecha_eliminacion
 * 
 * @property TbUsuario $tb_usuario
 * @property Collection|TbEgreso[] $tb_egresos
 * @property Collection|TbIngreso[] $tb_ingresos
 * @property Collection|TbUsuario[] $tb_usuarios
 *
 * @package App\Models
 */
class TbUsuario extends Authenticatable
{
	protected $table = 'tb_usuarios';
	public $timestamps = false;

	protected $casts = [
		'id_cargo' => 'int',
		'creado_por' => 'int',
		'activo' => 'bool',
		'bloqueado' => 'bool'
	];

	protected $dates = [
		'fecha_creacion',
		'fecha_actualizacion',
		'fecha_eliminacion'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'correo',
		'clave',
		'id_cargo',
		'red',
		'token',
		'creado_por',
		'activo',
		'bloqueado',
		'fecha_creacion',
		'fecha_actualizacion',
		'fecha_eliminacion'
	];


	public function setClaveAttribute($value){
		$this->attributes['clave'] =  bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->clave;
    }


	public function tb_usuario()
	{
		return $this->belongsTo(TbUsuario::class, 'creado_por');
	}

	public function tb_egresos()
	{
		return $this->hasMany(TbEgreso::class, 'anulado_por');
	}

	public function tb_ingresos()
	{
		return $this->hasMany(TbIngreso::class, 'anulado_por');
	}

	public function tb_usuarios()
	{
		return $this->hasMany(TbUsuario::class, 'creado_por');
	}
}
