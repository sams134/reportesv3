@extends('layouts.internal')
@section('content')
<div class="container body">
      <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @include('inc.intsidebar')
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
                @include('inc.intnavbar')
            <!-- /top navigation -->



        <!-- page content -->
            <div class="right_col" role="main">
            <br>
                @include('inc.messages') <br>
                @include('inc.titulo') <br>


                <div class="">
                       
                        
                        <div class="clearfix"></div>
            
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                              <h2>Reporte Interno de Equipo
                                @if (Auth::user()->userType <= 3)
                                <small><a href="/motores/{{$motor->id_motor}}/edit"> Editar Motor</a></small>
                                @endif
                                
                              </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                    {{-- contenido principal --}}
                              <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                  <div class="profile_img">
                                    <div id="crop-avatar">
                                      <!-- Current avatar -->
                                      <a href="#"  data-toggle="modal" data-target="#lightbox" class="img-responsive avatar-view"> 
                                      <img class="img-responsive avatar-view" src="{{asset($motor->firstFoto()->thumb)}}" alt="Avatar" title="Foto principal del Equipo" >
                                      
                                      
                                      </a>
                                    </div>
                                  </div>
                                <h3 class="text-uppercase">{{$motor->year}}-{{$motor->os}}</h3>
                                  <input type="hidden" id="cliente" value="{{$motor->cliente->cliente}}">
                                  <ul class="list-unstyled user_data" id="asignaciones_ul">
                                    <li><i class="fa fa-map-marker user-profile-icon"></i> {{$motor->cliente->cliente}}
                                    </li>
                                    @foreach($motor->asignaciones as $asignacion)
                                    <li>
                                      <i class="fa fa-male user-profile-icon"></i> {{$asignacion->usuario->name}}
                                    </li>
                                    @endforeach
                                   
            
                                    <li class="m-top-xs">
                                     Estatus:
                                         @if ($motor->id_estado == -1)
                                              <span class="label label-danger"> No asignado</span>
                                         @elseif ($motor->id_estado == 0)
                                              <span class="label label-danger"> No autorizado</span>
                                         @elseif ($motor->id_estado == 1)
                                              <span class="label label-danger"> Pendiente de Diagnostico </span>
                                         @elseif ($motor->id_estado == 2)
                                              <span class="label label-danger"> Diagnosticado Pendiente de Autorizacion </span>
                                         @elseif ($motor->id_estado == 3)
                                              <span class="label label-warning"> Autorizado Parcial  </span>
                                         @elseif ($motor->id_estado == 4)
                                              <span class="label label-success"> Autorizado   </span>
                                         @elseif ($motor->id_estado == 5)
                                              <span class="label label-success"> Retrasado  </span>
                                         @elseif ($motor->id_estado == 6)
                                              <span class="label label-success"> Garantia  </span>
                                         @elseif ($motor->id_estado == 7)
                                              <span class="label label-success"> Emergencia  </span>
                                         @elseif ($motor->id_estado == 8)
                                              <span class="label label-success"> Super Emergencia  </span>
                                         @elseif ($motor->id_estado == 9)
                                              <span class="label label-success"> Finalizado  </span>
                                         @endif
                                    <a href="/motores/cambiarEstado/{{$motor->id_motor}}">Cambiar Estado</a>
                                    </li>
                                    <li>
                                            <div class="well">
                                            <h1 style="font-size:26px;">Nivel de Urgencia : {{$motor->infoMotor->emergencia}}</h1>
                                                    <p style="font-size:12px;">Este motor debe de trabajarse y puede ser interrumpido por otro nivel 5 o superior</p>
                                            </div>
                                    </li>
                                  </ul>
                                
                                <a class="btn btn-success" href="/diagnostico/{{$motor->id_motor}}"><i class="fa fa-edit m-right-xs"></i>Diagnostico</a>
                                <a class="btn btn-success" href="/reporte/{{$motor->id_motor}}"><i class="fa fa-file m-right-xs"></i> Reporte</a>
                                <a href="/motores/ped/{{$motor->id_motor}}" class="btn btn-info"><i class="fa fa-download m-right-xs"></i>Load 2 Pdfs</a>
                                @if ($motor->diagnostico->finalizado == 1)
                                    <a href="/motores/pdfDiagnostico/{{$motor->id_motor}}" class="btn btn-info"><i class="fa fa-download m-right-xs"></i>Ver PDF Diagnostico</a>
                                @endif
                                  
                                <a href="/motores/pdf/{{$motor->id_motor}}" class="btn btn-info"><i class="fa fa-download m-right-xs"></i>Ver PDF Ingreso</a>
                                  <div style="display:inline">
                                       
                                      
                                  </div>
                                  <br />
            
                                  <!-- start skills -->
                                  <h4>Progreso</h4>
                                  <ul class="list-unstyled user_data">
                                    <li>
                                    <p>Progreso de Reparación [{{$motor->getProgreso()}}%]</p>
                                      <div class="progress progress_sm">
                                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                      </div>
                                    </li>
                                    <li>
                                      <p>Pedidos de Materiales</p>
                                      <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                      </div>
                                    </li>
                                    
                                   
                                   
                                  </ul>
                                  <h3>Herramientas </h3>
                                  <ul class="list-unstyled user_data">
                                      @if (Auth::user()->userType <= 3 || Auth::user()->usertype==8)
                                       <li>
                                           <a class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal-lg"> Asignación de Equipo </a>
                                       </li>
                                      @endif
                                       <li>
                                         @if ($motor->id_estado >=3 || $motor->id_estado <= 8)
                                             <a class="btn btn-link" data-toggle="modal" data-target=".bs-materiales-modal-lg"> Agregar Materiales </a>
                                         @endif
                                      </li>
                                      <li>
                                        
                                          @if ($motor->id_estado >=3 || $motor->id_estado <= 8)
                                                <a href="/motores/densidadespdf/{{$motor->id_motor}}" class="btn btn-link"> Hoja para densidades </a>
                                          @endif
                                    </li>
                                 </ul>
                                  </ul>
                                  
