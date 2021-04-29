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
        <br>
              @include('inc.messages') <br>
              @include('inc.titulo') <br>

            
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>EMPLEADOS <small>Listado general</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                        <table class="table table-stripped" id="tabla_empleados">
                            <thead>
                                <th> #</th>
                                <th> Usuario</th>
                                <th> Nombre</th>
                                <th> Departamento</th>
                                <th> Activo</th>
                                <th  class="pull-center"> Herramientas</th>
                            </thead>
                            @foreach($users as $cont=>$user)
                                <tr>
                                <td>{{$cont+1}}</td>
                                <td> {{$user->username}}</td>
                                <td> {{$user->name}}</td>
                                <td> {{$user->tipoEmpleado()}} </td>
                                <td > 
                                      @if($user->activo ==1)
                                      <a class="btn-xs btn-success" data-func="habilitar" data-user="{{$user->id*8+1000}}"> Activo  </a>
                                      @else
                                      <a class="btn-xs btn-danger" data-func="habilitar" data-user="{{$user->id*8+1000}}"> Inactivo  </a>
                                      @endif
                                </td>
                                <td class="pull-center"> 
                                    <a class="btn-sm btn-primary" data-func="edit"> Editar</a>
                                
                                    
                                </td>
                                </tr>
                            @endforeach
                        </table>

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
        

          $("#tabla_empleados").click(function(evt){
               if (event.target.nodeName == 'a' || event.target.nodeName == 'A')
               {
                  if ($(event.target).attr("data-func") == 'habilitar') 
                  {
                    
                    var getRequest = '/activateuser/'+$(evt.target).attr('data-user');
                    var clicked = event.target; 
                        $.get(getRequest,function(data)
                        {
                              
                              if (data == "0"){
                                 $(clicked).removeClass("btn-success");
                                 $(clicked).addClass("btn-danger");
                                 $(clicked).html("Inactivo");
                              }
                              else
                              {
                                $(clicked).removeClass("btn-danger");
                                 $(clicked).addClass("btn-success");
                                 $(clicked).html("Activo");
                              }
                        });
                  }
               }
          });
});
</script>
	
@endsection