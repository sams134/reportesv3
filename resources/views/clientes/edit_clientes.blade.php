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

           

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Cliente <small>Porfavor ingrese la informacion completa</small></h2>
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
                        {!! Form::open(['action' => ['ClientesController@update',$cliente->id_cliente],'method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
                        {{Form::hidden('_method','PUT')}}
                      

                      <div class="form-group">
                         {{Form::label('cliente','Cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('cliente',$cliente->cliente,['class'=>'form-control','placeholder'=>'Nombre del Cliente','required'=>'required'])}}
                        </div>
                      </div>
                      <div class="form-group">
                         {{Form::label('razon_social','Razon Social:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('razon_social',$cliente->infoCliente->razon_social,['class'=>'form-control','placeholder'=>'Razon social del cliente','required'=>'required'])}}
                        </div>
                      </div>
                      <div class="form-group">
                         {{Form::label('nit','Nit:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('nit',$cliente->infoCliente->nit,['class'=>'form-control','placeholder'=>'Nit del Cliente','required'=>'required'])}}
                        </div>
                      </div>
                      <div class="form-group">
                         {{Form::label('direccion_fiscal','Direccion Fiscal:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('direccion_fiscal',$cliente->infoCliente->direccion_fiscal,['class'=>'form-control','placeholder'=>'Direccion Fiscal del Cliente'])}}
                        </div>
                      </div>
                      <div class="form-group">
                          {{Form::label('direccion_planta','Dirección Planta:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                         <div class="col-md-9 col-sm-9 col-xs-12">
                            {{Form::text('direccion_planta',$cliente->infoCliente->direccion_planta,['class'=>'form-control','placeholder'=>'Direccion de ubicacion de los equipos'])}}
                         </div>
                       </div>
                      <div class="form-group">
                         {{Form::label('pais','Pais:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('pais',$cliente->pais,['class'=>'form-control','required'=>'required'])}}
                        </div>
                      </div>
                      <div class="form-group">
                         {{Form::label('ciudad','Ciudad:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           {{Form::text('ciudad',$cliente->ciudad,['class'=>'form-control','required'=>'required'])}}
                        </div>
                      </div>
                      <div class="form-group">
                          {{Form::label('ciudad','Informacion del cliente:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                         <div class="col-md-9 col-sm-9 col-xs-12">
                            {!!Form::textarea('infoCliente',$cliente->infoCliente->comentarios,['class'=>'form-control','id'=>'coment','placeholder'=>'Toda la informacion adicional que se requiera guardar'])!!}
                         </div>
                       </div>
                     
                    
                       <div class="title">
                            
                       </div>
                       <div class=" well">
                          <h2> Gu&iacute;a de Contactos</h2>
                          <a class="btn-sm btn-primary display:block" id="addContact"> Agregar Contacto </a> <br> <br>
                          <table class="table" id="contactos_table">
                            @if (count($cliente->contactos)>0)
                               @foreach($cliente->contactos as $contacto)
                                  <tr>
                                      <td> 
                                          {{Form::text('contacto[]',$contacto->contacto,['class'=>'form-control','placeholder'=>'Contacto'])}}                                    
                                      </td>
                                      <td> 
                                          {{Form::text('telefono[]',$contacto->telefono,['class'=>'form-control','placeholder'=>'Telefono'])}}
                                          
                                      </td>
                                      <td> 
                                          {{Form::text('puesto[]',$contacto->puesto,['class'=>'form-control','placeholder'=>'Puesto'])}}
                                      </td>
                                        <td> 
                                          
                                        <input type="email" name="email[]" class="form-control" placeholder="Email" value="{{$contacto->email}}">                                    
                                      </td>
                                    </td>
                                      <td> 
                                          <a class="btn btn-danger" name="delContact"> <i class="fa fa-minus-circle"> Borrar </i></a>                               
                                    </td>
                                  </tr>
                              @endforeach
                            @else
                               <tr>
                                    <td> 
                                        {{Form::text('contacto[]','',['class'=>'form-control','placeholder'=>'Contacto'])}}                                    
                                    </td>
                                    <td> 
                                        {{Form::text('telefono[]','',['class'=>'form-control','placeholder'=>'Telefono'])}}
                                        
                                    </td>
                                    <td> 
                                        {{Form::text('puesto[]','',['class'=>'form-control','placeholder'=>'Puesto'])}}
                                    </td>
                                      <td> 
                                          <input type="email" name="email[]" class="form-control" placeholder="Email">                                    
                                    </td>
                                  </td>
                                    <td> 
                                        <a class="btn btn-danger" name="delContact"> <i class="fa fa-minus-circle"> Borrar </i></a>                               
                                  </td>
                                </tr>
                            @endif
                          </table>
                          
                       </div>
                     
                      

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          
						   <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Guardar Cliente</button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  <!--  </form> -->
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('#coment').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
     <script type="text/javascript">
          $(document).ready(function(){
            $('#addContact').click(function(){
                $('#contactos_table').append('<tr> <td> {{Form::text("contacto[]","",["class"=>"form-control","placeholder"=>"Contacto"])}} </td><td>{{Form::text("telefono[]","",["class"=>"form-control","placeholder"=>"Telefono"])}}</td><td> {{Form::text("puesto[]","",["class"=>"form-control","placeholder"=>"Puesto"])}}</td><td><input type="email" name="email[]" class="form-control" placeholder="Email"></td><td><a class="btn btn-danger" name="delContact"> <i class="fa fa-minus-circle"> Borrar </i></a></td></tr>');
                
            });
            $("#contactos_table").click(function(event){
              var element = $(event.target);
              if (event.target.nodeName == 'I' || event.target.nodeName == 'A')
              element.closest("tr").remove();
               
            });
          });
     </script>
    

	
@endsection