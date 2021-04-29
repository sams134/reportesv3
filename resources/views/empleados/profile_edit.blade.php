@extends('layouts.internal')
@section('content')
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
                    <h2>Perfil de Empleado <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                          <div class="col-md-3 col-xs-12 text-center">
                              <img src="{{$user->foto()}}" style="max-width:100%" class="img-thumbnail img-responsive">
                              <div class="bottom" style="margin-top:20px"> 
                                <a class="btn btn-info" id="changeFoto">Cambiar Foto </a>
                                
                                    <input type="file" class="form-control" id="file" style="display:none" accept="image/*" name="file">
                                    

                              </div>
                          </div>
                          <div class="col-md-9 col-xs-12">
                          <h1> {{$user->name}}</h1>
                          <b> {{$user->tipoEmpleado()}} </b> <br>
                          <span> {{$user->infoUser->puesto}}</span>
                          <br><br>
                          <div class="well profile-view col-md-10 col-xs-10"> 
                                {!! Form::open(['action' => ['UsuariosController@update',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'foto-form']) !!}
                                {{Form::hidden('_method','PUT')}}
                                
                                <h2> Informacion de Empleado</h2>
                                <br>
                                <br>
                                <table class="table">
                                <tr><td> Nombre </td><td> <input type="text" class="form-control" value="{{$user->infoUser->nombre}}" name="nombre"> </td></tr>
                                <tr><td> Segundo Nombre </td><td> <input type="text" class="form-control" value="{{$user->infoUser->segundo_nombre}}" name="segundo_nombre"> </td></tr>
                                <tr><td> Apellido </td><td> <input type="text" class="form-control" value="{{$user->infoUser->apellido}}" name="apellido"> </td></tr>
                                <tr><td> Segundo Apellido </td><td> <input type="text" class="form-control" value="{{$user->infoUser->segundo_apellido}}" name="segundo_apellido"> </td></tr>
                                
                                <tr><td> Fecha Nacimiento </td><td>
                                <input type="hidden" id="picker" value="{{$user->infoUser->fecha_nacimiento}}">
                                        <div class='input-group date' id='datetimepicker1' >
                                                <input type='text' class="form-control" name='fecha_nacimiento'/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                 </td></tr>
                                <tr><td> Dpi </td><td> <input type="text" class="form-control" value="{{$user->infoUser->dpi}}" name="dpi"> </td></tr>
                                <tr><td> IGSS </td><td> <input type="text" class="form-control" value="{{$user->infoUser->igss}}" name="igss"> </td></tr>
                                
                                <tr><td> Domicilio </td><td> <input type="text" class="form-control" value="{{$user->infoUser->domicilio}}" name="domicilio"> </td></tr>
                                <tr><td> Telefono </td><td> <input type="text" class="form-control" value="{{$user->infoUser->telefono}}" name="telefono"> </td></tr>
                                <tr><td> Estado Civil </td>
                                          <td>
                                                <select class="form-control" name="estado_civil">
                                                <option value="1" {{$user->infoUser->estado_civil==1?"selected":""}}> Soltero </option>
                                                     <option value="2" {{$user->infoUser->estado_civil==2?"selected":""}}> Casado </option>
                                                     <option value="3" {{$user->infoUser->estado_civil==3?"selected":""}}> Divorciado </option>
                                                     <option value="4" {{$user->infoUser->estado_civil==4?"selected":""}}> Viudo </option>
                                                </select>
                                               
                                         </td></tr>
                                <tr><td> Conyugue </td><td> <input type="text" class="form-control" value="{{$user->infoUser->conyugue}}" name="conyugue"> </td></tr>
                                
                                <tr><td> Metodo de Pago </td><td>
                                     
                                     <select class="form-control" name="activo">
                                            <option value="1" {{$user->infoUser->activo==1?"selected":""}}>Pago Semanal (Sueldo y Bonificaciones) Con Cheque </option>
                                            <option value="2" {{$user->infoUser->activo==2?"selected":""}}>Pago Semanal (Sueldo)  y Bonificaciones (Quincenal) Con Cheque</option>
                                            <option value="3" {{$user->infoUser->activo==3?"selected":""}}>Pago Quincenal (Sueldo)  y Bonificaciones (Semanal) Con Cheque</option>
                                            <option value="4" {{$user->infoUser->activo==4?"selected":""}}>Pago Quincenal (Sueldo)  y Bonificaciones (Quincenal) Con Cheque</option>
                                            <option value="5" {{$user->infoUser->activo==5?"selected":""}}>Pago Semanal (Sueldo y Bonificaciones) Con Transferencia</option>
                                            <option value="6" {{$user->infoUser->activo==6?"selected":""}}>Pago Quincenal (Sueldo)  y Bonificaciones (Semanal) Con Transferencia</option>
                                            <option value="7" {{$user->infoUser->activo==7?"selected":""}}>Pago Quincenal (Sueldo)  y Bonificaciones (Quincenal) Con Transferencia</option>
                                     </select>
                                </td></tr>
                                <tr><td> Banco </td><td> <input type="text" class="form-control" value="{{$user->infoUser->banco}}" name="banco"> </td></tr>
                                <tr><td> Cuenta </td><td> <input type="text" class="form-control" value="{{$user->infoUser->no_cuenta}}" name="cuenta"> </td></tr>
                                </table>
                                <button type="submit" class="btn btn-success">Guardar Nueva Informacion </button>
                                {!! Form::close() !!}
                          </div>
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
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript">
          $(document).ready(function(){
              $("#changeFoto").click(function(){
                  $("#file").click();
              });
              $("#file").change(function(){
                   $("#foto-form").submit();
              });
          });    
    </script>
    

    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
 <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
 <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
 
    <script type="text/javascript">
        $(function () {
            
            var my_date = $('#picker').val();
            my_date = my_date.replace(/-/g, "/"); 
          var d = new Date(my_date);
            
          $('#datetimepicker1').datetimepicker({'date':d, 'format': 'DD/MM/YYYY'});
            
            
        });
    </script>
@endsection