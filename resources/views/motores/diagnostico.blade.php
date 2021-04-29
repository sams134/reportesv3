@extends('layouts.internal')
@section('content')
<style type="text/css">
    .surgeTable td{
        padding-left: 4px;
    }
    .surgeActive-25
    {
        background:#ffff80;
        border:1px solid #000;
        width:25%
    }
    .surgeActive-25-2
    {
        background:#ffffc0;
        border:1px solid #000;
        width:25%
    }
    .surgeActive-50
    {
        background:#ffff80;
        border:1px solid #000;
        width:50%;
        font-weight: bold;
    }
    .surgeInactive-25{
        border:1px solid #000;
        width:25%
    }
    .surgeInactive-50{
        border:1px solid #000;
        width:50%
    }
    </style>
<div class="container body">
  <style>
         .info b{
           margin-right: 50px;
         }
    </style>
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

            
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2>Diagnostico Guiado <small> <a href="/motores/{{$motor->id_motor}}"> Regresar a Perfil de Motor </a></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                        
                
                        
                        <div id="wizard" class="form_wizard wizard_horizontal">
                          <ul class="wizard_steps">
                            <li>
                              <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                                  Ingreso de Partes<br />
                                                  <small>Descripcion de todas las partes. </small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                                  Causa de Fallo<br />
                                                  <small>Informacion de causa de fallo</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-3">
                                <span class="step_no">3</span>
                                <span class="step_descr">
                                                  Bobina<br />
                                                  <small>Nucleo y Embobinado</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                              <a href="#step-4">
                                <span class="step_no">4</span>
                                <span class="step_descr">
                                                  Cojinetes<br />
                                                  <small>Ajustes y rodamientos</small>
                                              </span>
                              </a>
                            </li>
                            <li>
                                    <a href="#step-5">
                                      <span class="step_no">5</span>
                                      <span class="step_descr">
                                                        Resumen de Diagnostico<br />
                                                        <small>Adicionales</small>
                                                    </span>
                                    </a>
                            </li>
                          </ul>
                          <div id="step-1">
                                
    
                            @include('motores.diagnostico.partes')
    
                          </div>
                          <div id="step-2">
                            @include('motores.diagnostico.falla')
                          </div>

                          <div id="step-3">
                            @include('motores.diagnostico.electricos')
                          </div>
                          <div id="step-4">
                                @include('motores.diagnostico.cojinetes')
                          </div>
                          <div id="step-5">
                                <h2 class="StepTitle">Resumen de Diagnostico</h2>
                                <p>Haremos una recopilación de lo que se ha reportado en el diagnostico y tomaremos algunos detalles adicionales.
                                </p>
                                @if($motor->diagnostico->folder_surge=="")
                            <div id="resumen" style="height:{{count($motor->cojinetes)*100+650}}px">
                                @else
                                <div id="resumen" style="height:{{count($motor->cojinetes)*100+2050}}px">
                               @endif
                                    {!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico5','method'=>'POST','files'=>'true','id' => 'resumen_form','class'=>'form-horizontal form-label-left']) !!}
                                    <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                            <table class="table">
                                <tr>
                                    <td>
                                            <table class="table">
                                                <tr>
                                                        <td class="text-right" style="width:30%"> Balanceo Dinamico </td>
                                                        <td> 
                                                            <select class="form-control" id="balanceo_select" name="balancear">
                                                            <option value="0" {{$motor->diagnostico->balancear==0?"selected":""}}>No es necesario balancear </option>
                                                                <option value="1" {{$motor->diagnostico->balancear==1?"selected":""}}>Balanceo Dinamico en taller </option>
                                                                <option value="2" {{$motor->diagnostico->balancear==2?"selected":""}}>Balanceo Dinamico fuera de taller </option>
                                                            </select>
                                                        </td>
                                                </tr>
                                            </table>
                                            <table class="table" id="peso_balanceo" style="{{$motor->diagnostico->balancear==0?"display:none":"display:inline-table"}}">
                                                    <tr>
                                                            <td class="text-right" style="width:30%"> Peso de Rotor </td>
                                                            <td> 
                                                                <select class="form-control" name="peso_balanceo">
                                                                    <option value="1" {{$motor->diagnostico->peso_balanceo==1?"selected":""}}>0 a 17 Lb </option>
                                                                    <option value="2" {{$motor->diagnostico->peso_balanceo==2?"selected":""}}>18 a 100 Lb </option>
                                                                    <option value="3" {{$motor->diagnostico->peso_balanceo==3?"selected":""}}>101 a 500 Lb </option>
                                                                    <option value="4" {{$motor->diagnostico->peso_balanceo==4?"selected":""}}>501 a 1,000 Lb </option>
                                                                    <option value="5" {{$motor->diagnostico->peso_balanceo==5?"selected":""}}>1,001 a 2,000 Lb </option>
                                                                    <option value="6" {{$motor->diagnostico->peso_balanceo==6?"selected":""}}>2,001 a 3,000 Lb </option>
                                                                    <option value="7" {{$motor->diagnostico->peso_balanceo==7?"selected":""}}>3,001 a 4,000 Lb </option>
                                                                    <option value="8" {{$motor->diagnostico->peso_balanceo==8?"selected":""}}>3,001 a 4,000 Lb </option>
                                                                    <option value="9" {{$motor->diagnostico->peso_balanceo==9?"selected":""}}>4,001 a 5,000 Lb </option>
                                                                    <option value="10" {{$motor->diagnostico->peso_balanceo==10?"selected":""}}>5,001 a 6,000 Lb </option>
                                                                    <option value="11" {{$motor->diagnostico->peso_balanceo==11?"selected":""}}>6,001 a 10,000 Lb </option>
                                                                </select>
                                                            </td>
                                                    </tr>
                                            </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <h2> Trabajos a realizar</h2> </td>
                                </tr>
                                <tr>
                                    <td>
                                            <table class="table" id="reemplazo_table">
                                                <tr>
                                                    <th> Trabajo a realizar</th>
                                                    <th> Autorizado</th>
                                                </tr>    
                                                @foreach($motor->trabajos as $trabajo)
                                                <tr>
                                                      <td>{{$trabajo->trabajo}} </td>
                                                      <td> {!!$trabajo->autorizado==1?"<span class='label label-success'>Autorizado</span>":($trabajo->cotizar==1?"<span class='label label-warning'>Pend. Cotizacion</span>":"<span class='label label-danger'>No autorizado </span>")!!} </td>
                                                      
                                                </tr>
                                                @endforeach
                                            </table>
                                    </td>
                                </tr>
                                <tr>
                                        <td> <h2> Medidas Alojamientos <small>(+) Holgura / (-) Interferencia</small> </h2> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <table class="table table-bordered text-center table-hover" id="alojamientos_table" style="font-size:10px">
                                                    <tr>
                                                        <th> No. Cojinete</th>
                                                        <th> Medida más Holgada</th>
                                                        <th> Medida más Ajustada</th>
                                                        <th> Tolerancia </th>
                                                        <th> Recomendacion Sistema</th>
                                                        <th> Recomendacion Técnico</th>
                                                    </tr>    
                                                   
                                                </table>
                                        </td>
                                    </tr>
                                    <tr>
                                            <td> <h2> Medidas Ejes <small>(+) Holgura / (-) Interferencia</small></h2> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    <table class="table table-bordered text-center table-hover" id="ejes_table" style="font-size:10px">
                                                        <tr>
                                                            <th> No. Cojinete</th>
                                                            <th> Medida más Holgada</th>
                                                            <th> Medida más Ajustada</th>
                                                            <th> Tolerancia </th>
                                                            <th> Recomendacion Sistema</th>
                                                            <th> Recomendacion Técnico</th>
                                                        </tr>    
                                                        <td>
                                                            
                                                        </td>
                                                       
                                                    </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h2> Pruebas de Surge </h2> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                   <table style="width:90%;color:#000;" class="surgeTable">
                                                        <tr>
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="4" class="text-center"><b style="font-size:16px">Equipment Information</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-25"><b>Serial #</b></td>
                                                            <td class="surgeInactive-25" id="info_serial"></td>
                                                            <td class="surgeActive-25"><b>Operating Volts</b></td>
                                                            <td class="surgeInactive-25" id="info_volts"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25"><b>Equipment Tag</b></td>
                                                                <td class="surgeInactive-25" id="info_tag"></td>
                                                                <td class="surgeActive-25"><b>RPM</b></td>
                                                                <td class="surgeInactive-25" id="info_rpm"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25"><b>Location</b></td>
                                                                <td class="surgeInactive-25" id="info_location"></td>
                                                                <td class="surgeActive-25"><b>Power</b></td>
                                                                <td class="surgeInactive-25" id="info_power"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25"><b>Manufacturer</b></td>
                                                                <td class="surgeInactive-25" id="info_manufacturer"></td>
                                                                <td class="surgeActive-25"><b>AC/DC</b></td>
                                                                <td class="surgeInactive-25" id="info_acdc"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25"></td>
                                                                <td class="surgeInactive-25"></td>
                                                                <td class="surgeActive-25"><b>New/Used</b></td>
                                                                <td class="surgeInactive-25">USED</td>
                                                        </tr>
                                                   </table> 
                                                   <br><br>
                                                   <table style="width:78%;color:#000;" class="surgeTable">
                                                        <tr >
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="2" class="text-center">
                                                                <div style="height:60px">
                                                                <p style="padding:0px;margin:0px"><b style="font-size:16px">Test Information</b></p>
                                                                <p style="position:relative;top:-7px">Test Date/Time: <span style="padding:0px;margin:0px" id="info_date"></span></p>
                                                                <p style="position:relative;top:-22px">Winding Temp: 20 °C</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Project #</td>
                                                            <td class="surgeInactive-50" id="info_project"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">Test Description</td>
                                                                <td class="surgeInactive-50" id="info_desc"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Repair Stage</td>
                                                            <td class="surgeInactive-50" id="info_stage"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">Operator</td>
                                                                <td class="surgeInactive-50" id="info_operator"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Test Equipment #</td>
                                                            <td class="surgeInactive-50">1032</td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">PP ID#</td>
                                                                <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        
                                                   </table>
                                                   <br><br>
                                                   <table style="width:58%;color:#000;" class="surgeTable">
                                                        <tr >
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="4" class="text-center">
                                                                <div style="height:38px">
                                                                <p style="padding:0px;margin:0px"><b style="font-size:16px">Off-line Test Data</b></p>
                                                                <p style="position:relative;top:-7px">Recommended Hipot Volts: 2256</p>
                                                                
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50" colspan="2">Lead 1-2 Ohms</td>
                                                                <td class="surgeInactive-50 text-right" colspan="2" id="ohm12"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50" colspan="2">Lead 2-3 Ohms</td>
                                                                <td class="surgeInactive-50 text-right" colspan="2" id="ohm23"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50" colspan="2">Lead 1-3 Ohms</td>
                                                                <td class="surgeInactive-50 text-right" colspan="2" id="ohm13"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50" colspan="2">Max Delta R (%)</td>
                                                                <td class="surgeInactive-50 text-right" colspan="2" id="info_delta"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25-2" ></td>
                                                                <td class="surgeActive-25-2" >Volts</td>
                                                                <td class="surgeActive-25-2" >&#181;Amps</td>
                                                                <td class="surgeActive-25-2" >MOhms@40&deg;C</td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25" id="info_init_megger">Meg. @1min.</td>
                                                                <td class="surgeInctive-25" id="info_init_volts"></td>
                                                                <td class="surgeInactive-25" id="info_init_amps"></td>
                                                                <td class="surgeInactive-25" id="info_init_megs"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25" id="info_end_megger">Meg. @10min.</td>
                                                                <td class="surgeInactive-25" id="info_end_volts"></td>
                                                                <td class="surgeInactive-25" id="info_end_amps"></td>
                                                                <td class="surgeInactive-25" id="info_end_megs"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25-2" ></td>
                                                                <td class="surgeActive-25-2" >Volts</td>
                                                                <td class="surgeActive-25-2" >&#181;Amps</td>
                                                                <td class="surgeActive-25-2" ></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-25" >Hipot</td>
                                                                <td class="surgeInactive-25" ></td>
                                                                <td class="surgeInactive-25" ></td>
                                                                <td class="surgeInactive-25" ></td>
                                                        </tr>
                                                   </table>
                                                   <br><br>
                                                   <table style="width:58%;color:#000;" class="surgeTable">
                                                        <tr >
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="2" class="text-center">
                                                                    <b style="font-size:16px"> Pass/Fail Results</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Surge</td>
                                                            <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">MegOhm</td>
                                                                <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Hipot</td>
                                                            <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">Hipot Step Test</td>
                                                                <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="surgeActive-50">Ohms Balance</td>
                                                            <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="surgeActive-50">Off-line Equip. Rating</td>
                                                                <td class="surgeInactive-50"></td>
                                                        </tr>
                                                        
                                                   </table>
                                                   <br><br>
                                                   <table style="width:98%;color:#000;" class="surgeTable">
                                                        <tr >
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="7" class="text-center">
                                                                    <b style="font-size:16px"> Low Voltage AC Test Data</b>
                                                            </td>
                                                        </tr>
                                                        <tr style="font-size:11px">
                                                            <td style="background:#ffffc0;border:1px solid #000;"  class="text-center"> </td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:16%"  class="text-center">Capacitance (nF)</td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:14%"  class="text-center">Cap D Factor</td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:16%"  class="text-center">Inductance (mH)</td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:14%"  class="text-center">Impedance</td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:14%"  class="text-center">Phase Angle</td>
                                                            <td style="background:#ffffc0;border:1px solid #000;width:14%"  class="text-center">Q Factor</td>
                                                        </tr>
                                                        <tr >
                                                                <td style="background:#ffff80;border:1px solid #000;"  class="text-center"><b>Lead 1-2</b> </td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                        </tr>
                                                        <tr >
                                                                <td style="background:#ffff80;border:1px solid #000;"  class="text-center"><b>Lead 2-3</b> </td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                        </tr>
                                                        <tr >
                                                                <td style="background:#ffff80;border:1px solid #000;"  class="text-center"><b>Lead 1-3</b> </td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                        </tr>
                                                        <tr >
                                                                <td style="background:#ffff80;border:1px solid #000;"  class="text-center"><b>Balance</b> </td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                                <td style="border:1px solid #000;"  class="text-center"></td>
                                                        </tr>
                                                   </table>
                                                   <br><br>
                                                   <table style="width:30%;color:#000;" class="surgeTable">
                                                        <tr >
                                                            <td style="background:#ffffc0;border:1px solid #000;" colspan="3" class="text-center">
                                                                    <b style="font-size:16px"> Hipot Step Test</b>
                                                            </td>
                                                        </tr>
                                                        <tr >
                                                                <td style="background:#ffffc0;border:1px solid #000;" class="text-center"><b>Step #</b></td>
                                                                <td style="background:#ffffc0;border:1px solid #000;" class="text-center"><b>Volts</b></td>
                                                                <td style="background:#ffffc0;border:1px solid #000;" class="text-center"><b>&#181;Amps</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border:1px solid #000" class="text-center">1</td>
                                                            <td style="border:1px solid #000" class="text-center">500</td>
                                                            <td style="border:1px solid #000" class="text-center">0</td>
                                                        </tr>
                                                   </table>
                                                   <br><br>
                                                   <div id="surge_div">
                                                   <canvas id="surge_canvas" width="600" height="400"></canvas>
                                                   </div>
                                                </center>
                                            </td>
                                        </tr>
                                  
                            </table>   
                            {!! Form::close() !!}  <!--  </form> -->
                              </div>
                          </div>
                        </div>
                        <!-- End SmartWizard Content -->

                        







                  </div>
                </div>
              </div>
             
            
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('inc.footer')
        <!-- /footer content -->
      </div>
    </div>
   
    

    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    
 <script src="{{asset('vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
 <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.uploadPreview.js')}}"></script>
    <script src="{{asset('js/diagnostico/bobinado_puntos.js')}}"></script>
    <script src="{{asset('js/diagnostico/surgeGraph.js')}}"></script>
    <script>
        $('#descripcion_falla').ckeditor();
        $('#desc_bobinado').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    



    <script>
        
        function loadSummary(){
                            var id_motor = $("#id_motor").val();
                            var getRequest = '/getSummaryDiagnostico/'+id_motor;
                            $.get(getRequest,function(data){
                                $("#reemplazo_table").html("");
                                $("#alojamientos_table").html("");
                                $("#ejes_table").html("");
                                var forma = "<tr><th style='width:50%'> Trabajo a realizar </th><th> Autorizado </th> <th>Agregar Trabajo</th></tr> ";
                                $("#reemplazo_table").append(forma);
                                var forma = " <tr style='background:#73879C;color:#fff;font-size:12px'><th class='text-center'> No. Cojinete</th><th class='text-center'> Medida Holgada</th><th class='text-center'> Medida Ajustada</th><th class='text-center'> Tolerancia </th><th class='text-center'> Recomendacion Sistema</th><th class='text-center'> Recomendacion Técnico</th></tr>";
                                $("#alojamientos_table").append(forma);
                                $("#ejes_table").append(forma);
                                
                                var objFull = JSON.parse(data);
                                
                                console.log(objFull);
                                var obj = objFull.fotos;
                                var cojinetes = objFull.cojinetes;
                                var diagnostico = objFull.diagnostico;
                                var availableTests = objFull.availableTests;
                                
                                for (var i=0; i<objFull.trabajos.length; i++){
                                    var forma = "<tr><td> Trabajo solicitado por cliente: "+ objFull.trabajos[i].trabajo+"</td>";
                                    if (objFull.trabajos[i].autorizado == 1)
                                      forma += "<td><span class='label label-success'>Autorizado</span>  </td>";
                                    else if(objFull.trabajos[i].cotizar == 1)
                                        forma += "<td><span class='label label-warning'>Pendiente Cotizacion</span>  </td>";
                                    else
                                        forma += "<td><span class='label label-danger'>No Autorizado</span></td>";
                                    forma += "<td>Trabajo ya agregado</td></tr>";
                                    $("#reemplazo_table").append(forma);
                                    $("#resumen").height(function (index, height) {
                                        return (height + 60);
                                    });
                                    $(".stepContainer").css('height','');
                                }
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                         obj[i].titulo = "";
                                    if (obj[i].accion == 2 ){
                                        var forma = "<tr><td> Reemplazo o instalación de "+ obj[i].titulo+"</td><td><span class='label label-warning'>Pendiente Cotizar</span></td>";
                                        forma += "<td><select class='form-control' name='agregar_trabajo[]'><option value='1'>Agregar Trabajo</option><option value='2' selected>No Agregar Trabajo</option></select></td></tr>";
                                        $("#reemplazo_table").append(forma);
                                        $(".stepContainer").css('height','');
                                    }
                                    if (obj[i].accion == 3 ){
                                        var forma = "<tr><td> Reparacion de "+ obj[i].titulo+"</td><td><span class='label label-warning'>Pendiente Cotizar</span></td>";
                                            forma += "<td><select class='form-control' name='agregar_trabajo[]'><option value='1'>Agregar Trabajo</option><option value='2' selected>No Agregar Trabajo</option></select></td></tr>";
                                        $("#reemplazo_table").append(forma);
                                        $(".stepContainer").css('height','');
                                    }

                                    if (obj[i].accion == 2 || obj[i].accion == 3){
                                        $("#resumen").height(function (index, height) {
                                            return (height + 60);
                                        });
                                        $(".stepContainer").css('height','');
                                    }
                                   
                                }
                                        var forma = "";
                                       if (diagnostico.trabajo_electrico == 1)
                                         forma = "<tr><td>Mantenimiento de equipo</td><td><span class='label label-warning'>Pendiente Cotizar</span></td><td>Trabajo ya agregado</td></tr>";
                                       else if (diagnostico.trabajo_electrico == 2)
                                         forma = "<tr><td>Rebobinado de equipo</td><td><span class='label label-warning'>Pendiente Cotizar</span></td><td>Trabajo ya agregado</td></tr>";
                                         else if (diagnostico.trabajo_electrico == 2)
                                         forma = "<tr><td>Reparacion parcial de equipo</td><td><span class='label label-warning'>Pendiente Cotizar</span></td><td>Trabajo ya agregado</td></tr>";
                                         $("#reemplazo_table").append(forma);
                                       var forma = "";
                                       forma = "<tr><td>Pruebas Finales</td><td><span class='label label-warning'>Pendiente Cotizar</span></td>";
                                       forma += "<td><select class='form-control' name='agregar_trabajo[]'><option value='1'>Agregar Trabajo</option><option value='2' selected>No Agregar Trabajo</option></select></td></tr>";
                                        $("#reemplazo_table").append(forma);  

                                for (var i=0;i<cojinetes.length;i++){
                                    var forma = "<tr><td>"+cojinetes[i][0]+"</td><td>"+cojinetes[i][1]+" &#181;m</td><td>"+cojinetes[i][2]+" &#181;m</td>";
                                    forma += "<td>"+cojinetes[i][3]+"</td><td>"+cojinetes[i][4]+"</td>";
                                    forma += "<td><select style='font-size:10px;height:27px' class='form-control' name='des_alojamiento["+cojinetes[i][5]+"]'><option value='1'>Mantener decision sistema</option>";
                                    forma += "<option value='2'>Encamisar</option><option value='3'>Aplicar Pegamento</option><option value='4'>Rectificar</option></select></td>";
                                    forma += "</tr>";
                                    $("#alojamientos_table").append(forma);
                                    var forma = "<tr><td>"+cojinetes[i][0]+"</td><td>"+cojinetes[i][6]+" &#181;m</td><td>"+cojinetes[i][7]+" &#181;m</td>";
                                    forma += "<td>"+cojinetes[i][8]+"</td><td>"+cojinetes[i][9]+"</td><td><select style='font-size:10px;height:27px' class='form-control' name='des_eje["+cojinetes[i][5]+"]'>";
                                    forma += "<option value='1'>Mantener decisión sistema</option><option value='2'>Encamisar Eje</option><option value='3'>Metalizar en frío</option>";
                                    forma += "<option value='4'>Cambiar eje</option><option value='5'>Aplicar pegamento</option><option value='6'>Rectificar eje</option></select></td>";
                                    forma += "</tr>";
                                    $("#ejes_table").append(forma);
                                    planoCartesiano(2000);
                                    horizontalLines();
                                    verticalLines();
                                    ejesPlano();
                                    $("#info_serial").html(objFull.serial);
                                    $("#info_volts").html(objFull.infoSurge[4]);
                                    $("#info_tag").html(objFull.infoSurge[1]);
                                    $("#info_rpm").html(objFull.infoSurge[5]);
                                    $("#info_location").html(objFull.infoSurge[2]);
                                    $("#info_power").html(objFull.infoSurge[6]);
                                    $("#info_manufacturer").html(objFull.infoSurge[3]);
                                    $("#info_acdc").html(objFull.infoSurge[9]);
                                    $("#info_date").html(objFull.date);
                                    $("#info_project").html(objFull.infoSurge[0]);
                                    $("#info_desc").html(objFull.infoSurge[14]);
                                    $("#info_stage").html(objFull.infoSurge[15]);
                                    $("#info_operator").html(objFull.infoSurge[16]);
                                    $("#ohm12").html(objFull.infoSurge[17]);
                                    $("#ohm23").html(objFull.infoSurge[18]);
                                    $("#ohm13").html(objFull.infoSurge[19]);
                                    $("#info_delta").html(objFull.infoSurge[20]);
                                    if (objFull.infoSurge[21] == "30")
                                    $("#info_init_megger").html("Meg. @.5min.");
                                    else
                                    $("#info_init_megger").html("Meg. @1min.");
                                    $("#info_init_volts").html(objFull.infoSurge[22]);
                                    $("#info_init_amps").html(objFull.infoSurge[23]);
                                    $("#info_init_megs").html(objFull.infoSurge[24]);
                                    if (objFull.infoSurge[25] == "60")
                                    $("#info_end_megger").html("Meg. @1min.");
                                    else
                                    $("#info_end_megger").html("Meg. @10min.");
                                    $("#info_end_volts").html(objFull.infoSurge[26]);
                                    $("#info_end_amps").html(objFull.infoSurge[27]);
                                    $("#info_end_megs").html(objFull.infoSurge[28]);

                                    for (var i=0;i<objFull.surgeValues[0].length-1;i++){
                                      plot(i*0.002,objFull.surgeValues[0][i],(i+1)*0.002,objFull.surgeValues[0][i+1],"#0000ff");
                                    }
                                    for (var i=0;i<objFull.surgeValues[1].length-1;i++){
                                      plot(i*0.002,objFull.surgeValues[1][i],(i+1)*0.002,objFull.surgeValues[1][i+1],"#ff0000");
                                    }
                                    for (var i=0;i<objFull.surgeValues[2].length-1;i++){
                                      plot(i*0.002,objFull.surgeValues[2][i],(i+1)*0.002,objFull.surgeValues[2][i+1],"#00ff00");
                                    }
                                     
                                    
                                }
                            });

                 }
            
            function translateSerie(serie){
                if (serie == 1)
                    return "Rodamiento Rígido de Bolas";
                else if (serie==3)
                    return "Rodamiento Rodillos Cilindricos";
                
            }
            $(document).ready(function(){
                
                $("#balanceo_select").change(function(){
                        if ($("#balanceo_select").val()>0)
                           $("#peso_balanceo").show(500);
                        else
                        $("#peso_balanceo").hide(500);
                });
                $("#new_bearings").click(function(e){
                    if(e.target.nodeName == "A" || e.target.nodeName == "a"){
                            
                            
                            $("#cojinetes_div").height(function (index, height) {
                                        return (height - 1800);
                                    });
                            if ($(e.target).attr('data-id-cojinete') != "0"){
                                var getRequest = '/deleteCojinete/'+$(e.target).attr('data-id-cojinete');
                                $.get(getRequest,function(data){
                                    $(e.target).closest(".cojinetico").remove();
                                });
                            }else 
                                $(e.target).closest(".cojinetico").remove();
                            
                             
                        }
                    else if(e.target.nodeName == "BUTTON" || e.target.nodeName == "button"){
                        alert($(e.target).attr("data-func"));
                    }

                });

                $('#cojinete_select').editableSelect({effects: 'fade'}).on('select.editable-select', function (e, li) {
                    
                   if (li == null)
                          $('#bearing_des').val($('#cojinete_select').val());
                   else
                   {
                        $('#bearing_des').val(li.text());
                        $('#bearing_id').val(li.val());
                        var getRequest = '/bearingInfo/'+$('#bearing_id').val();
                        
                        $.get(getRequest,function(data)     
                        {
                                var cojineteInfo = JSON.parse(data);  
                                
                                $("#table_example input[class='idCojinete']").val(cojineteInfo.id);
                                $("#table_example [class='vel']").html(cojineteInfo.limite_velocidad+" rpm");
                                $("#table_example [class='titulo']").html("Cojinete "+cojineteInfo.designacion+":");
                                $("#table_example [class='designacion']").html(cojineteInfo.designacion);
                                $("#table_example [class='tipo_rodamiento']").html(translateSerie(cojineteInfo.serie));
                                $("#table_example [class='diam_externo']").html(cojineteInfo.diam_externo+".00 mm");
                                $("#table_example [class='diam_interno']").html(cojineteInfo.diam_interno+".00 mm");
                                $("#table_example [class='ancho']").html(cojineteInfo.ancho+".00 mm");
                                if (cojineteInfo.serie == 3)
                                $("#table_example [class='img_serie']").html("<img src='/img/nu.png' style='max-width:120px'>");
                               
                                
                                var tabla = $("#table_example");
                                var medidas = $("#medidas_example")
                                var nCoj = $(".cojinetico").size();
                                var new_table = "<table class='table cojinetico' style='font-size:12px;width:100%'>"+tabla.html()+"</table>";
                                

                                // new_table += "<tr> <table class='table'> <tr> <td><div class='image-preview col-md-3 col-xs-11' id='im"+nCoj+"'><label for='image-upload' id='image-label"+nCoj+"'>Foto Cojinete Viejo</label><input type='file' name='img_cojinete[]' id='image-upload"+nCoj+"' required accept='image/*'/></div>";
                                // new_table += "<div class='image-preview col-md-3 col-xs-11' id='tapa"+nCoj+"'><label for='image-upload' id='image-label-tapa"+nCoj+"'>Foto Midiendo Cuna</label><input type='file' name='img_tapa[]' id='image-upload-tapa"+nCoj+"' required accept='image/*'/></div>";
                                // new_table += "<div class='image-preview col-md-3 col-xs-11' id='eje"+nCoj+"'><label for='image-upload' id='image-label-eje"+nCoj+"'>Foto Midiendo Eje</label><input type='file' name='img_eje[]' id='image-upload-eje"+nCoj+"' required accept='image/*'/></div> </td>";
                                // new_table += "</tr> </table> </tr><tr><td><a class='btn btn-danger'> Eliminar Cojinete</a></td></tr> </table>";
                                
                                
                                $("#cojinetes_div").height(function (index, height) {
                                        return (height + 1250);
                                    });
                                $(".stepContainer").css('height','');
                                $("#new_bearings").append(new_table);
                              /*  $.uploadPreview({
                                    input_field: "#image-upload"+nCoj,
                                    preview_box: "#im"+nCoj,
                                    label_field: "#image-label"+nCoj,
                                    success_callback: function() {
                                        $("#im"+nCoj).removeAttr('height');
                                    }
                                });
                                $.uploadPreview({
                                    input_field: "#image-upload-tapa"+nCoj,
                                    preview_box: "#tapa"+nCoj,
                                    label_field: "#image-label-tapa"+nCoj,
                                    success_callback: function() {
                                        $("#tapa"+nCoj).removeAttr('height');
                                    }
                                });
                                $.uploadPreview({
                                    input_field: "#image-upload-eje"+nCoj,
                                    preview_box: "#eje"+nCoj,
                                    label_field: "#image-label-eje"+nCoj,
                                    success_callback: function() {
                                        $("#eje"+nCoj).removeAttr('height');
                                    }
                                });*/

                        });
                   }
               
            });
                $("#trabajo_electrico").change(function(){
                    if ($("#trabajo_electrico").val() == 0)
                    {
                        $("#mantenimiento_table").hide();
                        $("#rebobinado_table").hide();
                        $("#adicionales_table").hide();
                    }else if ($("#trabajo_electrico").val() == 1){
                        $("#mantenimiento_table").show();
                        $("#rebobinado_table").hide();
                        $("#adicionales_table").show();
                    
                    }else if ($("#trabajo_electrico").val() == 2){
                            $("#mantenimiento_table").hide();
                            $("#rebobinado_table").show();
                            $("#adicionales_table").show();
                        }
                    else{
                        $("#mantenimiento_table").hide();
                            $("#rebobinado_table").hide();
                            $("#adicionales_table").show();
                    }
                    $(".stepContainer").css('height','');
                });
                $("#borrar_puntos").click(function(){
                    loadImages(sources, function(images) { context.drawImage(images.darthVader, 0, 0, 1000/2, 543/2);});
                });
                $("#ver_fallas_comunes").click(function(e){
                      if ( $("#ver_fallas_comunes").html()== "Ver Fallas Mas Comunes en Motores AC")
                        {
                            $("#foto_fallas_comunes").show(100);
                            $("#ver_fallas_comunes").html("Ocultar Fallas Mas Comunes en Motores AC");
                        }else
                        {
                            $("#foto_fallas_comunes").hide(100);
                            $("#ver_fallas_comunes").html("Ver Fallas Mas Comunes en Motores AC");
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
                    $("#fotos_desarme4").click(function(e){
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
                                $("#fotos_desarme").html("<table id='fotos' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";
                                    
                                    forma = "<tr class='fotica'> <td><img src="+ obj[i].foto+" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'><div style='margin:10px' class='text-center'>";
                                    forma += "<a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor="+id_motor+">Eliminar Parte </a></div>";
                                    forma += "</td> <td style='width:60%'><span>Parte a describir:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea>";
                                    forma += "<span>Acci&oacute;n a Realizar:</span><select name='accion["+obj[i].id+"]' class='form-control'><option value='0' "+ch(0,obj[i].accion)+">No hacer Nada</option>";
                                    forma += "<option value='1' "+ch(1,obj[i].accion)+">Limpieza </option><option value='2' "+ch(2,obj[i].accion)+">Reemplazo </option><option value='3' "+ch(3,obj[i].accion)+">Reparacion </option></select>  </td> </tr>";
                                    $("#fotos").append(forma);
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
                              //if (myDropzone.files.length > 0 )
                                              
                                      myDropzone2.processQueue(); 
                                      
                                   
                         });
                         this.on("addedfile", function(file) {
                             //alert("file uploaded");
                         });
                         
                         this.on("complete", function(file) {
                        if (file.accepted){
                            myDropzone2.removeFile(file);
                        }
                            
                         });
                         this.on("processing", function() {
                             //  this.options.autoProcessQueue = true;
                        });
                        
           
                         this.on("success", function(file,response) {  
                             myDropzone2.processQueue.bind(myDropzone2);
                             console.log(response); 
                                $("#fotos_desarme2").html("<table id='fotos2' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";
                                    forma = "<tr class='fotica'> <td><img src="+ obj[i].foto+" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'><div style='margin:10px' class='text-center'>";
                                        forma += "<a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor="+id_motor+">Eliminar Parte </a></div>";
                                        forma += "</td> <td style='width:60%'><span>Parte a describir:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                        forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea>";
                                       
                                    $("#fotos2").append(forma)
                                        
                                }
                                $(".stepContainer").css('height','');
                                 
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
                                    forma += "</td> <td style='width:60%'><span>Parte a describir:</span><input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'> "+obj[i].descripcion+"</textarea></td></tr>";
                                    $("#fotos").append(forma);
                                    $(".stepContainer").css('height','');
                                }
                            });
                            
                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 };
                 Dropzone.options.myDropzone4 = {
                     autoProcessQueue: true,
                     uploadMultiple: true,
                     maxFiles: 4,
                     maxFilesize : 39,
                     parallelUploads: 4,
                     acceptedFiles: ".jpeg,.jpg,.png,.gif",
                     addRemoveLinks: true, 
                     headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                     
                     init: function() {
                         var submitBtn = document.querySelector("#submit-all4");
                         myDropzone4 = this;
                         submitBtn.addEventListener("click", function(e){   
                              e.preventDefault();
                              e.stopPropagation();
                              myDropzone4.processQueue(); 
                         });
                        
                         this.on("complete", function(file) {
                            if (file.accepted){
                                myDropzone4.removeFile(file);
                            }
                         });
                         this.on("success", function(file,response) {  
                            
                             myDropzone4.processQueue.bind(myDropzone4);
                             console.log(response); 
                             var id_motor = $("#id_motor").val();
                                $("#fotos_desarme4").html("<table id='fotos' class='table table-bordered'> </table>");
                                var obj = JSON.parse(response);
                                for (var i=0; i<obj.length; i++)
                                {
                                    if (obj[i].titulo == null)
                                    obj[i].titulo = "";
                                    if (obj[i].descripcion == null)
                                    obj[i].descripcion = "";                   

                                    forma = "<tr class='fotica'><td><img src='"+ obj[i].foto+"' class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>";
                                    forma += "<div style='margin:10px' class='text-center'><a class='btn-sm btn-danger' data-id-foto='"+obj[i].id+"' data-id-motor='"+id_motor+"'>Eliminar Parte </a>";
                                    forma += "</div></td><td style='width:60%'><span> Posición: (Carga / Opuesto / Thrust / etc.)</span>";
                                    forma += "<input type='text' class='form-control' name='titulo["+obj[i].id+"]' value='"+obj[i].titulo+"'>";
                                    forma += "<span> Descripci&oacute;n:</span><textarea class='form-control' name='descripcion["+obj[i].id+"]'>"+obj[i].descripcion+"</textarea></td></tr>";

                                    $("#fotos").append(forma);
                                   
                                }
                                $(".stepContainer").css('height','');
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
                    $("#resumen_form").submit();
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
                        url: "/saveDiagnostico1",
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
                    CKEDITOR.instances.descripcion_falla.updateElement();
                    var $inputs = $form.find("input, select, button, textarea");
                    
                    var serializedData = $form.serialize();
                    $inputs.prop("disabled", true);
                    request = $.ajax({
                        url: "/saveDiagnostico2",
                        type: "post",
                        data: serializedData
                    });
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked! paso 2");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error("The following error occurred: "+ textStatus, errorThrown);
                    });
                    request.always(function () {
                        // Reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                }
                else if (stepnumber == 3){
                    var $form = $("#my-dropzone3");
                    CKEDITOR.instances.desc_bobinado.updateElement();
                    var canvas = document.getElementById('bobinado_canvas');
                    var dataURL = canvas.toDataURL();
                    
                    $("#bobinado_puntos").val(dataURL);
                    var $inputs = $form.find("input, select, button, textarea");
                    
                    var serializedData = $form.serialize();
                    $inputs.prop("disabled", true);
                    request = $.ajax({
                        url: "/saveDiagnostico3",
                        type: "post",
                        data: serializedData
                    });
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked! paso 3");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error("The following error occurred: "+ textStatus, errorThrown);
                    });
                    request.always(function () {
                        // Reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                } else if (stepnumber == 4){
                    
                     var $form = $("#my-dropzone4-a");
                    $("input").css('background','#ffffff');                    
                    if(!$form[0].checkValidity()) {
                        $("input:invalid").css('background','#fbb7c5');                        
                        alert("Faltan datos de cojinete")
                        return false;
                    }else
                    {
                        
                        
                        var $inputs = $form.find("input, select, button, textarea");
                        
                        var serializedData = $form.serialize();
                        $inputs.prop("disabled", true);
                        request = $.ajax({
                            url: "/saveDiagnostico4",
                            type: "post",
                            data: serializedData
                        });
                        request.done(function (response, textStatus, jqXHR){
                            // Log a message to the console
                            console.log("Hooray, it worked! paso 3");
                        });

                        // Callback handler that will be called on failure
                        request.fail(function (jqXHR, textStatus, errorThrown){
                            // Log the error to the console
                            console.error("The following error occurred: "+ textStatus, errorThrown);
                        });
                        request.always(function () {
                            // Reenable the inputs
                            $inputs.prop("disabled", false);
                        });   
                    }
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
            $('#wizard').smartWizard({
                onLeaveStep:leaveAStepCallback,
                onFinish:onFinishCallback
            });


});
    </script>

   
@endsection