<div class="x_panel" >
    <div class="x_title">
          <h2>Informaci&oacute;n de Operaci&oacute;n<small>C&oacute;mo Opera este equipo?</small></h2>
          <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a> </li>
               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
    </div> <!--x title -->
    <div class="x_content" style="display:none;">
                <br />
                 <!--<form class="form-horizontal form-label-left input_mask">-->
              <div class="form-group">
                     {{Form::label('horas','Cantidad de Horas de Operacion al dia',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                            <input class="knob" data-width="100" data-height="120" data-min="0" data-displayPrevious=true data-fgColor="#5472b4" value="8" data-max="24" name="horas_operacion">
                     </div><!--columna -->
                    
              </div><!--form group -->
              <div class="form-group">
                      {{Form::label('voltajes','Voltajes de Operacion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                 <div> 
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                 No se Sabe <input name="knownVolts" type="checkbox" class="js-switch"  /> S&iacute; Se Sabe                      
                                                 <br><br>
                                        </div> <!--columna -->      
                                 </div>
                                 <div class="col-md-2 text-right">
                                        V <sub>a-b</sub> 
                                 </div>
                                 <div class="col-md-10 text-left">
                                        {{Form::text('va','',['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>"Voltaje entre Fase A y B"])}}                           
                                 </div>
                                 <div class="col-md-2 text-right">
                                        V <sub>b-c</sub> 
                                 </div>
                                 <div class="col-md-10 text-left">
                                        {{Form::text('vb','',['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>'Voltaje entre Fase B y C'])}}                           
                                 </div>
                                 <div class="col-md-2 text-right">
                                        V <sub>c-a</sub> 
                                 </div>
                                 <div class="col-md-10 text-left">
                                        {{Form::text('vc','',['id'=>'VoltajeA','class'=>'form-control col-md-5','placeholder'=>"Voltaje entre Fase C y A"])}}                           
                                 </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('amperajes','Amperajes de Operacion',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                 <div class="col-md-12"> 
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                 No se Sabe <input name="knownAmps" type="checkbox" class="js-switch"  /> S&iacute; Se Sabe                      
                                                 <br><br>
                                        </div> <!--columna -->      
                                 </div>
                                 <div class="col-md-2 text-right">
                                         <sub>A</sub> 
                                 </div>
                                 <div class="col-md-10 col-sm-10 text-left">
                                        {{Form::text('ampsA','',['id'=>'AmperajeA','class'=>'form-control col-md-5','placeholder'=>"Amperaje fase A"])}}                           
                                 </div>
                                 <div class="col-md-2 col-sm-2 text-right">
                                         <sub>B</sub> 
                                 </div>
                                 <div class="col-md-10 text-left">
                                        {{Form::text('ampsB','',['id'=>'AmperajeB','class'=>'form-control col-md-5','placeholder'=>'Amperaje Fase B'])}}                           
                                 </div>
                                 <div class="col-md-2 text-right">
                                         <sub>C</sub> 
                                 </div>
                                 <div class="col-md-10 text-left">
                                        {{Form::text('ampsC','',['id'=>'AmperajeC','class'=>'form-control col-md-5','placeholder'=>"Amperaje Fase C"])}}                           
                                 </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('modo_Arranque','Modo de Arranque',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                       <div>
                                              <input type="radio" class="flat" checked="checked" name="iCheckArranque" style="position: absolute; opacity: 0;" value="No se sabe"> No se sabe
                                       </div>
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value=" Arranque Directo"> Arranque Directo
                                       </div>
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Estrella Delta"> Estrella Delta
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Voltaje Reducido"> Voltaje Reducido
                                       </div>  
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Auto-Transformador"> Auto-Transformador
                                       </div>  
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Arrancador Suave"> Arrancador Suave
                                       </div>
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckArranque" style="position: absolute; opacity: 0;" value="Variador de Frecuencia"> Variador de Frecuencia
                                       </div>    
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('vibracion','Vibracion en el equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                        <div>
                                              <input type="radio" class="flat" checked="checked" name="iCheckVibracion" style="position: absolute; opacity: 0;" value="No se sabe"> No se sabe
                                       </div>
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Baja Vibracion"> Baja Vibracion
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Vibracion Normal"> Vibracion Normal
                                       </div>  
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckVibracion" style="position: absolute; opacity: 0;" value="Alta Vibracion"> Alta Vibracion
                                       </div>  
                                           
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {!!Form::label('temperatura',"Temperatura de Operaci&oacute;n: (En Estator)",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                        <div>
                                              <input type="radio" class="flat" checked="checked" name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="No se sabe"> No se sabe
                                       </div>
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Muy Baja"> Muy Baja (Menor a 50&deg; C)
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Baja"> Baja (51 &deg;C a 65 &deg;C)
                                       </div>  
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Normal"> Normal (66 &deg;C a 80 &deg;C)
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Alta"> Alta (81 &deg;C a 95 &deg;C)
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperatura" style="position: absolute; opacity: 0;" value="Muy Alta"> Muy Alta (Mas de 95 &deg;C)
                                       </div>    
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {!!Form::label('temperatura',"Temperatura de Operaci&oacute;n: (En Cojinetes)",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                                        <div>
                                              <input type="radio" class="flat" checked="checked" name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="No se sabe"> No se sabe
                                       </div>
                                       
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Baja"> Baja (41 &deg;C a 60 &deg;C)
                                       </div>  
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Normal"> Normal (60 &deg;C a 70 &deg;C)
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Alta"> Alta (71 &deg;C a 80 &deg;C)
                                       </div> 
                                       <div>
                                              <input type="radio" class="flat"  name="iCheckTemperaturaCoj" style="position: absolute; opacity: 0;" value="Muy Alta"> Muy Alta (Mas de 81 &deg;C)
                                       </div>    
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('trabajos','Comentarios de Operacion:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                
                <div class="col-md-9 col-sm-9 col-xs-12">  
                      {{Form::textarea('comentOperacion','',['class'=>'form-control col-md-','placeholder'=>'Datos importantes de operacion: &#13;&#10;&#13;&#10;-si se dispara al cierto tiempo, &#13;&#10;-si se escucha algun ruido,&#13;&#10;-si utiliza algun tipo de grasa especifica&#13;&#10;-si lo enviaron a otro taller y no funciono '])}}                           
                 </div><!--columna -->
           </div><!--form group -->

              
    </div> <!--x content -->
</div>  <!--x panel --> 