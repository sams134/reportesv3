<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $primaryKey = "id_cliente";

    public function infoCliente()
    {
        return $this->hasOne('App\InfoCliente','id_cliente');
    }

    public function motores()
    {
        return $this->hasMany('App\Motor','id_cliente','id_cliente');
    }
    public function contactos()
    {
        return $this->hasMany('App\Contacto','id_cliente','id_cliente');
    }

   
}
