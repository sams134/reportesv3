@extends('layouts.internal')
@section('content')
<style>
  .fotodiv{
    width:180px;
    height:120px;
    background:#fff;
    border:1px solid #ccc;
    position:absolute;
    top:0%;
    left:10;
    display: none;
  }
  .fotodiv img{
    max-width: 170px;
    margin-left: auto;
    margin-right: auto;
    display: block;
  }
</style>
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
            @if (Auth::user()->userType <=3)
            <div class="well">
                <a href="/motores/create" class="btn btn-app"><i class="fa fa-sign-in"></i> Ingresar Nuevo Equipo</a> 
             </div>
           @endif
          
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ordenes de Servicio</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >

                    <p>Listado de Ordenes de servicio ordenadas por fecha de ingreso.</p>

                    <!-- start project list -->
                    <table class="table table-striped projects table-hover" id="motores_table">
                      <thead>
                        <tr>
                          <th style="width: 10%">OS</th>
                          <th style="width: 25%">Cliente</th>
                          <th>Potencia</th>
                          <th>Tecnicos Asignados</th>
                          <th>Progreso</th>
                          @if (Auth::user()->userType <=3)
                              <th style="width: 20%">#Acciones</th>
                          @endif
                          
                        </tr>
                      </thead>
                      <tbody style="">
                        @if(count($motores)>0)
                            @foreach($motores as $motor)
                            <tr id="{{$motor->id_motor}}">
                              <td><a href="/motores/{{$motor->id_motor}}" class="text-uppercase text-underline">{{$motor->year}}-{{$motor->os}}</a>
                                <br> <span style="color:dodgerblue;font-size:10px;cursor:pointer" data-func="preview">Ver Foto</span>
                              </td>
                                  
                                  <td><span class="text-uppercase"><a href="/motores/{{$motor->id_motor}}"> {{$motor->cliente->cliente}}</a>  </span></td>
                                  <td><span class="text-uppercase"> 
                                    @if($motor->infoMotor != null)
                                      {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                                    @endif
                                    {{$motor->hp}} 
                                    {{$motor->hpkw==1?"Kw":"Hp"}} 
                                  </span></td>
                                  <td>
                                       <ul class="list-inline">
                                         @foreach($motor->asignaciones as $asignacion)
                                          <li>
                                          <img src="{{$asignacion->usuario->foto}}" class="avatar" alt="Avatar">
                                          </li>
                                          @endforeach
                                         
                                          <li>
                                          <a href="/asignar/{{$motor->id_motor}}" class="btn btn-success btn-xs"><i class="fa fa-male"></i> Asignar...</a>
                                          </li>
                                        </ul>

                                  </td>
                                   <td class="project_progress">
                                      
                                    {{$motor->get_id_estado()}}
                                     @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer;font-size:10px;color:#6789ef">Cambiar Estado</a>
                                                  @endif    
                                        {{--  @if ($motor->id_estado <= 8)
                                            <div class="progress progress_sm">
                                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$motor->getProgreso()}}"></div>
                                                </div>
                                                {{$motor->get_id_estado()}}
                                                <span style="font-size:10px"> {{$motor->getProgreso()}}% Completo 
                                                  @if (Auth::user()->userType <= 3 || Auth::user()->userType == 8)
                                                <a href="/motores/cambiarEstado/{{$motor->id_motor}}" style="text-decoration: underline;margin:0px;cursor:pointer;font-size:10px;color:#6789ef">Cambiar Estado</a>
                                                  @endif     
                                                </span>
                                         @else
                                            {{$motor->get_id_estado()}}
                                         @endif --}}
                                          
                                  </td>
                                  @if (Auth::user()->userType <=3)
                                  <td>
                                      <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                                      
                                      <form action="{{url()->action('MotoresController@destroy',['id_motor'=>$motor->id_motor])}}" method="post" class="pull-right">
                                          
                                          <input type="hidden" name="method" value="DELETE">
                                          <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</button>
                                        </form>
                                      
                                  <a href="/motores/{{$motor->id_motor}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                  </td>
                                  @endif
                               </tr>
                            @endforeach
                             {!!$motores->render()!!}
                        @else
                           <tr>
                              <td colspan="5">No hay Motores que mostrar</td>
                           </tr>
                        @endif
                      
                      
                      </tbody>
                    </table>
                    <!-- end project list -->
                    <div id="fotodiv" class="fotodiv"></div>
                  </div>
                </div>
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
{{-- Modals --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Estado del equipo</h4>
            </div>
            <div class="modal-body">
            
              <table class="table">
                <tr>
                  <td style="text-align:right"> Estado</td>
                  <td>
                       <select name="" id="" class="form-control">
                            <option value="0"> No Autorizado, tramitar devolucion</option>
                            <option value="1"> Pendiente de diagnostico</option>
                            <option value="2"> Diagnosticado, pendiente de autorizacion</option>
                            <option value="3"> Autorizado Parcial, ver autorizaciones</option>
                            <option value="4"> Autorizado Completamente</option>
                            <option value="5"> Retrasado</option>
                            <option value="6"> Garantia</option>
                            <option value="7"> Emergencia</option>
                            <option value="8"> Alta Emergencia</option>
                            <option value="9"> Finalizado</option>
                            <option value="10"> En traslado</option>
                            <option value="11"> Entregado sin Reparacion</option>
                            <option value="12"> EPF</option>
                            <option value="13"> Aceptacion, pendiente facturacion</option>
                            <option value="14"> Facturado Pendiente pago</option>
                            <option value="15"> Pagado</option>
                       </select>
                  </td>
                </tr>
              </table>
             
            
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_modal1">Guardar Asignacion</button>
            </div>

          </div>
        </div>
      </div><!--end of tecnicos modal -->

<script>
   $(document).ready(function(){
    $("#motores_table").mouseover(function(e){
       var element = $(e.target);
       if ($(element).attr("data-func") == "preview")
         {       
            var getRequest = '/photoPreview/'+$(e.target).closest("tr").attr('id');
            $.get(getRequest,function(data){
              $("#fotodiv").css('top',e.pageY-300);
              $("#fotodiv").css('left',e.pageX-300);
              $("#fotodiv").html("<img src='"+data.foto+"' class='preview'>")
              $("#fotodiv").show();
              console.log(data);
            });
      }
      else
      $("#fotodiv").hide();
    });
    $("#motores_table").mouseleave(function(e){
      $("#fotodiv").hide();
    });

    
   });
</script>
	
@endsection

