<div class="x_panel">
    <div class="x_title">
          <h2>Inventario de Ingreso<small>Conteo Inicial de partes</small></h2>
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
                     {{Form::label('cliente','Acople o polea:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                     <div class="col-md-9 col-sm-9 col-xs-12">  
                            
`                                                    <div>
                                  <input type="radio" class="flat"  name="iCheckAcopple" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                           </div>
                           <div>
                                  <input type="radio" class="flat" checked="" name="iCheckAcopple" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                           </div> 
                           <div>
                                  <input type="radio" class="flat" checked="" name="iCheckAcopple" style="position: absolute; opacity: 0;" value="3"> No
                           </div>
                     </div><!--columna -->
                    
              </div><!--form group -->
              <div class="form-group">
                      {{Form::label('cliente','Caja de Conexiones:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckCaja" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckCaja" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckCaja" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
                     
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('cliente','Tapa Caja de Conexiones:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckTapa" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckTapa" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckTapa" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->
               
               <div class="form-group">
                      {{Form::label('cliente','Difusor',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckDifusor" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckDifusor" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckDifusor" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('cliente','Ventilador',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckVentilador" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckVentilador" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckVentilador" style="position: absolute; opacity: 0;"value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->

               <div class="form-group">
                      {{Form::label('cliente','Bornera',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckBornera" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckBornera" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckBornera" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                      {{Form::label('cliente','Cu&ntilde;a',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat"  name="iCheckCuna" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckCuna" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckCuna" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                {{Form::label('cliente','Graseras',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-9 col-sm-9 col-xs-12">  
                      <div>
                             <input type="radio" class="flat"  name="iCheckGrasera" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                      </div>
                      <div>
                             <input type="radio" class="flat"  name="iCheckGrasera" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                      </div> 
                      <div>
                             <input type="radio" class="flat" checked="" name="iCheckGrasera" style="position: absolute; opacity: 0;" value="3"> No
                      </div>
                </div><!--columna -->
                 </div><!--form group -->

                 <div class="form-group">
                      {{Form::label('cliente','Cancamo',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckCancamo" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat"  name="iCheckCancamo" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckCancamo" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
               </div><!--form group -->
               <div class="form-group">
                {{Form::label('cliente','Placa de Datos',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-9 col-sm-9 col-xs-12">  
                      <div>
                             <input type="radio" class="flat" checked="" name="iCheckPlaca" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                      </div>
                      <div>
                             <input type="radio" class="flat"  name="iCheckPlaca" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                      </div> 
                      <div>
                             <input type="radio" class="flat"  name="iCheckPlaca" style="position: absolute; opacity: 0;" value="3"> No
                      </div>
                </div><!--columna -->
            </div><!--form group -->
            <div class="form-group">
                      {{Form::label('cliente','Tornillos Completos',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                      <div class="col-md-9 col-sm-9 col-xs-12">  
                            <div>
                                   <input type="radio" class="flat" checked="" name="iCheckTornillos" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                            </div>
                            <div>
                                   <input type="radio" class="flat"  name="iCheckTornillos" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                            </div> 
                            <div>
                                   <input type="radio" class="flat"  name="iCheckTornillos" style="position: absolute; opacity: 0;" value="3"> No
                            </div>
                      </div><!--columna -->
                  </div><!--form group -->
                  <div class="form-group">
                            {{Form::label('cliente','Capacitor(es)',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-9 col-sm-9 col-xs-12">  
                                  <div>
                                         <input type="radio" class="flat" checked="" name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="1"> Si (buen estado)
                                  </div>
                                  <div>
                                         <input type="radio" class="flat"  name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="2"> Si (Mal estado)
                                  </div> 
                                  <div>
                                         <input type="radio" class="flat"  name="iCheckCapacitores" style="position: absolute; opacity: 0;" value="3"> No
                                  </div>
                            </div><!--columna -->
                        </div><!--form group -->
            <div class="form-group">
                      {{Form::label('trabajos','Comentarios de Inventario:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                
                <div class="col-md-9 col-sm-9 col-xs-12">  
                      {{Form::textarea('comentInventario','',['class'=>'form-control col-md-','placeholder'=>'Partes adicionales que ingresaron o daños específicos',])}}                           
                 </div><!--columna -->
           </div><!--form group -->

              
    </div> <!--x content -->
</div>  <!--x panel --> 