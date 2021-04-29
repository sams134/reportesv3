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
                              <h2 style="text-transform:uppercase">REPORTE DE EQUIPO {{$motor->year}}-{{$motor->os}}</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>



                              <div class="x_content">



                                    <div id="wizard2" class="form_wizard wizard_horizontal">
                                            <ul class="wizard_steps">
                                              <li>
                                                <a href="#step-1">
                                                  <span class="step_no">1</span>
                                                  <span class="step_descr">
                                                                    Fotos de Avances<br />
                                                                    <small>Fotos y descripcion de Fotos </small>
                                                                </span>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="#step-2">
                                                  <span class="step_no">2</span>
                                                  <span class="step_descr">
                                                                    Alojamientos<br />
                                                                    <small>Informacion de causa de fallo</small>
                                                                </span>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="#step-3">
                                                  <span class="step_no">3</span>
                                                  <span class="step_descr">
                                                                    Ejes<br />
                                                                    <small>Nucleo y Embobinado</small>
                                                                </span>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="#step-4">
                                                  <span class="step_no">4</span>
                                                  <span class="step_descr">
                                                                    Recomendaciones<br />
                                                                    <small>Ajustes y rodamientos</small>
                                                                </span>
                                                </a>
                                              </li>
                                             
                                            </ul>
                                            <div id="step-1">
                                                  
                                                    <h2 class="StepTitle">Fotos de Avances</h2>
                                                        <p>Colocar descripcion que se entienda
                                                        </p>

                                                       
                                                        {!! Form::open(['action' => 'ReportesController@saveReporte1','method'=>'POST','files'=>'true','id' => 'my-dropzone','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                                        <input type="hidden" name="id_motor" value="{{$motor->id_motor}}" id="id_motor">
                                                        <div id="fotos_desarme" style="overflow-x:auto;">
                                                             <table class="table table-bordered" style="width:97%">
                                                                 @if (sizeof($motor->fotos)>0)
                                                                          @foreach($motor->fotos as $foto)
                                                                              @if($foto->type==8)
                                                                                  <tr class='fotica'>
                                                                                      <td>
                                                                                      <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                                                      <div style='margin:10px' class='text-center'>
                                                                                      <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Foto </a>
                                                                                      </div>
                                                                                      </td>
                                                                                      <td style="width:60%">
                                                                                               <span> Titulo de Trabajo:</span>
                                                                                      <input type="text" class="form-control" name="titulo[{{$foto->id}}]" value="{{$foto->titulo}}">
                                                                                              <span> Descripci&oacute;n:</span>
                                                                                      <textarea class="form-control" name='descripcion[{{$foto->id}}]'>{{$foto->descripcion}}</textarea>
                                                                                      
                                                                                      </td>
                                                                                  </tr>
                              
                                                                              @endif
                                                                          @endforeach
                                                                  @endif
                                                             </table>
                                                        </div>
                                                       
                                                        <div class="form-group dz-clickable well">
                                                          <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                                                  
                                                          </div><!--form group -->
                                                          <div class="dropzone-previews"></div>
                                                          <button type="hidden" class="btn btn-success" id="submit-all" style="display:none">Guardar Nuevo Equipo</button>
                                                          <button type="submit" class="btn btn-success" > Probar Post </button>
                                                          {!! Form::close() !!}  <!--  </form> -->



                      
                                            </div>
                                            <div id="step-2">
                                                    <h2 class="StepTitle">AJUSTES MECÁNICOS EN ALOJAMIENTOS</h2>
                                                        
                                                    {!! Form::open(['action' => 'ReportesController@saveReporte2','method'=>'POST','files'=>'true','id' => 'my-dropzone2','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                                    <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                                                    <div id="tabla_principal">
                                                    @foreach($motor->cojinetes as $cojinete)
                                                       <h3 style="text-transform:uppercase"> RODAMIENTO {{$cojinete->infoCojinete->designacion}} - LADO {{$cojinete->pos_cojinete}} </h3>
                                                        <input type="hidden" name="id_cojineteMotor[]" value="{{$cojinete->id}}">
                                                        
                                                       <table class="table">
                                                           <tr>
                                                                <td>
                                                                        <h2>Medida Inicial de Alojamiento</h2>
                                                                </td>
                                                           </tr>
                                                           <tr>
                                                                <td>
                                                                    <table class="table">
                                                                        <tr>
                                                                                <td style="width:130px"> 
                                                                                        <img src="/img/medidas_cuna1.png" style="max-width:120px"><br>
                                                                                        <img src="/img/medidas_cuna2.png" style="max-width:120px"> <br>
                                                                                        <label> Metodo de Medición </label>
                                            
                                                                                    </td>
                                                                                    <td>
                                                                                        <table class="table table-hover table-bordered iniciales" style="font-size:10px">
                                                                                            <tr class="headings">
                                                                                                <th style="background:#73879C;color:#fff"> </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida A </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida B </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida C </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida D </th>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="active"> X </td> 
                                                                                                <td> <input class="form-control" type="number" name="med_xa[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xa==0?"":number_format($cojinete->medidas->first()->med_xa,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_xb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xb==0?"":number_format($cojinete->medidas->first()->med_xb,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_xc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xc==0?"":number_format($cojinete->medidas->first()->med_xc,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_xd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xd==0?"":number_format($cojinete->medidas->first()->med_xd,4)}}"> </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="active"> Y </td> 
                                                                                                <td> <input class="form-control" type="number" name="med_ya[]" step="0.0001" value="{{$cojinete->medidas->first()->med_ya==0?"":number_format($cojinete->medidas->first()->med_ya,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_yb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yb==0?"":number_format($cojinete->medidas->first()->med_yb,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_yc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yc==0?"":number_format($cojinete->medidas->first()->med_yc,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_yd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yd==0?"":number_format($cojinete->medidas->first()->med_yd,4)}}"> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="active"> Z </td> 
                                                                                                <td> <input class="form-control" type="number" name="med_za[]" step="0.0001" value="{{$cojinete->medidas->first()->med_za==0?"":number_format($cojinete->medidas->first()->med_za,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_zb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zb==0?"":number_format($cojinete->medidas->first()->med_zb,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_zc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zc==0?"":number_format($cojinete->medidas->first()->med_zc,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_zd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zd==0?"":number_format($cojinete->medidas->first()->med_zd,4)}}"> </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                    <td> 
                                                                        <a class="btn btn-primary" data-func="copy"> Copiar valores iniciales</a>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td>
                                                                            <h2>Medida Final de Alojamiento</h2>
                                                                    </td>
                                                             </tr>
                                                               <tr>
                                                                    <td>
                                                                        <table class="table">
                                                                            <tr>
                                                                                    <td style="width:130px"> 
                                                                                            <img src="/img/medidas_cuna1.png" style="max-width:120px"><br>
                                                                                            <img src="/img/medidas_cuna2.png" style="max-width:120px"> <br>
                                                                                            <label> Metodo de Medición </label>
                                                
                                                                                        </td>
                                                                                        <td>
                                                                                            <table class="table table-hover table-bordered finales" style="font-size:10px">
                                                                                                <tr class="headings">
                                                                                                    <th style="background:#73879C;color:#fff"> </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida A </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida B </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida C </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida D </th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="active"> X </td> 
                                                                                                    <td> <input class="form-control" type="number" name="med_xa2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_xa==0?"":number_format($cojinete->medidas[1]->med_xa,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_xb2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_xb==0?"":number_format($cojinete->medidas[1]->med_xb,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_xc2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_xc==0?"":number_format($cojinete->medidas[1]->med_xc,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_xd2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_xd==0?"":number_format($cojinete->medidas[1]->med_xd,4)}}"> </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="active"> Y </td> 
                                                                                                    <td> <input class="form-control" type="number" name="med_ya2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_ya==0?"":number_format($cojinete->medidas[1]->med_ya,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_yb2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_yb==0?"":number_format($cojinete->medidas[1]->med_yb,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_yc2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_yc==0?"":number_format($cojinete->medidas[1]->med_yc,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_yd2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_yd==0?"":number_format($cojinete->medidas[1]->med_yd,4)}}"> </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                    <td class="active"> Z </td> 
                                                                                                    <td> <input class="form-control" type="number" name="med_za2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_za==0?"":number_format($cojinete->medidas[1]->med_za,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_zb2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_zb==0?"":number_format($cojinete->medidas[1]->med_zb,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_zc2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_zc==0?"":number_format($cojinete->medidas[1]->med_zc,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_zd2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_zd==0?"":number_format($cojinete->medidas[1]->med_zd,4)}}"> </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    
                                                                </tr>
                                                       </table>
                                                    @endforeach
                                                    </div>
                                                    <div id="fotos_desarme2" style="overflow-x:auto;">
                                                        <table class="table table-bordered" style="width:97%">
                                                            @if (sizeof($motor->fotos)>0)
                                                                     @foreach($motor->fotos as $foto)
                                                                         @if($foto->type==9)
                                                                             <tr class='fotica'>
                                                                                 <td>
                                                                                 <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                                                 <div style='margin:10px' class='text-center'>
                                                                                 <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Parte </a>
                                                                                 </div>
                                                                                 </td>
                                                                                 <td style="width:60%">
                                                                                          <span> Titulo de Trabajo:</span>
                                                                                 <input type="text" class="form-control" name="titulo[{{$foto->id}}]" value="{{$foto->titulo}}">
                                                                                         <span> Descripci&oacute;n:</span>
                                                                                 <textarea class="form-control" name='descripcion[{{$foto->id}}]'>{{$foto->descripcion}}</textarea>
                                                                                 
                                                                                 </td>
                                                                             </tr>
                         
                                                                         @endif
                                                                     @endforeach
                                                             @endif
                                                        </table>
                                                   </div>
                                                    <div class="form-group dz-clickable well">
                                                            <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                                                    
                                                            </div><!--form group -->
                                                            <div class="dropzone-previews"></div>
                                                            <button type="hidden" class="btn btn-success" id="submit-all2" style="display:none">Guardar Nuevo Equipo</button>
                                                            <button type="submit" class="btn btn-success" > Probar Post </button>
                                                            {!! Form::close() !!}  <!--  </form> -->
                                            </div>
                  
                                            <div id="step-3">
                                              
                                                <h2 class="StepTitle">AJUSTES MECÁNICOS EN EJES</h2>
                                                        
                                                    {!! Form::open(['action' => 'ReportesController@saveReporte3','method'=>'POST','files'=>'true','id' => 'my-dropzone3','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                                    <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                                                    <div id="tabla_principal">
                                                    @foreach($motor->cojinetes as $cojinete)
                                                       <h3 style="text-transform:uppercase"> RODAMIENTO {{$cojinete->infoCojinete->designacion}} - LADO {{$cojinete->pos_cojinete}} </h3>
                                                        <input type="hidden" name="id_cojineteMotor[]" value="{{$cojinete->id}}">
                                                        
                                                       <table class="table">
                                                        <tr>
                                                            <td>
                                                                <h2> Medida Inicial de Eje</h2>
                                                            </td>
                                                        </tr>
                                                           <tr>
                                                                <td>
                                                                    <table class="table">
                                                                        <tr>
                                                                                <td style="width:130px"> 
                                                                                        <img src="/img/medidas_eje.png" style="max-width:120px"><br>
                                                                                        <img src="/img/medidas_eje2.png" style="max-width:120px"><br>
                                                                                        <label> Metodo de Medición </label>
                                               
                                                                                    </td>
                                                                                    <td>
                                                                                        <table class="table table-hover table-bordered" style="font-size:10px">
                                                                                            <tr class="headings">
                                                                                                <th style="background:#73879C;color:#fff;width:45px"> </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida u </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida v </th>
                                                                                                <th class="text-center" style="background:#73879C;color:#fff"> Medida w </th>
                                                                                                
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="active"> Pos a </td> 
                                                                                                <td> <input class="form-control" type="number" name="med_au[]" step="0.0001" value="{{$cojinete->medidas->first()->med_au==0?"":number_format($cojinete->medidas->first()->med_au,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_av[]" step="0.0001" value="{{$cojinete->medidas->first()->med_av==0?"":number_format($cojinete->medidas->first()->med_av,4)}}"> </td>
                                                                                                <td> <input class="form-control" type="number" name="med_aw[]" step="0.0001" value="{{$cojinete->medidas->first()->med_aw==0?"":number_format($cojinete->medidas->first()->med_aw,4)}}"> </td>
                                                                                                
                                                                                            </tr>
                                                                                            <tr>
                                                                                                    <td class="active"> Pos b </td> 
                                                                                                    <td> <input class="form-control" type="number" name="med_bu[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bu==0?"":number_format($cojinete->medidas->first()->med_bu,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_bv[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bv==0?"":number_format($cojinete->medidas->first()->med_bv,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_bw[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bw==0?"":number_format($cojinete->medidas->first()->med_bw,4)}}"> </td>
                                                                                                    
                                                                                            </tr>
                                                                                           
                                                                                        </table>
                                                                                    </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                    <td> 
                                                                        <a class="btn btn-primary" data-func="copyEje"> Copiar valores iniciales</a>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td>
                                                                            <h2>Medida Final del Eje</h2>
                                                                    </td>
                                                             </tr>
                                                               <tr>
                                                                    <td>
                                                                        <table class="table">
                                                                            <tr>
                                                                                    <td style="width:130px"> 
                                                                                            <img src="/img/medidas_eje.png" style="max-width:120px"><br>
                                                                                            <img src="/img/medidas_eje2.png" style="max-width:120px"><br>
                                                                                            <label> Metodo de Medición </label>
                                                   
                                                                                        </td>
                                                                                        <td>
                                                                                            <table class="table table-hover table-bordered" style="font-size:10px">
                                                                                                <tr class="headings">
                                                                                                    <th style="background:#73879C;color:#fff;width:45px"> </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida u </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida v </th>
                                                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida w </th>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="active"> Pos a </td> 
                                                                                                    <td> <input class="form-control" type="number" name="med_au2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_au==0?"":number_format($cojinete->medidas[1]->med_au,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_av2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_av==0?"":number_format($cojinete->medidas[1]->med_av,4)}}"> </td>
                                                                                                    <td> <input class="form-control" type="number" name="med_aw2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_aw==0?"":number_format($cojinete->medidas[1]->med_aw,4)}}"> </td>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                        <td class="active"> Pos b </td> 
                                                                                                        <td> <input class="form-control" type="number" name="med_bu2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_bu==0?"":number_format($cojinete->medidas[1]->med_bu,4)}}"> </td>
                                                                                                        <td> <input class="form-control" type="number" name="med_bv2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_bv==0?"":number_format($cojinete->medidas[1]->med_bv,4)}}"> </td>
                                                                                                        <td> <input class="form-control" type="number" name="med_bw2[]" step="0.0001" value="{{$cojinete->medidas[1]->med_bw==0?"":number_format($cojinete->medidas[1]->med_bw,4)}}"> </td>
                                                                                                        
                                                                                                </tr>
                                                                                               
                                                                                            </table>
                                                                                        </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    
                                                                </tr>
                                                       </table>
                                                    @endforeach
                                                    </div>
                                                    <div id="fotos_desarme3" style="overflow-x:auto;">
                                                        <table class="table table-bordered" style="width:97%">
                                                            @if (sizeof($motor->fotos)>0)
                                                                     @foreach($motor->fotos as $foto)
                                                                         @if($foto->type==9)
                                                                             <tr class='fotica'>
                                                                                 <td>
                                                                                 <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                                                 <div style='margin:10px' class='text-center'>
                                                                                 <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Parte </a>
                                                                                 </div>
                                                                                 </td>
                                                                                 <td style="width:60%">
                                                                                          <span> Titulo de Trabajo:</span>
                                                                                 <input type="text" class="form-control" name="titulo[{{$foto->id}}]" value="{{$foto->titulo}}">
                                                                                         <span> Descripci&oacute;n:</span>
                                                                                 <textarea class="form-control" name='descripcion[{{$foto->id}}]'>{{$foto->descripcion}}</textarea>
                                                                                 
                                                                                 </td>
                                                                             </tr>
                         
                                                                         @endif
                                                                     @endforeach
                                                             @endif
                                                        </table>
                                                   </div>
                                                    <div class="form-group dz-clickable well">
                                                            <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                                                    
                                                            </div><!--form group -->
                                                            <div class="dropzone-previews"></div>
                                                            <button type="hidden" class="btn btn-success" id="submit-all3" style="display:none">Guardar Nuevo Equipo</button>
                                                            <button type="submit" class="btn btn-success" > Probar Post </button>
                                                            {!! Form::close() !!}  <!--  </form> -->

                                            </div>
                                            <div id="step-4">
                                                  hola
                                            </div>
                                            
                                          <!-- End SmartWizard Content -->
                
                                    </div>
                                






                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
      </div>
      
</div>




    
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    
 <script src="{{asset('vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
 <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    
<script>

    $(document).ready(function(){
        $("#tabla_principal").click(function(e){
            if(e.target.nodeName == "A" || e.target.nodeName == "a"){
                    if ($(e.target).attr('data-func')=='copy'){
                           
                        var vals = [0,0,0,0,0,0,0,0,0,0,0,0];
                        var i = 0;
                        $(e.target).closest('tr').prev().find('input').each(function(){
                            vals[i++]=$(this).val();
                        });
                        i = 0;
                         $(e.target).closest('tr').next().next().find('input').each(function(){
                            $(this).val(vals[i++]);
                         });
                        
                    }
            }
        });
        $("#fotos_desarme").click(function(e){
                        if(e.target.nodeName == "A" || e.target.nodeName == "a"){
                            var getRequest = '/motoresphoto/'+$(e.target).attr('data-id-foto')+"/"+$(e.target).attr('data-id-motor');
                            
                             $.get(getRequest,function(data){
                                 $(e.target).closest(".fotica").remove();
                             });
                        }
                    });
        $("#fotos_desarme2").click(function(e){
            if(e.target.nodeName == "A" || e.target.nodeName == "a"){
                var getRequest = '/motoresphoto/'+$(e.target).attr('data-id-foto')+"/"+$(e.target).attr('data-id-motor');
                
                    $.get(getRequest,function(data){
                        $(e.target).closest(".fotica").remove();
                    });
            }
        });
        $("#fotos_desarme3").click(function(e){
            if(e.target.nodeName == "A" || e.target.nodeName == "a"){
                var getRequest = '/motoresphoto/'+$(e.target).attr('data-id-foto')+"/"+$(e.target).attr('data-id-motor');
                
                    $.get(getRequest,function(data){
                        $(e.target).closest(".fotica").remove();
                    });
            }
        });
        $('#wizard2').smartWizard({
                onLeaveStep:leaveAStepCallback,
                onFinish:onFinishCallback
            });
    });
    Dropzone.options.myDropzone = {
                     autoProcessQueue: true,
                     uploadMultiple: true,
                     maxFiles: 1,
                     maxFilesize : 39,
                     parallelUploads: 1,
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
                             function ch(value1,value2){
                                 if (value1 == value2)
                                 return "selected";
                                 else
                                 return "";
                             }
                             myDropzone.processQueue.bind(myDropzone);
                             console.log(response); 
                             var id_motor = $("#id_motor").val();
                                $("#fotos_desarme2").html("<table id='fotos2' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";
                                    
                                    forma = "<tr class='fotica'> <td><img src="+ obj[i].foto+" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'><div style='margin:10px' class='text-center'>";
                                    forma += "<a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor="+id_motor+">Eliminar Foto </a></div>";
                                    forma += "</td> <td style='width:60%'><span>Titulo de Trabajo:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea>";
                                    
                                    forma += "</td> </tr>";
                                    $("#fotos2").append(forma);
                                    $(".stepContainer").css('height','');
                                }
                            });

                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 }; 
                 Dropzone.options.myDropzone2 = {
                     autoProcessQueue: true,
                     uploadMultiple: true,
                     maxFiles: 1,
                     maxFilesize : 39,
                     parallelUploads: 1,
                     acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
                             function ch(value1,value2){
                                 if (value1 == value2)
                                 return "selected";
                                 else
                                 return "";
                             }
                             myDropzone2.processQueue.bind(myDropzone2);
                             console.log(response); 
                             var id_motor = $("#id_motor").val();
                                $("#fotos_desarme2").html("<table id='fotos' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";
                                    
                                    forma = "<tr class='fotica'> <td><img src="+ obj[i].foto+" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'><div style='margin:10px' class='text-center'>";
                                    forma += "<a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor="+id_motor+">Eliminar Parte </a></div>";
                                    forma += "</td> <td style='width:60%'><span>Titulo de Trabajo:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea>";
                                    
                                    forma += "</td> </tr>";
                                    $("#fotos").append(forma);
                                    $(".stepContainer").css('height','');
                                }
                            });

                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 }; 
                 Dropzone.options.myDropzone3 = {
                     autoProcessQueue: true,
                     uploadMultiple: true,
                     maxFiles: 1,
                     maxFilesize : 39,
                     parallelUploads: 1,
                     acceptedFiles: ".jpeg,.jpg,.png,.gif",
                     addRemoveLinks: true, 
                     headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                     
                     init: function() {
                         var submitBtn = document.querySelector("#submit-all3");
                         myDropzone3 = this;
                         submitBtn.addEventListener("click", function(e){   
                              e.preventDefault();
                              e.stopPropagation();
                              myDropzone3.processQueue(); 
                         });
                        
                         this.on("complete", function(file) {
                            if (file.accepted){
                                myDropzone3.removeFile(file);
                            }
                         });
                         this.on("success", function(file,response) {  
                             function ch(value1,value2){
                                 if (value1 == value2)
                                 return "selected";
                                 else
                                 return "";
                             }
                             myDropzone3.processQueue.bind(myDropzone3);
                             console.log(response); 
                             var id_motor = $("#id_motor").val();
                                $("#fotos_desarme3").html("<table id='fotos' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";
                                    
                                    forma = "<tr class='fotica'> <td><img src="+ obj[i].foto+" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'><div style='margin:10px' class='text-center'>";
                                    forma += "<a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor="+id_motor+">Eliminar Parte </a></div>";
                                    forma += "</td> <td style='width:60%'><span>Titulo de Trabajo:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea>";
                                    
                                    forma += "</td> </tr>";
                                    $("#fotos").append(forma);
                                    $(".stepContainer").css('height','');
                                }
                            });

                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 };
        function leaveAStepCallback(obj, context){
                   // alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
                   $(".stepContainer").css('height','');
                   var validator = validateSteps(context.fromStep);
                   if (context.toStep == 5 && validator)
                     loadSummary();
                    return  validator;// return false to stay on step and true to continue navigation 
                }

            function onFinishCallback(objs, context){
                if(validateAllSteps()){
                  
                }
            }

            // Your Step validation logic
            function validateSteps(stepnumber){
                var isStepValid = true;
                // validate step 1
                if(stepnumber == 1){
                    var $form = $("#my-dropzone");
                    var $inputs = $form.find("input, select, button, textarea");
                    var serializedData = $form.serialize();
                    $inputs.prop("disabled", true);
                    request = $.ajax({
                        url: "/saveReporte1",
                        type: "post",
                        data: serializedData
                    });
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    });

                    // Callback handler that will be called regardless
                    // if the request failed or succeeded
                    request.always(function () {
                        // Reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                    
                } else if (stepnumber == 2)
                {
                    var $form = $("#my-dropzone2");
                    var $inputs = $form.find("input, select, button, textarea");
                    var serializedData = $form.serialize();
                    $inputs.prop("disabled", true);
                    request = $.ajax({
                        url: "/saveReporte2",
                        type: "post",
                        data: serializedData
                    });
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    });

                    // Callback handler that will be called regardless
                    // if the request failed or succeeded
                    request.always(function () {
                        // Reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                }
                else if (stepnumber == 3){
                    var $form = $("#my-dropzone3");
                    var $inputs = $form.find("input, select, button, textarea");
                    var serializedData = $form.serialize();
                    $inputs.prop("disabled", true);
                    request = $.ajax({
                        url: "/saveReporte3",
                        type: "post",
                        data: serializedData
                    });
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    });

                    // Callback handler that will be called regardless
                    // if the request failed or succeeded
                    request.always(function () {
                        // Reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                } else if (stepnumber == 4){
                    
                     
                    
                }
                // ...   
                return true;   
            }
            function validateAllSteps(){
                var isStepValid = true;
                // all step validation logic     
                return isStepValid;
            }
             // Smart Wizard         
          
        
    </script>