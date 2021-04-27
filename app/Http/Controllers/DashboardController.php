<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Motor;
use App\Cliente;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    private function getTodayMotors(){
        $todayMotors = Motor::where([['fecha_ingreso','>=',date('Y-m-d')],['fecha_ingreso','<=',date('Y-m-d', strtotime("+1 day"))]])->get();
        return $todayMotors;
    }
    private function getThisMonthMotors()
    {

        $thisMonthMotoros = Motor::where([['fecha_ingreso','>=',date('Y-m-01')],['fecha_ingreso','<=',date('Y-m-t')]])->get();
        return $thisMonthMotoros;
    }
    private function getThisMonthClientes()
    {

        $thisMonthClientes = Cliente::where([['created_at','>=',date('Y-m-01')],['created_at','<=',date('Y-m-t')]])->get();
        return $thisMonthClientes;
    }
    public function index()
    {
        
         if (Auth::user()->activo == 0)
           return "Usuario No Activado";
        
        /*
        $clientes = Cliente::orderBy('cliente','asc')->get();
        $tecnicos = User::where([['userType','=','6'],['activo','=','1']])->orWhere([['userType','=','5'],['activo','=','1']])->orWhere([['userType','=','8'],['activo','=','1']])->get();
        $ayudantes = User::where([['userType','=','7'],['activo','=','1']])->get();
        $params = ['thisMonthMotors'=>$this->getThisMonthMotors(),
                   'thisMonthClientes'=>$this->getThisMonthClientes(),
                   'todaysMotors'=>$this->getTodayMotors(),
                   'title'=>'War Room',
                   'clientes'=>$clientes,
                   'tecnicos'=>$tecnicos
        ];
        switch (Auth::user()->userType){
            case 1:
            case 2:
             return view('dashboards.dash')->with($params);
                break;
            case 4:
            case 3: 
            case 5:
            case 6:
            case 7:  return redirect('/motores');
            break;
            case 8: 
                //return redirect('/motores');
                return view('dashboards.warroom')->with($params); // cambiar a warroom
            break;
        } */
       
    }
}
