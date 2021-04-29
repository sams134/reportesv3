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
              @include('inc.titulo')

           

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2 class="text-uppercase">{!!$cliente->cliente!!} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="well col-sm-6 col-lg-6 col-xs-12">
                          <h3 class="text-center">Datos del Cliente</h3>                          
                            <table class="table ">
                                <tr>
                                        <td>Cliente </td>
                                        <td>{!!$cliente->cliente!!}</td>
                                </tr>
                                <tr>
                                        <td>Razon Social </td>
                                        <td>{!!$cliente->infoCliente->razon_social!!}</td>
                                </tr>
                                <tr>
                                        <td>Nit</td>
                                        <td>{!!$cliente->infoCliente->nit!!}</td>
                                </tr>
                                <tr>
                                        <td>Direccion Fiscal</td>
                                        <td>{!!$cliente->infoCliente->direccion_fiscal!!}</td>
                                </tr>
                                <tr>
                                                <td>Direccion Planta</td>
                                                <td>{!!$cliente->infoCliente->direccion_planta!!}</td>
                                        </tr>
                                <tr>
                                        <td>Ubicacion</td>
                                        <td>{!!$cliente->ciudad!!}, {!!$cliente->pais!!}</td>
                                </tr>                               
                            </table>
                            <div class="well">
                                    <h2> Informacion del Cliente </h2>
                                    {!! $cliente->infoCliente->comentarios!!}
                            </div>
                            
                            <div>
                                    
                                    {!!Form::open(['action'=> ['ClientesController@destroy',$cliente->id_cliente],'method'=>'POST'])!!}
                                        {!!Form::hidden('_method','DELETE')!!}   
                            <a href="/motores/{!!$cliente->id_cliente!!}/create" class="btn btn-primary"> Agregar Equipo </a>
                                        <a href="/clientes/{!!$cliente->id_cliente!!}/edit" class="btn btn-info">Editar cliente</a>
                                        @if (count($cliente->motores)==0)
                                                {!!Form::submit('Borrar Cliente',['class'=>'btn btn-danger'])!!}
                                        @else
                                           <br>
                                          <small> *Si desea borrar el cliente primero debe de eliminar todos sus motores</small>
                                        @endif
                                  {!!Form::close()!!}
                                    
                            </div>
                      </div> <!-- well -->
                      <div class="col-sm-6 col-lg-6 col-xs-12">
                                <div class="tile-stats col-sm-12 col-lg-12 col-xs-12">
                                    <div class="icon"><i class="fa fa-folder"></i>
                                    </div>
                                <div class="count">{!!count($cliente->motores)!!}</div>
        
                                    <h3>Equipos Ingresados a reparacion</h3>
                                    <p>Desde el a&ntilde;o 2019</p>
                                </div>
                                <div class="tile-stats col-sm-12 col-lg-12 col-xs-12">
                                                <div class="icon"><i class="fa fa-wrench"></i>
                                                </div>
                                            <div class="count">{!!count($cliente->motores)!!}</div>
                    
                                                <h3>Equipos en Proceso</h3>
                                                <p>Ordenes Activas Actualmente</p>
                                            </div>
                                
                                <div class="tile-stats col-sm-12 col-lg-12 col-xs-12">
                                        <h3>Tendencia de equipos recibidos</h3>
                                        <h2>Promedio: 5 al mes</h2>
                                        <span class="sparky" style="width:200px">
                                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                        </span>
                                 </div>
                      </div>
                      

                      <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                        <div class="x_title">
                                                <h2 class="text-uppercase">Contactos</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                                </ul>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                                <table class="table table-striped table-hover">
                                                                @if (count($cliente->contactos)>0)
                                                                        @foreach ($cliente->contactos as $contacto)
                                                                                <tr>
                                                                                        <td> {!!$contacto->contacto!!} </td>
                                                                                        <td> {!!$contacto->puesto!!} </td>
                                                                                        <td> {!!$contacto->telefono!!} </td>
                                                                                        <td> {!!$contacto->email!!} </td>
                                                                                </tr>
                                                                        @endforeach
                                                                @endif
                                                </table>
                                         </div>
                                </div>
                      </div>



                        <table class="table">
                                <thead>
                                        <th>OS </th>
                                        <th>Potencia </th>
                                        <th> Rpm </th>
                                        <th> Fecha Ingreso </th>
                                        <th> Edit </th>
                                </thead>
                                @if(count($cliente->motores)>0)
                                   @foreach($cliente->motores as $motor)
                                     <tr> 
                                         <td><a href="/motores/{!!$motor->id_motor!!}"> {!!$motor->year!!}-{!!$motor->os!!}</a> </td>
                                         <td> {!!$motor->hp!!} </td>
                                         <td> {!!$motor->rpm!!} </td>
                                         <td> {!!date("d-m-Y", strtotime($motor->fecha_ingreso))!!} </td>
                                         <td> </td>
                                     </tr>
                                    @endforeach
                                @else
                                        <tr>
                                        <td colspan="4"> No hay Equipos</td>
                                        </tr>
                                @endif
                        </table>

                  </div> <!-- x content -->
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

<script src="{!!asset('vendors/jquery/dist/jquery.min.js')!!}"></script>
<script src="{!!asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')!!}"></script> 
 <script type="text/javascript">
    $(".sparky").sparkline([70,22,32,27,5,36,7,8,9,11,51,12], {
        type: 'line',
        type: 'line',
        width: '100%',
        height: '140',
        lineColor: '#26B99A',
        fillColor: 'rgba(223, 223, 223, 0.57)',
        lineWidth: 2,
        spotColor: '#26B99A',
        minSpotColor: '#26B99A'
			});
</script>
	
@endsection