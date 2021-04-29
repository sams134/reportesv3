<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use App\Motor;
use Illuminate\Support\Facades\Auth;

class BitacorasController extends Controller
{
    //
    public function addComent($id_motor,$coment)
    {
        if ($coment != "")
        {
            $bitacora_coment = new Bitacora();
             $bitacora_coment->descripcion = $coment;
            $bitacora_coment->id_trabajo = $id_motor;
            switch ( Auth::user()->userType)
            {
                case 1: $bitacora_coment->titulo = "Comentario Gerente Produccion";
                    break;
                case 2: $bitacora_coment->titulo = "Comentario Gerencia";
                    break;
                case 3: $bitacora_coment->titulo = "Comentario Administracion";
                    break;
                case 4: $bitacora_coment->titulo = "Comentario de Bodega";
                    break;
                case 5: $bitacora_coment->titulo = "Comentario depto. Pruebas";
                    break;
                case 6: $bitacora_coment->titulo = "Comentario del Tecnico";
                    break;
                case 7: $bitacora_coment->titulo = "Comentario de Ayudante";
                    break;
                case 8: $bitacora_coment->titulo = "Comentario del Jefe de Taller";
                    break;
            }
            
          $bitacora_coment->id_usuario = Auth::user()->id;
            $bitacora_coment->save();
            $params = ['data'=>$bitacora_coment,
            'usuario'=>Auth::user()->name];
            
            return json_encode($params);
        }
    }
}
