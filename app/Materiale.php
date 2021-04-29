<?php

namespace App;

use App\Materiales_movimiento;
use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    //
    public function cardex()
    {
        return $this->hasMany('App\Materiales_movimiento','id_material','id');
    }
    public function existencias()
    {
        return $this->cardex()->sum('cantidad');
        
    }
    public function proveedor1()
    {
        return $this->hasOne('App\Proveedor','id','id_proveedor1');
    }
    public function proveedor2()
    {
        return $this->hasOne('App\Proveedor','id','id_proveedor2');
    }
    public function proveedor3()
    {
        return $this->hasOne('App\Proveedor','id','id_proveedor3');
    }
}
