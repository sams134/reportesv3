<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Usuario;
use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\sendMail;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        //
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $usuarios = User::orderBy('name','asc')->get();

        
        return view('empleados.index_empleados')->with(['title'=>'REGISTRO DE EMPLEADOS','users'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        return view('empleados.nuevo_empleado')->with(['title'=>'INGRESO DE NUEVO CLIENTE']);
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
        $dateString= $request->fecha_nacimiento;
        //$date = \DateTime::createFromFormat('dd/mm/YYYY',$request->fecha_nacimiento);
        //$date->format('Y-m-d h:i:s');
        $newDateString = date_format(date_create_from_format('d/m/Y', $dateString), 'Y-m-d');
        

        $user = User::find($id);
        $usuario = $user->infoUser;
       // $user = Usuario::where('id_user','=',$id)->get();
        $usuario->nombre = $request->nombre;
        $usuario->segundo_nombre = $request->segundo_nombre;
        $usuario->apellido = $request->apellido;
        $usuario->segundo_apellido = $request->segundo_apellido;
        $usuario->fecha_nacimiento = date_format(date_create_from_format('d/m/Y', $dateString), 'Y-m-d');
        $usuario->dpi = $request->dpi;
        $usuario->igss = $request->igss;
        $usuario->domicilio = $request->domicilio;
        $usuario->telefono = $request->telefono;
        $usuario->estado_civil = $request->estado_civil;
        $usuario->conyugue = $request->conyugue;
        $usuario->activo = $request->activo;  // metodo de pago
        $usuario->banco = $request->banco;
        $usuario->no_cuenta = $request->cuenta;
        $usuario->save();
        return redirect('/myprofile')->with(['title'=>'PERFIL DE USUARIO','user'=>$user,'success'=>'Perfil Editado Exitosamente']);

        // adons
        // poner files de dpi
        // poner files de contratos
        // poner files de cuanto se pueda
        // poner habilidades
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePhoto(Request $request)
    {
        
        $user = Auth::user();
        $path = public_path().'/uploads/empleados/'.$user->username."/";
        if ($request->hasFile('file')){
            
            $files = $request->file('file');
            
            
                
                $filenameWithExt = $files->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore= $filename.'.'.$extension;
                $files->move($path,$fileNameToStore);
                $user->foto = '/uploads/empleados/'.$user->username."/".$fileNameToStore;
                $user->save();
            
            $user = Auth::user();
            return redirect('/myprofile')->with(['title'=>'PERFIL DE USUARIO','user'=>$user,'success'=>'Fotografia Cambiada Exitosamente']);
        }
        
        $user = Auth::user();
        return redirect('/myprofile')->with(['title'=>'PERFIL DE USUARIO','user'=>$user,'success'=>'La fotografia no pudo ser cargada']);
        
    }
    public function profile()
    {
        $user = Auth::user();
        return view('empleados.profile')->with(['title'=>'PERFIL DE USUARIO','user'=>$user]);
    }
    public function editMyProfile()
    {
        $user = Auth::user();
        return view('empleados.profile_edit')->with(['title'=>'PERFIL DE USUARIO','user'=>$user]);   
    }

    public function sendmail(){
        Mail::send(new SendMail());
        
    }
    // ajax

    public function activateUser($id){
        $id_user = (($id-1000)/8);
        $user = User::find($id_user);
        if ($user->activo == 0)
        {
            $user->activo = 1;
            $user->save();
            return 1;
        }else
        {
            $user->activo = 0;
            $user->save();
            
            return 0;
        }
        
    }
}
