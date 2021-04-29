<h2 class="StepTitle">Recopilacion de Partes</h2>
                                <p>El técnico debe de ir desarmando el equipo y a su vez tomando fotos de cada parte que quita. Algunas partes necesitaran limpieza, otras alguna reparación e incluso
                                    alguna pueden necesitar reemplazo. Colocar aca, Borneras, Ventiladores, Cuñeros, Cojinetes, Sensores, Rotor, Ventiladores Forzados, etc.
                                </p>
                                {!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico1','method'=>'POST','files'=>'true','id' => 'my-dropzone','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                          <input type="hidden" name="id_motor" value="{{$motor->id_motor}}" id="id_motor">
                          <div id="fotos_desarme" style="overflow-x:auto;">
                               <table class="table table-bordered">
                                   @if (sizeof($motor->fotos)>0)
                                            @foreach($motor->fotos as $foto)
                                                @if($foto->type==3)
                                                    <tr class='fotica'>
                                                        <td>
                                                        <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                        <div style='margin:10px' class='text-center'>
                                                        <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Parte </a>
                                                        </div>
                                                        </td>
                                                        <td style="width:60%">
                                                                 <span> Parte a describir:</span>
                                                        <input type="text" class="form-control" name="titulo[{{$foto->id}}]" value="{{$foto->titulo}}">
                                                                <span> Descripci&oacute;n:</span>
                                                        <textarea class="form-control" name='descripcion[{{$foto->id}}]'>{{$foto->descripcion}}</textarea>
                                                        <span>Acci&oacute;n a Realizar:</span>
                                                         <select name="accion[{{$foto->id}}]" class="form-control">
                                                            <option value="0" {{$foto->accion==0?"selected":""}}>No hacer Nada</option>
                                                            <option value="1" {{$foto->accion==1?"selected":""}}>Limpieza </option>
                                                            <option value="2" {{$foto->accion==2?"selected":""}}>Reemplazo </option>
                                                            <option value="3" {{$foto->accion==3?"selected":""}}>Reparacion </option>
                                                         </select>       
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
                            <button type="hidden" class="btn btn-success" id="submit-all" style="display:none">Guardar Nuevo Equipo</button>
                            <button type="submit" class="btn btn-success" > Probar Post </button>
                            {!! Form::close() !!}  <!--  </form> -->