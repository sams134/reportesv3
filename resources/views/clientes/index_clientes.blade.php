@extends('layouts.internal')
@section('content')

<div class="container body ">
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

            <div class="well">
                  <a href="/clientes/create" class="btn btn-primary">Agregar Cliente</a><BR>
                    <div class="">
                      
                        
                        {!! Form::open(['action' => 'ClientesController@findLike','method'=>'POST','class'=>'col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search']) !!}
                        
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Busque Cliente" name="nombre_cliente">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="default">Bucar</button>
                          </span>
                        </div>
                         {!! Form::close() !!}
                     
                    </div>
                   



                    <BR>
                      <BR>


            </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CLIENTES <small>Listado general</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="width:40px">#</th>
                          <th style="width:60%">Cliente</th>
                          <th>Operaciones</th>
                        </tr>
                      </thead>
                        <tbody>
                          
                          @if(count($clientes)>0)
                          @foreach($clientes as $cont=>$cliente)
                              <tr>
                                
                                  <td><a href="/dashboard"> {{($clientes->currentPage()-1)*$clientes->perpage()+$cont+1}}</a></td>
                              <td><a href="/clientes/{{$cliente->id_cliente}}" class="text-uppercase">{!!$cliente->cliente!!}</a></td>
                                  
                                  
                                  <td>
                                      
                                  <a href="/clientes/{{$cliente->id_cliente}}" class="btn btn-primary btn-xs float-right"><i class="fa fa-list"></i> Ver Motores</a>
                                      <a href="/motores/{{$cliente->id_cliente}}/create" class="btn btn-success btn-xs float-right"><i class="fa fa-cog"></i> Agregar Motor</a>
                                  </td>
                                    
                              </tr>
                          @endforeach
                          
                          @else
                              <tr>
                                  <td colspan="5">NO HAY CLIENTES</td>
                              </tr>
                          @endif
                          
                        </tbody>
                    </table>
                        {{$clientes->links()}}
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

	
@endsection