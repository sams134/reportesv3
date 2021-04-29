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
                  
            @if(Auth::user()->activo != 0)

            <div class="col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>BUSQUEDA DE MOTORES </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                         </div>
                         <div class="x_content">
                                <form class="col-md-10 col-sm-10 col-xs-10 form-group" style="text-align:center" method="GET" action="/search">
                                    <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Busque OS o Cliente" name="look">
                                            <span class="input-group-btn">
                                                      <button class="btn btn-default" type="button" onclick="submit()"> <i class="fa fa-search"> </i></button>
                                                  </span>
                                          </div>
                                </form>
                         </div> 
                    </div>
            </div>
            <div class="col-sm-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>BUSQUEDA DE MOTORES POR DATOS PLACA </h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                         </div>
                         <div class="x_content">
                          {!! Form::open(['action' => 'MotoresController@searchAdvance','method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
                                    <div class="form-group">
                                            {{Form::label('nit','No. Serie:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                           <div class="col-md-9 col-sm-9 col-xs-12">
                                              {{Form::text('serie','',['class'=>'form-control','placeholder'=>'No Serie'])}}
                                           </div>
                                         </div>
                                    <div class="form-group">
                                        {{Form::label('nit','Modelo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            {{Form::text('modelo','',['class'=>'form-control','placeholder'=>'Modelo'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            {{Form::label('nit','Marca:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                {{Form::text('marca','',['class'=>'form-control','placeholder'=>'Marca'])}}
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            {{Form::label('nit','Potencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                {{Form::text('hp','',['class'=>'form-control','placeholder'=>'Hp/Kw'])}}
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('nit','Cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="cliente" id="" class="form-control">
                                              <option value="0">Todos los clientes</option>
                                              @foreach ($clientes as $cliente)
                                                  <option value="{{$cliente->id_cliente}}">{{$cliente->cliente}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                </div>
                                    <button type="submit" class="btn btn-success">Buscar OS</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    {!! Form::close() !!}
                         </div>
                         
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>BUSQUEDA DE MOTORES POR RANGO DE POTENCIA </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                      {!! Form::open(['action' => 'MotoresController@searchPower','method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
                                <div class="form-group">
                                        {{Form::label('nit','Potencia Mayor a:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          {{Form::text('minHp','',['class'=>'form-control','placeholder'=>'Hp mayor a:'])}}
                                       </div>
                                     </div>
                                <div class="form-group">
                                    {{Form::label('nit','Potencia Menor a:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {{Form::text('maxHp','',['class'=>'form-control','placeholder'=>'Potencia menor a:'])}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('nit','Cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="cliente2" id="" class="form-control">
                                          <option value="0">Todos los clientes</option>
                                          @foreach ($clientes as $cliente)
                                              <option value="{{$cliente->id_cliente}}">{{$cliente->cliente}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Buscar OS</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                {!! Form::close() !!}
                     </div>
                    
                </div>
        </div>
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ORDENES ACTIVAS POR TECNICO </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                    @foreach ($tecnicos as $tecnico)
                        <div class="col-lg-6 col-md-12" style="text-align:left;margin-bottom:10px">
                                <a href="warroom/viewMotors/{{$tecnico->id}}">
                                  <b>{{$tecnico->name}}</b>
                                  <img src="{{$tecnico->foto}}" alt="{{$tecnico->name}}" class="thumbnail" style=" margin:0px;border:1px solid #666;">
                                </a>
                        </div>
                    @endforeach
                 </div>
                 
            </div>
    </div>
            @else
              <h1> Usuario no activo </h1>
              <p> Debe de solicitar activar a este usuario. </p>
            @endif
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('inc.footer')
        <!-- /footer content -->
      </div>
    </div>

	
@endsection