<div class="x_panel">
    <div class="x_title">
          <h2>Informacion del Cliente<small>Ingrese Informacion del Cliente</small></h2>
          <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
    </div> <!--x title -->
    <div class="x_content">
                <br />
                 <!--<form class="form-horizontal form-label-left input_mask">-->
              <div class="form-group">
                     
                     <label for="cliente" class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                   
                    <select name="id_cliente" class="form-control text-uppercase" id="clienteSelect">
                          @foreach ($clientes as $cliente)
                                  @if($cliente->id_cliente == $id_cliente)
                                         <option value="{{$cliente->id_cliente}}" selected>{{$cliente->cliente}}</option>                                                                         
                                  @else
                                   <option value="{{$cliente->id_cliente}}">{{$cliente->cliente}}</option>
                                  @endif
                           @endforeach
                    </select>
                            <a href="/clientes/create" class="btn btn-info btn-xs" style="margin-top:10px">Agregar Nuevo Cliente </a>
                     </div><!--columna -->
              </div><!--form group -->
              <div class="form-group">
                     
                     <label for="yearlabel" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Orden:</label>
                      <div class="col-md-3 col-sm-3 col-xs-6">                       
                               <input type="text" value="{{$newYear}}" class="form-control text-uppercase" placeholder="2M19" id="year" name="year" required >
                      </div> <!--columna -->
                      <div class="col-md-6 col-sm-6 col-xs-6`">                        
                             <input type="text" name="os" value="{{$newOs}}" class="form-control col-md-" placeholder="0001" id="newOs" required>
                      </div> <!--columna -->
              </div><!--form group -->
               <div class="form-group">
                       
                       <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Ingreso: </label>
                       <div class="col-md-9 col-sm-9 col-xs-12"> 
                              
                                  <div class='input-group date' id='datetimepicker1' >
                                      <input type='text' class="form-control" name='dateIngreso' required/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              
                      </div>
                </div><!--form group -->
               
                <div class="form-group">
                        <label for="comentarios" class="control-label col-md-3 col-sm-3 col-xs-12">Comentarios del Cliente:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">    
                              <textarea name="trabajoARealizar" id="" class="form-control col-md-" placeholder="Rebobinado.." required></textarea>
                        </div><!--columna -->
                </div><!--form group -->
                <div class="form-group">
                            
                            <label for="contacto" class="control-label col-md-3 col-sm-3 col-xs-12">Contacto:</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                @if ($id_cliente != 0)
                                <!--  {{Form::text('contacto',$selectedClient->contacto,['id'=>'id_contactoTXT','class'=>'form-control text-uppercase','placeholder'=>'Nombre de Contacto','required'=>'required'])}}   -->
                                     <select name="contactoTXT" id="contactoTXT" class="form-control" required>
                                           @foreach($selectedClient->contactos as $contacto)
                                              <option value="{{$contacto->id}}">{{$contacto->contacto}} </option>                                                                              
                                           @endforeach
                                     </select>
                                @else
                                <select name="contactoTXT" id="contactoTXT" class="form-control" required>
                                       
                                  </select>
                                @endif
                          </div><!--columna -->
                </div><!--form group -->
                <div class="form-group">
                            
                            <label for="sendemail" class="control-label col-md-3 col-sm-3 col-xs-12">Enviar Correo</label>
                             <div class="col-md-6 col-sm-6 col-xs-6">
                                  No <input name="enviar_os" type="checkbox" class="js-switch"  checked=""/> Si
                             </div> <!--columna -->                                                    
                </div><!--form group -->
                <div class="form-group">
                            {{Form::label('trabajos','Telefono Contacto:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                  @if ($id_cliente != 0)
                                        {{Form::text('telefono',$selectedClient->telefono,['id'=>'id_telefonoTXT','class'=>'form-control col-md-','placeholder'=>'Telefono de Contacto','required'=>'required'])}}                           
                                  @else
                                        {{Form::text('telefono','',['id'=>'id_telefonoTXT','class'=>'form-control col-md-','placeholder'=>'Telefono de Contacto','required'=>'required'])}}                           
                                  @endif
                          </div><!--columna -->
                </div><!--form group -->
                <div class="form-group">
                            {{Form::label('trabajos','Email:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                          <div class="col-md-9 col-sm-9 col-xs-12">  
                                @if ($id_cliente != 0)
                                  {{Form::text('email',$selectedClient->email,['id'=>'id_email','class'=>'form-control text-uppercase','placeholder'=>'Nombre de Contacto','required'=>'required'])}}   
                                @else
                                  {{Form::text('email','',['id'=>'id_email','class'=>'form-control text-uppercase','placeholder'=>'email','required'=>'required'])}}   
                                @endif
                          </div><!--columna -->
                </div><!--form group -->
                <div class="form-group">
                            {{Form::label('cotizarlbl','Cotizar o Trabajar?',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                             <div class="col-md-6 col-sm-6 col-xs-6">
                                  Empezar a trabajar <input name="cotizar" type="checkbox" class="js-switch"  checked=""/> Cotizar
                             </div> <!--columna -->                                                    
                </div><!--form group -->
                <div class="form-group">
                            {{Form::label('emergencialbl','Nivel de Emergencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                        <input id="emergencia" class="knob" data-width="100" data-height="120" data-min="0" data-displayPrevious=true data-fgColor="#26B99A" value="3" data-max="8" name="emergencia">
                                        <label id="cobro" style="color:#bb0000;display:none">Este nivel de emergencia tendr&aacute; un cargo adicional</label>
                            </div><!--columna -->
                           
                     </div><!--form group -->
    </div> <!--x content -->
</div>  <!--x panel -->