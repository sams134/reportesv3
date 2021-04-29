<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //

    public function usuario(){
        return $this->belongsTo('App\User','id_user','id');
    }
    public function motor(){
        return $this->belongsTo('App\Motor','id_motor','id_motor');
    }
}
