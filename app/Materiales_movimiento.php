<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales_movimiento extends Model
{
    //
    public function tipoTransaccion()
    {
        switch ($this->operacion){
            case 1: return "Compra";
                break;
            case 2: return "Ingreso por Consignacion";
                break;
            case 3: return "Ingreso por Inventario Previo";
                break;
            case 4: return "Salida a Produccion";
                break;
            case 5: return "Prestamo Interno";
                break;
            case 6: return "Devolucion consignacion";
                break;
            case 7: return "Descarte";
                break;
        }
    }
}
