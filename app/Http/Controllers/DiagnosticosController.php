<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Diagnostico;
use App\Cojinete;
use App\CojineteMotor;
use App\MedidaCojinete;
use App\Cliente;
use App\Motor;
use App\InfoMotor;
use App\Inventario;
use App\Foto;
use App\Trabajo;
use App\Mail\SendMail;
use App\User;
use Mail;

class DiagnosticosController extends Controller
{
    //devuelve el folder donde estan las pruebas segun OS
    function scanItig($dir,$motor_os)
    {
        $cdir = 0;
        $cdir = scandir($dir); 
        
        foreach ($cdir as $key => $customer) 
            if (!in_array($customer,array(".",".."))) 
            {
                $serDir = scandir($dir."/".$customer);
                foreach($serDir as $key2=>$serial)
                     if (!in_array($serial,array(".",".."))) 
                        if (is_dir($dir."/".$customer."/".$serial)){
                            $newDir = $dir."/".$customer."/".$serial."/";
                            $filesItig = scandir($newDir);
                            foreach($filesItig as $key3=>$fileItig)
                                if ($fileItig == "info.txt")
                                {
                                    if ($file = fopen($newDir."info.txt", "r")){
                                        $os = fgets($file);
                                        $os = substr($os,0,7);
                                        if ($os == $motor_os){
                                            fclose($file);
                                            return $newDir;
                                        }
                                        fclose($file);
                                    }           
                                }
                        }            
            }
        return "";
    }
    function getMeggerTests($dir)
    {
        $testList= array();
        try{
        $cdir = scandir($dir); 
        
        $cont = 0;
        foreach($cdir as $tests)
            if (!in_array($tests,array(".",".."))){ 
                  $testType = substr($tests,0,1);
                  if ($testType == "M")
                     {
                         
                         $megName = explode("_",$tests);
                         $date =  $megName[1];
                         $date = substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2);
                         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 



                         setlocale(LC_ALL,"es_GT");
                         $testList[$cont][0] = $tests;  // full filename
                         $testList[$cont][1] = date("d", strtotime($date))." de ".$meses[date('n', strtotime($date))-1]." del ".date('Y', strtotime($date)); // date
                         $testList[$cont][2] = $megName[1]."_".$megName[2]; // test name
                         $testList[$cont][3] = explode("\n", file_get_contents($dir."/".$tests));
                         $testName =  explode("\n", file_get_contents($dir."/D_".$megName[1]."_".$megName[2].".dt1"));
                         $testName = explode("=",$testName[1]);
                         $testName = $testName[1];
                         $testList[$cont++][4] = $testName;

                     }
             }
        }catch (Exception $e)
        {

        }
        return $testList;
    }

    
    function parseMeggerTest($test){
        echo $test[4]."<br>";
        for ($cont = 7;$cont<sizeof($test[3]);$cont++)
        echo $test[3][$cont]."<br>";
        echo "<br>";
        
    }
    function getAvailableTests($folder,$numberTest){
        $megger = false;
        $hipot = false;
        $clz = false;
        $micro = false;
        $surge = false;
        if (file_exists($folder."M_".$numberTest."_MEG.mhe"))
          $megger = true;
        if (file_exists($folder."H_".$numberTest."_HIP.mhe"))
          $hipot = true;
        if (file_exists($folder."CLZ_".$numberTest.".csv"))
          $clz = true;
        if (file_exists($folder."S_".$numberTest."_1__.csv"))
          $surge = true;
        if (file_exists($folder."D_".$numberTest.".dt1"))
        {
            $datafile = explode("\n", file_get_contents($folder."D_".$numberTest.".dt1"));
            $datafile = $datafile[9];
            $datafile = explode('=',$datafile);
            if (sizeof($datafile) == 2)
              $micro = true;
            else
              $micro = $datafile[9];
        }
         
        return ['megger'=>$megger,
                'hipot'=>$hipot,
                'clz'=>$clz,
                'micro'=>$micro,
                'surge'=>$surge];
    }

    function readSurge($folder,$numberTest){
        $surge1 = array();
        $surge2 = array();
        $surge3 = array();
        $info = array();
        
        if (file_exists($folder."S_".$numberTest."_1__.csv"))
        {
            $datafile = explode("\n", file_get_contents($folder."S_".$numberTest."_1__.csv"));
            $info = explode(",",$datafile[0]);
            for($i=1;$i<count($datafile);$i++){
                $data = explode(",",$datafile[$i]);
                $surge1[] = $data[0];
              }
        }
        if (file_exists($folder."S_".$numberTest."_2__.csv"))
        {
            $datafile = explode("\n", file_get_contents($folder."S_".$numberTest."_2__.csv"));
            for($i=1;$i<count($datafile);$i++){
                $data = explode(",",$datafile[$i]);
                $surge2[] = $data[0];
              }
        }
        if (file_exists($folder."S_".$numberTest."_3__.csv"))
        {
            $datafile = explode("\n", file_get_contents($folder."S_".$numberTest."_3__.csv"));
            for($i=1;$i<count($datafile);$i++){
              $data = explode(",",$datafile[$i]);
              $surge3[] = $data[0];
            }
        }
        $time = floatval(substr($info[3],10,strlen($info[3])-13));
        
          $time = 0.0029;
        $dif12 = 0;
        $dif23 = 0;
        $dif31 = 0;
        for ($i=0;$i<count($surge1);$i++){
           // echo $dif12. " + (".floatval($surge1[$i])."-".floatval($surge2[$i]).") x (".$time.")<br>";
            
          $dif12 += abs(floatval($surge2[$i])-floatval($surge1[$i]))*($time);
          
          $dif23 += abs(floatval($surge3[$i])-floatval($surge2[$i]))*($time);
          $dif31 += abs(floatval($surge1[$i])-floatval($surge3[$i]))*($time);
        }
        return [$surge1,$surge2,$surge3,number_format($dif12/5,1),number_format($dif23/5,1),number_format($dif31/5,1)];
    }
    public function readInfoSurge($folder,$numberTest){
        $isMegger = false;
        $info = array();
        
        if (file_exists($folder."info.txt"))
        {
            
            $datafile = explode("\n", file_get_contents($folder."info.txt"));
            $datafile2 = explode("\n", file_get_contents($folder."D_".$numberTest.".dt1"));
            if (file_exists($folder."M_".$numberTest."_MEG.mhe")){
                $datafile3 = explode("\n", file_get_contents($folder."M_".$numberTest."_MEG.mhe"));
                $isMegger = true;
            }
            
            $info[0] = $datafile[0]; // project
            $info[1] = $datafile[1]; // tag
            $info[2] = $datafile[2]; // location
            $info[3] = $datafile[3]; // manufacturer
            $info[4] = $datafile[4]; // volts
            $info[5] = $datafile[5]; // rpm
            $info[6] = $datafile[6]; // power
            $info[7] = $datafile[7]; // hpkw
            $info[8] = $datafile[8]; // used
            $info[9] = $datafile[9]; // ac
            $info[13] = $datafile[10]; // design1
            $testDesc = explode("=",$datafile2[0]);
            $info[14] = $testDesc[1]; // test description
            $repairStage = explode("=",$datafile2[1]);
            $info[15] = $repairStage[1];  //repair stage
            $operator = explode("=",$datafile2[5]);
            $info[16] = $operator[1];  //operator
            $ohms = array();
            for ($i=9;$i<=11;$i++){
                $microOhm = explode("=",$datafile2[$i]);
                $info[8+$i] = $microOhm[1];  //operator
                $ohms[] =  floatval($microOhm[1]);
                
            }
            $sub = ((max($ohms)-min($ohms)));
            $avg = ($ohms[0]+$ohms[1]+$ohms[2])/3;
            $info[20] = number_format(($sub/$avg)*100,1);
            if ($isMegger){
                
                    if (count($datafile3) == 10){
                            $data = explode(",",$datafile3[7]);
                            $info[21] = $data[0];
                            $info[22] = $data[1];
                            $info[23] = number_format(floatval($data[2]),2);
                            if ($data[2]==0)
                                $info[24] = 25000;
                            else{
                                $meg = number_format(intval($data[1])/floatval($data[2]),0);
                                $info[24] = $meg;
                            }
                            $data = explode(",",$datafile3[8]);
                            $info[25] = $data[0];
                            $info[26] = $data[1];
                            $info[27] = number_format(floatval($data[2]),2);
                            if ($data[2]==0)
                                $info[28] = 25000;
                            else{
                                $meg = number_format(intval($data[1])/floatval($data[2]),0);
                                $info[28] = $meg;
                            }
                    
                        
                    } else if (count($datafile3) == 18){
                        $data = explode(",",$datafile3[7]);
                        $info[21] = $data[0];
                        $info[22] = $data[1];
                        $info[23] = number_format(floatval($data[2]),2);
                        if ($data[2]==0)
                            $info[24] = 25000;
                        else{
                            $meg = number_format(intval($data[1])/floatval($data[2]),0);
                            $info[24] = $meg;
                        }
                        $data = explode(",",$datafile3[16]);
                            $info[25] = $data[0];
                            $info[26] = $data[1];
                            $info[27] = number_format(floatval($data[2]),2);
                            if ($data[2]==0)
                                $info[28] = 25000;
                            else{
                                $meg = number_format(intval($data[1])/floatval($data[2]),0);
                                $info[28] = $meg;
                            }
                    
                    }
            }
            

        }
        
        return $info;
    }
    //20180629 092244
    public function parseDate($numberTest){
        $fullDate = explode("_",$numberTest); 
        $date = substr($fullDate[0],6,2)."/".substr($fullDate[0],4,2)."/".substr($fullDate[0],0,4);
        $date .= " - ".substr($fullDate[1],0,2).":".substr($fullDate[0],2,2).":".substr($fullDate[0],4,2);
        return $date;
    }
    public function summaryDiagnostico($id_motor)
    {
        
        $motor = Motor::find($id_motor);
        
        $fotos = Foto::where([['id_motor','=',$id_motor],['type','=','3']])->orderBy('accion','desc')->get();
        $cojinetes = $motor->cojinetes;
        $cojinetesSend = array();
        foreach($cojinetes as $key=>$cojinete)
        {
            $cojinetesSend[$key][0] = $cojinete->infoCojinete->designacion.$cojinete->getSufix();
            $cojinetesSend[$key][1] = $cojinete->medidas->first()->getMaxHolguraCojinete();
            $cojinetesSend[$key][2] = $cojinete->medidas->first()->getMaxInterferenciaCojinete();
            $tol = $cojinete->tolerancia<=2?"(K7)":"(H6)";
            $cojinetesSend[$key][3] = $tol." +".$cojinete->getMinTolerancia()." / +".$cojinete->getMaxTolerancia();            
            $cojinetesSend[$key][4] = $cojinete->medidas->first()->getRecomendacion();
            $cojinetesSend[$key][5] = $cojinete->id;
            $cojinetesSend[$key][6] = $cojinete->medidas->first()->getMaxInterferenciaEje();
            $cojinetesSend[$key][7] = $cojinete->medidas->first()->getMaxHolguraEje();
            $tol = $cojinete->getToleranciasEjeTraduccion($cojinete->getToleranciaEje());
            $cojinetesSend[$key][8] = "(".$tol.") ".$cojinete->getMaxToleranciaEje()." / ".$cojinete->getMinToleranciaEje();
            $cojinetesSend[$key][9] =  $cojinete->medidas->first()->getRecomendacionEje();
            
        }
        
        $availableTests = 0;
        $surgeValues = 0;
        $infoSurge = 0;
        $date = 0;
        if ($motor->diagnostico->folder_surge != "")
        {
            $availableTests = $this->getAvailableTests($motor->diagnostico->folder_surge,$motor->diagnostico->aislamiento); 
            
            $infoSurge = $this->readInfoSurge($motor->diagnostico->folder_surge,$motor->diagnostico->aislamiento); 
            
            $date = $this->parseDate($motor->diagnostico->aislamiento);
            if ($availableTests['surge'])
              $surgeValues = $this->readSurge($motor->diagnostico->folder_surge,$motor->diagnostico->aislamiento);
            
            
        }
        
        
        
         $params = ['fotos'=>$fotos,
                   'trabajos'=>$motor->trabajos,
                     'cojinetes'=>$cojinetesSend,
                     'diagnostico'=>$motor->diagnostico,
                     
                     'surgeValues'=>$surgeValues,
                     'infoSurge'=>$infoSurge];
        //             'serial'=>$motor->serie,
        //              'date'=>$date];

        return json_encode($params); 
        
    }

    public function diagnostico($id_motor)
    {

        // foreach($itig as $customers)
        //   print($customers);
        
        $motor = Motor::find($id_motor);
        $cojinetes = Cojinete::orderBy('designacion','asc')->get();
        $motor_os = substr($motor->year,2)."-".$motor->os;
      /*   if ($motor->diagnostico->folder_surge == "")
            $itigFolder = $this->scanItig("c:/itig/customers",$motor_os);
        else
            $itigFolder = $motor->diagnostico->folder_surge;

        if ($itigFolder != ""){
               $meggerTests = $this->getMeggerTests($itigFolder);
           
        }
        else
             $meggerTests = [];
    
       */  
        $params = ['title'=>'DIAGNOSTICO DE EQUIPO '.strtoupper($motor->year)."-".$motor->os,
        'motor'=>$motor,
      //  'meggerTests'=>$meggerTests,
     //   'itigFolder'=>$itigFolder,
        'cojinetes'=>$cojinetes];
        return view('motores.diagnostico')->with($params);
        //return view('motores.rapid')->with($params);
    }

    public function saveDiagnostico1(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        
        $titulos = $request->titulo;
        $descripciones = $request->descripcion;
        $acciones = $request->accion;
        
        if (count($titulos)>0)
        foreach($titulos as $cont=>$titulo)
        {
            $foto = Foto::find($cont);
            if ($foto->exists()){
                $foto->titulo = $titulo;
                $foto->descripcion = $descripciones[$cont];
                $foto->accion = $acciones[$cont];
                $foto->save();
            }
        }

      //  $path = public_path().'/uploads/'.$motor->year."-".$motor->os."/desarmado/";
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $foto = new Foto($file,'desarmado',$motor->year,$motor->os,3,$request->id_motor);
                $foto->fullSave();
            }
       }
       $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','3']])->get();
       return json_encode($fotos);    
    }
    public function saveDiagnostico2(Request $request){
        $motor = Motor::find($request->id_motor);
         $titulos = $request->titulo;
         $descripciones = $request->descripcion;        
        
         $diagnostico = Diagnostico::find($motor->id_motor);
         $diagnostico->id_user = Auth::user()->id;
        
          $diagnostico->alto_voltaje = $request->alto_voltaje=="on"?1:0;
          $diagnostico->desfase = $request->desfase=="on"?1:0;
          $diagnostico->pico_voltaje = $request->pico_voltaje=="on"?1:0;
          $diagnostico->desbalance = $request->desbalance=="on"?1:0;
          $diagnostico->desalineacion = $request->desalineacion=="on"?1:0;
          $diagnostico->desajuste = $request->desajuste=="on"?1:0;
          $diagnostico->rod_inapropiado = $request->rod_inapropiado=="on"?1:0;
          $diagnostico->exceso_carga = $request->exceso_carga=="on"?1:0;
          $diagnostico->golpe_mecanico = $request->golpe_mecanico=="on"?1:0;
          $diagnostico->falta_lubricacion = $request->falta_lubricacion=="on"?1:0;
          $diagnostico->exceso_lubricacion = $request->exceso_lubricacion=="on"?1:0;
          $diagnostico->exceso_contaminacion = $request->exceso_contaminacion=="on"?1:0;
          $diagnostico->falla_sello = $request->falla_sello=="on"?1:0;
          $diagnostico->mala_grasa = $request->mala_grasa=="on"?1:0;
          $diagnostico->sobrecarga = $request->sobrecarga=="on"?1:0;
          $diagnostico->falla_ventilacion = $request->falla_ventilacion=="on"?1:0;
          $diagnostico->pico_amperaje = $request->pico_amperaje=="on"?1:0;
          $diagnostico->mal_diseno = $request->mal_diseno=="on"?1:0;
          $diagnostico->perdida_eficiencia = $request->perdida_eficiencia=="on"?1:0;
          $diagnostico->mala_conexion = $request->mala_conexion=="on"?1:0;
          $diagnostico->corto_humedad = $request->corto_humedad=="on"?1:0;
          $diagnostico->corto_aislamiento = $request->corto_aislamiento=="on"?1:0;
          $diagnostico->corto_vueltas = $request->corto_vueltas=="on"?1:0;
          $diagnostico->golpe_bobinado = $request->golpe_bobinado=="on"?1:0;
          $diagnostico->roze_rotor = $request->roze_rotor=="on"?1:0;
          $diagnostico->corto_cables = $request->corto_cables=="on"?1:0;
          $diagnostico->descripcion = $request->descripcion_falla;
          
          
          
          $diagnostico->save();
         if (count($titulos)>0)
         foreach($titulos as $cont=>$titulo)
         {
             $foto = Foto::find($cont);
             $foto->titulo = $titulo;
             $foto->descripcion = $descripciones[$cont];
             $foto->save();
         }
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){
                $foto = new Foto($file,'causa',$motor->year,$motor->os,4,$request->id_motor);
                $foto->fullSave();
            }
       }
       $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','4']])->get();
       return json_encode($fotos); 
    }

    public function saveDiagnostico3(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        $diagnostico = Diagnostico::find($motor->id_motor);
        $diagnostico->id_user = Auth::user()->id;
        $diagnostico->bobinado_puntos = $request->bobinado_puntos;
        
        $diagnostico->trabajo_electrico = $request->trabajo_electrico;
        $diagnostico->contaminacion = $request->contaminacion;
        $diagnostico->aislamiento = $request->aislamiento;
        $diagnostico->modo_lavado = $request->modo_lavado;
        $diagnostico->cantidad_reprocesos = $request->cantidad_reprocesos;
        $diagnostico->iCheckTermo = $request->iCheckTermo;
        $diagnostico->iCheckTerminales = $request->iCheckTerminales;
        $diagnostico->iCheckExtraer = $request->iCheckExtraer;
        $diagnostico->tipo_carcaza = $request->tipo_carcaza;
        $diagnostico->multiples_velocidades = $request->multiples_velocidades;
        $diagnostico->tipo_alambre = $request->tipo_alambre;
        $diagnostico->libras_alambre = $request->libras_alambre;
        $diagnostico->iCheckSeparar = $request->iCheckSeparar;
        $diagnostico->iCheckEpoxitar = $request->iCheckEpoxitar;
        $diagnostico->puntas_salida = $request->puntas_salida;
        $diagnostico->complejidad = $request->complejidad;
        $diagnostico->folder_surge = $request->folder_surge;
        $diagnostico->desc_bobinado = $request->desc_bobinado;
        $diagnostico->save();

        $titulos = $request->titulo;
        $descripciones = $request->descripcion;   
        
        if (count($titulos)>0)
         foreach($titulos as $cont=>$titulo)
         {
             $foto = Foto::find($cont);
             $foto->titulo = $titulo;
             $foto->descripcion = $descripciones[$cont];
             $foto->save();
         }
       
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){
                $foto = new Foto($file,'electrico',$motor->year,$motor->os,5,$request->id_motor);
                $foto->fullSave();
            }
        }
        $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','5']])->get();
        return json_encode($fotos); 
    }

    public function saveDiagnostico4(Request $request){
        
        $motor = Motor::find($request->id_motor);
        $id_cojinetes = $request->id_cojinete;
        if (count($id_cojinetes)>0)
        foreach($id_cojinetes as $key=>$id_cojinete){
            $id_cojineteMotor = $request->id_cojineteMotor[$key];
            if ($id_cojineteMotor==0)
                $cojineteMotor = new CojineteMotor();
            else
                $cojineteMotor = CojineteMotor::find($id_cojineteMotor);
            $cojineteMotor->id_motor = $request->id_motor;
            $cojineteMotor->id_cojinete = $id_cojinete;
            $cojineteMotor->pos_cojinete = $request->pos_cojinete[$key];
            $cojineteMotor->diam_externo = $request->diam_externo[$key];
            $cojineteMotor->diam_interno = $request->diam_interno[$key];
            $cojineteMotor->sellos = $request->sellos[$key];
            $cojineteMotor->juego = $request->juego[$key];
            $cojineteMotor->jaula = $request->jaula[$key];
            $cojineteMotor->marca_original = $request->marca_original[$key];
            $cojineteMotor->marca_colocar = $request->marca_colocar[$key];
            $cojineteMotor->tolerancia = $request->tolerancia[$key];
             
            

            $cojineteMotor->save();

            if ($id_cojineteMotor==0)
                $medidaCojinete = new MedidaCojinete();
            else{
                $medidaCojinete = $cojineteMotor->medidas->first();
                
            }
            $medidaCojinete->id_cojineteMotor = $cojineteMotor->id;
            $medidaCojinete->id_user = Auth::user()->id;
            $medidaCojinete->med_xa = $request->med_xa[$key];
            $medidaCojinete->med_xb = $request->med_xb[$key];
            $medidaCojinete->med_xc = $request->med_xc[$key];
            $medidaCojinete->med_xd = $request->med_xd[$key];

            $medidaCojinete->med_ya = $request->med_ya[$key];
            $medidaCojinete->med_yb = $request->med_yb[$key];
            $medidaCojinete->med_yc = $request->med_yc[$key];
            $medidaCojinete->med_yd = $request->med_yd[$key];    

            $medidaCojinete->med_za = $request->med_za[$key];
            $medidaCojinete->med_zb = $request->med_zb[$key];
            $medidaCojinete->med_zc = $request->med_zc[$key];
            $medidaCojinete->med_zd = $request->med_zd[$key];    

            $medidaCojinete->med_au = $request->med_au[$key];
            $medidaCojinete->med_av = $request->med_av[$key];
            $medidaCojinete->med_aw = $request->med_aw[$key];
            
            $medidaCojinete->med_bu = $request->med_bu[$key];
            $medidaCojinete->med_bv = $request->med_bv[$key];
            $medidaCojinete->med_bw = $request->med_bw[$key];

            $medidaCojinete->save();
        }
        $titulos = $request->titulo;
        $descripciones = $request->descripcion;   
        
        if (count($titulos)>0)
         foreach($titulos as $cont=>$titulo)
         {
             $foto = Foto::find($cont);
             $foto->titulo = $titulo;
             $foto->descripcion = $descripciones[$cont];
             $foto->save();
         }
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){
                $foto = new Foto($file,'cojinetes',$motor->year,$motor->os,6,$request->id_motor);
                $foto->fullSave();
            }
        }
        
        $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','6']])->get();
        return json_encode($fotos); 
        
    }
    public function saveDiagnostico5(Request $request){
        $trabajos = $request->agregar_trabajo;
      
        
        $motor = Motor::find($request->id_motor);
        $fotos = Foto::where([['id_motor','=',$motor->id_motor],['type','=','3']])->orderBy('accion','desc')->get();
      
        
        $trabajoDesc = "";
        if (count($trabajos)>0)
          
        foreach($trabajos as $key=>$trabajo)
            
            if ($trabajo==1){
                if (count($fotos)>$key){
                    if ($fotos[$key]->accion==2)
                    $trabajoDesc = "Reemplazo de ".$fotos[$key]->titulo;
                    else if ($fotos[$key]->accion==3)
                    $trabajoDesc = "Reparacion de ".$fotos[$key]->titulo;
                    $foto = Foto::find($fotos[$key]->id);
                    $foto->trabajo_agregado = 1;
                    $foto->save();
                }
                $work = new Trabajo();
                $work->id_motor = $motor->id_motor;
                $work->trabajo = $trabajoDesc;
                $work->save();
              
            }
            
        if ($motor->diagnostico->trabajo_electrico == 1)
            $trabajoDesc = "Mantenimiento Electrico";
        else if ($motor->diagnostico->trabajo_electrico == 2)
            $trabajoDesc = "Rebobinado";
        else if ($motor->diagnostico->trabajo_electrico == 3)
            $trabajoDesc = "Reparacion Electrica Parcial";
        if ($motor->diagnostico->trabajo_electrico > 1)
        {
            $work = new Trabajo();
                $work->id_motor = $motor->id_motor;
                $work->trabajo = $trabajoDesc;
                $work->save();
        }
        
        $diagnostico = $motor->diagnostico;
        $diagnostico->balancear = $request->balancear;
        $diagnostico->peso_balanceo = $request->peso_balanceo;
        $diagnostico->finalizado = 1;
        
        date_default_timezone_set("America/Guatemala");
        $diagnostico->fecha_fin_diagnostico = date('Y-m-d H:i:s');
        $diagnostico->save();
        $motor->id_estado = 2;
        $motor->save();
        $trabajos = $request->agregar_trabajo;
        $tecnicos = User::where('userType','=','6')->get();
        $ayudantes = User::where('userType','=','7')->get();

        foreach($motor->cojinetes as $cojinete)
        {
            if (count($cojinete->medidas) < 2)
            {
                $medida = new MedidaCojinete();
                $medida->id_cojineteMotor = $cojinete->id;
                $medida->id_user = Auth::user()->id;
                $medida->initial = 1; // definirla como medida final
                $medida->save();
                
            }
        }
        return view('motores.show_motor')->with(['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor,'tecnicos'=>$tecnicos,'ayudantes'=>$ayudantes]);
        
    }

    public function pdfDiagnostico($id){
        
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $motor = Motor::where('id_motor','=',$id)->first();
        
        $pdf = \PDF::loadView('pdf.diagnostico', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor]);
        
        return $pdf->stream();
      //  $pdf_data = $pdf->output();
        // if ($motor->infoMotor->enviar_os == 1){
        //    Mail::send(new SendMail($pdf_data,$motor));
        //    $motor->infoMotor->enviar_os = 0;
        //    $motor->infoMotor->save();
        // }
    }


    // ajax
    

}
