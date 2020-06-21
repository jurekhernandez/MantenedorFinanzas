<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\TbIngreso;
use App\Models\TbEgreso;
use Illuminate\Support\Facades\Auth;
use Alert;
use Carbon\Carbon;
class FinanzasController extends Controller
{
    use ApiResponser;
    private $validar=array(
            'comentario'=>'required|min:5',
            'monto'=>'required|numeric|min:1000',
    );

    public function Listadoingresos(){
        $listado = TbIngreso::all();
        return view("finanzas.ingresos",['listado'=>$listado]);
    }

    public function registrarIngreso(Request $req){

        $this->validate($req,array_merge($this->validar,[
            'fecha_ingreso'=>'required|date',
        ]));

        $ingreso = new TbIngreso;
        $ingreso->creado_por = Auth::id();
        $ingreso->comentario=$req->comentario;
        $ingreso->monto=$req->monto;
        $ingreso->fecha_ingreso= $req->fecha_ingreso;
        $ingreso->save();

        if ($ingreso) {
            return $this->retornoAjax("success", "Registro Ingresado", "Exito!");
        } else {
            return $this->retornoAjax("error", "error creando el registro", "Problema !");
        }
    }

    public function anularIngreso(Request $req, $id)
    {
        $ingreso = TbIngreso::find($id);
        if ($ingreso) {
            $ingreso->anulado=1;
            $ingreso->fecha_anulacion = Carbon::now();
            $ingreso->anulado_por = Auth::id();
            $res=$ingreso->save();
            if($res){
                 return $this->retornoAjax("success", "Registro Anulado", "Exito!");
            }else{
                return $this->retornoAjax("error", "No se pudo anular el registro", "Problema !");
            }
        } else {
            return $this->retornoAjax("error", "No se encontro el registro", "Problema !");
        }

    }





    public function ListadoEgresos(){
        $listado = TbEgreso::all();
        return view("finanzas.egresos",['listado'=>$listado]);
    }

    public function registrarEgreso(Request $req){

        $this->validate($req,array_merge($this->validar,[
            'fecha_egreso'=>'required|date',
        ]));

        $egreso = new TbEgreso;
        $egreso->creado_por = Auth::id();
        $egreso->comentario=$req->comentario;
        $egreso->monto=$req->monto;
        $egreso->fecha_egreso= $req->fecha_egreso;
        $egreso->save();

        if ($egreso) {
            return $this->retornoAjax("success", "Registro Ingresado", "Exito!");
        } else {
            return $this->retornoAjax("error", "error creando el registro", "Problema !");
        }
    }

    public function anularEgreso(Request $req, $id)
    {
        $egreso = TbEgreso::find($id);
        if ($egreso) {
            $egreso->anulado=1;
            $egreso->fecha_anulacion = Carbon::now();
            $egreso->anulado_por = Auth::id();
            $res=$egreso->save();
            if($res){
                 return $this->retornoAjax("success", "Registro Anulado", "Exito!");
            }else{
                return $this->retornoAjax("error", "No se pudo anular el registro", "Problema !");
            }
        } else {
            return $this->retornoAjax("error", "No se encontro el registro", "Problema !");
        }

    }



}
