<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Models\TbEmpresa;
use Illuminate\Http\Request;
use App\Models\TbUsuario;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
   use ApiResponser;
   private $reglas = [
         'nombre' => 'required|max:30',
         'apellido' => 'required|max:30',
         'correo' => 'required|email|max:250|unique:tb_usuarios,correo',
         'clave' => 'required|min:6|max:250',
         'reclave' => '|max:250|same:clave',
      ];
   public function index(){
      $usuarios = TbUsuario::all();
      return view("usuarios.usuarios", ["usuarios" => $usuarios]);
   }

   public function registrar(Request $req){
      $this->validate($req, $this->reglas);
      $usu = new TbUsuario;
      $usu->nombre   = $req->nombre;
      $usu->apellido   = $req->apellido;
      $usu->correo   = $req->correo;
      $usu->clave   = $req->clave;
      $usu->creado_por   = Auth::id();
      $usu->save();
      if ($usu) {
         return $this->retornoAjax("success", "usuario creado ", "Creado");
      } else {
         return $this->retornoAjax("error", "error creando usuario", "Problema !");
      }

   }

   public function show($id)
   {
      $usu = TbUsuario::find($id);
      if ($usu) {
        // return $this->successResponse($usu);
         return $this->retornoAjax("success", "usuario encontrado ", "bus", $usu);
      } else {
         return $this->retornoAjax("error", "error buscando  usuario", "Problema !");
      }
   }
   public function update($id, Request $req)
   {
        $reglas = [
         'nombre' => 'required|max:30',
         'apellido' => 'required|max:30',
         'correo' => 'required|email|max:250|unique:tb_usuarios,correo,'.$id
      ];
      if( trim($req->clave) != "" ){

         $this->validate($req, array_merge($reglas, [
         'clave' => 'required|min:6|max:250',
         'reclave' => '|max:250|same:clave']));
      }else{


         $this->validate($req, $reglas);
      }

      $usu = TbUsuario::find($id);
      if ($usu) {         
         $usu->nombre   = $req->nombre;
         $usu->apellido   = $req->apellido;
         $usu->correo   = $req->correo;
         if(trim($req->clave) != ""){
            $usu->clave  = $req->clave;
         }
         $usu->save();
         if ($usu) {
            return $this->retornoAjax("success", "usuario actualizado ", "actualizado");
         } else {
            return $this->retornoAjax("error", "error actualizando usuario", "Problema !");
         }
      } else {
         return $this->retornoAjax("error", "usuario no encontrado", "Problema !");
      }

   }

}
