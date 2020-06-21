<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        public function retornoAjax($status, $mensaje, $titulo = null, $extras = array())
    {
        return json_encode(array('status' => $status, "mensaje" => $mensaje, "titulo" => $titulo, "extra" => $extras));
    }
}
