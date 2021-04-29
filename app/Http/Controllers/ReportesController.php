<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Foto;
use App\MedidaCojinete;

class ReportesController extends Controller
{
    //

    public function startReport($id){
        // $motor = Motor::find($id_motor);
        // $params = ['title'=>'DIAGNOSTICO DE EQUIPO '.strtoupper($motor->year)."-".$motor->os,
        //            'motor'=>$motor];
        
        // return view('motores.reporte')->with($params);
        if (Auth::user() == null)
        return redirect()->intended('dashboard');
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $tecnicos = User::where('userType','=','6')->get();
        $ayudantes = User::where('userType','=','7')->get();
        $motor = Motor::where('id_motor','=',$id)->first();
        

        
        
        return view('motores.reporte')->with(['title'=>'REPORTE FINAL PARA CLIENTE','motor'=>$motor,'tecnicos'=>$tecnicos,'ayudantes'=>$ayudantes]);
    }

    public function saveReporte1(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        
        $titulos = $request->titulo;
        $descripciones = $request->descripcion;
        if (count($titulos)>0)
        foreach($titulos as $cont=>$titulo)
        {
            $foto = Foto::find($cont);
            if ($foto->exists()){
                $foto->titulo = $titulo;
                $foto->descripcion = $descripciones[$cont];
                $foto->save();
            }
        }
        
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $foto = new Foto($file,'reparacion',$motor->year,$motor->os,8,$request->id_motor);
                $foto->fullSave();
            }
       }
       
       $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','8']])->get();
       return json_encode($fotos);    

    }
    public function saveReporte2(Request $request)
    {
        
        $motor = Motor::find($request->id_motor);
        $id_cojineteMotores = $request->id_cojineteMotor;
        foreach($id_cojineteMotores as $key=>$id_cojineteMotor){
            
            $medidaCojinete = MedidaCojinete::where('id_cojineteMotor','=',$id_cojineteMotor)->where('initial','=',1)->get();
            

            $medidaCojinete->first()->med_xa = $request->med_xa2[$key];
            $medidaCojinete->first()->med_xb = $request->med_xb2[$key];
            $medidaCojinete->first()->med_xc = $request->med_xc2[$key];
            $medidaCojinete->first()->med_xd = $request->med_xd2[$key];

            $medidaCojinete->first()->med_ya = $request->med_ya2[$key];
            $medidaCojinete->first()->med_yb = $request->med_yb2[$key];
            $medidaCojinete->first()->med_yc = $request->med_yc2[$key];
            $medidaCojinete->first()->med_yd = $request->med_yd2[$key];    

            $medidaCojinete->first()->med_za = $request->med_za2[$key];
            $medidaCojinete->first()->med_zb = $request->med_zb2[$key];
            $medidaCojinete->first()->med_zc = $request->med_zc2[$key];
            $medidaCojinete->first()->med_zd = $request->med_zd2[$key];    

            $medidaCojinete->first()->save();           
        }
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $foto = new Foto($file,'tornos',$motor->year,$motor->os,9,$request->id_motor);
                $foto->fullSave();
            }
       }
       $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','9']])->get();
       return json_encode($fotos);    
    }

    public function saveReporte3(Request $request)
    {
        $motor = Motor::find($request->id_motor);
        $id_cojineteMotores = $request->id_cojineteMotor;
        foreach($id_cojineteMotores as $key=>$id_cojineteMotor){
            
            $medidaCojinete = MedidaCojinete::where('id_cojineteMotor','=',$id_cojineteMotor)->where('initial','=',1)->get();   

            $medidaCojinete->first()->med_au = $request->med_au2[$key];
            $medidaCojinete->first()->med_av = $request->med_av2[$key];
            $medidaCojinete->first()->med_aw = $request->med_aw2[$key];
            
            $medidaCojinete->first()->med_bu = $request->med_bu2[$key];
            $medidaCojinete->first()->med_bv = $request->med_bv2[$key];
            $medidaCojinete->first()->med_bw = $request->med_bw2[$key];
            $medidaCojinete->first()->save();
           
        }
        if ($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $cont=>$file){ 
                $foto = new Foto($file,'tornos',$motor->year,$motor->os,9,$request->id_motor);
                $foto->fullSave();
            }
       }
       $fotos = Foto::where([['id_motor','=',$request->id_motor],['type','=','9']])->get();
       return json_encode($fotos);    
    }
}
