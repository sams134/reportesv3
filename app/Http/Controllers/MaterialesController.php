<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Materiale;
use App\Proveedor;
use App\Unidade;
use App\Materiales_movimiento;
use App\Materiales_pedido;
use App\Motor;

class MaterialesController extends Controller
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
        $materiales = Materiale::orderBy('material','asc')->paginate(20);
        $params = ['materiales'=>$materiales,
                    'title'=>'MATERIALES EN BODEGA'
                  ];
        return view('materiales.index_materiales')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $materiales = Materiale::orderBy('material','asc')->get();
        $proveedores = Proveedor::orderBy('proveedor','asc')->get();
        $unidades = Unidade::orderBy('unidad','desc')->get();
        $params = ['materiales'=>$materiales,
                    'title'=>'AGREGAR MATERIAL',
                    'proveedores'=>$proveedores,
                    'unidades'=>$unidades
                  ];
        return view('materiales.nuevo_material')->with($params);
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
        $material = new Materiale();
        $material->material = $request->material;
        $material->unidad = $request->unidad;
        $material->descripcion = $request->descripcion;
        $material->minimo = $request->minimo;
        $material->maximo = $request->maximo;
        $material->id_proveedor1 = $request->proveedor1;
        $material->id_proveedor2 = $request->proveedor2;
        $material->id_proveedor3 = $request->proveedor3;
        if($material->save()){
            $path = public_path().'/uploads/materiales/'.$material->id."/foto/";
            if ($request->hasFile('foto')){
                $files = $request->file('foto');
                $filenameWithExt = $files->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore= $filename.'.'.$extension;
                $files->move($path,$fileNameToStore);
                $material->foto = '/uploads/materiales/'.$material->id."/foto/".$fileNameToStore;
                $material->save();
            }
            $path = public_path().'/uploads/materiales/'.$material->id."/datasheet/";
            if ($request->hasFile('datasheet')){
                $files = $request->file('datasheet');
                $filenameWithExt = $files->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                
                $extension = $files->getClientOriginalExtension();
                $fileNameToStore= $filename.'.'.$extension;
                $files->move($path,$fileNameToStore);
                $material->datasheet = '/uploads/materiales/'.$material->id."/datasheet/".$fileNameToStore;
                $material->save();
            }
                
        }
        else
        return redirect('/materiales')->with('error',"Material no fue ingresado correctamente");
        return redirect('/materiales')->with('success',"Material fue ingresado correctamente");
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
        $material = Materiale::find($id);
        $params = ['material'=>$material,
                    'title'=>$material->material
                  ];
        return view('materiales.show_material')->with($params);
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
        $material = Materiale::find($id);
        $proveedores = Proveedor::orderBy('proveedor','asc')->get();
        $unidades = Unidade::orderBy('unidad','desc')->get();
        $params = ['material'=>$material,
                    'title'=>'Editar '.$material->material,
                    'proveedores'=>$proveedores,
                    'unidades'=>$unidades
                  ];
        return view('materiales.editar_material')->with($params);

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
        $material = Materiale::find($id);
        $material->material = $request->material;
        $material->unidad = $request->unidad;
        $material->descripcion = $request->descripcion;
        $material->minimo = $request->minimo;
        $material->maximo = $request->maximo;
        $material->id_proveedor1 = $request->proveedor1;
        $material->id_proveedor2 = $request->proveedor2;
        $material->id_proveedor3 = $request->proveedor3;
        $path = public_path().'/uploads/materiales/'.$material->id."/foto/";
        if ($request->hasFile('foto')){
            $files = $request->file('foto');
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $files->getClientOriginalExtension();
            $fileNameToStore= $filename.'.'.$extension;
            $files->move($path,$fileNameToStore);
            $material->foto = '/uploads/materiales/'.$material->id."/foto/".$fileNameToStore;
            $material->save();
        }
        $path = public_path().'/uploads/materiales/'.$material->id."/datasheet/";
        if ($request->hasFile('datasheet')){
            $files = $request->file('datasheet');
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension = $files->getClientOriginalExtension();
            $fileNameToStore= $filename.'.'.$extension;
            $files->move($path,$fileNameToStore);
            $material->datasheet = '/uploads/materiales/'.$material->id."/datasheet/".$fileNameToStore;
            $material->save();
        }
        if ($material->save())
            return redirect('/materiales')->with('success',"Material fue editado correctamente");
        else
           return redirect('/materiales')->with('error',"Material no fue ingresado correctamente");
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

    public function compra($id)
    {
        $material = Materiale::find($id);
        $proveedores = Proveedor::orderBy('proveedor','asc')->get();
        $params = ['material'=>$material,
                    'proveedores'=>$proveedores,
                    'title'=>"Compra de $material->material"
                  ];
        return view('materiales.compra')->with($params);
    }
    public function compra_insert(Request $request)
    {
        if (Auth::user()->codigoComprador)
       {
           if (Auth::user()->codigoComprador->codigo == $request->codigo)
           {
                $movimiento = new Materiales_movimiento();
                $movimiento->cantidad = $request->cantidad;
                $movimiento->factura_no = $request->factura;
                $movimiento->id_proveedor = $request->proveedor;
                $movimiento->id_motor = 0;
                $movimiento->id_material = $request->id_material;
                $movimiento->id_user = Auth::user()->id;
                $movimiento->precio_unitario = $request->precio;
                $movimiento->operacion = $request->operacion;
                if ($movimiento->save())
                  return redirect('/materiales')->with('success',"El ingreso de $request->cantidad unidades de $request->material ha sido realizado");
                else
                return redirect('/materiales')->with('error',"El ingreso de unidades no fue procesado");
           }
           else
             return redirect('/materiales')->with('error',"Codigo de comprador Erroneo");
       }

       else
          return redirect('/materiales')->with('error',"Usuario no es un comprador");
    }
    public function look($look)
    {
        $materiales = Materiale::where('material','like','%'.$look.'%')->orderBy('material','asc')->get();
        if (count($materiales)<30)
        {
            $mat_arr = array();
            foreach($materiales as $material)
            {
               $mat = ['material'=>$material->material." (".$material->unidad.")",
                        'id'=>$material->id,
                         'existencias'=>$material->existencias()];
               $mat_arr[] = $mat;
            }
            return json_encode($mat_arr);
        }
            
        else 
           return "muchos";
    }
    public function pedido(Request $request)
    {
        $datas = json_decode($_POST['data'],true);
        $os = json_decode($_POST['os'],true);
        $js = array();
        $motor = Motor::find($os);
        foreach($motor->pedido_materiales as $antiguo_pedido)
          $antiguo_pedido->delete();
        foreach($datas as $key=>$data){
             $pedido = new Materiales_Pedido();
              $pedido->id_material = $data["id"];
              $pedido->material = $data["material"];
              $pedido->presentacion = $data["presentacion"];
              $pedido->cantidad = $data["cantidad"];
              $pedido->id_motor = $os;
              $pedido->id_user = Auth::user()->id;
              $pedido->despachado = $data["despachado"];
              $pedido->save(); 
        }
        return json_encode(["success",""]);
    }
    public function getPedido($id_motor)
    {
        $motor = Motor::find($id_motor);
     
        return  json_encode($motor->pedido_materiales); 
    }
    public function materialesPDF($id)
    {
        if(Auth::user()->activo == 0)
        return redirect()->intended('dashboard');
        $motor = Motor::find($id);
        $pdf = \PDF::loadView('pdf.materiales', ['title'=>'REPORTE ESPECIFICO DE EQUIPO','motor'=>$motor,'tecnico'=>Auth::user()]);
        return $pdf->stream();
    }
}
