<?php

namespace App;
use App\Foto;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    //

    public $primaryKey = "id_motor";

    public function infoMotor(){
        return $this->hasOne('App\InfoMotor','id_motor','id_motor');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente','id_cliente','id_cliente');
    }

    public function inventario(){
        return $this->hasOne('App\Inventario','id_motor','id_motor');
    }
    public function diagnostico(){
        return $this->hasOne('App\Diagnostico','id_motor','id_motor');
    }
    public function fotos(){
        return $this->hasMany('App\Foto','id_motor','id_motor');
    }
    public function bitacora()
    {
        return $this->hasMany('App\Bitacora','id_trabajo','id_motor');
    }
    public function documentos()
    {
        return $this->hasMany('App\Documento','id_motor','id_motor');
    }
    public function trabajos()
    {
        return $this->hasMany('App\Trabajo','id_motor','id_motor');
    }
    public function asignaciones()
    {
        return $this->hasMany('App\Asignacion','id_motor','id_motor');
    }
    public function pedido_materiales()
    {
        return $this->hasMany('App\Materiales_pedido','id_motor','id_motor');
    }
    
    public function cojinetes()
    {
        return $this->hasMany('App\CojineteMotor','id_motor','id_motor');
    }
    public function estaAsignado($id_user){
        foreach ($this->asignaciones as $asignacion)
          if ($asignacion->id_user == $id_user)
            return true;
        return false;
    }
    public function firstFoto(){
        $primary = $this->fotos->where('type','=',1)->first();
        if (!$primary)
          $primary = $this->fotos->where('type','=',2)->first();
          return $primary;
    }
    public function countType($type)
    {
        return $this->fotos->where('type','=',$type)->count();
    }
    public function giveEmergency()
    {
        switch($this->infoMotor->find($this->id_motor)){
            case '1': return "Muy Baja";
            case '2': return "Baja";
            case '3': return "Normal";
            case '4': return "Normal Aprisa";
            case '5': return "Alta (Sin Recargo)";
            case '6': return "Muy Alta (Sin Recargo - Sin Cotización)";
            case '7': return "Alta con Recargo (2 Turnos Completos)";
            case '8': return "Alta con Recargo (3 Turnos Completos)";
            default: return "Normal";
        }
        
    }
    public function getFotosDesarmeClean()
    {
        $fotos = $this->fotos->where('type','=',3)->where('accion','<=',1);
        $fotosEnv = array();
        foreach($fotos as $foto)
          $fotosEnv[] = $foto;
        return $fotosEnv;
    }

    public function getFotosReemplazo()
    {
        $fotos = $this->fotos->where('type','=',3)->where('accion','=',2);
        $fotosEnv = array();
        foreach($fotos as $foto)
          $fotosEnv[] = $foto;
        return $fotosEnv;
    }
    public function getFotosReparacion()
    {
        $fotos = $this->fotos->where('type','=',3)->where('accion','=',3);
        $fotosEnv = array();
        foreach($fotos as $foto)
          $fotosEnv[] = $foto;
        return $fotosEnv;
    }
    public function getFotosElectrico()
    {
        $fotos = $this->fotos->where('type','=',5);
        $fotosEnv = array();
        foreach($fotos as $foto)
          $fotosEnv[] = $foto;
        return $fotosEnv;
    }
    public function getProgreso()
    {
        $avg = 0;
        if (count($this->trabajos) > 0){
            foreach($this->trabajos as $trabajo)
            $avg += $trabajo->progress;
            return $avg/count($this->trabajos);
        }else
        return 0;
    }

    public function getMyMotors($id_user)
    {
        return $this;   
    }
    
    public function get_id_estado()
    {
        switch ($this->id_estado)
        {
            case -1: return "No Asignado";
        break;
            case 0: return "No Autorizado";
            break;
            case 1: return "Diagnostico";
            break;
            case 2: return "Diagnostico pendiente de autorizacion";
            break;
            case 3: return "Autorizado Parcial / Ver Pendientes";
            break;
            case 4: return "Autorizado Completamente";
            break;
            case 5: return "Retrasado";
            break;
            case 6: return "Garantia";
            break;
            case 7: return "Emergencia";
            break;
            case 8: return "Alta Emergencia";
            break;
            case 9: return "Finalizado";
            break;
            case 10: return "En Traslado";
            break;
            case 11: return "Entregado sin reparacion";
            break;
            case 12: return "EPF";
            break;
            case 13: return "Aceptacion, Pendiente Facturacion";
            break;
            case 14: return "Facturado, Pendiente de pago";
            break;
            case 15: return "Pagado";
            break;
        }
    }
    
}
