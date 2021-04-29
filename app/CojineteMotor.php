<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tolerancia;
use App\ToleranciaEje;

class CojineteMotor extends Model
{
    //
    public function infoCojinete(){
        return $this->hasOne('App\Cojinete','id','id_cojinete');
    }

    public function medidas()
    {
        return $this->hasMany('App\MedidaCojinete','id_cojineteMotor','id');
    }

    public function getSellos()
    {
        switch ($this->sellos){
            case 1: return "Sin Sellos";
            case 2: return "ZZ (Sello Metal)";
            case 3: return "2RS (Sello Hule)";
        }
    }
    public function getJuego()
    {
        switch ($this->juego){
            case 1: return "C2 (Normal)";
            case 2: return "C3";
            case 3: return "C4";
        }
    }
    public function getJaula()
    {
        switch ($this->jaula){
            case 1: return "ECJ (Metal)";
            case 2: return "ECM (Bronce)";
            case 3: return "ECP (Poliamida)";
        }
    }
    public function getMarca()
    {
        switch ($this->marca_colocar){
            case 1: return "SKF";
            case 2: return "FAG";
            case 3: return "NSK";
            case 4: return "NTN";
            case 5: return "TIMKEN";
            case 6: return "KOYO";
            case 7: return "NACHI";
            
           
        }
    }
    public function getSufix()
    {
        $sufix = "";
        switch ($this->sellos){
            case 1: $sufix .= "";
                    break;
            case 2: $sufix .= " ZZ";
                    break;
            case 3: $sufix .= " 2RS";
                    break;
        }
        
        switch ($this->jaula){
            case 1: $sufix .= "";
            break;
            case 2: $sufix .= " ECM";
            break;
            case 3: $sufix .= " ECP";
            break;
        }
        switch ($this->juego){
            case 1: $sufix .= "";
            break;
            case 2: $sufix .= " /C3";
            break;
            case 3: $sufix .= " /C4";
            break;
        }
        return $sufix;
    }
    public function getMaxTolerancia(){
        $tol = Tolerancia::where('min_medida','>=',$this->infoCojinete->diam_externo)->get();
        if (count($tol)>0)
        foreach($tol as $tl)
            if ($this->tolerancia <=2)
                return $tl->max_k7;
            else
                return $tl->max_H6;
        else
            return "No hay registros de tolerancias para esta medida";
       
    }
    public function getMinTolerancia(){
        $tol = Tolerancia::where('min_medida','>=',$this->infoCojinete->diam_externo)->get();
        if (count($tol)>0)
        foreach($tol as $tl)
            if ($this->tolerancia <=2)
                return $tl->min_k7;
            else
                return $tl->min_H6;
        else
            return "No hay registros de tolerancias para esta medida";
       
    }
    public function getToleranciaEje()
    {
        if ($this->serie <= 2){  // serie 6 y 7
            if ($this->infoCojinete->diam_interno <= 10)
              return 1;
            if ($this->infoCojinete->diam_interno <= 17)
              return 2;
            if ($this->infoCojinete->diam_interno <= 100)
              return 3;
            if ($this->infoCojinete->diam_interno <= 140)
              return 4;
            if ($this->infoCojinete->diam_interno <= 200)
              return 5;
        }
        if ($this->serie == 4){ //serie nu nj
            if ($this->infoCojinete->diam_interno <= 30)
            return 6;
          if ($this->infoCojinete->diam_interno <= 50)
            return 4;
          if ($this->infoCojinete->diam_interno <= 65)
            return 8;
          if ($this->infoCojinete->diam_interno <= 100)
            return 9;
          if ($this->infoCojinete->diam_interno <= 280)
            return 10;
        }

    }
    public function getToleranciasEjeTraduccion($tol){

        switch ($tol){
            case 1 : return "js5";
            case 2 : return "j5";
            case 3 : return "k5";
            case 4 : return "m5";
            case 5 : return "m6";
            case 6 : return "k6";
            case 8 : return "n5";
            case 9 : return "n6";
            case 10 : return "p6";
        }

    }
    public function getMinToleranciaEje(){
        $tol = ToleranciaEje::whereRaw('min_medida < '.$this->infoCojinete->diam_interno)->whereRaw('max_medida >= '.$this->infoCojinete->diam_interno)->get();
        
        if (count($tol)>0)
        foreach($tol as $tl)
            switch ($this->getToleranciaEje()){
                case 1: return $tl->min_js5<0?"(-) ".abs($tl->min_js5):"(+)".$tl->min_js5;
                case 2: return $tl->min_j5<0?"(-) ".abs($tl->min_j5):"(+)".$tl->min_j5;
                case 3: return $tl->min_k5<0?"(-) ".abs($tl->min_k5):"(+)".$tl->min_k5;
                case 4: return $tl->min_m5<0?"(-) ".abs($tl->min_m5):"(+)".$tl->min_m5;
                case 5: return $tl->min_m6<0?"(-) ".abs($tl->min_m6):"(+)".$tl->min_m6;
                case 6: return $tl->min_k6<0?"(-) ".abs($tl->min_k6):"(+)".$tl->min_k6;
                case 8: return $tl->min_n5<0?"(-) ".abs($tl->min_n5):"(+)".$tl->min_n5;
                case 9: return $tl->min_n6<0?"(-) ".abs($tl->min_n6):"(+)".$tl->min_n6;
                case 10: return $tl->min_p6<0?"(-) ".abs($tl->min_p6):"(+)".$tl->min_p6;
            }
          
        else
            return "No hay registros de tolerancias para esta medida";
    }
    public function getMaxToleranciaEje(){
        
        
        $tol = ToleranciaEje::whereRaw('min_medida < '.$this->infoCojinete->diam_interno)->whereRaw('max_medida >= '.$this->infoCojinete->diam_interno)->get();
        if (count($tol)>0)
        foreach($tol as $tl)
            switch ($this->getToleranciaEje()){
                case 1: return $tl->max_js5<0?"(-) ".abs($tl->max_js5):"(+)".$tl->max_js5;
                case 2: return $tl->max_j5<0?"(-) ".abs($tl->max_j5):"(+)".$tl->max_j5;
                case 3: return $tl->max_k5<0?"(-) ".abs($tl->max_k5):"(+)".$tl->max_k5;
                case 4: return $tl->max_m5<0?"(-) ".abs($tl->max_m5):"(+)".$tl->max_m5;
                case 5: return $tl->max_m6<0?"(-) ".abs($tl->max_m6):"(+)".$tl->max_m6;
                case 6: return $tl->max_k6<0?"(-) ".abs($tl->max_k6):"(+)".$tl->max_k6;
                case 8: return $tl->max_n5<0?"(-) ".abs($tl->max_n5):"(+)".$tl->max_n5;
                case 9: return $tl->max_n6<0?"(-) ".abs($tl->max_n6):"(+)".$tl->max_n6;
                case 10: return $tl->max_p6<0?"(-) ".abs($tl->max_p6):"(+)".$tl->max_p6;
            }
          
        else
            return "No hay registros de tolerancias para esta medida";
       
    }
    public function getToleranciaEjeNumber()
    {
        $tol = ToleranciaEje::whereRaw('min_medida < '.$this->infoCojinete->diam_interno)->whereRaw('max_medida >= '.$this->infoCojinete->diam_interno)->get();
        if (count($tol)>0)
        foreach($tol as $tl)
            switch ($this->getToleranciaEje()){
                case 1: return [$tl->max_js5,$tl->min_js5];
                case 2: return [$tl->max_j5,$tl->min_j5];
                case 3: return [$tl->max_k5,$tl->min_k5];
                case 4: return [$tl->max_m5,$tl->min_m5];
                case 5: return [$tl->max_m6,$tl->min_m6];
                case 6: return [$tl->max_k6,$tl->min_k6];
                case 8: return [$tl->max_n5,$tl->min_n5];
                case 9: return [$tl->max_n6,$tl->min_n6];
                case 10: return [$tl->max_p6,$tl->min_p6];
            }
          
        else
            return "No hay registros de tolerancias para esta medida";
    }
}
