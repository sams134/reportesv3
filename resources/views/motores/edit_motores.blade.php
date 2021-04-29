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

              {!! Form::open(['route' => ['files.update',$motor->id_motor],'method'=>'POST','files'=>'true','id' => 'my-dropzone','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
              {{Form::hidden('_method','PUT')}}
            <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel">
                                    <div class="x_title">
                                          <h2>Informacion del Cliente<small>Ingrese Informacion del Cliente</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content">
                                                <br />
                                                 <!--<form class="form-horizontal form-label-left input_mask">-->
                                              <div class="form-group">
                                                     {{Form::label('cliente','Cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12','required'=>'required'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                   
                                                    <select name="id_cliente" class="form-control text-uppercase" id="clienteSelect" >
                                                          @foreach ($clientes as $cliente)
                                                                  @if($cliente->id_cliente == $id_cliente)
                                                                         <option value="{{$cliente->id_cliente}}" selected>{{$cliente->cliente}}</option>                                                                         
                                                                  @else
                                                                   <option value="{{$cliente->id_cliente}}">{{$cliente->cliente}}</option>
                                                                  @endif
                                                           @endforeach
                                                    </select>
                                                            <a href="/clientes/create" class="btn btn-info btn-xs" style="margin-top:10px">Agregar Nuevo Cliente </a>
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('yearLabel','Numero de Orden:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-3 col-sm-3 col-xs-6">
                                                               {{Form::text('year',$newYear,['class'=>'form-control text-uppercase','placeholder'=>'2M19','required'=>'required','id'=>'year'])}}                           
                                                      </div> <!--columna -->
                                                      <div class="col-md-6 col-sm-6 col-xs-6`">
                                                             {{Form::text('os',$newOs,['class'=>'form-control col-md-','placeholder'=>'0001','required'=>'required','id'=>'newOs'])}}                           
                                                      </div> <!--columna -->
                                              </div><!--form group -->
                                               <div class="form-group">
                                                       {{Form::label('fecha','Fecha Ingreso:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                       <div class="col-md-9 col-sm-9 col-xs-12"> 
                                                              
                                                                  <div class='input-group date' id='datetimepicker1' >
                                                                  <input type='text' class="form-control" name='dateIngreso' id="picker" value="{{$motor->fecha_ingreso}}" required/>
                                                                      <span class="input-group-addon">
                                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                                      </span>
                                                                  </div>
                                                              
                                                      </div>
                                                </div><!--form group -->
                                               
                                                <div class="form-group">
                                                       {{Form::label('trabajos','Comentarios del Cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                         {{Form::textarea('trabajoARealizar',$motor->comentarios,['class'=>'form-control col-md-','placeholder'=>'Rebobinado...','required'=>'required'])}}                           
                                                     </div><!--columna -->
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('trabajos','Contacto:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                
                                                                
                                                                     <select name="contactoTXT" id="contactoTXT" class="form-control" required>
                                                                           @foreach($selectedClient->contactos as $contacto)
                                                                     <option value="{{$contacto->id}}" {{$motor->infoMotor->contacto==$contacto->contacto?"selected":""}}>{{$contacto->contacto}} </option>                                                                              
                                                                           @endforeach
                                                                     </select>
                                                                
                                                                
                                                          </div><!--columna -->
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('trabajos','Telefono Contacto:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                 
                                                                        {{Form::text('telefono',$motor->infoMotor->telefono,['id'=>'id_telefonoTXT','class'=>'form-control col-md-','placeholder'=>'Telefono de Contacto','required'=>'required'])}}                           
                                                                  
                                                          </div><!--columna -->
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('trabajos','Email:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                
                                                                  
                                                                  {{Form::text('email',$motor->infoMotor->email,['id'=>'id_email','class'=>'form-control text-uppercase','placeholder'=>'email','required'=>'required'])}}   
                                                                
                                                          </div><!--columna -->
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('cotizarlbl','Cotizar o Trabajar?',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                             <div class="col-md-6 col-sm-6 col-xs-6">
                                                                   
                                                             Empezar a trabajar <input name="cotizar" type="checkbox" class="js-switch"  {{($motor->infoMotor->cotizar==1)?"checked":""}}/> Cotizar
                                                             </div> <!--columna -->                                                    
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('emergencialbl','Nivel de Emergencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <input class="knob" data-width="100" data-height="120" data-min="0" data-displayPrevious=true data-fgColor="#26B99A" value="{{$motor->infoMotor->emergencia}}" data-max="8" name="emergencia">
                                                            </div><!--columna -->
                                                           
                                                     </div><!--form group -->
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->

                  <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel">
                                    <div class="x_title">
                                          <h2>Informacion del Equipo<small>Ingrese datos del equipo</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content">
                                                <br />
                                                 <!--<form class="form-horizontal form-label-left input_mask">-->
                                                <div class="form-group">
                                                      {{Form::label('Equipolbl','Equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                     
                                                      <select name="id_tipoequipo" class="form-control text-uppercase" id="id_tipoequipo">
                                                      <option value="8" selected> {{$motor->id_tipoequipo}}</option>
                                                            <option value="01" >Motor</option>
                                                            <option value="02">Estator</option>
                                                            <option value="03">Rotor</option>
                                                            <option value="04">Generador</option>
                                                            <option value="05">Soldadora</option>
                                                            <option value="06">Transformador</option>
                                                            <option value="07">Compresor de Refrigeraci&oacute;n</option>
                                                            <option value="08">Ventilador</option>
                                                            <option value="09">Turbina</option>
                                                            <option value="10">Blower</option>
                                                            <option value="11">Bomba Centr&iacute;fuga</option>
                                                            <option value="12">Bomba Desplazamiento Positivo</option>
                                                            <option value="13">Bomba Sumergible</option>
                                                            <option value="14">Bobina</option>
                                                            <option value="15">Parte Mecanica</option>

                                                      </select>                        
                                                      </div><!--columna -->
                                             </div><!--form group -->
                                             <div class="form-group">
                                                      {{Form::label('nombre','Nombre o Area de Equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                    <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                  {{Form::text('equipment',$motor->infoMotor->nombre_equipo,['class'=>'form-control text-uppercase','placeholder'=>'Nombre Equipo-Area (i.e. Bomba Alimentacion - Calderas)'])}}                           
                                                            
                                                    </div><!--columna -->
                                          </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('Marcalbl','Marca:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('marca',$motor->marca,['class'=>'form-control text-uppercase','placeholder'=>'Marca'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                              <div class="form-group">
                                                      {{Form::label('Aplicacionlbl','Aplicacion:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                     {{Form::text('aplicacion',$motor->infoMotor->aplicacion,['class'=>'form-control text-uppercase','placeholder'=>'(Moto-reductor, Bomba, Ventilador, Molino, etc)'])}}                           
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                              <div class="form-group">
                                                      {{Form::label('Potencia','Potencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-3 col-sm-3 col-xs-12">  
                                                     {{Form::text('hp',$motor->hp,['class'=>'form-control col-md-3 col-sm-3 col-xs-12','placeholder'=>'HP/KW','required'=>'required'])}}                           
                                                     
                                                      </div><!--columna -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">  
                                                                
                                                                  Aproximados <input name="reales" type="checkbox" class="js-switch"  {{($motor->infoMotor->reales==1)?"checked":""}}/> Reales
                                                      </div><!--columna -->
                                                                             
                                               </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('hpkwlbl','HP / Kw:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-3 col-sm-3 col-xs-6">
                                                               HP <input name="hpkw" type="checkbox" class="js-switch"  {{($motor->hpkw==1)?"checked":""}}/> KW                         
                                                      </div> <!--columna -->                                                    
                                              </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('acdclbl','AC / DC:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-3 col-sm-3 col-xs-6">
                                                               AC <input name="acdc" type="checkbox" class="js-switch"  {{($motor->acdc==1)?"checked":""}}/> DC                         
                                                      </div> <!--columna -->                                                    
                                              </div><!--form group -->
                                               <div class="form-group">
                                                     {{Form::label('rpmlbl','Rpm:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('rpm',$motor->rpm,['class'=>'form-control col-md-','placeholder'=>'Rpm'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('serielbl','Num. Serie:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('serie',$motor->serie,['class'=>'form-control text-uppercase','placeholder'=>'No. Serie'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                               <div class="form-group">
                                                     {{Form::label('modelolbl','Num. de Modelo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('modelo',$motor->modelo,['class'=>'form-control text-uppercase','placeholder'=>'Modelo'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                               <div class="form-group">
                                                     {{Form::label('voltajelbl','Voltaje(s):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('voltaje',$motor->volts,['class'=>'form-control col-md-','placeholder'=>'230/460'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                              <div class="form-group">
                                                     {{Form::label('amperajeslbl','Amperaje(s):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                    {{Form::text('amperajes',$motor->amps,['class'=>'form-control col-md-','placeholder'=>'amps'])}}                           
                                                     </div><!--columna -->
                                              </div><!--form group -->
                                              <div class="form-group">
                                                      {{Form::label('Framelbl','Frame:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                     {{Form::text('frame',$motor->frame,['class'=>'form-control text-uppercase','placeholder'=>'frame'])}}                           
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('hzlbl','Frecuencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                     {{Form::text('hz',$motor->hz,['class'=>'form-control col-md-','placeholder'=>'hz'])}}                           
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('pflbl','Factor de Potencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                       {{Form::text('pf',$motor->pf,['class'=>'form-control col-md-','placeholder'=>'pf'])}}                           
                                                      </div><!--columna -->
                                                </div><!--form group -->
                                                <div class="form-group">
                                                            {{Form::label('efflbl','Eficiencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                                             {{Form::text('eff',$motor->eff,['class'=>'form-control col-md-','placeholder'=>'Nom. Eff.'])}}                           
                                                            </div><!--columna -->
                                                      </div><!--form group -->
                                                      <div class="form-group">
                                                                  {{Form::label('efflbl','Enclosure:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                                  <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                  <select class="form-control" name="id_enclosure">
                                                                              <option value="1" {{$motor->id_enclosure==1?"selected":""}}>TEFC</option>
                                                                              <option value="2" {{$motor->id_enclosure==2?"selected":""}}>OPEN</option>
                                                                              <option value="3" {{$motor->id_enclosure==3?"selected":""}}>WPI</option>
                                                                              <option value="4" {{$motor->id_enclosure==4?"selected":""}}>WPII</option>
                                                                              <option value="5" {{$motor->id_enclosure==5?"selected":""}}>TEAAC</option>
                                                                              <option value="6" {{$motor->id_enclosure==6?"selected":""}}>TENV</option>
                                                                  </select>
                                                                  </div><!--columna -->
                                                       </div><!--form group -->
                                                      </div><!--form group -->
                                                      <div class="form-group">
                                                            {{Form::label('faseslbl','Fases:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <select class="form-control" name="phases">
                                                                        <option value="" {{$motor->phases==""?"selected":""}}>N/A</option>
                                                                        <option value="1" {{$motor->phases==1?"selected":""}}>Mono-Fásico</option>
                                                                        <option value="3" {{$motor->phases==3?"selected":""}}>Tri-Fásico</option>
                                                                        
                                                            </select>
                                                            </div><!--columna -->
                                                       </div><!--form group -->
                                              <br>
                                             
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->
                  <div class="col-lg-12">
                        &nbsp;
                  </div>
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel">
                                    <div class="x_title">
                                          <h2>Inventario de Ingreso<small>Conteo Inicial de partes</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content">
                                                <br />
                                                 <!--<form class="form-horizontal form-label-left input_mask">-->
                                              <div class="form-group">
                                                     {{Form::label('cliente','Acople o polea:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            
       `                                                    <div>
                                                                  <input type="radio" class="flat"  name="iCheckAcopple" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->acople==1?"checked":""}}> Si (buen estado)
                                                           </div>
                                                           <div>
                                                                  <input type="radio" class="flat"  name="iCheckAcopple" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->acople==2?"checked":""}}> Si (Mal estado)
                                                           </div> 
                                                           <div>
                                                                  <input type="radio" class="flat"  name="iCheckAcopple" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->acople==3?"checked":""}}> No
                                                           </div>
                                                     </div><!--columna -->
                                                    
                                              </div><!--form group -->
                                              <div class="form-group">
                                                      {{Form::label('cliente','Caja de Conexiones:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                        
                                                                   <input type="radio" class="flat"  name="iCheckCaja" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->caja_conexiones==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCaja" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->caja_conexiones==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCaja" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->caja_conexiones==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                                     
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('cliente','Tapa Caja de Conexiones:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTapa" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->tapa_caja==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTapa" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->tapa_caja==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTapa" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->tapa_caja==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               
                                               <div class="form-group">
                                                      {{Form::label('cliente','Difusor',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckDifusor" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->difusor==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckDifusor" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->difusor==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckDifusor" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->difusor==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('cliente','Ventilador',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckVentilador" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->ventilador==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckVentilador" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->ventilador==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckVentilador" style="position: absolute; opacity: 0;"value="3" {{$motor->inventario->ventilador==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->

                                               <div class="form-group">
                                                      {{Form::label('cliente','Bornera',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckBornera" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->bornera==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckBornera" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->bornera==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckBornera" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->bornera==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('cliente','Cu&ntilde;a',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCuna" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->cunia==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCuna" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->cunia==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCuna" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->cunia==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                {{Form::label('cliente','Graseras',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                <div class="col-md-9 col-sm-9 col-xs-12">  
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckGrasera" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->graseras==1?"checked":""}}> Si (buen estado)
                                                      </div>
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckGrasera" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->graseras==2?"checked":""}}> Si (Mal estado)
                                                      </div> 
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckGrasera" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->graseras==3?"checked":""}}> No
                                                      </div>
                                                </div><!--columna -->
                                                 </div><!--form group -->

                                                 <div class="form-group">
                                                      {{Form::label('cliente','Cancamo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCancamo" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->cancamo==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCancamo" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->cancamo==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckCancamo" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->cancamo==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                {{Form::label('cliente','Placa de Datos',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                <div class="col-md-9 col-sm-9 col-xs-12">  
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckPlaca" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->placa==1?"checked":""}}> Si (buen estado)
                                                      </div>
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckPlaca" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->placa==2?"checked":""}}> Si (Mal estado)
                                                      </div> 
                                                      <div>
                                                             <input type="radio" class="flat"  name="iCheckPlaca" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->placa==3?"checked":""}}> No
                                                      </div>
                                                </div><!--columna -->
                                            </div><!--form group -->
                                            <div class="form-group">
                                                      {{Form::label('cliente','Tornillos Completos',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTornillos" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->tornillos==1?"checked":""}}> Si (buen estado)
                                                            </div>
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTornillos" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->tornillos==2?"checked":""}}> Si (Mal estado)
                                                            </div> 
                                                            <div>
                                                                   <input type="radio" class="flat"  name="iCheckTornillos" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->tornillos==3?"checked":""}}> No
                                                            </div>
                                                      </div><!--columna -->
                                                  </div><!--form group -->
                                                  <div class="form-group">
                                                            {{Form::label('cliente','Capacitor(es)',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                  <div>
                                                                         <input type="radio" class="flat"  name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="1" {{$motor->inventario->capacitor==1?"checked":""}}> Si (buen estado)
                                                                  </div>
                                                                  <div>
                                                                         <input type="radio" class="flat"  name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="2" {{$motor->inventario->capacitor==2?"checked":""}}> Si (Mal estado)
                                                                  </div> 
                                                                  <div>
                                                                         <input type="radio" class="flat"  name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="3" {{$motor->inventario->capacitor==3?"checked":""}}> No
                                                                  </div>
                                                            </div><!--columna -->
                                                        </div><!--form group -->
                                            <div class="form-group">
                                                      {{Form::label('trabajos','Comentarios de Inventario:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                
                                                <div class="col-md-9 col-sm-9 col-xs-12">  
                                                      {{Form::textarea('comentInventario',$motor->inventario->comentarios,['class'=>'form-control col-md-','placeholder'=>'Partes adicionales que ingresaron o daños específicos',])}}                           
                                                 </div><!--columna -->
                                           </div><!--form group -->

                                              
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->

                  <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel" >
                                    <div class="x_title">
                                          <h2>Informaci&oacute;n de Operaci&oacute;n<small>C&oacute;mo Opera este equipo?</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content" style="display:inline;">
                                                <br />
                                                 <!--<form class="form-horizontal form-label-left input_mask">-->
                                              <div class="form-group">
                                                     {{Form::label('horas','Cantidad de Horas de Operacion al dia',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                     <div class="col-md-9 col-sm-9 col-xs-12">  
                                                     <input class="knob" data-width="100" data-height="120" data-min="0" data-displayPrevious=true data-fgColor="#5472b4" value="{{$motor->infoMotor->horas_operacion}}" data-max="24" name="horas_operacion">
                                                     </div><!--columna -->
                                                    
                                              </div><!--form group -->
                                              <div class="form-group">
                                                      {{Form::label('voltajes','Voltajes de Operacion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                 <div> 
                                                                        
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                 No se Sabe <input name="knownVolts" type="checkbox" class="js-switch"  {{($motor->infoMotor->volts_operacion==1)?"checked":""}}/> S&iacute; Se Sabe                      
                                                                                 <br><br>
                                                                        </div> <!--columna -->      
                                                                 </div>
                                                                 <div class="col-md-2 text-right">
                                                                        V <sub>a-b</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 text-left">
                                                                        {{Form::text('va',$motor->infoMotor->vab,['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>"Voltaje entre Fase A y B"])}}                           
                                                                 </div>
                                                                 <div class="col-md-2 text-right">
                                                                        V <sub>b-c</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 text-left">
                                                                        {{Form::text('vb',$motor->infoMotor->vbc,['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>'Voltaje entre Fase B y C'])}}                           
                                                                 </div>
                                                                 <div class="col-md-2 text-right">
                                                                        V <sub>c-a</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 text-left">
                                                                        {{Form::text('vc',$motor->infoMotor->vca,['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>"Voltaje entre Fase C y A"])}}                           
                                                                 </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('amperajes','Amperajes de Operacion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                 <div class="col-md-12"> 
                                                                        
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                 No se Sabe <input name="knownAmps" type="checkbox" class="js-switch"  {{($motor->infoMotor->amps_operacion==1)?"checked":""}}/> S&iacute; Se Sabe                      
                                                                                 <br><br>
                                                                        </div> <!--columna -->      
                                                                 </div>
                                                                 <div class="col-md-2 text-right">
                                                                         <sub>A</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 col-sm-10 text-left">
                                                                        {{Form::text('ampsA',$motor->infoMotor->aa,['id'=>'AmperajeA','class'=>'form-control col-md-5','placeholder'=>"Amperaje fase A"])}}                           
                                                                 </div>
                                                                 <div class="col-md-2 col-sm-2 text-right">
                                                                         <sub>B</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 text-left">
                                                                        {{Form::text('ampsB',$motor->infoMotor->ab,['id'=>'AmperajeB','class'=>'form-control col-md-5','placeholder'=>'Amperaje Fase B'])}}                           
                                                                 </div>
                                                                 <div class="col-md-2 text-right">
                                                                         <sub>C</sub> 
                                                                 </div>
                                                                 <div class="col-md-10 text-left">
                                                                        {{Form::text('ampsC',$motor->infoMotor->ac,['id'=>'AmperajeC','class'=>'form-control col-md-5','placeholder'=>"Amperaje Fase C"])}}                           
                                                                 </div>
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('modo_Arranque','Modo de Arranque',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" {{$motor->infoMotor->modo_arranque=="No se sabe"?"checked":""}} value="No se sabe" > No se sabe
                                                                       </div>
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" {{$motor->infoMotor->modo_arranque=="Arranque Directo"?"checked":""}} value="Arranque Directo"> Arranque Directo
                                                                       </div>
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Estrella Delta" {{$motor->infoMotor->modo_arranque=="Estrella Delta"?"checked":""}}> Estrella Delta
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Voltaje Reducido"  {{$motor->infoMotor->modo_arranque=="Voltaje Reducido"?"checked":""}}> Voltaje Reducido
                                                                       </div>  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Auto-Transformador"  {{$motor->infoMotor->modo_arranque=="Auto-Transformador"?"checked":""}}> Auto-Transformador
                                                                       </div>  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Arrancador Suave"  {{$motor->infoMotor->modo_arranque=="Arrancador Suave"?"checked":""}}> Arrancador Suave
                                                                       </div>
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Variador de Frecuencia"  {{$motor->infoMotor->modo_arranque=="Variador de Frecuencia"?"checked":""}}> Variador de Frecuencia
                                                                       </div>    
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('vibracion','Vibracion en el equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                        <div>
                                                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="No se sabe"  {{$motor->infoMotor->vibracion=="No se sabe"?"checked":""}}> No se sabe
                                                                       </div>
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Baja Vibracion" {{$motor->infoMotor->vibracion=="Baja Vibracion"?"checked":""}}> Baja Vibracion
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Vibracion Normal" {{$motor->infoMotor->vibracion=="Vibracion Normal"?"checked":""}}> Vibracion Normal
                                                                       </div>  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Alta Vibracion" {{$motor->infoMotor->vibracion=="Alta Vibracion"?"checked":""}}> Alta Vibracion
                                                                       </div>  
                                                                           
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {!!Form::label('temperatura',"Temperatura de Operaci&oacute;n: (En Estator)",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                        <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="No se sabe" {{$motor->infoMotor->temp_estator=="No se sabe"?"checked":""}}> No se sabe
                                                                       </div>
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Muy Baja" {{$motor->infoMotor->temp_estator=="Muy Baja"?"checked":""}}> Muy Baja (Menor a 50&deg; C)
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Baja" {{$motor->infoMotor->temp_estator=="Baja"?"checked":""}}> Baja (51 &deg;C a 65 &deg;C)
                                                                       </div>  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Normal" {{$motor->infoMotor->temp_estator=="Normal"?"checked":""}}> Normal (66 &deg;C a 80 &deg;C)
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Alta" {{$motor->infoMotor->temp_estator=="Alta"?"checked":""}}> Alta (81 &deg;C a 95 &deg;C)
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Muy Alta" {{$motor->infoMotor->temp_estator=="Muy Alta"?"checked":""}}> Muy Alta (Mas de 95 &deg;C)
                                                                       </div>    
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {!!Form::label('temperatura',"Temperatura de Operaci&oacute;n: (En Cojinetes)",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                                                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                                                        <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="No se sabe" {{$motor->infoMotor->temp_cojinetes=="No se sabe"?"checked":""}}> No se sabe
                                                                       </div>
                                                                       
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Baja" {{$motor->infoMotor->temp_cojinetes=="Baja"?"checked":""}}> Baja (41 &deg;C a 60 &deg;C)
                                                                       </div>  
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Normal" {{$motor->infoMotor->temp_cojinetes=="Normal"?"checked":""}}> Normal (60 &deg;C a 70 &deg;C)
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Alta" {{$motor->infoMotor->temp_cojinetes=="Alta"?"checked":""}}> Alta (71 &deg;C a 80 &deg;C)
                                                                       </div> 
                                                                       <div>
                                                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Muy Alta" {{$motor->infoMotor->temp_cojinetes=="Muy Alta"?"checked":""}}> Muy Alta (Mas de 81 &deg;C)
                                                                       </div>    
                                                      </div><!--columna -->
                                               </div><!--form group -->
                                               <div class="form-group">
                                                      {{Form::label('trabajos','Comentarios de Operacion:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                                
                                                <div class="col-md-9 col-sm-9 col-xs-12">  
                                                      {{Form::textarea('comentOperacion',$motor->infoMotor->coment_operacion,['class'=>'form-control col-md-','placeholder'=>'Datos importantes de operacion: &#13;&#10;&#13;&#10;-si se dispara al cierto tiempo, &#13;&#10;-si se escucha algun ruido,&#13;&#10;-si utiliza algun tipo de grasa especifica&#13;&#10;-si lo enviaron a otro taller y no funciono '])}}                           
                                                 </div><!--columna -->
                                           </div><!--form group -->

                                              
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->


                  <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel" >
                                    <div class="x_title">
                                          <h2>Trabajos especificos a realizar<small>Listar trabajos puntuales</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content" style="display:inline">
                                                <br />
                                                <div class="form-group">
                                                            Listar en este apartado trabajos especificos a realizar, (fabricacion de Difusor, Fabricación de Caja de bornera, cambio a 3 puntas de salida etc,)
                                                            <a class="btn btn-primary" id="addWork">Agregar</a>
                                                     </div><!--form group -->
                                  <div class="form-group">
                                                <table class="table col-md-12 col-sm-12 col-xs-12" id="table_works">
                                                      @if(count($motor->trabajos)>0)
                                                            
                                                            @foreach($motor->trabajos as $trabajo)
                                                                  <tr>
                                                                        <td style="width:60%">{{Form::text('works[]',$trabajo->trabajo,['class'=>'form-control col-md-12','placeholder'=>"Trabajo Especifico"])}} </td>
                                                                        <td>
                                                                                    <div class="checkbox">
                                                                                                <label>
                                                                                                <input type="checkbox" {{$trabajo->cotizar==1?"checked":""}}  class="checkTrabajo"> Cotizar
                                                                                                <input type="hidden" name="cotizarTrabajo[]" value="{{$trabajo->cotizar}}">
                                                                                                </label>
                                                                                          </div>
                                                                        </td>
                                                                        <td>  <a class="btn btn-danger" id="delWork"><i class="fa fa-minus-circle"> Eliminar</i></a></td>
                                                                  </tr>
                                                            @endforeach
                                                      @else
                                                            <tr>
                                                                  <td style="width:60%">{{Form::text('works[]','',['class'=>'form-control col-md-12','placeholder'=>"Trabajo Especifico"])}} </td>
                                                                  <td>
                                                                              <div class="checkbox">
                                                                                          <label>
                                                                                          <input type="checkbox" checked="checked"  class="checkTrabajo"> Cotizar
                                                                                          <input type="hidden" name="cotizarTrabajo[]" value="1">
                                                                                          </label>
                                                                                    </div>
                                                                  </td>
                                                                  <td>  <a class="btn btn-danger" id="delWork"><i class="fa fa-minus-circle"> Eliminar</i></a></td>
                                                            </tr>
                                                      @endif
                                                </table>
                                                    
                                                      

                                                      
                                              </div><!--form group -->
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              <div class="x_panel" >
                                    <div class="x_title">
                                          <h2>Fotografias del equipo<small>Fotografias de Ingreso</small></h2>
                                          <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a> </li>
                                               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                          </ul>
                                          <div class="clearfix"></div>
                                    </div> <!--x title -->
                                    <div class="x_content" style="display:block;overflow:auto">
                                                <br />
                                                 <!--<form class="form-horizontal form-label-left input_mask">-->
                                             <div style="display:block;overflow:hidden" id="tabla_fotos">
                                                      @if(count($motor->fotos)>0)
                                                            
                                                            @foreach($motor->fotos as $foto)
                                                                  <div class="col-md-6 text-center fotica">
                                                                        <img src="{{$foto->foto}}" style="max-width:90%;padding:10px;margin:10px; border:1px solid #eee;">
                                                                        <a class="btn btn-danger" data-id-foto="{{$foto->id}}" data-id-motor="{{$foto->id_motor}}"> 
                                                                              <i class="fa fa-minus-circle" data-id-foto="{{$foto->id}}" data-id-motor="{{$foto->id_motor}}"> 
                                                                                    Eliminar Foto 
                                                                              </i>
                                                                        </a>
                                                                  </div>      
                                                            @endforeach
                                                            
                                                      @endif
                                             </div>
                                             <div class="form-group dz-clickable">
                                                <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                                
                                        </div><!--form group -->
                                        <div class="dropzone-previews"></div>
                                    </div> <!--x content -->
                              </div>  <!--x panel --> 
                  </div> <!--columna -->

                  




          </div>  <!--  </row> -->
           <br>
                                              
                                              <div class="form-group">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                                          
                                                          <button class="btn btn-primary" type="reset">Reset</button>
                                                          <button type="submit" class="btn btn-success" id="submit-all">Guardar Equipo Editado</button>
                                                    </div>
                                              </div>
                                              <div class="ln_solid"></div>
                                          <input type="hidden" name="contactohide" value="{{$motor->infoMotor->contacto}}" id="contactohide">
                                          <input type="hidden" name="tipoequipohide" value="{{$motor->id_tipoequipo}}" id="tipoequipohide">
          {!! Form::close() !!}  <!--  </form> -->



        <!-- /page content -->

        <!-- footer content -->
     
        <!-- /footer content -->
      </div>

    </div>
  </div>


 @include('inc.footer')
 <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
 <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
 <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
 
 <script src="{{asset('vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
 
 <script type="text/javascript">
      $(document).ready(function(){

            $("#tabla_fotos").click(function(e){
                  if (e.target.nodeName == "A" || e.target.nodeName == "I")
                  {
                        //alert("tratando de eliminar a :"+$(e.target).attr('data-id-foto'));
                        //
                        var getRequest = '/motoresphoto/'+$(e.target).attr('data-id-foto')+"/"+$(e.target).attr('data-id-motor');
                        
                        $.get(getRequest,function(data)
                        {
                             
                             $(e.target).closest(".fotica").hide(400);
                        });

                  }
                  
            });

            $('#id_tipoequipo').editableSelect({filter:false}).on('hidden.editable-select', function (e, li) {
                  if (li == null)
                        $('#tipoequipohide').val($('#id_tipoequipo').val());
                  else
                        $('#tipoequipohide').val(li.text());   
            });
            $('#contactoTXT').editableSelect({filter:false}).on('select.editable-select', function (e, li) {
                  if (li == null)
                          $('#contactohide').val($('#contactoTXT').val());
                  else
                    $('#contactohide').val(li.text());   
                  var getRequest = '/contactoSelect/'+li.val();
                  
                  $.get(getRequest,function(data)
                  {
                        var contacto = JSON.parse(data);  
                        $('#id_email').val(contacto.email);
                        $("#id_telefonoTXT").val(contacto.telefono);

                  });
            });
            
            $('#clienteSelect').change(function(){
                  var getRequest = '/clienteSelect/'+$('#clienteSelect').val();
                  
                  $.get(getRequest,function(data)
                  {
                        var contactos = JSON.parse(data);
                        $('#contactoTXT').editableSelect('clear'); 
                        for (i=0;i<contactos.length;i++)
                               $('#contactoTXT').editableSelect('add',function(){
                                    $(this).val(contactos[i].id);
                                    $(this).text(contactos[i].contacto);
		                  });         
                  });
            });

            $('#addWork').click(function(){
                  $('#table_works').append("<tr><td style='width:60%'> <input type='text' name='works[]' class='form-control col-md-12' placeholder='Trabajo Especifico'> </td><td><div class='checkbox'><label><input type='checkbox' checked='checked'  class='checkTrabajo'> Cotizar<input type='hidden' name='cotizarTrabajo[]' value='1'></label></div></td> <td>  <a class='btn btn-danger' id='delWork'><i class='fa fa-minus-circle'> Eliminar </i></a></td></tr>");
            });
            // eliminar trabajos especificos
            $("#table_works").click(function(event){
                  var element = $(event.target);
                  if (event.target.nodeName == 'I' || event.target.nodeName == 'A')
                    element.closest("tr").remove();
                  else
                     
                  if (element.attr('type')=="checkbox")
                  {
                        var num = $(event.target).next().val();
                        num = (1*num+1)%2;
                        $(event.target).next().val(num);
                  }
            });
            $("#emergencia").knob({"change" :function(v){
                  if (v>=7) {
                        $('#emergencia').trigger(
                              'configure',{"fgColor":"#d9534f","inputColor":"#d9534f",}
                        );
                        $('#cobro').show();
                  }
                  else{
                        $('#emergencia').trigger(
                              'configure',{"fgColor":"#26B99A","inputColor":"#26B99A",}
                        );
                        $('#cobro').hide();
                  }

            }});
      });
  </script>
  <script type="text/javascript">
    $(function () {
        
        var my_date = $('#picker').val();
        my_date = my_date.replace(/-/g, "/"); 
      var d = new Date(my_date);
        
      $('#datetimepicker1').datetimepicker({'date':d});
        
        
    });
</script>
<script>
      Dropzone.options.myDropzone = {
               autoProcessQueue: false,
               uploadMultiple: true,
               maxFiles: 10,
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
                        $('#datetimepicker1 input[type=text]').css({'background-color' : '#fff', 'border':'1px solid #ccc'});
                        $('#year').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                        $('#newOs').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                        $('#contactoTXT').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                        $('#id_tipoequipo').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                        var validated = true;
                        var equipo = null;
                        if ($('#clienteSelect').val() == 0 ){
                           validated = false;
                           alert("Falta el cliente");
                        }
                        
                        if ($('#year').val() == "")
                        {
                              validated = false;
                              $('#year').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                              alert('Falta el año');
                              equipo = equipo==null?$('#year'):equipo;
                        }
                        if ($('#newOs').val() == "")
                        {
                              validated = false;
                              $('#newOs').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                              alert('Falta el numero de orden');
                              equipo = equipo==null?$('#newOs'):equipo;
                        }

                        if ($('#datetimepicker1 input[type=text]').val() == ""){
                          validated = false;
                          $('#datetimepicker1 input[type=text]').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                          equipo = equipo==null?$('#datetimepicker1 input[type=text]'):equipo;
                          alert('Falta la fecha');
                        }
                        
                        
                       
                       if ($('#contactohide').val() == ""){
                              $('#contactoTXT').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                              validated = false;
                              alert('Falta el contacto')
                              equipo = equipo==null?$('#contactoTXT'):equipo;
                       }
                       if ($('#tipoequipohide').val() == ""){
                              $('#id_tipoequipo').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                              validated = false;
                              alert('Falta el Tipo de Equipo');
                              equipo = equipo==null?$('#id_tipoequipo'):equipo;

                       }
                        

                        if (validated){
                             // $("#my-dropzone").submit();
                              if (myDropzone.files.length > 0 )                      
                                 myDropzone.processQueue();  
                              else
                               // alert('Debe de cargar almenos una imagen del equipo');
                               $("#my-dropzone").submit();
                              
                        }else
                        {
                              $('html, body').animate({
                                    scrollTop: equipo.offset().top
                              }, 1000);
                        }
                   });
                   this.on("addedfile", function(file) {
                    //   alert("file uploaded");
                   });
                   
                   this.on("complete", function(file) {
                  if (file.accepted){
                              
                              var loc = window.location;
                              loc.href = loc.protocol+"//"+loc.hostname+"/motores";
                  }
                      
                   });
                   this.on("processing", function() {
                         this.options.autoProcessQueue = true;
                  });
                  
     
                   this.on("success", function(file,response) {  myDropzone.processQueue.bind(myDropzone) });
                   this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
               }
           };
           myDropzone.options.sending = function(file, xhr) {
                  var _send = xhr.send;
                  xhr.send = function() {
                  _send.call(xhr, file);
                  }
                  }
     </script>

      
  
@endsection