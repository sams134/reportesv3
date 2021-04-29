@extends('layouts.new_internal')
@section('content')

<div class="col-sm-12">
        <div class="x_panel">
                
                <div class="x_title">
                        <h2>Estado de Equipo </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">

                        {!! Form::open(['action' => 'MotoresController@saveEstado','method'=>'POST','files'=>'true','class'=>'form-horizontal form-label-left input_mask']) !!}
                        <div class="form-group" >
                                {{Form::label('material_lbl','Nombre Material:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                   
                                  <select name="id_estado_select" id="id_estado_select" class="form-control">
                                        <option value="-1" {{$motor->id_estado=="-1"?"selected":""}}>No Asignado</option>
                                        <option value="0" {{$motor->id_estado==0?"selected":""}}> No Autorizado, tramitar devolucion</option>
                                        <option value="1" {{$motor->id_estado==1?"selected":""}}> Pendiente de diagnostico</option>
                                        <option value="2" {{$motor->id_estado==2?"selected":""}}> Diagnosticado, pendiente de autorizacion</option>
                                        <option value="3" {{$motor->id_estado==3?"selected":""}}> Autorizado Parcial, ver autorizaciones</option>
                                        <option value="4" {{$motor->id_estado==4?"selected":""}}> Autorizado Completamente</option>
                                        <option value="5" {{$motor->id_estado==5?"selected":""}}> Retrasado</option>
                                        <option value="6" {{$motor->id_estado==6?"selected":""}}> Garantia</option>
                                        <option value="7" {{$motor->id_estado==7?"selected":""}}> Emergencia</option>
                                        <option value="8" {{$motor->id_estado==8?"selected":""}}> Alta Emergencia</option>
                                        <option value="9" {{$motor->id_estado==9?"selected":""}}> Finalizado</option>
                                        @if (Auth::user()->userType <=3)
                                            <option value="10" {{$motor->id_estado==10?"selected":""}}> En traslado</option>
                                            <option value="11" {{$motor->id_estado==11?"selected":""}}> Entregado sin Reparacion</option>
                                            <option value="12" {{$motor->id_estado==12?"selected":""}}> EPF</option>   
                                        @endif
                                        @if (Auth::user()->userType <=3)
                                            <option value="13" {{$motor->id_estado==13?"selected":""}}> Aceptacion, pendiente facturacion</option>
                                            <option value="14" {{$motor->id_estado==14?"selected":""}}> Facturado Pendiente pago</option>
                                            <option value="15" {{$motor->id_estado==15?"selected":""}}> Pagado</option>
                                        @endif   
                                  </select>
                               </div>
                        </div>
                        <br>
                        {{-- no autorizado --}}
                        <div class="x_panel" style="margin:10px;{{$motor->id_estado==0?'':'display:none'}}" id="panel_no_autorizado" >
                                <div class="x_title">
                                        <h2 style="font-size:16px">INFORMACION </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                         
                                        </ul>
                                        <div class="clearfix"></div>
                                </div>
                            <div class="x_content">
                                    Agregue informacion de porqu&eacute; no fue reparado el equipo.
                                    {!!Form::textarea('comentarios','',['class'=>'form-control','id'=>'coment','placeholder'=>'Explique razones'])!!}
                            </div>
                        </div>
                        {{-- no autorizado --}}
                    <div class="x_panel" style="margin:10px;{{$motor->id_estado==2?'':'display:none'}}" id="panel_esperando_autorizacion" >
                                <div class="x_title">
                                        <h2 style="font-size:16px">INFORMACION DIAGNOSTICO </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                         
                                        </ul>
                                        <div class="clearfix"></div>
                                </div>
                            <div class="x_content">
                                   @if($motor->diagnostico->finalizado == 1)
                                      <table class="table table-bordered">
                                          <tr>
                                              <td style="width:30%;text-align:center">
                                                  <a href="/motores/pdfDiagnostico/{{$motor->id_motor}}" >
                                                      <img src="/img/pdf.png" alt="" style="max-width:150px;" ><br>
                                                      Ver PDF
                                                  </a>
                                              </td>
                                              <td>
                                                  <table class="table table-striped table-hover">
                                                      <tr>
                                                          <td>Diagnostico Realizado por:</td>
                                                          <td>{{$motor->diagnostico->diagnosticador->name}}</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Fecha Diagnostico:</td>
                                                            <td>{{date("d-m-Y", strtotime($motor->diagnostico->fecha_fin_diagnostico))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trabajo Electrico a realizar:</td>
                                                            <td>{{$motor->diagnostico->trabajoElectrico()}}</td>
                                                        </tr>
                                                  </table>
                                              </td>
                                          </tr>
                                      </table>
                                   @elseif($motor->diagnostico_img != "")
                                        <table class="table table-bordered">
                                                <tr>
                                                    <td style="width:30%;text-align:center">
                                                    <a href="{{$motor->diagnostico_img}}" >
                                                        <img src="{{$motor->diagnostico_img}}" alt="" style="max-width:150px;" id="img_diagnostico"><br>
                                                            Ver Diagnostico
                                                    </a><br>
                                                    <button class="btn btn-primary cambioDiagnostico">Cambiar Foto</button>
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <td>Diagnostico Realizado por:</td>
                                                                <td>{{$motor->diagnosticado_por}}</td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                   @elseif($motor->diagnostico_img == "")
                                   <table class="table table-bordered">
                                        <tr>
                                            <td style="width:30%;text-align:center">
                                            <a href="/img/noimage.png" >
                                                <img src="/img/noimage.png" alt="" style="max-width:150px;" id="img_diagnostico">
                                                <input type="file" name="diagnostico_img" style="display:none" id="diagnostico_file">
                                            </a><br>
                                            <button class="btn btn-primary cambioDiagnostico">Agregar Foto Diagnostico</button>
                                            </td>
                                            <td>
                                                <table class="table table-striped table-hover">
                                                    <tr>
                                                        <td>Diagnostico Realizado por:</td>
                                                        <td>{{$motor->diagnosticado_por}}</td>
                                                    </tr>
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                      </table>
                                   @endif
                            </div>
                        </div>
                        <div class="x_panel" style="margin:10px;{{$motor->id_estado==3?'':'display:none'}}" id="panel_autorizado_parcial" >
                            <div class="x_title">
                                    <h2 style="font-size:16px">Autorizacion Parcial </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                     
                                    </ul>
                                    <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                    Agregue informacion de que cosas estan autorizadas y cuales no.
                                    {!!Form::textarea('parcial','',['class'=>'form-control','id'=>'coment','placeholder'=>'Explique razones'])!!}
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                        <hr>
                        <div style="display:block;text-align:center">
                                <button type="submit" class="btn btn-primary">Guardar Estado</button>
                        </div>
                    
                    
                    {!! Form::close() !!}

                </div>
        </div>
</div>
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
$('#coment').ckeditor();
$(document).ready(function(){
    function hide_panels()
    {
        $("#panel_no_autorizado").hide();
        $("#panel_esperando_autorizacion").hide();   
    }
    $(".cambioDiagnostico").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#diagnostico_file").click();
        
    });
    function readURL(input) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_diagnostico').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
            $('.imagepreview').attr('src', '/img/noimage.png');
        }
    }
    $("#diagnostico_file").change(function(){
        readURL(this);
    })
    $("#id_estado_select").change(function(){
        var estado = $("#id_estado_select").val();
        hide_panels();
        if (estado==0)
           $("#panel_no_autorizado").show();
        if (estado==2)
            $("#panel_esperando_autorizacion").show();   
        if (estado==3)
            $("#panel_autorizado_parcial").show();
    })
});
</script>
@endsection