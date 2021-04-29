<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cliente;
use App\InfoCliente;
use App\Contacto;
use DB;

class ClientesController extends Controller
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
        
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $clientes = Cliente::orderBy('cliente','asc')->paginate(20);

        
        return view('clientes.index_clientes')->with(['title'=>'REGISTRO DE CLIENTES','clientes'=>$clientes]);
    }

    public function findLike(Request $request)
    {
        //$nombre_cliente = Request::input('nombre_cliente');
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $clientes = Cliente::where('cliente','like','%'.$request->nombre_cliente.'%')->paginate(20);
        
                return view('clientes.index_clientes')->with(['title'=>'REGISTRO DE CLIENTES','clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        return view('clientes.nuevo_clientes')->with(['title'=>'INGRESO DE NUEVO CLIENTE']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cliente'=>'required',
            'razon_social'=> 'required',
            'nit'=>'required'
        ]);
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        
        $contactos_req = $request->contacto;
        $telefonos_req = $request->telefono;
        $puesto_req = $request->puesto;
        $email_req = $request->email;
        
        
        

        $cliente = new Cliente;
        $infoCliente = new InfoCliente;
        $cliente->cliente = $request->input('cliente');
        $cliente->pais = $request->input('pais');
        $cliente->ciudad = $request->input('ciudad');
        
        $infoCliente->nit = $request->input('nit');
        $infoCliente->razon_social = $request->input('razon_social');
        $cliente->save();
        
        $id =  $cliente->id_cliente;
        $infoCliente->id_cliente = $id;
        $infoCliente->direccion_fiscal = $request->input('direccion_fiscal');
        $infoCliente->direccion_planta = ''.$request->input('direccion_planta');
        $infoCliente->comentarios = ''.$request->input('infoCliente');
        $infoCliente->save();

        $contactos_old = Contacto::where('id_cliente','=',$id);
        $contactos_old->delete();
        
        foreach($contactos_req as $cont=>$each_contacto){
            $contactos = new Contacto;
            $contactos->contacto = $each_contacto;
            $contactos->telefono = $telefonos_req[$cont];
            $contactos->puesto = $puesto_req[$cont];
            $contactos->email = $email_req[$cont];
            $contactos->id_cliente = $id;
            $contactos->save();
        }
        
        
        return redirect('/clientes')->with('success','Cliente '.$cliente->cliente.' Agregado No: '.$id);
       
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
      //  $clientes = Cliente::where('cliente','like','%agre%')->paginate(20);
    //    $pdf = \PDF::loadView('pdf.test', ['clientes'=>$clientes]);
    //   naaaa return view('pdf.test', ['clientes'=>$clientes]);
       // return $pdf->stream();
    //   return $pdf->inline();
    if(Auth::user()->activo == 0)
    return redirect()->intended('dashboard');
            $cliente = Cliente::find($id);
            
            return view('clientes.show_cliente')->with(['title'=>'INFORMACION DE CLIENTE','cliente'=>$cliente]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        
        $cliente = Cliente::find($id_cliente);
        return view('clientes.edit_clientes')->with(['cliente'=>$cliente,'title'=>'EDITAR CLIENTE']);
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
        $this->validate($request,[
            'cliente'=>'required',
            'razon_social'=> 'required',
            'nit'=>'required'
        ]);
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $contactos_req = $request->contacto;
        $telefonos_req = $request->telefono;
        $puesto_req = $request->puesto;
        $email_req = $request->email;
        
        $cliente = Cliente::find($id);
        $info = InfoCliente::where('id_cliente','=',$cliente->id_cliente);
          $info->delete();
        
         $infoCliente = new InfoCliente;
        
        $cliente->cliente = ''.$request->input('cliente');
        $cliente->pais = ''.$request->input('pais');
        $cliente->ciudad = ''.$request->input('ciudad');
        
        $infoCliente->nit = ''.$request->input('nit');
        $infoCliente->razon_social = ''.$request->input('razon_social');
        $cliente->save();
        $infoCliente->id_cliente = $cliente->id_cliente;
        $infoCliente->direccion_fiscal = ''.$request->input('direccion_fiscal');
        $infoCliente->direccion_planta = ''.$request->input('direccion_planta');
        $infoCliente->comentarios = ''.$request->input('infoCliente');
        $infoCliente->save();

        $contactos_old = Contacto::where('id_cliente','=',$id);
        $contactos_old->delete();
        
        foreach($contactos_req as $cont=>$each_contacto){
            $contactos = new Contacto;
            $contactos->contacto = $each_contacto;
            $contactos->telefono = $telefonos_req[$cont];
            $contactos->puesto = $puesto_req[$cont];
            $contactos->email = $email_req[$cont];
            $contactos->id_cliente = $id;
            $contactos->save();
        }

        return redirect('/clientes')->with('success','Cliente Editado Exitosamente');
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
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $cliente = Cliente::find($id);
        $nombre = $cliente->cliente;
        $infoCliente = InfoCliente::where('id_cliente','=',$id);
        $contactos = Contacto::where('id_cliente','=',$id);

        $contactos->delete();
        $infoCliente->delete();
        $cliente->delete();
        return redirect('/clientes')->with('success','Cliente '.$nombre.' eliminado exitosamente');

    }


    // ajax
    public function getDataClient($id_cliente){
                
                $cliente = Cliente::find($id_cliente);
                
                return $cliente->contactos->toJson();

    }

    public function getDataContact($id){
        
        $contacto = Contacto::find($id);
        
        return $contacto->toJson();

    }
}
