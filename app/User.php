<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','userType'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function asignaciones()
    {
        return $this->hasMany('App\Asignacion','id_user','id');
    }
    public function motores(){
        return $this->hasManyThrough('App\Motor','App\Asignacion','id_user','id_motor','id','id_motor');
    }

    /* 
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
break; */
    public function getMotoresNoAutorizados(){
        return $this->motores->where('id_estado','=','0');
    }
    public function getMotoresDiagnostico(){
        return $this->motores->where('id_estado','=','1');
    }
    public function getMotoresDiagnosticoPendienteAutorizacion(){
        return $this->motores->where('id_estado','=','2');
    }
    public function getMotoresAutorizadoParcial(){
        return $this->motores->where('id_estado','=','3');
    }
    public function getMotoresAutorizados(){
        return $this->motores->where('id_estado','=','4');
    }
    public function getMotoresRetrasado(){
        return $this->motores->where('id_estado','=','5');
    }
    public function getMotoresGarantia(){
        return $this->motores->where('id_estado','=','6');
    }
    public function getMotoresEmergencia(){
        return $this->motores->where('id_estado','=','7');
    }
    public function getMotoresAltaEmergencia(){
        return $this->motores->where('id_estado','=','8');
    }
    
    public function tipoEmpleado()
    {
        switch ($this->userType){
            case '1': return "Desarrollo Informatico";
            case '2': return "Gerencia";
            case '3': return "Administracion";
            case '4': return "Bodega";
            case '5': return "Servicios Internos";
            case '6': return "Tecnicos";
            case '7': return "Ayudantes";
            default: return "No Aceptable";
        }
    }

    public function infoUser(){
        return $this->hasOne('App\Usuario','id_user','id');
    }
    public function codigoComprador()
    {
        return $this->hasOne('App\Codigos_comprador','id_user','id');
    }
    public function foto()
    {
        
        if ($this->foto != "")
          return $this->foto;
        else
          return "/img/noimage.png";
    }

    public function metodoPago()
    {
        switch ($this->infoUser->activo){
            case 1: return "Pago Semanal (Sueldo y Bonificaciones) Con Cheque";
            case 2: return "Pago Semanal (Sueldo)  y Bonificaciones (Quincenal) Con Cheque";
            case 3: return "Pago Quincenal (Sueldo)  y Bonificaciones (Semanal) Con Cheque";
            case 3: return "Pago Quincenal (Sueldo)  y Bonificaciones (Quincenal) Con Cheque";
            case 4: return "Pago Semanal (Sueldo y Bonificaciones) Con Transferencia";
            case 5: return "Pago Semanal (Sueldo)  y Bonificaciones (Quincenal) Con Transferencia";
            case 6: return "Pago Quincenal (Sueldo)  y Bonificaciones (Semanal) Con Transferencia";
            case 7: return "Pago Quincenal (Sueldo)  y Bonificaciones (Quincenal) Con Transferencia";
        }
    }

    public function estadoCivil()
    {
        switch ($this->infoUser->estado_civil){
            case 1: return "Soltero";
            case 2: return "Casado";
            case 3: return "Divorciado";
            case 4: return "Viudo";
        }
    }
}
