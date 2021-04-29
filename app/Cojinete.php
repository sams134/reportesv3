<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cojinete extends Model
{
    //
    public function getTipo()
    {
        switch ($this->serie){
            case 1: return "Rodamiento Rigido de Bolas";
            case 2: return "Rodamiento de Contacto Angular";
        }
    }
}
