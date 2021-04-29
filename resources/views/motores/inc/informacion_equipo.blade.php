<div class="x_panel">
    <div class="x_title">
          <h2>Informacion del Equipo<small>Ingrese datos del equipo</small></h2>
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
                      {{Form::label('Equipolbl','Equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                     
                      <select name="id_tipoequipo" class="form-control text-uppercase" id="id_tipoequipo">
                            <option value="1" selected>Motor</option>
                            <option value="2">Estator</option>
                            <option value="3">Rotor</option>
                            <option value="4">Moto-Reductor</option>
                            <option value="5">Generador</option>
                            <option value="6">Soldadora</option>
                            <option value="7">Transformador</option>
                            <option value="8">Compresor de Refrigeraci&oacute;n</option>
                            <option value="9">Compresor de Aire</option>
                            <option value="10">Bomba Centrifuga</option>
                            <option value="11">Bomba Desplazamiento Positivo</option>
                            <option value="12">Bomba Sumergible</option>
                            <option value="13">Ventilador</option>
                            <option value="14">Bobina</option>
                            <option value="15">Parte Mecanica</option>
                      </select>                        
                      </div><!--columna -->
             </div><!--form group -->
             <div class="form-group">
                      {{Form::label('nombre','Nombre o Area de Equipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                    <div class="col-md-9 col-sm-9 col-xs-12">  
                                  {{Form::text('equipment','',['class'=>'form-control text-uppercase','placeholder'=>'Nombre Equipo-Area (i.e. Bomba Alimentacion - Calderas)'])}}                           
                            
                    </div><!--columna -->
          </div><!--form group -->
              <div class="form-group">
                     {{Form::label('Marcalbl','Marca:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('marca','',['class'=>'form-control text-uppercase','placeholder'=>'Marca'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
              <div class="form-group">
                      {{Form::label('Aplicacionlbl','Aplicacion:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                     {{Form::text('aplicacion','',['class'=>'form-control text-uppercase','placeholder'=>'(Moto-reductor, Bomba, Ventilador, Molino, etc)'])}}                           
                      </div><!--columna -->
               </div><!--form group -->
              <div class="form-group">
                      {{Form::label('Potencia','Potencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-3 col-sm-3 col-xs-12">  
                     {{Form::text('hp','10',['class'=>'form-control col-md-3 col-sm-3 col-xs-12','placeholder'=>'HP/KW','required'=>'required'])}}                           
                     
                      </div><!--columna -->
                      <div class="col-md-6 col-sm-6 col-xs-12">  
                                
                                  Reales <input name="reales" type="checkbox" class="js-switch"  /> Aproximados
                      </div><!--columna -->
                                             
               </div><!--form group -->
              <div class="form-group">
                     {{Form::label('hpkwlbl','HP / Kw:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-3 col-sm-3 col-xs-6">
                               HP <input name="hpkw" type="checkbox" class="js-switch"  /> KW                         
                      </div> <!--columna -->                                                    
              </div><!--form group -->
              <div class="form-group">
                     {{Form::label('acdclbl','AC / DC:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-3 col-sm-3 col-xs-6">
                               AC <input name="acdc" type="checkbox" class="js-switch"  /> DC                         
                      </div> <!--columna -->                                                    
              </div><!--form group -->
               <div class="form-group">
                     {{Form::label('rpmlbl','Rpm:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('rpm','',['class'=>'form-control col-md-','placeholder'=>'Rpm'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
              <div class="form-group">
                     {{Form::label('serielbl','Num. Serie:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('serie','',['class'=>'form-control text-uppercase','placeholder'=>'No. Serie'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
               <div class="form-group">
                     {{Form::label('modelolbl','Num. de Modelo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('modelo','',['class'=>'form-control text-uppercase','placeholder'=>'Modelo'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
               <div class="form-group">
                     {{Form::label('voltajelbl','Voltaje(s):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('voltaje','',['class'=>'form-control col-md-','placeholder'=>'230/460'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
              <div class="form-group">
                     {{Form::label('amperajeslbl','Amperaje(s):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                    {{Form::text('amperajes','',['class'=>'form-control col-md-','placeholder'=>'amps'])}}                           
                     </div><!--columna -->
              </div><!--form group -->
              <div class="form-group">
                      {{Form::label('Framelbl','Frame:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                     {{Form::text('frame','',['class'=>'form-control text-uppercase','placeholder'=>'frame'])}}                           
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('hzlbl','Frecuencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                     {{Form::text('hz','',['class'=>'form-control col-md-','placeholder'=>'hz'])}}                           
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('pflbl','Factor de Potencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                       {{Form::text('pf','',['class'=>'form-control col-md-','placeholder'=>'pf'])}}                           
                      </div><!--columna -->
                </div><!--form group -->
                <div class="form-group">
                            {{Form::label('efflbl','Eficiencia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-9 col-sm-9 col-xs-12">  
                             {{Form::text('eff','',['class'=>'form-control col-md-','placeholder'=>'Nom. Eff.'])}}                           
                            </div><!--columna -->
                      </div><!--form group -->
                      <div class="form-group">
                                  {{Form::label('efflbl','Enclosure:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                  <div class="col-md-9 col-sm-9 col-xs-12">  
                                  <select class="form-control" name="id_enclosure">
                                              <option value="1">TEFC</option>
                                              <option value="2">OPEN</option>
                                              <option value="3">WPI</option>
                                              <option value="4">WPII</option>
                                              <option value="5">TEAAC</option>
                                              <option value="6">TENV</option>
                                  </select>
                                  </div><!--columna -->
                       </div><!--form group -->
                <div class="form-group">
                      {{Form::label('faseslbl','Fases:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                      <select class="form-control" name="phases">
                                  <option value="0">N/A</option>
                                  <option value="1">Mono-Fásico</option>
                                  <option value="3" selected>Tri-Fásico</option>
                                  
                      </select>
                      </div><!--columna -->
                 </div><!--form group -->
              <br>
             
    </div> <!--x content -->
</div>  <!--x panel --> 