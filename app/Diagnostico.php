<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    //
    public $primaryKey = "id_motor";
    
    public function motor(){
        return $this->belongsTo('App\Motor','id_motor','id_motor');
    }
    public function diagnosticador()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
    public function trabajoElectrico()
    {
        switch ($this->trabajo_electrico)
        {
            case 0:  return "Ningun Trabajo Electrico";
            case 1: return "Mantenimiento";
            case 2: return "Rebobinado";
            case 3: return "Reparacion Parcial";
        }
    }
    public function causaFallo()
    {
        $causa = array();
        if ($this->alto_voltaje == 1)
            $causa[] = "Alto o Bajo Voltaje de Alimentación ";
        if ($this->desfase == 1)
            $causa[] = "Desfase ";
        if ($this->pico_voltaje == 1)
            $causa[] = "Pico de Voltaje";
        if ($this->desbalance == 1)
            $causa[] = "Alta Vibración por Desbalance ";
        if ($this->desalineacion == 1)
            $causa[] = "Desalineación de Ejes / Poleas";

        if ($this->desajuste == 1)
            $causa[] = "Ejes o Alojamientos desajustados";
        if ($this->rod_inapropiado == 1)
            $causa[] = "Falla de Cojinete defectuoso";
        if ($this->exceso_carga == 1)
            $causa[] = "Exceso de Carga (Radial/Axial) en cojinete";
        if ($this->golpe_mecanico == 1)
            $causa[] = "Golpes o Maltratos en equipo";

        if ($this->falta_lubricacion == 1)
            $causa[] = "Falta de Lubricación en cojinetes";
        if ($this->exceso_lubricacion == 1)
            $causa[] = "Exceso de Lubricación en cojinetes";
        if ($this->exceso_contaminacion == 1)
            $causa[] = "Exceso de contaminacion en cojinetes";
        if ($this->falla_sello == 1)
            $causa[] = "Falla en sello retenedor de aceite/grasa";
        if ($this->mala_grasa == 1)
            $causa[] = "Grasa inadecuada o incopatibilidad de grasa";

        if ($this->sobre_carga == 1)
            $causa[] = "Motor muy pequeño para la carga";
        if ($this->falla_ventilacion == 1)
            $causa[] = "Ventilación obstruida o insuficiente";
        if ($this->pico_amperaje == 1)
            $causa[] = "Exceso de amperaje momentaneo (Pico Amperaje)";
        if ($this->mal_diseno == 1)
            $causa[] = "Mal diseño electrico para la aplicación";
        if ($this->perdida_eficiencia == 1)
            $causa[] = "Perdida de eficiencia energética";
        if ($this->mala_conexion == 1)
            $causa[] = "Equipo fue mal conectado";
        if ($this->corto_humedad == 1)
            $causa[] = "Corto circuito por exceso de humedad y contaminación";
        if ($this->corto_aislamiento == 1)
            $causa[] = "Corto circuito por deterioro del aislamiento";
        if ($this->corto_vueltas == 1)
            $causa[] = "Corto circuito entre espiras / bobinas";
        if ($this->golpe_bobinado == 1)
            $causa[] = "Evidencia de golpe a bobinado";
        if ($this->roze_rotor == 1)
            $causa[] = "El rotor tuvo un roce con el estator";
        if ($this->corto_cables == 1)
            $causa[] = "Hubo un corto circuito en los cables de alimentación";
        return $causa;
    }

    public function getContaminacion()
    {
        switch ($this->contaminacion){
                case 0: return "Completamente Limpio";
                case 1: return"Ligeramente Limpio";
                case 2: return"Poca contaminacion (Solo Polvo)";
                case 3: return"Contaminacion Normal(Polvo y trazas de aceite)";
                case 4: return"Contaminacion Alta";
                case 5: return"Contaminacion Sumamente Alta";
            
        }
    }
    public function getQuimicos(){
         switch($this->modo_lavado){
                case 0: return ["No se Lava"];
                case 1: return ["Dieléctricos (Electro-Safe)","Desplazante de Humedad (Elecsol)"];
                case 2: return ["Desengrasantes"];
                case 3: return ["Dieléctricos (Electro-Safe)","Desplazante de Humedad (Elecsol)","Desengrasantes"];
                case 4: return ["Agua y Jabón"];
         }   
    }

    public function getCarcaza()
    {
        
        switch($this->tipo_carcaza){
            case 1: return "Hierro Dulce/Colado";
            case 2: return "Aluminio";
            case 3: return "Acero Inoxidable";
            case 4: return "Sin Carcaza - Nucleo Desnudo";
        }
    }
    public function getVelocidades()
    {
        switch($this->multiples_velocidades){
            case 0: return "1 Velocidad";
            case 1: return "2 Velocidades por conexion Dahlander";
            case 2: return "2 Velocidades por PAM";
            case 3: return "2 Velocidades por Bobinados Separados";
            case 4: return "3 Velocidades por (2 por Conexion y 1 por Bobinado)";
            case 5: return "Multiples Velocidades por Resistencia";
        }
    }

    
    public function makeColor($value) {
        // value must be between [0, 510]
        switch ($value)
        {
            case 1: return "#3c9917";
            case 2: return "#919917";
            case 3: return "#ffcf0e";
            case 4: return "#ff8b0e";
            case 5: return "#991b14";
        }
        
    }
    
}
