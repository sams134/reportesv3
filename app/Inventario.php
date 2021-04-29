<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //

    public function motor(){
        return $this->belongsTo('App\Motor','id_motor','id_motor');
    }
}