{{-- modal --}}
                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">

                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                          </button>
                                          <h4 class="modal-title" id="myModalLabel">Asignación de equipo</h4>
                                        </div>
                                        <div class="modal-body">
                                        <input type="hidden" id="id_motor" value="{{$motor->id_motor}}">
                                        <table>
                                          <tr>
                                               <td style="width:40%">Asignar como:</td>
                                               <td> 
                                                   <select name="id_estado" id="id_estado_select" class="form-control">
                                                     <option value="1" selected>Pendiente de Diagnostico</option>
                                                     <option value="2" {{$motor->id_estado==2?"selected":""}}>Diagnosticado Pendiente de Autorizacion</option>
                                                     <option value="3" {{$motor->id_estado==3?"selected":""}}>Autorizado Parcialmente</option>
                                                     <option value="4" {{$motor->id_estado==4?"selected":""}}>Autorizado</option>
                                                     <option value="5" {{$motor->id_estado==5?"selected":""}}>Retrasado</option>
                                                     <option value="6" {{$motor->id_estado==6?"selected":""}}>Garantia</option>
                                                     <option value="7" {{$motor->id_estado==7?"selected":""}}>Emergencia</option>
                                                     <option value="8" {{$motor->id_estado==8?"selected":""}}>Alta Emergencia</option>
                                                   </select>
                                               </td>
                                          </tr>
                                        </table>
                                          <h4>Tecnicos</h4>
                                          <table class="table table-hover table-striped">
                                              @foreach($tecnicos as $user)
                                                 <tr>
                                                 <td style="width:100px"> <img src="{{$user->foto}}" alt="" style="max-width:75px; border:1px solid #ccc;padding:5px">
                                                      <td style="vertical-align:middle;width:250px">{{$user->name}}</td>
                                                      @if($motor->estaAsignado($user->id))
                                                 <td style="vertical-align:middle">Asignar <input name="cotizar" type="checkbox" class="js-switch users" data-id-user="{{$user->id}}" checked=""/>  </td>
                                                      @else
                                                      <td style="vertical-align:middle">Asignar <input name="cotizar" type="checkbox" class="js-switch users" data-id-user="{{$user->id}}" />  </td>
                                                      @endif
                                                 </tr>
                                              @endforeach
                                          </table>
                                          <h4>Ayudantes</h4>
                                          <table class="table table-hover">
                                              @foreach($ayudantes as $user)
                                              <tr>
                                                  <td style="width:100px"> <img src="{{$user->foto}}" alt="" style="max-width:75px; border:1px solid #ccc;padding:5px">
                                                       <td style="vertical-align:middle;width:250px">{{$user->name}}</td>
                                                       @if($motor->estaAsignado($user->id))
                                                       <td style="vertical-align:middle">Asignar <input name="cotizar" type="checkbox" class="js-switch users" data-id-user="{{$user->id}}" checked=""/>  </td>
                                                       @else
                                                       <td style="vertical-align:middle">Asignar <input name="cotizar" type="checkbox" class="js-switch users" data-id-user="{{$user->id}}" />  </td>
                                                       @endif
                                                  </tr>
                                              @endforeach
                                          </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_modal1">Guardar Asignacion</button>
                                        </div>

                                      </div>
                                    </div>
                                  </div><!--end of tecnicos modal -->

                                  @include('motores.inc.materiales_modal')
                                

                                  <!-- end of skills -->
            
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
            
                                  <div class="profile_title">
                                    <div class="col-md-6">
                                      <h2>Datos de Placa del Equipo</h2>
                                    </div>
                                    
                                  </div>
                                  <!-- start of user-activity-graph -->
                                <br>
                                        <table class="table table-hover" style="font-size:12px">
                                          <tr>
                                              <td class="active">Area o Nombre </td>
                                              <td colspan="5" style="text-transform:uppercase">{{$motor->infoMotor->nombre_equipo}}</td>
                                          </tr>
                                            <tr>
                                                    <td class="active"> Marca </td>
                                                    <td> {{$motor->marca}}
                                                    <td class="active"> Serie </td>
                                                    <td> {{$motor->serie}}
                                                    <td class="active"> Modelo </td>
                                                    <td> {{$motor->modelo}}
                                            </tr>
                                            <tr>
                                                    <td class="active"> Potencia </td>
                                                    <td> 
                                                        @if($motor->infoMotor != null)
                                                        {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                                      @endif
                                                      {{$motor->hp}} 
                                                      {{$motor->hpkw==1?"Kw":"Hp"}} 
                                                    </td>
                                                    <td class="active"> Volts </td>
                                                    <td> {{$motor->volts}}
                                                    <td class="active"> Amps </td>
                                                    <td> {{$motor->amps}}
                                            </tr>
                                            <tr>
                                                    <td class="active"> Rpm </td>
                                                    <td> {{$motor->rpm}} 
                                                    <td class="active"> Factor de Potencia </td>
                                                    <td> {{$motor->pf}}
                                                    <td class="active"> Efficiencia </td>
                                                    <td> {{$motor->eff}}
                                            </tr>
                                            <tr>
                                                    <td class="active"> Hz. </td>
                                                    <td> {{$motor->hz}} 
                                                    <td class="active"> Frame </td>
                                                    <td> {{$motor->frame}}
                                                    <td class="active">Enclosure  </td>
                                                    <td> {{$motor->id_encl}}
                                            </tr>
                                            <tr>
                                                  <td  class="active">Contacto:</td>
                                                  <td colspan="2">{{$motor->infoMotor->contacto}} </td>
                                                  <td  class="active">Recibido por:</td>
                                                  <td colspan="2">{{$motor->recibido}} </td>
                                            </tr>
                                        </table>
                                                <br>
                                        <div class="profile_title">
                                                <div class="col-md-6">
                                                <h2>Inventarios de Partes</h2>
                                                </div>
                                                
                                        </div>
                                        <br>
                                        <div id="inventario">
                                            
                                            <table class="table table-bordered titulos" style="font-size:12px;top:490">
                                                    <tr>
                                                            <td class="active"><b> Acople </b></td>
                                                            <td> {{$motor->inventario->acople==1?"S&iacute; trae":($motor->inventario->acople==3?"No trae":"Mal estado")}}</td>
                                                            <td class="active"><b> Caja de Conexiones </b> </td>
                                                            <td> {{$motor->inventario->caja_conexiones==1?"S&iacute; trae":($motor->inventario->caja_conexiones==3?"No trae":"Mal estado")}} </td>
                                                            <td class="active"><b> Tapa Caja de Conexiones </b> </td>
                                                            <td> {{$motor->inventario->tapa_caja==1?"S&iacute; trae":($motor->inventario->tapa_caja==3?"No trae":"Mal estado")}} </td>
                                                    </tr>
                                                    <tr>
                                                            <td class="active"><b> Difusor </b></td>
                                                            <td> {{$motor->inventario->difusor==1?"S&iacute; trae":($motor->inventario->difusor==3?"No trae":"Mal estado")}}</td>
                                                            <td class="active"><b> Ventilador </b> </td>
                                                            <td> {{$motor->inventario->ventilador==1?"S&iacute; trae":($motor->inventario->ventilador==3?"No trae":"Mal estado")}} </td>
                                                            <td class="active"><b> Bornera </b> </td>
                                                            <td> {{$motor->inventario->bornera==1?"S&iacute; trae":($motor->inventario->bornera==3?"No trae":"Mal estado")}} </td>
                                                    </tr>
                                                    <tr>
                                                            <td class="active"><b> Cuña </b></td>
                                                            <td> {{$motor->inventario->cunia==1?"S&iacute; trae":($motor->inventario->cunia==3?"No trae":"Mal estado")}}</td>
                                                            <td class="active"><b> Graseras </b> </td>
                                                            <td> {{$motor->inventario->graseras==1?"S&iacute; trae":($motor->inventario->graseras==3?"No trae":"Mal estado")}} </td>
                                                            <td class="active"><b> Cáncamo </b> </td>
                                                            <td> {{$motor->inventario->cancamo==1?"S&iacute; trae":($motor->inventario->cancamo==3?"No trae":"Mal estado")}} </td>
                                                    </tr>
                                                    <tr>
                                                            <td class="active"><b> Placa </b></td>
                                                            <td> {{$motor->inventario->placa==1?"S&iacute; trae":($motor->inventario->placa==3?"No trae":"Mal estado")}}</td>
                                                            <td class="active"><b> Tornillos Completos </b> </td>
                                                            <td> {{$motor->inventario->tornillos==1?"S&iacute; trae":($motor->inventario->tornillos==3?"No trae":"Mal estado")}} </td>
                                                            <td class="active"><b> Capacitores </b> </td>
                                                            <td> {{$motor->inventario->capacitor==1?"S&iacute; trae":($motor->inventario->capacitor==3?"No trae":"Mal estado")}} </td>
                                                    </tr>
                                                    <tr>
                                                            <td colspan="6">
                                                                 <b>Adicionales: </b> {{$motor->inventario->comentarios}}
                                                            </td>
                                                    </tr>
                                            </table>
                                    </div>
                                        <table class="table table-striped table-hover" style="font-size:12px;width:70%">
                                            <tr>
                                                    <td colspan="4" class="text-center text-uppercase info">Fechas Importantes</td>
                                            </tr>
                                            <tr>
                                                    <td><b> Equipo Ingreso: </b></td>
                                                    <td> {{  date("d-m-Y", strtotime($motor->created_at))}}</td>
                                                    <td> Equipo Diagnosticado :</td>
                                                    <td> @if($motor->diagnostico->finalizado==1)
                                                        {{date("d-m-Y", strtotime($motor->diagnostico->fecha_fin_diagnostico))}}
                                                         @else
                                                            <span>Equipo aun no diagnosticado</span>
                                                         @endif
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td> Equipo Cotizado :</td>
                                                    <td> N/A</td>
                                                    <td> Equipo Autorizado :</td>
                                                    <td> N/A</td>
                                            </tr>
                                            <tr>
                                                    <td> Equipo Finalizado :</td>
                                                    <td> N/A</td>
                                                    <td> Equipo Entregado :</td>
                                                    <td> N/A</td>
                                            </tr>

                                        </table>
                                        <div class="profile_title">
                                            <div class="col-md-6">
                                            <h2>Bit&aacute;cora</h2>
                                            </div>
                                            
                                    </div>
                                    <br>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                          
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="coment_bitacora">
                                            <span class="input-group-btn">
                                                              <button type="button" class="btn btn-primary" id="add_coment_bitacora">Agregar</button>
                                                          </span>
                                          </div>
                                    </div>
                                        <ul class="list-unstyled timeline" id="bitacora">
                                                @if ($motor->comentarios != "")
                                                 <li>
                                                    <div class="block">
                                                      <div class="tags">
                                                        <a href="" class="tag">
                                                          <span>Bitacora</span>
                                                        </a>
                                                      </div>
                                                      <div class="block_content">
                                                        <h2 class="title">
                                                                        <a>Comentario Inicial del Cliente</a>
                                                                    </h2>
                                                        <div class="byline">
                                                        <span> {{date("d-m-Y", strtotime($motor->created_at))}}
                                                        </span> recibido por:  <a>Walter Reyes</a>
                                                        </div>
                                                        <p class="excerpt">
                                                            {!!$motor->comentarios!!}
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </li>
                                                @endif
                                               
                                                @foreach ($motor->bitacora as $item)
                                                    <li>
                                                        <div class="block">
                                                          <div class="tags">
                                                            <a href="" class="tag">
                                                              <span>Bitacora</span>
                                                            </a>
                                                          </div>
                                                          <div class="block_content">
                                                            <h2 class="title">
                                                            <a>{{$item->titulo}}</a>
                                                                        </h2>
                                                            <div class="byline">
                                                            <span>{{date("d-m-Y", strtotime($item->created_at))}}</span> by <a>{{$item->user->name}}</a>
                                                            </div>
                                                            <p class="excerpt"> {!!$item->descripcion!!}
                                                            </p>
                                                          </div>
                                                        </div>
                                                      </li>
                                                @endforeach
                                              </ul>
                                              <br><br>



                                        <!-- end of user-activity-graph -->
            
                                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content0" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Trabajos a Realizar</a>
                                        </li>
                                      <li role="presentation" class=""><a href="#tab_content1" id="profile-tab2" role="tab" data-toggle="tab" aria-expanded="false">Documentos</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Materiales</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Galeria de Fotos</a>
                                      </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">

                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content0" aria-labelledby="home-tab">
                                          <div> 
                                              {!! Form::open(['action' => 'MotoresController@addWork', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'work-form']) !!}
                                          <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                                              <h2> Agregar Trabajos </h2>
                                            <table class="table">
                                              <tr>
                                                    <td> <input type="text" placeholder="Nuevo Trabajo" name="trabajo" class="form-control"> </td>
                                                    <td> <input type="submit" class="btn btn-success" value="Agregar Trabajo"> </td>
                                              </tr>
                                            </table>
                                            {!! Form::close() !!}
                                            {!! Form::open(['action' => 'MotoresController@addFoto', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'foto-form']) !!}
                                               <table class="table table-striped" style="font-size:12px" id="table_trabajos">
                                                 <thead>
                                                    <th> # </th>
                                                    <th> Trabajo Especifico </th>
                                                    <th> Estado </th>
                                                    <th> Progreso </th>
                                                 </thead>
                                               @foreach($motor->trabajos as $cont=>$trabajo)
                                               <tr>
                                               <td> {{$cont+1}}</td>
                                                    <td> 
                                                      <div style="overflow:hidden">
                                                         <strong> {{$trabajo->trabajo}} </strong><br> 
                                                        </div>
                                                          <div class="bottom" style="margin-top:15px">
                                                          <a  class="btn-xs btn-primary" data-id-trabajo="{{$trabajo->id}}" data-func="addFoto">Agregar Foto </a><br>
                                                          
                                                          
                                                          @if (count($trabajo->fotosTrabajo)>0)
                                                              @foreach($trabajo->fotosTrabajo as $foto)
                                                              <div class="col-md-4" class="fotica">
                                                                   <img src="{{$foto->infoFoto->foto}}" style="max-width:100px;margin:3px;border:1px solid #ccc; padding:2px;"><br>
                                                                   <a class="btn btn-link" data-func="delFoto" data-id-foto="{{$foto->infoFoto->id}}" data-id-motor="{{$motor->id_motor}}">Eliminar Foto</a>
                                                              </div>
                                                              @endforeach
                                                          @else
                                                          <p> Count {{count($trabajo->fotosTrabajo())}}</p>
                                                          </div>
                                                         @endif
                                                    </td>
                                               <td> 
                                                    @if($trabajo->autorizado ==1)
                                                    <span class="label label-success"> Autorizado </span> 
                                                    @else
                                                        @if($trabajo->cotizar ==1)
                                                            <span class="label label-warning"> Pendiente de Cotizacion </span> 
                                                        @else
                                                            <span class="label label-danger"> Trabajo no Autorizado </span> 
                                                        @endif
                                                    @endif
                                               </td>
                                               <td style="width:35%">
                                               <input type="text" class="range" value="" name="range" data-trabajo="{{$trabajo->id}}" data-from="{{$trabajo->progress}}"/>
                                               <input type="file" name="foto_trabajo[{{$trabajo->id}}]" id="file{{$trabajo->id}}" style="display:none" onchange="this.form.submit()">
                                               <input type="hidden" name="progreso[{{$trabajo->id}}]" value="{{$trabajo->progress}}" id="progreso_{{$trabajo->id}}">
                                               </td>     
                                               </tr>
                                               @endforeach
                                               </table>
                                               {!! Form::close() !!}
                                          </div>
                                        </div>


                                     
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="profile-tab">
                                        <!-- start recent activity -->
                                        <div id="documents-div">
                                            @foreach ($motor->documentos as $documento)
                                                <div class="col-md-6 col-lg-4" style="text-align:center;padding:5px">
                                                    <div class="thumbnail" style="padding:20px">
                                                        <a  class="custom-selector" href="{{$documento->documento}}">    
                                                        <img style=" display: block;max-width:80px" src="/img/pdf.png" alt="{{$documento->titulo}}">
                                                        <div class="caption" style="text-align:center">
                                                            {{$documento->titulo}}<br>
                                                        
                                                        </div>
                                                        </a>
                                                        
                                                            <button class="btn btn-danger" id-documento="{{$documento->id}}">Eliminar </button>
                                                        
                                                        
                                                  </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="col-lg-12">
                                                {!! Form::open(['action' => 'MotoresController@saveDocumentos','method'=>'POST','files'=>'true','id' => 'my-dropzone2','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                                <input type="hidden" name="id_motor" value="{{$motor->id_motor}}" id="id_motor">
                                                <div class="form-group dz-clickable well">
                                                    <div class="dz-default dz-message"><span>Arrastre documentos .PDF a esta area. O de doble click para abrir un explorador.</span></div>
                                                            
                                                    </div><!--form group -->
                                                    <div class="dropzone-previews"></div>
                                                    <button type="hidden" class="btn btn-success" id="submit-all2" style="display:none">Guardar Nuevo Equipo</button>
                                                    <button type="submit" class="btn btn-success" > Probar Post </button>
                                                    {!! Form::close() !!}  <!--  </form> -->
                                            </div>
                                        <!-- end recent activity -->
            
                                      </div>
                                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
            
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin" style="font-size:x-small;">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Cantidad</th>
                                              <th>Material</th>
                                              <th>Presentacion</th>
                                              <th>Despachado</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($motor->pedido_materiales as $key=>$pedido)
                                                    <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$pedido->cantidad}}</td>
                                                    <td>{{$pedido->material}}</td>
                                                    <td>{{$pedido->presentacion}}</td>
                                                      <td>
                                                          <div class="progress">
                                                          <div class="progress-bar progress-bar-success" data-transitiongoal="{{$pedido->despachado}}"></div>
                                                          </div>
                                                      </td>
                                                    </tr>
                                                @endforeach
                                          </tbody>
                                        </table>
                                        
                                        @if ($motor->id_estado >=3 || $motor->id_estado <= 8)
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target=".bs-materiales-modal-lg">Editar Materiales</a>
                                        @endif
                                      <a href="/materialespdf/{{$motor->id_motor}}" class="btn btn-success">
                                        <i class="fa fa-download"></i>
                                        Generar PDF</a>
                                        <!-- end user projects -->
            
                                      </div>
                                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <div id="aniimated-thumbnials">
                                            @foreach($motor->fotos as $foto)    
                                              <div class="col-md-4 col-lg-2">
                                                <div class="thumbnail">
                                                      <a  class="custom-selector" data-src="{{$foto->foto}}">    
                                                      <img style="width: 100%; display: block;" src="{{$foto->thumb}}" alt="{{$foto->titulo}}">
                                                      </a>
                                                    <div class="caption">
                                                      @if ($foto->descripcion != "")
                                                          {{$foto->descripcion}} 
                                                      @else
                                                          <p>Sin descripcion</p>
                                                          @endif
                                                    </div>
                                                </div>
                                              </div>
                                            @endforeach
                                            
                                      </div>
                                      <div class="col-lg-12">
                                          {!! Form::open(['action' => 'MotoresController@saveFotos','method'=>'POST','files'=>'true','id' => 'my-dropzone','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                          <input type="hidden" name="id_motor" value="{{$motor->id_motor}}" id="id_motor">
                                          <div class="form-group dz-clickable well">
                                              <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                                      
                                              </div><!--form group -->
                                              <div class="dropzone-previews"></div>
                                              <button type="hidden" class="btn btn-success" id="submit-all" style="display:none">Guardar Nuevo Equipo</button>
                                              <button type="submit" class="btn btn-success" style="display:none"> Probar Post </button>
                                              {!! Form::close() !!}  <!--  </form> -->
                                      </div>
                                     
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
      </div>
</div>
<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" alt="" />
                </div>
            </div>
        </div>
    </div>
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/lightgallery/dist/css/lightgallery.css')}}" /> 
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('vendors/lightgallery/dist/js/lightgallery.js')}}"></script>
<script src="{{asset('vendors/lightgallery/dist/modules/lg-thumbnail.js')}}"></script>
<script src="{{asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('js/materiales.js')}}"></script>    
<script>
    $(document).ready(function() {
        activate_materiales();

        $("#coment_bitacora").keypress(function(e){
            if (e.key === "Enter")
              addComent();
        });
        $("#add_coment_bitacora").click(function(){
            addComent();
        });

        function addComent(){
          var coment = $("#coment_bitacora").val();
          var id_motor = $("#id_motor").val();
          var getRequest = '/bitacoras/add/'+id_motor+"/"+coment;
                    $.get(getRequest,function(data)     
                   {
                      
                       var datos = JSON.parse(data);
                       console.log(datos);
                       var dato = datos.data;
                       var li  = "<li><div class='block'><div class='tags'><a href='' class='tag'><span>Bitacora</span></a></div>";
                           li += "<div class='block_content'><h2 class='title'><a>"+dato.titulo+"</a></h2><div class='byline'>";
                           li += "<span>"+dato.created_at+"</span> by <a>"+datos.usuario+"</a></div><p class='excerpt'>";
                           li += dato.descripcion;
                           li += "</p></div></div></li>";
                           $("#bitacora").append(li);
                   });
          $("#coment_bitacora").val("");
          $("#coment_bitacora").focus();
        }
        $("#documents-div").click(function(event){
          var element = $(event.target);
                  if (event.target.nodeName == 'BUTTON' || event.target.nodeName == 'button'){
                    id_document = element.attr('id-documento');
                    var getRequest = '/eliminarDocumento/'+id_document;
                    $.get(getRequest,function(data)     
                   {
                      element.closest(".thumbnail").remove();
                      console.log(data);
                   });
                  }
        })
        $("#save_modal1").click(function(){
            var id_motor = $("#id_motor").val();
            $(".users").each(function(index){
              var getRequest = '/setAsignacion/'+id_motor+'/'+$(this).attr('data-id-user')+"/";
                if ($(this)[0].checked==true)
                  getRequest += "1"
                else
                  getRequest += "0"
                  //alert(getRequest)
                  $.get(getRequest,function(data)     
                   {
                      
                   });
              
            })
            alert('Asignacion realizada');
            var getRequest = '/getAsignacion/'+id_motor;
            $.get(getRequest,function(data)     
                   {
                    asignaciones = JSON.parse(data);
                    var cliente = $("#cliente").val();
                    $("#asignaciones_ul").html("");
                    $("#asignaciones_ul").append("<li><i class='fa fa-map-marker user-profile-icon'></i> "+cliente+"</li>");
                    
                     for (var i=0;i<asignaciones.length;i++)
                        $("#asignaciones_ul").append("<li><i class='fa fa-male user-profile-icon'></i> "+asignaciones[i]+"</li>");
                     
                   });
        });
       $("#table_trabajos").click(function(e){
         if ($(e.target).attr("data-func")=="addFoto"){
           var id_trabajo = $(e.target).attr("data-id-trabajo");
           $("#file"+id_trabajo).click();
         }else
         if ($(e.target).attr("data-func")=="delFoto"){
          
          var getRequest = '/motoresphoto/'+$(e.target).attr('data-id-foto')+"/"+$(e.target).attr('data-id-motor');
          $.get(getRequest,function(data){
              $(e.target).closest("div").remove();
           });
         }
       })
      $(".range").ionRangeSlider({
			  type: "single",
			  min: 0,
			  max: 100,
			  grid: true,
        force_edges: true,
        
        onFinish: function (data) {
          var getRequest = '/saveProgress/'+this.trabajo+'/'+data.from;
                  $("#progreso_"+this.trabajo).val(data.from);
                   $.get(getRequest,function(data)     
                   {

                   });
                   if (data.from==100)
                     {
                       $("#file"+this.trabajo).click();
                     }
    },
      });
      
        $('#aniimated-thumbnials').lightGallery({
          selector: '.custom-selector',
          thumbnail:false,
    animateThumb: false,
    showThumbByDefault: false
        });
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
    });


    Dropzone.options.myDropzone = {
                     autoProcessQueue: true,
                     uploadMultiple: true,
                     maxFiles: 4,
                     maxFilesize : 39,
                     parallelUploads: 4,
                     acceptedFiles: ".jpeg,.jpg,.png,.gif",
                     addRemoveLinks: true, 
                     headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                     
                     init: function() {
                         var submitBtn = document.querySelector("#submit-all");
                         myDropzone = this;
                         submitBtn.addEventListener("click", function(e){   
                              e.preventDefault();
                              e.stopPropagation();
                              myDropzone.processQueue(); 
                         });
                        
                         this.on("complete", function(file) {
                            if (file.accepted){
                                myDropzone.removeFile(file);
                            }
                         });
                         this.on("success", function(file,response) {  
                            
                             myDropzone.processQueue.bind(myDropzone);
                             console.log(response); 
                             var id_motor = $("#id_motor").val();
                              
                             $("#aniimated-thumbnials").empty();
                             data = JSON.parse(response);
                             $.each(data,function(index,value){
                              
                                  var div = '<div class="col-md-4 col-lg-2">';
                                   div += '<div class="thumbnail">';
                                        div += '<a  class="custom-selector" data-src="'+value.foto+'">';
                                          div += '<img style="width: 100%; display: block;" src="'+value.thumb+'" alt="'+value.titulo+'">';
                                        div += '</a>';
                                        div += '<div class="caption">';
                                            div += '<p>Sin descripcion</p>';
                                        div += '</div>';
                                    div += '</div>';
                                    div += '</div>';
                                    $("#aniimated-thumbnials").append(div); 
                                    $('#aniimated-thumbnials').lightGallery({
                                          selector: '.custom-selector',
                                          thumbnail:false,
                                    animateThumb: false,
                                    showThumbByDefault: false
                                        });
                             });
                        });

                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 }; 
      Dropzone.options.myDropzone2 = {
          autoProcessQueue: true,
          uploadMultiple: true,
          maxFiles: 1,
          maxFilesize : 39,
          parallelUploads: 4,
          acceptedFiles: ".pdf",
          addRemoveLinks: true, 
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          
          init: function() {
              var submitBtn = document.querySelector("#submit-all2");
              myDropzone2 = this;
              submitBtn.addEventListener("click", function(e){   
                  e.preventDefault();
                  e.stopPropagation();
                  myDropzone2.processQueue(); 
              });
            
              this.on("complete", function(file) {
                if (file.accepted){
                    myDropzone2.removeFile(file);
                }
              });
              this.on("success", function(file,response) {  
                
                  myDropzone2.processQueue.bind(myDropzone2);
                  console.log(response); 
                  var id_motor = $("#id_motor").val();
                  
                  $("#documents-div").empty();
                  data = JSON.parse(response);
                  $.each(data,function(index,value){
                  
                      var div = '<div class="col-md-6 col-lg-4">';
                        div += '<div class="thumbnail">';
                            div += '<a href="'+value.documento+'">';
                              div += '<img style="width: 100%; display: block;" src="/img/pdf.png" alt="'+value.titulo+'">';
                              div += '<div class="caption">';
                                div += '<p>'+value.titulo+'</p>';
                            div += '</div>';
                            div += '</a>';
                           
                        div += '</div>';
                        div += '</div>';
                        $("#documents-div").append(div); 
                        
                  });
            });

              this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
          }
      }; 


});

    </script>