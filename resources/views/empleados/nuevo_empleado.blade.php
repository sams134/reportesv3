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
              @include('inc.titulo');

           
              {!! Form::open(['action' => 'UsuariosController@store','method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar un Nuevo Empleado <small>Porfavor ingrese la informacion completa</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                     <!--<form class="form-horizontal form-label-left input_mask">-->
                        
                        {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-3 control-label">Usuario</label>
    
                                <div class="col-md-9">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nombre</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">Confirmar Password</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Tipo-de-Usuario" class="col-md-3 control-label">Tipo de Usuario</label>

                            <div class="col-md-9">
                                
                                <select class="form-control" name="userType">
                                    <option value="1">Desarrollo</option>
                                    <option value="2">Gerencia</option>
                                    <option value="3">Administracion</option>
                                    <option value="4">Bodega</option>
                                    <option value="5">Servicios Internos</option>
                                    <option value="6" selected>Tecnicos</option>
                                    <option value="7">Ayudantes</option>
                                </select>
                            </div>
                        </div>

                    
                  <!--  </form> -->
                  </div>
                </div>
              </div>  <!-- col -->
             


              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informacion del Empleado <small>Porfavor ingrese la informacion completa</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                     <!--<form class="form-horizontal form-label-left input_mask">-->
                    
                  <!--  </form> -->
                  </div>
                </div>
              </div>  <!-- col -->

            </div> <!--row -->

            <div class="row">
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                        
                         <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Guardar Cliente</button>
                      </div>
                    </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- /page content -->

        <!-- footer content -->
        @include('inc.footer')
        <!-- /footer content -->
      </div>
    </div>

    
    

	
@endsection