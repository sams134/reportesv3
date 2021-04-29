@extends('layouts.new_internal')
@section('content')

<div class="col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>MOTORES AUTORIZADOS</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <table class="table table-striped projects table-hover" id="motores_table">
                            <thead>
                              <tr>
                                <th style="width: 10%">OS</th>
                                <th style="width: 25%">Cliente</th>
                                <th>Potencia</th>
                                <th>Rpm</th>
                                <th>Marca</th>
                                <th>Tecnicos Asignados</th>
                                <th>Progreso</th>
                              </tr>
                            </thead>
                            @foreach ($tecnico->getMotoresAutorizados() as $motor)
                                <tr>
                                     <td><a href="/motores/{{$motor->id_motor}}" class="text-uppercase text-underline">{{$motor->year}}-{{$motor->os}}</a>
                                        <br> <span style="color:dodgerblue;font-size:10px;cursor:pointer" data-func="preview">Ver Foto</span>
                                    </td>
                                     <td><span class="text-uppercase"><a href="/motores/{{$motor->id_motor}}"> {{$motor->cliente->cliente}}</a>  </span></td>
                                     <td> @if($motor->infoMotor != null)
                                            {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                          @endif
                                         {{$motor->hp}} {{$motor->hpkw==0?"HP":"KW"}}</td>
                                     <td>{{$motor->rpm}}</td>
                                     <td>{{$motor->marca}}</td>
                                     <td>
                                            <ul class="list-inline">
                                                    @foreach($motor->asignaciones as $asignacion)
                                                     <li>
                                                     <img src="{{$asignacion->usuario->foto}}" class="avatar" alt="Avatar">
                                                     </li>
                                                     @endforeach
                                            </ul>
                                     </td>
                                     <td class="project_progress">
                                            @if ($motor->id_estado <= 8)
                                               <div class="progress progress_sm">
                                                   <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                                   </div>
                                                   <span style="font-size:10px"> {{$motor->getProgreso()}}% Completo 
                                                     @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                   <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer">Cambiar Estado</a>
                                                     @endif     
                                                   </span>
                                            @else
                                               {{$motor->get_id_estado()}}
                                            @endif
                                             
                                     </td>
                                </tr>
                            @endforeach
                    </table>
            </div>
        </div>
</div>

<div class="col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>MOTORES AUTORIZADOS PARCIALMENTE</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <table class="table table-striped projects table-hover" id="motores_table">
                            <thead>
                              <tr>
                                <th style="width: 10%">OS</th>
                                <th style="width: 25%">Cliente</th>
                                <th>Potencia</th>
                                <th>Rpm</th>
                                <th>Marca</th>
                                <th>Tecnicos Asignados</th>
                                <th>Progreso</th>
                              </tr>
                            </thead>
                            @foreach ($tecnico->getMotoresAutorizadoParcial() as $motor)
                                <tr>
                                        <td><a href="/motores/{{$motor->id_motor}}" class="text-uppercase text-underline">{{$motor->year}}-{{$motor->os}}</a>
                                            <br> <span style="color:dodgerblue;font-size:10px;cursor:pointer" data-func="preview">Ver Foto</span>
                                        </td>
                                         <td><span class="text-uppercase"><a href="/motores/{{$motor->id_motor}}"> {{$motor->cliente->cliente}}</a>  </span></td>
                                         <td> @if($motor->infoMotor != null)
                                                {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                              @endif
                                             {{$motor->hp}} {{$motor->hpkw==0?"HP":"KW"}}</td>
                                         <td>{{$motor->rpm}}</td>
                                         <td>{{$motor->marca}}</td>
                                         <td>
                                                <ul class="list-inline">
                                                        @foreach($motor->asignaciones as $asignacion)
                                                         <li>
                                                         <img src="{{$asignacion->usuario->foto}}" class="avatar" alt="Avatar">
                                                         </li>
                                                         @endforeach
                                                </ul>
                                         </td>
                                         <td class="project_progress">
                                                @if ($motor->id_estado <= 8)
                                                   <div class="progress progress_sm">
                                                       <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                                       </div>
                                                       <span style="font-size:10px"> {{$motor->getProgreso()}}% Completo 
                                                         @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                       <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer">Cambiar Estado</a>
                                                         @endif     
                                                       </span>
                                                @else
                                                   {{$motor->get_id_estado()}}
                                                @endif
                                                 
                                         </td>
                                             
                                     </td>
                                </tr>
                            @endforeach
                    </table>
            </div>
        </div>
</div>
<div class="col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>MOTORES ASIGNADOS PENDIENTES DE DIAGNOSTICO</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <table class="table table-striped projects table-hover" id="motores_table">
                            <thead>
                              <tr>
                                <th style="width: 10%">OS</th>
                                <th style="width: 25%">Cliente</th>
                                <th>Potencia</th>
                                <th>Rpm</th>
                                <th>Marca</th>
                                <th>Tecnicos Asignados</th>
                                <th>Progreso</th>
                              </tr>
                            </thead>
                            @foreach ($tecnico->getMotoresDiagnostico() as $motor)
                                <tr>
                                        <td><a href="/motores/{{$motor->id_motor}}" class="text-uppercase text-underline">{{$motor->year}}-{{$motor->os}}</a>
                                            <br> <span style="color:dodgerblue;font-size:10px;cursor:pointer" data-func="preview">Ver Foto</span>
                                        </td>
                                         <td><span class="text-uppercase"><a href="/motores/{{$motor->id_motor}}"> {{$motor->cliente->cliente}}</a>  </span></td>
                                         <td> @if($motor->infoMotor != null)
                                                {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                              @endif
                                             {{$motor->hp}} {{$motor->hpkw==0?"HP":"KW"}}</td>
                                         <td>{{$motor->rpm}}</td>
                                         <td>{{$motor->marca}}</td>
                                         <td>
                                                <ul class="list-inline">
                                                        @foreach($motor->asignaciones as $asignacion)
                                                         <li>
                                                         <img src="{{$asignacion->usuario->foto}}" class="avatar" alt="Avatar">
                                                         </li>
                                                         @endforeach
                                                </ul>
                                         </td>
                                         <td class="project_progress">
                                                @if ($motor->id_estado <= 8)
                                                   <div class="progress progress_sm">
                                                       <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                                       </div>
                                                       <span style="font-size:10px"> {{$motor->getProgreso()}}% Completo 
                                                         @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                       <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer">Cambiar Estado</a>
                                                         @endif     
                                                       </span>
                                                @else
                                                   {{$motor->get_id_estado()}}
                                                @endif
                                                 
                                         </td>
                                             
                                     </td>
                                </tr>
                            @endforeach
                    </table>
            </div>
        </div>
</div>
<div class="col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>MOTORES DIAGNOSTICADOS PENDIENTES DE AUTORIZACION</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <table class="table table-striped projects table-hover" id="motores_table">
                            <thead>
                              <tr>
                                <th style="width: 10%">OS</th>
                                <th style="width: 25%">Cliente</th>
                                <th>Potencia</th>
                                <th>Rpm</th>
                                <th>Marca</th>
                                <th>Tecnicos Asignados</th>
                                <th>Progreso</th>
                              </tr>
                            </thead>
                            @foreach ($tecnico->getMotoresDiagnostico() as $motor)
                                <tr>
                                        <td><a href="/motores/{{$motor->id_motor}}" class="text-uppercase text-underline">{{$motor->year}}-{{$motor->os}}</a>
                                            <br> <span style="color:dodgerblue;font-size:10px;cursor:pointer" data-func="preview">Ver Foto</span>
                                        </td>
                                         <td><span class="text-uppercase"><a href="/motores/{{$motor->id_motor}}"> {{$motor->cliente->cliente}}</a>  </span></td>
                                         <td> @if($motor->infoMotor != null)
                                                {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                              @endif
                                             {{$motor->hp}} {{$motor->hpkw==0?"HP":"KW"}}</td>
                                         <td>{{$motor->rpm}}</td>
                                         <td>{{$motor->marca}}</td>
                                         <td>
                                                <ul class="list-inline">
                                                        @foreach($motor->asignaciones as $asignacion)
                                                         <li>
                                                         <img src="{{$asignacion->usuario->foto}}" class="avatar" alt="Avatar">
                                                         </li>
                                                         @endforeach
                                                </ul>
                                         </td>
                                         <td class="project_progress">
                                                @if ($motor->id_estado <= 8)
                                                   <div class="progress progress_sm">
                                                       <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                                       </div>
                                                       <span style="font-size:10px"> {{$motor->getProgreso()}}% Completo 
                                                         @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                       <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer">Cambiar Estado</a>
                                                         @endif     
                                                       </span>
                                                @else
                                                   {{$motor->get_id_estado()}}
                                                @endif
                                                 
                                         </td>
                                             
                                     </td>
                                </tr>
                            @endforeach
                    </table>
            </div>
        </div>
</div>

@endsection