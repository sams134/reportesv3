<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Motor;
use App\Cliente;
use App\User;

class WarRoomController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        echo "hello world";
    }
    public function viewMotors($id_tecnico)
    {
        $tecnico = User::find($id_tecnico);
        $params = ['title'=>'MOTORES ASIGNADOS A '.strtoupper($tecnico->name),
                   'tecnico'=>$tecnico 
                   ];

        
        return view('dashboards.viewmotors')->with($params);
    }
    
}
