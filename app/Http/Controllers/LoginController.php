<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbUsuario;
use Illuminate\Support\Facades\Auth;
Use Alert;
class LoginController extends Controller
{

    public function username()
    {
        return 'correo';
    }
    public function uno()
    {  
        $usuario = new TbUsuario;
        $usuario->nombre = "Jurek";
        $usuario->apellido = "Hernández";
        $usuario->correo = "jurek.hernandez@gmail.com";
        $usuario->clave = "jurek";       
        $usuario->id_cargo = 1;
        $usuario->activo = 1;
        $usuario->bloqueado = 0;
        $usuario->save();
        dd($usuario);
    }
    public function loginForm()
    {
        return view('login');
    }
    public function login(Request $req)
    {
        $credenciales = $this->validate(request(), [
            'correo' => 'email|required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credenciales)) {
                return redirect('/');
        } else {       
            Alert::error('Datos Incorrectos', 'El correo o la clave son incorrectos');
            return redirect('/login');
        }
    }
    public function logout(Request $req)
    {
        $req->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
