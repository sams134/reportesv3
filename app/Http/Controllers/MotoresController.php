<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Cliente;
use App\Motor;
use App\InfoMotor;
use App\Inventario;
use App\Foto;
use App\Trabajo;
use App\Mail\SendMail;
use Mail;
use App\Diagnostico;
use App\Cojinete;
use App\CojineteMotor;
use App\MedidaCojinete;
use App\FotosTrabajo;
use App\User;
use App\Asignacion;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use LynX39\LaraPdfMerger\PdfManage;
use App\Materiale;
use App\Documento;
use App\Bitacora;

class MotoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $look = "";

    public function __construct()
    {
        $this->middleware('auth');
        
        
    }
    public function myMotors()
    {
        switch (Auth::user()->userType){
            case 1:
            case 2:
                $motores = new Motor();
                break;
            case 3:
            case 4:
            case 5:
                $motores = new Motor();
                break;
            case 6:
            case 7:
                $motores = Auth::user()->motores();
                break;
            case 8:
                $motores = new Motor();

            break;

        }
        return $motores;
    }
    public function index()
    {
        if (Auth::user()->activo == 0)
           return "Usuario No Activado";
        
        $motores = $this->myMotors()->orderBy('year','desc')->orderBy('os','desc')->paginate(50);;
       
        
        return view('motores.index_motores')->with(['title'=>'LISTADO GENERAL DE MOTORES','motores'=>$motores]);
    }
    public function search()
    {
        
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $look = $_GET['look'];

        
        $allMotors = $this->myMotors();
        if (is_numeric($look))
          {
              
              //busqueda en todos los anios del mismo numero de orden
              $look =  str_pad($look, 4, '0', STR_PAD_LEFT);
              $motores = $allMotors->where('os','=',$look)->orderBy('year','desc')->orderBy('os','desc')->paginate(50);
              return view('motores.index_motores')->with(['title'=>'BUSCANDO '.$look,'motores'=>$motores]);
          }
          else
          {
               $xploted = explode("-",$look);
               
               if (sizeof($xploted)>1)
               {
                
                    if (strpos($xploted[0], 'M') !== false or strpos($xploted[0], 'm') !== false)
                      {
                            // busqueda si es numero de orden completo
                            $os =  str_pad($xploted[1], 4, '0', STR_PAD_LEFT);
                            $match = [['year','=',$xploted[0]],['os','=',$os]];
                            $motores = $allMotors->where($match)->orderBy('year','desc')->orderBy('os','desc')->paginate(50);
                            return view('motores.index_motores')->with(['title'=>'BUSCANDO '.$look,'motores'=>$motores]);
                      }
                      else{
                           // busqueda si es numero de orden sin las 2M, es decir 19-003
                            $os =  str_pad($xploted[1], 4, '0', STR_PAD_LEFT);
                            $match = [['year','=',"2M".$xploted[0]],['os','=',$os]];
                            $motores = $allMotors->where($match)->orderBy('year','desc')->orderBy('os','desc')->paginate(50);
                           
                            return view('motores.index_motores')->with(['title'=>'BUSCANDO '.$look,'motores'=>$motores]);
                      }

                }
               else
                 {
                    
                     // busqueda si es cliente
                    $this->look = $look;
                    $motores = $allMotors->with('Cliente')->whereHas('Cliente',function($q) { 
                        $q->where("cliente","like","%".$this->look."%");
                    })->orderBy('year','desc')->orderBy('os','desc')->paginate(50);
                   
                     return view('motores.index_motores')->with(['title'=>'BUSCANDO '.$look,'motores'=>$motores]);
                     
                 }
          }
    }
    public function searchAdvance(Request $request)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $allMotors = $this->myMotors();    
         if ($request->serie != "")
            $allMotors = $allMotors->where("serie","like","%".$request->serie."%");
         if ($request->marca != "")    
             $allMotors = $allMotors->where("marca","like","%".$request->marca."%");
         if ($request->modelo != "")
          $allMotors = $allMotors->where("modelo","like","%".$request->modelo."%");
         if ($request->hp != "")
             $allMotors = $allMotors->where("hp","=",$request->hp);
         if ($request->cliente != 0)
             $allMotors = $allMotors->where("id_cliente","=",$request->cliente);
      
        return view('motores.index_motores')->with(['title'=>'BUSCADOR AVANZADO','motores'=>$allMotors->orderBy('year','desc')->orderBy('os','desc')->paginate(50)]);

    }
    function getSql($model)
{
    $replace = function ($sql, $bindings)
    {
        $needle = '?';
        foreach ($bindings as $replace){
            $pos = strpos($sql, $needle);
            if ($pos !== false) {
                if (gettype($replace) === "string") {
                     $replace = ' "'.addslashes($replace).'" ';
                }
                $sql = substr_replace($sql, $replace, $pos, strlen($needle));
            }
        }
        return $sql;
    };
    $sql = $replace($model->toSql(), $model->getBindings());

    return $sql;
}
    public function searchPower(Request $request)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $allMotors = $this->myMotors();   
        
        if ($request->minHp != "")           
            $allMotors = $allMotors->whereRaw('CAST(`hp` AS SIGNED) >= '.$request->minHp);
            //die( $this->getSql($allMotors));
            
        if ($request->maxHp != "")
            $allMotors = $allMotors->whereRaw('CAST(`hp` AS SIGNED) <= '.$request->maxHp);
        if ($request->cliente2 != 0)
        $allMotors = $allMotors->where("id_cliente","=",$request->cliente2);  
        return view('motores.index_motores')->with(['title'=>'BUSCADOR AVANZADO','motores'=>$allMotors->orderBy('year','desc')->orderBy('os','desc')->paginate(50)]);
    }
    public function pdf($id)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $motor = Motor::where('id_motor','=',$id)->first();
        if (Auth::user()->userType >= 4)
            $pdf = \PDF::loadView('pdf.hojaIngresoTecnicos', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
        else{
            $pdf = \PDF::loadView('pdf.test', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
            
        
            $pdf_data = $pdf->output();
             if ($motor->infoMotor->enviar_os == 1){
                Mail::send(new SendMail($pdf_data,$motor));
                $motor->infoMotor->enviar_os = 0;
                $motor->infoMotor->save();
             }
        }
      
        
        
       // return view('pdf.test')->with(['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
        return $pdf->stream();
    }
    public function ped($id)
    {
        // if(Auth::user()->activo == 0)
        // return redirect()->intended('dashboard');
        // $pdf = new PdfManage;
        // $pdf->addPDF('C:\xampp2\htdocs\reportesV2\public\pdfs/tigsa.pdf', 'all');
        // $pdf->addPDF('C:\xampp2\htdocs\reportesV2\public\pdfs\estima.pdf', 'all');
        // $pdf->merge('file', 'C:\xampp2\htdocs\reportesV2\public\pdfs\TEST2.pdf', 'P');
      
        $motor = Motor::where('id_motor','=',$id)->first();
        $pdf = \PDF::loadView('pdf.test', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
        $pdf->save('C:\xampp2\htdocs\reportesV2\public\pdfs\\'.$motor->year."-".$motor->os.'\ingreso.pdf',true);
        $pdf = \PDF::loadView('pdf.diagnostico', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
        $pdf->save('C:\xampp2\htdocs\reportesV2\public\pdfs\\'.$motor->year."-".$motor->os.'\diagnostico.pdf',true);
        $pdf = new PdfManage;
        $pdf->addPDF('C:\xampp2\htdocs\reportesV2\public\pdfs\\'.$motor->year."-".$motor->os.'\ingreso.pdf', 'all');
        $pdf->addPDF('C:\xampp2\htdocs\reportesV2\public\pdfs\\'.$motor->year."-".$motor->os.'\diagnostico.pdf', 'all');
        $result = $pdf->merge('string', 'C:\xampp2\htdocs\reportesV2\public\pdfs\\'.$motor->year."-".$motor->os.'\TEST2.pdf', 'P');
        header('Content-Type: application/pdf');
        echo $result;
        
        
    }

    public function verCliente($id_cliente)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
          // die($id_cliente);
            $motores = Motor::where('id_cliente','=',$id_cliente)->get();
            return view('motores.index_motores')->with(['title'=>'LISTADO GENERAL DE MOTORES','motores'=>$motores]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_cliente = 0)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $year = Motor::all()->max('year');
        $os = Motor::where('year','=',$year)->max('os');

        $newos = intval($os)+1;
        $newos = str_pad($newos, 4, '0', STR_PAD_LEFT);

        
        $clientes = Cliente::orderBy('cliente','asc')->get();
        $clienteArray = array();
        $selectedClient = 0;

        foreach ($clientes as  $cliente) 
        {
            $clienteArray[$cliente->id_cliente] = $cliente->cliente;
            if ($cliente->id_cliente == $id_cliente && $id_cliente != 0)
               $selectedClient = $cliente;

        }
          $params = ['title'=>'INGRESO DE NUEVO EQUIPO',
                     'clientes'=>$clientes,
                     'id_cliente'=>$id_cliente,
                     'selectedClient'=>$selectedClient,
                     'newYear'=>$year,
                     'newOs'=>$newos];
           return view('motores.nuevo_motores')->with($params);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'id_cliente'=>'required',
            'year'=> 'required',
            'os'=>'required',
            'dateIngreso'=>'required',
            'hp'=>'required',
            'va'=>'numeric|nullable',
            'vb'=>'numeric|nullable',
            'vc'=>'numeric|nullable',
            'ampsA'=>'numeric|nullable',
            'ampsB'=>'numeric|nullable',
            'ampsC'=>'numeric|nullable'
            
        ]);
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        
       $works = $request->works;
       $cotizarWoks = $request->cotizarTrabajo;
       
       
        $cotizar = ($request->cotizar=="on")?1:0;
        $reales = ($request->reales=="on")?1:0;
        $enviar_os = ($request->enviar_os=="on")?1:0;
        
        
            $motor = new Motor();
            $infoMotor = new InfoMotor();
            
            
            $motor->id_cliente = $request->id_cliente;
            $motor->year =  $request->year;
            $motor->os =  $request->os;
            $myTime = strtotime($request->dateIngreso); 
            
            $motor->fecha_ingreso =   date("Y-m-d H:i:s", $myTime);
            $motor->comentarios =  $request->trabajoARealizar;
            $motor->id_tipoequipo = $request->tipoequipohide; 
            $motor->marca =  $request->marca;
            $motor->hp =  $request->hp;
            
            $motor->hpkw =  $request->hpkw=="on"?"1":"0";
            $motor->acdc  = $request->acdc=="on"?"1":"0";
            $motor->rpm = $request->rpm;
            $motor->serie =  $request->serie;
            $motor->modelo =  $request->modelo;
            $motor->volts =  $request->voltaje;
            $motor->amps =   $request->amperajes;
            $motor->frame =  $request->frame;
            $motor->hz = $request->hz;
            $motor->pf = $request->pf;
            $motor->eff = $request->eff;
            $motor->id_enclosure = $request->id_enclosure;
            $motor->id_estado = -1;
            $motor->phases = $request->phases;
            $motor->recibido = auth()->user()->name;
            if ($motor->save())
            {
                $infoMotor->id_motor = $motor->id_motor;
                $infoMotor->emergencia = $request->emergencia;
                $infoMotor->contacto = $request->contactohide;
                $infoMotor->telefono = $request->telefono;
                $infoMotor->email = $request->email;
                $infoMotor->nombre_equipo = $request->equipment;
                $infoMotor->aplicacion = $request->aplicacion;
                $infoMotor->reales = $reales;
                $infoMotor->cotizar = $cotizar;
                $infoMotor->horas_operacion = $request->horas_operacion;
                $infoMotor->volts_operacion = $request->knownVolts=="on"?"1":"0";
                $infoMotor->amps_operacion = $request->knownAmps=="on"?"1":"0";
                $infoMotor->vab = $request->va;
                $infoMotor->vbc = $request->vb;
                $infoMotor->vca = $request->vc;
                $infoMotor->aa = $request->ampsA;
                $infoMotor->ab = $request->ampsB;
                $infoMotor->ac = $request->ampsC;
                $infoMotor->modo_arranque = $request->iCheckArranque;
                $infoMotor->vibracion = $request->iCheckVibracion;
                $infoMotor->temp_estator = $request->iCheckTemperatura;
                $infoMotor->temp_cojinetes = $request->iCheckTemperaturaCoj;
                $infoMotor->coment_operacion = $request->comentOperacion;
                $infoMotor->enviar_os = $enviar_os;
                $infoMotor->save();

                // save inventario
                $inventario = new Inventario();
                $inventario->id_motor = $motor->id_motor;
                $inventario->acople = $request->iCheckAcopple;
                $inventario->caja_conexiones = $request->iCheckCaja;
                $inventario->tapa_caja = $request->iCheckTapa;
                $inventario->difusor = $request->iCheckDifusor;
                $inventario->ventilador = $request->iCheckVentilador;
                $inventario->bornera = $request->iCheckBornera;
                $inventario->cunia = $request->iCheckCuna;
                $inventario->graseras = $request->iCheckGrasera;
                $inventario->cancamo = $request->iCheckCancamo;
                $inventario->placa = $request->iCheckPlaca;
                $inventario->tornillos = $request->iCheckTornillos;
                $inventario->capacitor = $request->iCheckCapacitores;
                $inventario->comentarios = $request->comentInventario;
                $inventario->save();
                
                $diagnostico = new Diagnostico();
                $diagnostico->id_motor = $motor->id_motor;
                $diagnostico->save();
               // $path = public_path().'/uploads/'.$motor->year."-".$motor->os."/ingreso/";

                
                
                if ($request->hasFile('file')){
                    $files = $request->file('file');
                    foreach($files as $cont=>$file){
                        $foto = new Foto($file,'ingreso',$motor->year,$motor->os,2,$motor->id_motor);
                        $foto->fullSave();
                        // $foto = new Foto;
                        // $filenameWithExt = $file->getClientOriginalName();
                        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        // $extension = $file->getClientOriginalExtension();
                        // $fileNameToStore= $filename.'_'.time().'.'.$extension;
                        // $file->move($path,$fileNameToStore);
                        // $foto->id_motor = $motor->id_motor;
                        // $foto->foto = '/uploads/'.$motor->year."-".$motor->os."/ingreso/".$fileNameToStore;
                        // $foto->type = 2;
                        // $foto->save();
                    }
                }
                foreach($works as $cont=>$work){
                    if ($work != ""){
                        $trabajos = new Trabajo();
                        $trabajos->id_motor = $motor->id_motor;
                        $trabajos->trabajo = $work;
                        $trabajos->cotizar = $cotizarWoks[$cont];
                        $trabajos->autorizado = (1*$cotizarWoks[$cont]+1)%2;
                        if ($cotizarWoks[$cont]==0)
                        $trabajos->fecha_autorizado = date('Y-m-d H:i:s');
                        $trabajos->place_order = $cont;
                        $trabajos->save();
                    }
                }
                $works = array();
                $works[0] = "Desarmado";
                $works[1] = "Diagnostico";
                $works[2] = "Control de Calidad";
                $works[3] = "Armado";
                $works[4] = "Pintura";
                
                foreach($works as $cont=>$work){
                    
                        $trabajos = new Trabajo();
                        $trabajos->id_motor = $motor->id_motor;
                        $trabajos->trabajo = $work;
                        $trabajos->cotizar = 1;
                        $trabajos->autorizado = 1;
                        $trabajos->fecha_autorizado = date('Y-m-d H:i:s');
                        $trabajos->place_order = $cont;
                        $trabajos->save();
                    
                }
        

               // return redirect('/motores')->with('success',"Motor ".$motor->year."-".$motor->os." agregado satisfactoriamente");
            }
            else
          //  return redirect('/motores')->with('error',"Motor ".$motor->year."-".$motor->os." agregado NO satisfactoriamente");
          return "fail";

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $tecnicos = User::where([['userType','=','6'],['activo','=','1']])->orWhere([['userType','=','5'],['activo','=','1']])->orWhere([['userType','=','8'],['activo','=','1']])->get();
        $ayudantes = User::where([['userType','=','7'],['activo','=','1']])->get();
        $motor = Motor::where('id_motor','=',$id)->first();
        $materiales = Materiale::orderBy('material','asc')->get();
        
        return view('motores.show_motor')->with(['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor,'tecnicos'=>$tecnicos,'ayudantes'=>$ayudantes,'materiales'=>$materiales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $motor = Motor::find($id);
        $clientes = Cliente::orderBy('cliente','asc')->get();
        $clienteArray = array();
        
  
        
        
       
          $params = ['title'=>'EDITAR EQUIPO',
                     'clientes'=>$clientes,
                     'id_cliente'=>$motor->cliente->id_cliente,
                     'selectedClient'=>$motor->cliente,
                     'newYear'=>$motor->year,
                     'newOs'=>$motor->os,
                      'motor'=>$motor];
           return view('motores.edit_motores')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $works = $request->works;
        $cotizarWoks = $request->cotizarTrabajo;
        $cotizar = ($request->cotizar=="on")?1:0;
        $reales = ($request->reales=="on")?1:0;
        
        $motor = Motor::find($id);
        $infoMotor = $motor->infoMotor;
        $motor->id_cliente = $request->id_cliente;
        $motor->year =  $request->year;
        $motor->os =  $request->os;
        $myTime = strtotime($request->dateIngreso); 
        
        $motor->fecha_ingreso =   date("Y-m-d H:i:s", $myTime);
        $motor->comentarios =  $request->trabajoARealizar;
        
        
        

        $motor->id_tipoequipo = $request->tipoequipohide; 
        $motor->marca =  $request->marca;
        $motor->hp =  $request->hp;
        
        $motor->hpkw =  $request->hpkw=="on"?"1":"0";
        $motor->acdc  = $request->acdc=="on"?"1":"0";
        $motor->rpm = $request->rpm;
        $motor->serie =  $request->serie;
        $motor->modelo =  $request->modelo;
        $motor->volts =  $request->voltaje;
        $motor->amps =   $request->amperajes;
        $motor->frame =  $request->frame;
        $motor->hz = $request->hz;
        $motor->pf = $request->pf;
        $motor->eff = $request->eff;
        $motor->id_enclosure = $request->id_enclosure;
        $motor->phases = $request->phases;
        $motor->recibido = auth()->user()->name;
        if ($motor->save())
        {
            $infoMotor->id_motor = $motor->id_motor;
            $infoMotor->emergencia = $request->emergencia;
            $infoMotor->contacto = $request->contactohide;
            $infoMotor->telefono = $request->telefono;
            $infoMotor->email = $request->email;
            $infoMotor->nombre_equipo = $request->equipment;
            $infoMotor->aplicacion = $request->aplicacion;
            $infoMotor->reales = $reales;
            $infoMotor->cotizar = $cotizar;
            $infoMotor->horas_operacion = $request->horas_operacion;
            $infoMotor->volts_operacion = $request->knownVolts=="on"?"1":"0";
            $infoMotor->amps_operacion = $request->knownAmps=="on"?"1":"0";
            $infoMotor->vab = $request->va;
            $infoMotor->vbc = $request->vb;
            $infoMotor->vca = $request->vc;
            $infoMotor->aa = $request->ampsA;
            $infoMotor->ab = $request->ampsB;
            $infoMotor->ac = $request->ampsC;
            $infoMotor->modo_arranque = $request->iCheckArranque;
            $infoMotor->vibracion = $request->iCheckVibracion;
            $infoMotor->temp_estator = $request->iCheckTemperatura;
            $infoMotor->temp_cojinetes = $request->iCheckTemperaturaCoj;
            $infoMotor->coment_operacion = $request->comentOperacion;
            $infoMotor->save();

            // save inventario
            $inventario = $motor->inventario;
            $inventario->id_motor = $motor->id_motor;
            $inventario->acople = $request->iCheckAcopple;
            $inventario->caja_conexiones = $request->iCheckCaja;
            $inventario->tapa_caja = $request->iCheckTapa;
            $inventario->difusor = $request->iCheckDifusor;
            $inventario->ventilador = $request->iCheckVentilador;
            $inventario->bornera = $request->iCheckBornera;
            $inventario->cunia = $request->iCheckCuna;
            $inventario->graseras = $request->iCheckGrasera;
            $inventario->cancamo = $request->iCheckCancamo;
            $inventario->placa = $request->iCheckPlaca;
            $inventario->tornillos = $request->iCheckTornillos;
            $inventario->capacitor = $request->iCheckCapacitores;
            $inventario->comentarios = $request->comentInventario;
            $inventario->save();
        }

        
        
        //$path = public_path().'/uploads/'.$motor->year."-".$motor->os."/ingreso/";

        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){
                $foto = new Foto($file,'ingreso',$motor->year,$motor->os,2,$motor->id_motor);
                $foto->fullSave();
                // $foto = new Foto;
                // $filenameWithExt = $file->getClientOriginalName();
                // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // $extension = $file->getClientOriginalExtension();
                // $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // $file->move($path,$fileNameToStore);
                // $foto->id_motor = $motor->id_motor;
                // $foto->foto = '/uploads/'.$motor->year."-".$motor->os."/ingreso/".$fileNameToStore;
                // $foto->type = 2;
                // $foto->save();
            }
        }
        $trabajos = Trabajo::where('id_motor','=',$motor->id_motor);
        $trabajos->delete();
        foreach($works as $cont=>$work){
            if ($work != ""){
                $trabajos = new Trabajo();
                $trabajos->id_motor = $motor->id_motor;
                $trabajos->trabajo = $work;
                $trabajos->cotizar = $cotizarWoks[$cont];
                $trabajos->autorizado = (1*$cotizarWoks[$cont]+1)%2;
                if ($cotizarWoks[$cont]==0)
                $trabajos->fecha_autorizado = date('Y-m-d H:i:s');
                $trabajos->place_order = $cont;
                $trabajos->save();
            }

        }
       


        return redirect('/motores')->with('success',"Motor ".$motor->year."-".$motor->os." modificado satisfactoriamente");
       
    }

    public function cambioEstadoForm($id_motor)
    {
        if (Auth::user()->userType <3 || Auth::user()->userType == 8)
        {
                $motor = Motor::find($id_motor);
                
                $params = ['title'=>'CAMBIO DE ESTADO MOTOR '.strtoupper($motor->year)."-".$motor->os,
                 'motor'=>$motor];
                 return view('motores.cambio_estado')->with($params);

        }
        else
            return redirect()->intended('dashboard');
    }
    
    public function saveEstado(Request $request)
    {
        $id_motor = $request->id_motor;
        $motor = Motor::find($id_motor);

        $id_estado = $request->id_estado_select;
        $motor->id_estado = $id_estado;
        
        switch ($id_estado){
            case 0:  // NO AUTORIZADO
                $comentarios = $request->comentarios;
                $comentario_a_bitacora = new Bitacora();
                $comentario_a_bitacora->addSimpleComment('MOTOR NO AUTORIZADO',$comentarios,$id_motor);

                
            break;
            case 2:
                if ($request->hasFile('diagnostico_img')){
                    $file = $request->file('diagnostico_img');
                    $path = public_path().'/uploads/'.$motor->year."-".$motor->os."/diagnostico/";
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $file->move($path,$fileNameToStore);
                    $motor->diagnostico_img = '/uploads/'.$motor->year."-".$motor->os."/diagnostico/".$fileNameToStore;
                    $motor->diagnosticado_por = Auth::user()->id;   
                }
            break;
            case 3:
                $comentarios = $request->parcial;
                $comentario_a_bitacora = new Bitacora();
                $comentario_a_bitacora->addSimpleComment('AUTORIZACION PARCIAL',$comentarios,$id_motor);
                $motor->autorizado_por = Auth::user()->id;
                $motor->inicio = date('Y-m-d H:i:s');
            break;
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
                $motor->autorizado_por = Auth::user()->id;
                $motor->inicio = date('Y-m-d H:i:s');
            break;
            case 9:
                  foreach($motor->trabajos as $trabajo)
                     $this->moveProgress($trabajo->id,100);
                  $motor->fin = date('Y-m-d H:i:s');
                  $comentario_a_bitacora = new Bitacora();
                  $comentario_a_bitacora->addSimpleComment('MOTOR FINALIZADO','Finalizacion de motor',$id_motor);
            break;
        }
        

        
        if ($motor->save())
             return redirect('/search?look='.$motor->os)->with('success',"Estado de Motor ".$motor->year."-".$motor->os." modificado satisfactoriamente");
        else
            return redirect('/motores')->with('error',"Estado de Motor ".$motor->year."-".$motor->os." modificado insatisfactoriamente");
        
    }
    public function densidadespdf($id)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $motor = Motor::where('id_motor','=',$id)->first();
            $pdf = \PDF::loadView('pdf.densidades', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor,'tecnico'=>Auth::user()]);
            return $pdf->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addFoto(Request $request)
    {
        if ($request->hasFile('foto_trabajo')){
            $files = $request->foto_trabajo;
            foreach($files as $key=>$file){
                $trabajo = Trabajo::find($key);
                $motor = Motor::find($trabajo->id_motor);
                
                $fotoTrabajo = new FotosTrabajo();
                $foto = new Foto($file,'reparacion',$motor->year,$motor->os,8,$motor->id_motor);
                $foto->titulo = "Realizando trabajo: ".$trabajo->trabajo;
                $foto->descripcion = "Completado al ".$request->progreso[$key]."%";
                $foto->fullSave();
                $fotoTrabajo->id_foto = $foto->id;
                $fotoTrabajo->id_trabajo = $key;
                $fotoTrabajo->progress = $request->progreso[$key];
                $fotoTrabajo->save();
                return redirect('/motores/'.$motor->id_motor)->with('success',"Se agrego la fotografia al trabajo ".$trabajo->trabajo);
            }
            
        }
    }


    public function addWork(Request $request)
    {
        $trabajo = new Trabajo();
        $trabajo->trabajo = $request->trabajo;
        $trabajo->id_motor = $request->id_motor;
        $trabajo->cotizar = 1;
        $trabajo->autorizado = 0;
        $trabajo->save();
        return redirect('/motores/'.$request->id_motor)->with('success',"Se agrego el trabajo a la orden de servicio ");
    }

    public function destroy($id)
    {
        //
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');

        $motor = Motor::find($id);
        $os = $motor->year."-".$motor->os;
        $asignacion = Asignacion::where('id_motor','=',$id)->delete();
        $cojineteMotors = CojineteMotor::where('id_motor','=',$id)->delete();
        $diagnostico = Diagnostico::where('id_motor','=',$id)->delete();
        $fotos = Foto::where('id_motor','=',$id)->delete();
        $inventarios = Inventario::where('id_motor','=',$id)->delete();
        $trabajos = Trabajo::where('id_motor','=',$id)->delete();
        $infoMotors = InfoMotor::where('id_motor','=',$id)->delete();
        $motor->delete();


        $motores = Motor::orderBy('year','desc')->orderBy('os','desc')->paginate(50);
        
        return redirect('/motores')->with('success',"Se elimino ".$os);
    }
   
    public function asignarForm($id_motor){
        $tecnicos = User::where([['userType','=','6'],['activo','=','1']])->orWhere([['userType','=','5'],['activo','=','1']])->orWhere([['userType','=','8'],['activo','=','1']])->get();
        $ayudantes = User::where([['userType','=','7'],['activo','=','1']])->get();
        $motor = Motor::where('id_motor','=',$id_motor)->first();
        $asignacion = Asignacion::where('id_motor','=',$id_motor)->get();
        $params = ['title'=>'ASIGNACION DE TECNICOS A ORDEN '.strtoupper($motor->year)."-".$motor->os,
                    'tecnicos'=>$tecnicos,
                    'ayudantes'=>$ayudantes,
                    'asignaciones'=>$asignacion,
                    'motor'=>$motor];
        
        return view('motores.asignacion')->with($params);
    }
    public function saveAsignacion(Request $request)
    {
        $id_motor = $request->id_motor;
        $motor = Motor::where('id_motor','=',$id_motor)->first();
        $id_user = $request->id_user;
        $id_estado = $request->id_estado;
        $motor->id_estado = $id_estado;
        $motor->save();
        Asignacion::where('id_motor','=',$id_motor)->delete();
        foreach ($id_user as $cont=>$user)
        {
            if ($user != 0)
                {
                    $asignacion = new Asignacion();
                    $asignacion->id_motor = $id_motor;
                    $asignacion->id_user = $user;
                    $asignacion->asignado_por = Auth::user()->id;     
                    $asignacion->save();
                }
        }
        return redirect('/motores')->with('success',"La asignacion para la orden ".strtoupper($motor->year)."-".$motor->os." fue realizada");
    }
    public function bearingInfo($id)
    {
        $cojinete = Cojinete::find($id);
        return $cojinete->toJson();
    }
    
    public function deleteFoto($id_foto,$id_motor){
        
        $fotosTrabajo = FotosTrabajo::where('id_foto','=',$id_foto)->delete();
        $foto = Foto::where([['id','=',$id_foto],['id_motor','=',$id_motor]])->delete();
        
    }
    public function moveProgress($id,$progress){
        $trabajo = Trabajo::find($id);
        $trabajo->progress = $progress;
        $trabajo->save();
    }
    public function deleteCojinete($id_cojinete){
        $medidas = MedidaCojinete::where('id_cojineteMotor','=',$id_cojinete)->delete();
        $cojineteMotor = CojineteMotor::find($id_cojinete);
        $cojineteMotor->delete();
    }

    public function asignacion($id_motor,$id_user,$asignacionVal){
        $asignacion = Asignacion::where('id_motor','=',$id_motor)->where('id_user','=',$id_user)->get();
        
        
          if ($asignacionVal == 0)
             if (count($asignacion)>0){
                Asignacion::where('id_motor','=',$id_motor)->where('id_user','=',$id_user)->delete();
                return "borrado";
             }
             else
               return "no existia";
          else
          if (count($asignacion)>0){
          
              
              return "regrabado";
          }else
          {
              
              $asignacion = new Asignacion();
              $asignacion->id_motor = $id_motor;
              $asignacion->id_user = $id_user;
              $asignacion->asignado_por = Auth::user()->id;
              
              $asignacion->save();
              
              return "grabado";
          }
        
    }
    public function getAsignacion($id_motor)
    {
        $motor = Motor::find($id_motor);
        $persons = array();
        foreach($motor->asignaciones as $asignacion)
          $persons[] = $asignacion->usuario->name;
        return json_encode($persons);
    }
    public function showPhotoPreview($id_motor){
        $motor = Motor::find($id_motor);
        return $motor->firstFoto();
    }

    public function saveFotos(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $foto = new Foto($file,'desarmado',$motor->year,$motor->os,3,$request->id_motor);
                $foto->fullSave();
            }
       }
        $fotos = Foto::where('id_motor','=',$request->id_motor)->get();
       return json_encode($fotos);    
    }
    public function saveDocumentos(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $documento = new Documento($file,'Documentos',$motor->year,$motor->os,8,$request->id_motor);
                $documento->fullSave();
            }
       }
        $documentos = Documento::where('id_motor','=',$request->id_motor)->get();
       return json_encode($documentos);    
    }
    public function eliminarDocumento($id_documento)
    {
        $documento = Documento::find($id_documento);
        $documento->delete();
        
    }
    
}
