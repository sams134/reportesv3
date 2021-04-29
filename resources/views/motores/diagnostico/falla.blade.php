<h2 class="StepTitle">Causa Raiz de Fallo</h2>
                            <p>
                              Es importante encontrar cual fue la razón real del fallo. Tratar de encontrar cuál o cuáles fueron los factores que desencadenaron el fallo en cuestión. Es importante buscar patrones

                            </p>
                            {!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico2','method'=>'POST','files'=>'true','id' => 'my-dropzone2','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                            <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                            <a class="btn" id="ver_fallas_comunes">Ver Fallas Mas Comunes en Motores AC</a>
                            <img src="/img/fallas2.png" id="foto_fallas_comunes" style="max-width:90%;display:none">

                            <table class="table">
                                    
                                    <tr> 
                                        <td> <h2> Alimentación de Voltaje </h2> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <table class="table table-striped">
                                                        <tr >
                                                        <td class="text-right">  <input name="alto_voltaje" type="checkbox" class="js-switch"  {{$motor->diagnostico->alto_voltaje==1?"checked":""}}/> </td>
                                                            <td > Alto / Bajo Voltaje </td>
                                                            <td class="text-right">  <input name="desfase" type="checkbox" class="js-switch"  {{$motor->diagnostico->desfase==1?"checked":""}}/> </td>
                                                            <td> Desfase </td>
                                                            <td class="text-right">  <input name="pico_voltaje" type="checkbox" class="js-switch"  {{$motor->diagnostico->pico_voltaje==1?"checked":""}}/> </td>
                                                            <td> Pico Voltaje </td>
                                                            
                                                        </tr>
                                                </table>
                                        </td>
                                    </tr>
                                    <tr> <td> <h2> Falla Mecanica </h2> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <table class="table table-striped">
                                                        <tr >
                                                            <td class="text-right">  <input name="desbalance" type="checkbox" class="js-switch"  {{$motor->diagnostico->desbalance==1?"checked":""}}/> </td>
                                                            <td > Desbalance </td>
                                                            <td class="text-right">  <input name="desalineacion" type="checkbox" class="js-switch"  {{$motor->diagnostico->desalineacion==1?"checked":""}}/> </td>
                                                            <td> Desalineacion </td>
                                                            <td class="text-right">  <input name="desajuste" type="checkbox" class="js-switch"  {{$motor->diagnostico->desajuste==1?"checked":""}}/> </td>
                                                            <td> Desajuste en Ejes o Tapaderas </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <input name="rod_inapropiado" type="checkbox" class="js-switch"  {{$motor->diagnostico->rod_inapropiado==1?"checked":""}}/> </td>
                                                                <td > Falla de Cojinete </td>
                                                                <td class="text-right">  <input name="exceso_carga" type="checkbox" class="js-switch"  {{$motor->diagnostico->exceso_carga==1?"checked":""}}/> </td>
                                                                <td> Exceso de Carga Radial / Axial </td>
                                                                <td class="text-right">  <input name="golpe_mecanico" type="checkbox" class="js-switch"  {{$motor->diagnostico->golpe_mecanico==1?"checked":""}}/> </td>
                                                                <td> Golpes o Maltratos </td>
                                                            </tr>
                                                </table>
                                        </td>
                                    </tr>
                                    <tr> <td> <h2> Falla de Lubricación </h2> </td>
                                    </tr>
                                    <tr>
                                        <td>
                                                <table class="table table-striped">
                                                        <tr >
                                                            <td class="text-right">  <input name="falta_lubricacion" type="checkbox" class="js-switch"  {{$motor->diagnostico->falta_lubricacion==1?"checked":""}}/> </td>
                                                            <td > Falta de Lubricación </td>
                                                            <td class="text-right">  <input name="exceso_lubricacion" type="checkbox" class="js-switch"  {{$motor->diagnostico->exceso_lubricacion==1?"checked":""}}/> </td>
                                                            <td> Exceso de Lubricación </td>
                                                            <td class="text-right">  <input name="exceso_contaminacion" type="checkbox" class="js-switch"  {{$motor->diagnostico->exceso_contaminacion==1?"checked":""}}/> </td>
                                                            <td> Exceso de Contaminación </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <input name="falla_sello" type="checkbox" class="js-switch" {{$motor->diagnostico->falla_sello==1?"checked":""}} /> </td>
                                                                <td > Falla de Sistema de Sellado de grasa </td>
                                                                <td class="text-right">  <input name="mala_grasa" type="checkbox" class="js-switch"  {{$motor->diagnostico->mala_grasa==1?"checked":""}}/> </td>
                                                                <td> Grasa Inapropiada</td>
                                                                <td class="text-right">  </td>
                                                                <td>  </td>
                                                                
                                                            </tr>
                                                </table>
                                        </td>
                                    </tr>
                                    <tr> <td> <h2> Potencia </h2> </td></tr>
                                    <tr>
                                        <td>
                                                <table class="table table-striped">
                                                        <tr >
                                                            <td class="text-right">  <input name="sobrecarga" type="checkbox" class="js-switch"  {{$motor->diagnostico->sobrecarga==1?"checked":""}}/> </td>
                                                            <td > Sobre-carga (Atrancado / Motor muy pequeño) </td>
                                                            <td class="text-right">  <input name="falla_ventilacion" type="checkbox" class="js-switch" {{$motor->diagnostico->falla_ventilacion==1?"checked":""}} /> </td>
                                                            <td> Falla de Ventilación </td>
                                                            <td class="text-right">  <input name="pico_amperaje" type="checkbox" class="js-switch"  {{$motor->diagnostico->pico_amperaje==1?"checked":""}}/> </td>
                                                            <td> Pico de Amperaje </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <input name="mal_diseno" type="checkbox" class="js-switch"  {{$motor->diagnostico->mal_diseno==1?"checked":""}}/> </td>
                                                                <td > Mal diseño de fábrica </td>
                                                                <td class="text-right">  <input name="perdida_eficiencia" type="checkbox" class="js-switch"  {{$motor->diagnostico->perdida_eficiencia==1?"checked":""}}/> </td>
                                                                <td> Pérdida de Eficiencia</td>
                                                                <td class="text-right"> <input name="mala_conexion" type="checkbox" class="js-switch"  {{$motor->diagnostico->mala_conexion==1?"checked":""}}/> </td>
                                                                <td> Mala Conexión </td>
                                                        </tr>
                                                </table>
                                        </td>
                                    </tr>
                                    <tr> <td> <h2> Aislamiento </h2> </td></tr>
                                    <tr>
                                        <td>
                                                <table class="table table-striped">
                                                        <tr >
                                                            <td class="text-right">  <input name="corto_humedad" type="checkbox" class="js-switch"  {{$motor->diagnostico->corto_humedad==1?"checked":""}}/> </td>
                                                            <td > Corto a tierra por humedad </td>
                                                            <td class="text-right">  <input name="corto_aislamiento" type="checkbox" class="js-switch"  {{$motor->diagnostico->corto_aislamiento==1?"checked":""}}/> </td>
                                                            <td> Corto a tierra par mal aislamiento </td>
                                                            <td class="text-right">  <input name="corto_vueltas" type="checkbox" class="js-switch"  {{$motor->diagnostico->corto_vueltas==1?"checked":""}}/> </td>
                                                            <td> Corto entre vueltas </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <input name="golpe_bobinado" type="checkbox" class="js-switch" {{$motor->diagnostico->golpe_bobinado==1?"checked":""}} /> </td>
                                                                <td > Golpe en bobinado </td>
                                                                <td class="text-right">  <input name="roze_rotor" type="checkbox" class="js-switch"  {{$motor->diagnostico->roze_rotor==1?"checked":""}}/> </td>
                                                                <td> Roce de rotor</td>
                                                                <td class="text-right"> <input name="corto_cables" type="checkbox" class="js-switch" {{$motor->diagnostico->corto_cables==1?"checked":""}} /> </td>
                                                                <td> Corto circuito en Cables Alimentación </td>
                                                        </tr>
                                                </table>
                                        </td>
                                    </tr>
                                    <tr> <td> <h2> Descripcion de la Falla </h2> </td></tr>
                                    <tr>
                                        <td>
                                        <textarea name="descripcion_falla" id="descripcion_falla">{{$motor->diagnostico->descripcion}}</textarea>
                                        </td>
                                    </tr>
                                </table>

                            <div id="fotos_desarme2" style="overflow-x:auto;">
                                <table class="table table-bordered">
                                    @if (sizeof($motor->fotos)>0)
                                             @foreach($motor->fotos as $foto)
                                                 @if($foto->type==4)
                                                 <tr class='fotica'>
                                                    <td>
                                                    <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                    <div style='margin:10px' class='text-center'>
                                                    <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Parte </a>
                                                    </div>
                                                    </td>
                                                    <td style="width:60%">
                                                             <span> Falla:</span>
                                                    <input type="text" class="form-control" name="titulo[{{$foto->id}}]" value="{{$foto->titulo}}">
                                                            <span> Descripci&oacute;n:</span>
                                                    <textarea class="form-control" name='descripcion[{{$foto->id}}]'>{{$foto->descripcion}}</textarea>
                                                    
                                                          
                                                    </td>
                                                </tr>
 
                                                 @endif
                                             @endforeach
                                     @endif
                                </table>
                           </div>
                            
                            <div class="form-group dz-clickable well">
                                    <div class="dz-default dz-message"><span>Arrastre la primer foto aca y las siguientes en la parte inferior de la pagina</span></div>
                                            
                                    </div><!--form group -->
                                    <div class="dropzone-previews"></div>
                                    <button type="hidden" class="btn btn-success" id="submit-all2" style="display:inline">Guardar Nuevo Equipo</button>
                                    <button type="submit" class="btn btn-warning">Probar Post</button>
                            {!! Form::close() !!}  <!--  </form> -->