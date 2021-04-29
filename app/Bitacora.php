<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bitacora extends Model
{
    //
    public function motor(){
        return $this->belongsTo('App\Motor','id_motor','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_usuario','id');
    }
    public function addSimpleComment($titulo,$coment,$id_motor)
    {
        $this->titulo = $titulo;
        $this->descripcion = $coment;
        $this->id_usuario = Auth::user()->id;
        $this->id_trabajo = $id_motor;
        return $this->save();
    }
}
