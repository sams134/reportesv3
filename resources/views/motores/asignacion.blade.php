@extends('layouts.new_internal')
@section('content')

<div class="col-sm-12">
    <div class="x_panel">
            <div class="x_title">
                    <h2>Personal de Produccion</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form action=""></form>
                <div class="x_panel">
                    {!! Form::open(['action' => 'MotoresController@saveAsignacion','method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
                <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                     <table>
                       <tr>
                            <td style="width:40%">Asignar como:</td>
                            <td> 
                                <select name="id_estado" id="" class="form-control">
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
                </div>
                <table class="table" style="font-size:10px" id="personal">
                   <tr>
                     <td colspan="3">
                       <span style="font-size:20px;font-weight:bold">TECNICOS</span>
                     </td>
                   </tr>
                     @foreach ($tecnicos as $tecnico)

                         <tr>
                              <td style="width:30%;text-align:center">
                              <img src="{{$tecnico->foto}}" alt=""  style="max-width:95%;padding:4px;border:1px solid #ddd;border-radius:4px"><br>
                              <span style="font-weight:bold"> {{$tecnico->name}}</span><br>
                              @php($selected = false)
                              @foreach ($asignaciones as $asignacion)
                                  
                                  @if ($asignacion->id_user == $tecnico->id)
                                       Asignar <input name="asignar[]" type="checkbox" class="js-switch users" data-id-user="{{$tecnico->id}}" checked />
                                       <input type="hidden" value="{{$tecnico->id}}" name="id_user[]" class="id-hidden">
                                       @php($selected = true)
                                  @endif
                              @endforeach
                              @if (!$selected)
                                   Asignar <input name="asignar[]" type="checkbox" class="js-switch users" data-id-user="{{$tecnico->id}}" />
                                  <input type="hidden" value="0" name="id_user[]" class="id-hidden">
                              @endif
                              </td>
                              <td style="width:90%">
                                  <span style="font-weight:bold"> {{$tecnico->name}}</span>
                                
                                      <table class="table table-hover table-striped" >
                                                @if (count($tecnico->getMotoresNoAutorizados()) >0)
                                                    <tr>
                                                        <td style="width:40%"> Motores No autorizados</td>
                                                        <td> {{count($tecnico->getMotoresNoAutorizados())}}</td>
                                                        <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                  </tr>
                                                @endif
                                                @if (count($tecnico->getMotoresDiagnostico()) > 0)
                                                    <tr>
                                                        <td style="width:40%"> Motores Pendientes de Diagnostico</td>
                                                        <td> {{count($tecnico->getMotoresDiagnostico())}}</td>
                                                        <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                  </tr>
                                                @endif
                                              @if (count($tecnico->getMotoresDiagnosticoPendienteAutorizacion()) >0)
                                                    <tr>
                                                        <td style="width:40%"> Motores Diagnosticados Pendientes de Autorizacion</td>
                                                        <td> {{count($tecnico->getMotoresDiagnosticoPendienteAutorizacion())}}</td>
                                                        <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                    </tr>
                                              @endif
                                              @if (count($tecnico->getMotoresAutorizadoParcial())>0)
                                                  <tr>
                                                      <td style="width:40%"> Motores Autorizados Parcialmente</td>
                                                      <td> {{count($tecnico->getMotoresAutorizadoParcial())}}</td>
                                                      <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                  </tr>
                                              @endif
                                              @if (count($tecnico->getMotoresAutorizados())>0)
                                                  <tr>
                                                      <td style="width:40%"> Motores Autorizados</td>
                                                      <td> {{count($tecnico->getMotoresAutorizados())}}</td>
                                                      <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                  </tr>
                                              @endif
                                            @if (count($tecnico->getMotoresRetrasado())>0)
                                                <tr>
                                                    <td style="width:40%"> Motores Retrazados</td>
                                                    <td> {{count($tecnico->getMotoresRetrasado())}}</td>
                                                    <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                </tr>
                                            @endif
                                            @if (count($tecnico->getMotoresGarantia())>0)
                                                <tr>
                                                    <td style="width:40%"> Motores en Garantia</td>
                                                    <td> {{count($tecnico->getMotoresGarantia())}}</td>
                                                    <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                </tr>
                                            @endif
                                            @if (count($tecnico->getMotoresEmergencia())>0)
                                                <tr>
                                                    <td style="width:40%"> Motores en Emergencia</td>
                                                    <td> {{count($tecnico->getMotoresEmergencia())}}</td>
                                                    <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                </tr>
                                            @endif
                                            @if (count($tecnico->getMotoresAutorizados())>0)
                                                <tr>
                                                    <td style="width:40%;font-weight:bold"> Motores en Alta Emergencia</td>
                                                    <td style="font-weight:bold"> {{count($tecnico->getMotoresAutorizados())}}</td>
                                                    <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                </tr>
                                            @endif
                                      </table>
                                 
                              </td>
                         </tr>
                     @endforeach

                     {{-- AYUDANTES --}}

                     <tr>
                        <td colspan="3">
                          <span style="font-size:20px;font-weight:bold">PERSONAL DE APOYO</span>
                        </td>
                      </tr>
                        @foreach ($ayudantes as $tecnico)
                            <tr>
                                 <td style="width:30%;text-align:center">
                                 <img src="{{$tecnico->foto}}" alt=""  style="max-width:95%;padding:4px;border:1px solid #ddd;border-radius:4px"><br>
                                 <span style="font-weight:bold"> {{$tecnico->name}}</span><br>
                                 
                                 @php($selected = false)
                                 @foreach ($asignaciones as $asignacion)
                                     
                                     @if ($asignacion->id_user == $tecnico->id)
                                          Asignar <input name="asignar[]" type="checkbox" class="js-switch users" data-id-user="{{$tecnico->id}}" checked />
                                          <input type="hidden" value="{{$tecnico->id}}" name="id_user[]" class="id-hidden">
                                          @php($selected = true)
                                     @endif
                                 @endforeach
                                 @if (!$selected)
                                      Asignar <input name="asignar[]" type="checkbox" class="js-switch users" data-id-user="{{$tecnico->id}}" />
                                     <input type="hidden" value="0" name="id_user[]" class="id-hidden">
                                 @endif
                                 
                                 </td>
                                 <td style="width:90%">
                                     <span style="font-weight:bold"> {{$tecnico->name}}</span>
                                   
                                         <table class="table table-hover table-striped" >
                                                   @if (count($tecnico->getMotoresNoAutorizados()) >0)
                                                       <tr>
                                                           <td style="width:40%"> Motores No autorizados</td>
                                                           <td> {{count($tecnico->getMotoresNoAutorizados())}}</td>
                                                           <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                     </tr>
                                                   @endif
                                                   @if (count($tecnico->getMotoresDiagnostico()) > 0)
                                                       <tr>
                                                           <td style="width:40%"> Motores Pendientes de Diagnostico</td>
                                                           <td> {{count($tecnico->getMotoresDiagnostico())}}</td>
                                                           <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                     </tr>
                                                   @endif
                                                 @if (count($tecnico->getMotoresDiagnosticoPendienteAutorizacion()) >0)
                                                       <tr>
                                                           <td style="width:40%"> Motores Diagnosticados Pendientes de Autorizacion</td>
                                                           <td> {{count($tecnico->getMotoresDiagnosticoPendienteAutorizacion())}}</td>
                                                           <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                       </tr>
                                                 @endif
                                                 @if (count($tecnico->getMotoresAutorizadoParcial())>0)
                                                     <tr>
                                                         <td style="width:40%"> Motores Autorizados Parcialmente</td>
                                                         <td> {{count($tecnico->getMotoresAutorizadoParcial())}}</td>
                                                         <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                     </tr>
                                                 @endif
                                                 @if (count($tecnico->getMotoresAutorizados())>0)
                                                     <tr>
                                                         <td style="width:40%"> Motores Autorizados</td>
                                                         <td> {{count($tecnico->getMotoresAutorizados())}}</td>
                                                         <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                     </tr>
                                                 @endif
                                               @if (count($tecnico->getMotoresRetrasado())>0)
                                                   <tr>
                                                       <td style="width:40%"> Motores Retrazados</td>
                                                       <td> {{count($tecnico->getMotoresRetrasado())}}</td>
                                                       <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                   </tr>
                                               @endif
                                               @if (count($tecnico->getMotoresGarantia())>0)
                                                   <tr>
                                                       <td style="width:40%"> Motores en Garantia</td>
                                                       <td> {{count($tecnico->getMotoresGarantia())}}</td>
                                                       <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                   </tr>
                                               @endif
                                               @if (count($tecnico->getMotoresEmergencia())>0)
                                                   <tr>
                                                       <td style="width:40%"> Motores en Emergencia</td>
                                                       <td> {{count($tecnico->getMotoresEmergencia())}}</td>
                                                       <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                   </tr>
                                               @endif
                                               @if (count($tecnico->getMotoresAutorizados())>0)
                                                   <tr>
                                                       <td style="width:40%;font-weight:bold"> Motores en Alta Emergencia</td>
                                                       <td style="font-weight:bold"> {{count($tecnico->getMotoresAutorizados())}}</td>
                                                       <td><a href="" class="btn-link">Ver Motores</a> </td>
                                                   </tr>
                                               @endif
                                         </table>
                                    
                                 </td>
                            </tr>
                        @endforeach
                </table>
                <table class="table">
                  <tr>
                    <td style="text-align:center">
                        <button class="btn btn-primary" id="desasignar" type="reset">Desasignar a todos</button>
                         <button class="btn btn-success" type="submit">Guardar Asignacion</button>
                    </td>
                  </tr>
                </table>
                {!! Form::close() !!}
            </div>
    </div>
</div>
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
  $("#desasignar").click(function(){
      $(".users").each(function(index){
        if ($(this).prop("checked"))
           $(this).click();
           $(this).next().next().val(0);  //busca el input hidden dos abajo 
      });
  });
  $("#personal").click(function(event){
    var element = $(event.target);
    if (event.target.nodeName == "SMALL")
      element = $(element).parent("SPAN");
    var id_user = $(element).prev("input").attr("data-id-user");
    $(element).prev("input").prop("checked")
    if (id_user != null){
        if ($(element).prev("input").prop("checked") == true)
            $(element).prev("input").next().next().val(id_user);
        else
           $(element).prev("input").next().next().val(0); //busca el input hidden dos abajo 
    }
    
  })

 
});
</script>

@endsection