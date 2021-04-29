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
                                {!! Form::open(['action' => 'UsuariosController@changePhoto', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'foto-form']) !!}
                                    <input type="file" class="form-control" id="file" style="display:none" accept="image/*" name="file">
                                    {!! Form::close() !!}

                              </div>
                          </div>
                          <div class="col-md-9 col-xs-12">
                          <h1> {{$user->name}}</h1>
                          <b> {{$user->tipoEmpleado()}} </b> <br>
                          <span> {{$user->infoUser->puesto}}</span>
                          <br><br>
                          <div class="well profile-view col-md-10 col-xs-10"> 
                                <h2> Informacion de Empleado</h2>
                                <br>
                                <br>
                                <table class="table">
                                <tr><td> Nombre </td><td> {{$user->infoUser->nombre}} </td></tr>
                                <tr><td> Segundo Nombre </td><td> {{$user->infoUser->segundo_nombre}} </td></tr>
                                <tr><td> Apellido </td><td> {{$user->infoUser->apellido}} </td></tr>
                                <tr><td> Segundo Apellido </td><td> {{$user->infoUser->segundo_apellido}} </td></tr>
                                
                                <tr><td> Fecha Nacimiento </td><td> {{$user->infoUser->fecha_nacimiento}} </td></tr>
                                <tr><td> Dpi </td><td> {{$user->infoUser->dpi}} </td></tr>
                                <tr><td> IGSS </td><td> {{$user->infoUser->igss}} </td></tr>
                                
                                <tr><td> Domicilio </td><td> {{$user->infoUser->domicilio}} </td></tr>
                                <tr><td> Telefono </td><td> {{$user->infoUser->telefono}} </td></tr>
                                <tr><td> Estado Civil </td><td> {{$user->estadoCivil()}} </td></tr>
                                <tr><td> Conyugue </td><td> {{$user->infoUser->conyugue}} </td></tr>
                                
                                <tr><td> Metodo de Pago </td><td> {{$user->metodoPago()}} </td></tr>
                                <tr><td> Banco </td><td> {{$user->infoUser->banco}} </td></tr>
                                <tr><td> Cuenta </td><td> {{$user->infoUser->no_cuenta}} </td></tr>
                                </table>
                                <a href="/editMyProfile" class="btn btn-primary">Editar Informacion de Usuario </a>
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
	
@endsection