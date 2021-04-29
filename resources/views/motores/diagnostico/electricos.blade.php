<h2 class="StepTitle">Trabajos Electricos</h2>
{!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico3','method'=>'POST','files'=>'true','id' => 'my-dropzone3','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
<input type="hidden" name="id_motor" value="{{$motor->id_motor}}">

<table class="table">
    <tr>
        <td colspan="2"> 
            TRABAJO ELECTRICO A REALIZAR
        </td>
    </tr>
    <tr>
            <td> Trabajo a Realizar </td>
            <td>
                    <select class="form-control" id="trabajo_electrico" name="trabajo_electrico">
                    <option value="0" {{$motor->diagnostico->trabajo_electrico==0?"selected":""}}>No realizar ningún trabajo</option>
                        <option value="1" {{$motor->diagnostico->trabajo_electrico==1?"selected":""}}>Mantenimiento</option>
                        <option value="2" {{$motor->diagnostico->trabajo_electrico==2?"selected":""}}>Re-bobinado</option>
                        <option value="3" {{$motor->diagnostico->trabajo_electrico==3?"selected":""}}>Reparación Parcial</option>                                                    
                    </select>
            </td>
    </tr>
</table>
<table id="mantenimiento_table" class="table" style="{{$motor->diagnostico->trabajo_electrico==1?"display:inline-table":"display:none"}}">
    <tr>
        <td class="text-right" style="width:40%"> Nivel de Contaminacion </td>
        <td> 
            <select name="contaminacion" class="form-control">
                <option value="0" {{$motor->diagnostico->contaminacion==0?"selected":""}}>Completamente Limpio</option>
                <option value="1" {{$motor->diagnostico->contaminacion==1?"selected":""}}>Ligeramente Limpio</option>
                <option value="2" {{$motor->diagnostico->contaminacion==2?"selected":""}}>Poca contaminacion (Solo Polvo)</option>
                <option value="3" {{$motor->diagnostico->contaminacion==3?"selected":""}}>Contaminacion Normal(Polvo y trazas de aceite)</option>
                <option value="4" {{$motor->diagnostico->contaminacion==4?"selected":""}}>Contaminacion Alta </option>
                <option value="5" {{$motor->diagnostico->contaminacion==5?"selected":""}}>Contaminacion Sumamente Alta </option>
            </select>
        </td>
    </tr>
    <tr>
            <td class="text-right"> Modo de Lavado </td>
            <td> 
                <select name="modo_lavado" class="form-control">
                    <option value="0" {{$motor->diagnostico->modo_lavado==0?"selected":""}}>No se Lava</option>
                    <option value="1" {{$motor->diagnostico->modo_lavado==1?"selected":""}}>Solo Elecsol</option>
                    <option value="2" {{$motor->diagnostico->modo_lavado==2?"selected":""}}>Solo Gasolina</option>
                    <option value="3" {{$motor->diagnostico->modo_lavado==3?"selected":""}}>Elecsol y Gasolina</option>
                    <option value="4" {{$motor->diagnostico->modo_lavado==4?"selected":""}}>Agua y Jabon</option>
                    
                </select>
            </td>
    </tr>
    <tr>
            <td class="text-right"> Cuantos ciclos de lavado se necesitaran </td>
            <td> 
                <select name="cantidad_reprocesos" class="form-control">
                    <option value="0" {{$motor->diagnostico->cantidad_reprocesos==0?"selected":""}}>No se Lava</option>
                    <option value="1" {{$motor->diagnostico->cantidad_reprocesos==1?"selected":""}}>1 Ciclo (Lavado Horneado)</option>
                    <option value="2" {{$motor->diagnostico->cantidad_reprocesos==2?"selected":""}}>2 Ciclos (Lavado Horneado)</option>
                    <option value="3" {{$motor->diagnostico->cantidad_reprocesos==3?"selected":""}}>3 Ciclos (Lavado Horneado)</option>
                    <option value="4" {{$motor->diagnostico->cantidad_reprocesos==4?"selected":""}}>4 Ciclos (Lavado Horneado)</option>
                </select>
            </td>
    </tr>
    <tr>
            <td class="text-right"> Se Requiere Re-Aislamiento con Termo-Encogible ? </td>
            <td> 
                    <input type="radio" class="flat"  name="iCheckTermo"  {{$motor->diagnostico->iCheckTermo==1?"checked":""}} value="1"> Si 
                    <input type="radio" class="flat"  name="iCheckTermo"  value="0" {{$motor->diagnostico->iCheckTermo==0?"checked":""}}> No
            </td>
    </tr>
    <tr>
            <td class="text-right"> Se Requiere Cambio de Terminales </td>
            <td> 
                    <input type="radio" class="flat"  name="iCheckTerminales"  value="1" {{$motor->diagnostico->iCheckTerminales==1?"checked":""}}> Si 
                    <input type="radio" class="flat"  name="iCheckTerminales"  value="0" {{$motor->diagnostico->iCheckTerminales==0?"checked":""}}> No
            </td>
    </tr>
    
</table>

<table id="rebobinado_table" class="table" style="{{$motor->diagnostico->trabajo_electrico==2?"display:inline-table":"display:none"}}">
        <tr>
                <td class="text-right" style="width:35%">Es Necesario extraer el nucleo de la carcaza?</td>
                        <td> 
                                <input type="radio" class="flat"  name="iCheckExtraer"  value="1" {{$motor->diagnostico->iCheckExtraer==1?"checked":""}}> Si 
                                <input type="radio" class="flat"  name="iCheckExtraer"  value="0" {{$motor->diagnostico->iCheckExtraer==0?"checked":""}}> No
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Tipo de Carcaza</td>
                        <td> 
                                <select name="tipo_carcaza" class="form-control">
                                        <option value="1" {{$motor->diagnostico->tipo_carcaza==1?"selected":""}}>Hierro Dulce/Colado</option>
                                        <option value="2" {{$motor->diagnostico->tipo_carcaza==2?"selected":""}}>Aluminio</option>
                                        <option value="3" {{$motor->diagnostico->tipo_carcaza==3?"selected":""}}>Acero Inoxidable</option>
                                        <option value="4" {{$motor->diagnostico->tipo_carcaza==4?"selected":""}}>Sin Carcaza - Nucleo Desnudo</option>
                                        
                                    </select>
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Velocidades</td>
                        <td> 
                                <select name="multiples_velocidades" class="form-control">
                                        <option value="0" {{$motor->diagnostico->multiples_velocidades==0?"selected":""}}>1 Velocidad</option>
                                        <option value="1" {{$motor->diagnostico->multiples_velocidades==1?"selected":""}}>2 Velocidades por conexion Dahlander</option>
                                        <option value="2" {{$motor->diagnostico->multiples_velocidades==2?"selected":""}}>2 Velocidades por PAM</option>
                                        <option value="3" {{$motor->diagnostico->multiples_velocidades==3?"selected":""}}>2 Velocidades por Bobinados Separados</option>
                                        <option value="4" {{$motor->diagnostico->multiples_velocidades==4?"selected":""}}>3 Velocidades por (2 por Conexion y 1 por Bobinado)</option>
                                        <option value="5" {{$motor->diagnostico->multiples_velocidades==5?"selected":""}}>Multiples Velocidades por Resistencia</option>
                                        
                                    </select>
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Tipo de Alambre</td>
                        <td> 
                                <select name="tipo_alambre" class="form-control">
                                        <option value="0" {{$motor->diagnostico->tipo_alambre==0?"selected":""}}>Redondo Clase F</option>
                                        <option value="1" {{$motor->diagnostico->tipo_alambre==1?"selected":""}}>Redondo Clase H Ultrashield</option>
                                        <option value="2" {{$motor->diagnostico->tipo_alambre==2?"selected":""}}>Cuadrado Clase F</option>
                                        <option value="3" {{$motor->diagnostico->tipo_alambre==3?"selected":""}}>Otro</option>
                                        
                                    </select>
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Posibles libras de alambre <br>
                <small> Si no puede estimarlas colocar 0 <small>
                </td>
                        <td> 
                        <input type="number" class="form-control" name="libras_alambre" value="{{$motor->diagnostico->libras_alambre}}">
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Es Necesario separar laminaciones ?</td>
                        <td> 
                                <input type="radio" class="flat"  name="iCheckSeparar"  value="1" {{$motor->diagnostico->iCheckSeparar==1?"checked":""}} id="separar"> Si 
                                <input type="radio" class="flat"  name="iCheckSeparar"  value="0" {{$motor->diagnostico->iCheckSeparar==0?"checked":""}} id="noSeparar"> No
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Marque las Zonas Afectadas</td>
                        <td> 
                               <canvas id="bobinado_canvas" width="578" height="280"></canvas>
                        <input type="hidden" name="bobinado_puntos" value="{{$motor->diagnostico->bobinado_puntos}}" id="bobinado_puntos">
                               <div style="block">
                                   <a class="btn-sm btn-danger" id="borrar_puntos"> Borrar Puntos </a>
                               </div> 
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Es Necesario epoxitar ?</td>
                        <td> 
                                <input type="radio" class="flat"  name="iCheckEpoxitar"  value="1" {{$motor->diagnostico->iCheckEpoxitar==1?"checked":""}}> Si 
                                <input type="radio" class="flat"  name="iCheckEpoxitar"  value="0" {{$motor->diagnostico->iCheckEpoxitar==0?"checked":""}}> No
                        </td>
        </tr>
        <tr>
                <td class="text-right" >Cuantas Puntas de Salida tiene el motor</td>
                        <td> 
                                <select name="puntas_salida" class="form-control">
                                        <option value="3" {{$motor->diagnostico->puntas_salida==3?"selected":""}}>3 Puntas</option>
                                        <option value="6" {{$motor->diagnostico->puntas_salida==6?"selected":""}}>6 Puntas</option>
                                        <option value="9" {{$motor->diagnostico->puntas_salida==9?"selected":""}}>9 Puntas</option>
                                        <option value="12" {{$motor->diagnostico->puntas_salida==12?"selected":""}}>12 Puntas</option>
                                        <option value="24" {{$motor->diagnostico->puntas_salida==24?"selected":""}}>24 Puntas</option>
                                        <option value="25" {{$motor->diagnostico->puntas_salida==25?"selected":""}}>Otras</option>
                                    </select>
                        </td>
        </tr>
        <tr>
                <td class="text-right">Complejidad</td>
                        <td> 
                        <input id="complejidad" class="knob" data-width="100" data-height="120" data-min="0" data-displayPrevious=true data-fgColor="#26B99A" value="{{$motor->diagnostico->complejidad}}" data-max="5" name="complejidad">
                        </td>
        </tr>


</table>
<table class="table" id="adicionales_table" style="{{$motor->diagnostico->trabajo_electrico>0?"display:inline-table":"display:none"}}">
    
    <tr>
            <td class="text-center" colspan="2"> Descripcion de trabajo </td>
    </tr>
    <tr>

            <td colspan="2">
                    <textarea name="desc_bobinado" id="desc_bobinado">{!!$motor->diagnostico->desc_bobinado!!}</textarea>
            </td>
    </tr>
</table>

<div id="fotos_desarme3" style="overflow-x:auto;">
        <table class="table table-bordered">
            @if (sizeof($motor->fotos)>0)
                     @foreach($motor->fotos as $foto)
                         @if($foto->type==5)
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
            <div class="dz-default dz-message"><span>Agregue 2 fotos del bobinado contaminado o con falla.</span></div>
                    
            </div><!--form group -->
            <div class="dropzone-previews"></div>
            <button type="hidden" class="btn btn-success" id="submit-all3" style="display:inline">Guardar Nuevo Equipo</button>
            <button type="submit" class="btn btn-success" > Probar Post </button>
    {!! Form::close() !!}  <!--  </form> -->