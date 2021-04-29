<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Foto;
use App\Trabajo;

class FotosTrabajo extends Model
{
    //
    public function infoFoto(){
        return $this->hasOne('App\Foto','id','id_foto');
    }
}
