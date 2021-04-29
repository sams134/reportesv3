<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tolerancia;

class MedidaCojinete extends Model
{
    //
    private $medidas = array();
    private $medidasEje = array();
    public function cojinete(){
        return $this->belongsTo('App\CojineteMotor','id_cojineteMotor','id');
    }

    public function getMedidaExterna()
    {
        return $this->cojinete->diam_externo;
        
    }
    public function loadMedidas(){
        if ($this->med_xa != null)
          $this->medidas[] = $this->med_xa;
        if ($this->med_xb != null)
          $this->medidas[] = $this->med_xb;
        if ($this->med_xc != null)
          $this->medidas[] = $this->med_xc;
        if ($this->med_xd != null)
          $this->medidas[] = $this->med_xd;

        if ($this->med_ya != null)
          $this->medidas[] = $this->med_ya;
        if ($this->med_yb != null)
          $this->medidas[] = $this->med_yb;
        if ($this->med_yc != null)
          $this->medidas[] = $this->med_yc;
        if ($this->med_yd != null)
          $this->medidas[] = $this->med_yd;
        
        if ($this->med_za != null)
          $this->medidas[] = $this->med_za;
        if ($this->med_zb != null)
          $this->medidas[] = $this->med_zb;
        if ($this->med_zc != null)
          $this->medidas[] = $this->med_zc;
        if ($this->med_zd != null)
          $this->medidas[] = $this->med_zd;

        if ($this->med_au != null)
          $this->medidasEje[] = $this->med_au;
        if ($this->med_av != null)
          $this->medidasEje[] = $this->med_av;
        if ($this->med_aw != null)
          $this->medidasEje[] = $this->med_aw;

        if ($this->med_bu != null)
          $this->medidasEje[] = $this->med_bu;
        if ($this->med_bv != null)
          $this->medidasEje[] = $this->med_bv;
        if ($this->med_bw != null)
          $this->medidasEje[] = $this->med_bw;

    }
    public function getMaxHolguraCojinete()
    {
        $this->loadMedidas();
        if (count($this->medidas)>0)
            return (max($this->medidas)-$this->cojinete->diam_externo)>0?"(+) ".number_format(abs((max($this->medidas)-$this->cojinete->diam_externo))*1000,0):"(-) ".number_format(abs((max($this->medidas)-$this->cojinete->diam_externo))*1000,0);
        else
            return "Sin Medidas";
    }
    public function getMaxInterferenciaCojinete()
    {
        $this->loadMedidas();
        if (count($this->medidas)>0)
        return (min($this->medidas)-$this->cojinete->diam_externo)>0?"(+) ".number_format(abs((min($this->medidas)-$this->cojinete->diam_externo))*1000,0):"(-) ".number_format(abs((min($this->medidas)-$this->cojinete->diam_externo))*1000,0);
        else
            return "Sin Medidas";
    }
    public function getMaxHolguraEje()
    {
        $this->loadMedidas();
        if (count($this->medidasEje)>0)
            
            return ($this->cojinete->diam_interno-max($this->medidasEje))>0?"(+) ".number_format(abs(($this->cojinete->diam_interno-max($this->medidasEje)))*1000,0):"(-) ".number_format(abs(($this->cojinete->diam_interno-max($this->medidasEje)))*1000,0);
        else
            return "Sin Medidas";
    }
    public function getMaxInterferenciaEje()
    {
        $this->loadMedidas();
        if (count($this->medidasEje)>0)
            return ($this->cojinete->diam_interno-min($this->medidasEje))>0?"(+) ".number_format(abs(($this->cojinete->diam_interno-min($this->medidasEje)))*1000,0):"(-) ".number_format(abs(($this->cojinete->diam_interno-min($this->medidasEje)))*1000,0);
            
        else
            return "Sin Medidas";
    }
    public function getRecomendacion()
    {
        $this->loadMedidas();
        if (count($this->medidas)>0)
        {
            $constrains = [['min_medida','>=',$this->cojinete->infoCojinete->diam_externo]];
            $tol = Tolerancia::where($constrains)->first();
            $recomendacion = "Alojamiento en buen estado";
            if ($this->cojinete->tolerancia == 2)
            {
                if (round((min($this->medidas)-$this->cojinete->diam_externo)*1000) < $tol->min_k7)
                $recomendacion = "Lijar tapadera ";
                if (round((max($this->medidas)-$this->cojinete->diam_externo)*1000) > $tol->max_k7 && round((max($this->medidas)-$this->cojinete->diam_externo)*1000) <= $tol->max_H6)
                $recomendacion = "Aplicar pegamento";
                if (round((max($this->medidas)-$this->cojinete->diam_externo)*1000) > $tol->max_H6)
                $recomendacion = "Encamisar Tapadera";
            }
            if ($this->cojinete->tolerancia == 1)
            {
                if (round((min($this->medidas)-$this->cojinete->diam_externo)*1000) < $tol->min_k7)
                $recomendacion = "Lijar tapadera";
                if ((round((max($this->medidas)-$this->cojinete->diam_externo)*1000)*1.1) > $tol->max_k7)
                $recomendacion = "Aplicar pegamento ";
                if (round((max($this->medidas)-$this->cojinete->diam_externo)*1000) > $tol->max_k7)
                $recomendacion = "Encamisar Tapadera";
            }
            if ($this->cojinete->tolerancia == 3)
            {
                
                if (round((min($this->medidas)-$this->cojinete->diam_externo)*1000) < $tol->min_H6)
                $recomendacion = "Lijar tapadera ";
                if ((round((max($this->medidas)-$this->cojinete->diam_externo)*1000)*1.1) > $tol->max_H6)
                $recomendacion = "Aplicar pegamento ";
                if (round((max($this->medidas)-$this->cojinete->diam_externo)*1000) > $tol->max_H6)
                $recomendacion = "Encamisar Tapadera"; 
            }
            return $recomendacion;
        }
            return "No hay datos suficientes para tomar una decisión";
    }

    public function getRecomendacionEje(){
      $this->loadMedidas();
      if (count($this->medidasEje)>0)
      {
        $recomendacion = "Eje en buen estado";
        $ajusteHolgado = $this->cojinete->diam_interno-min($this->medidasEje);
        $ajusteApretado = $this->cojinete->diam_interno-max($this->medidasEje);
        if (($ajusteApretado*1000) <= $this->cojinete->getToleranciaEjeNumber()[1])
        $recomendacion = "Rectificar eje a medida";
        if (($ajusteHolgado*1000) >= $this->cojinete->getToleranciaEjeNumber()[0])
        $recomendacion = "Metalizar eje";
        if ((($ajusteHolgado*1000)*1.01) >= $this->cojinete->getToleranciaEjeNumber()[0])
          $recomendacion = "Aplicar Pegamento a eje";
        return $recomendacion;
      } else
      return "No hay suficientes datos para tomar decision";
    }
    
}
