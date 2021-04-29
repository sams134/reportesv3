<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FotosTrabajo;

class Trabajo extends Model
{
    //
    public function fotosTrabajo()
    {
        return $this->hasMany('App\FotosTrabajo','id_trabajo','id');
    }
}
