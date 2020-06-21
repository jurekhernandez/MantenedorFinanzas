<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Models\TbIngreso;
use Facades\App\Models\TbEgreso;
class ReporteController extends Controller
{
    public function index(){
      /*  $tabla=array(
            "anulado"=>"si",
            "cantidad"=>0,
            "total"=>0,
            )
        $resumenIngreso = TbIngreso::resumen("2020-06-19" , "2020-06-20");
        $resumenEgreso = TbEgreso::resumen("2020-06-19" , "2020-06-20");
        dd($resumenIngreso );*/
        return view('finanzas.reporte');
    }
    public function reporte(Request $req){
        $reglas = [
            'desde' => 'required',
            'hasta' => 'required',
        ];
        $this->validate($req,$reglas);

        $resumenIngreso = TbIngreso::resumen($req->desde , $req->hasta);
        $resumenEgreso = TbEgreso::resumen($req->desde , $req->hasta);
        return $this->retornoAjax("success", "usuario encontrado ", "bus", ['resumenIngreso'=>$resumenIngreso, 'resumenEgreso'=>$resumenEgreso]);
    }
}
