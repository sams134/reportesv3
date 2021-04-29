
                            <h2 class="StepTitle">Cojinetes</h2>
                            <p>
                                En esta sección se ingresa todo lo referente a cojinetes, sus ajustes en ejes y alojamientos. Así como datos de grasa.
                            </p>
                            
                        <div style="height:{{400*$motor->countType(6)+(1300*count($motor->cojinetes))+500}}px" id="cojinetes_div">
                            <table class="table">
                                <tr>
                                    <td style="width:30%" class="text-right">
                                    <strong>  Agregue un cojinete </strong>
                                    </td>
                                    <td> 
                                            <select name="id_cojinete" class="form-control text-uppercase pull-left" id="cojinete_select">
                                                    @foreach($cojinetes as $cojinete)
                                                          <option value="{{$cojinete->id}}">{{$cojinete->designacion}} </option>
                                                    @endforeach
                                              </select> 
                                              <input type="hidden" id="bearing_id">
                                              <input type="hidden" id="bearing_des">
                                    </td>
                                    <td style="width:20%"></td>
                                </tr>
                            </table>
                            <table class="table" style="font-size:12px;display:none" id="table_example">
                                <tr>
                                    <td>
                                        <h3 class="titulo">Cojinete </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                    <td style="width:40%"> 
                                                            <table class="table" >
                                                                <tr>
                                                                    <td style="width:130px" class="img_serie"> <img src="/img/serie1.png" style="max-width:120px"> </td>
                                                                    <td class="text-left"> 
                                                                        <table class="table table-striped" >
                                                                            <tr>
                                                                                    <td> Designación </td>
                                                                                    <td class="designacion"> 6202 
                                                                                        
                                                                                    </td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td> Tipo </td>
                                                                                    <td class="tipo_rodamiento"> Rodamiento Rigido de Bolas </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td> D </td>
                                                                                <td class="diam_externo"> 33.00 mm </td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td> d </td>
                                                                                    <td class="diam_interno"> 12.00 mm</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td> B </td>
                                                                                    <td class="ancho"> 8.00 mm</td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td> Velocidad Maxima </td>
                                                                                    <td class="vel"> 22000 rpm</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Marca Original del Cojinete </td>
                                                                    <td> <input type="text" name="marca_original[]" class="form-control text-uppercase" required>
                                                                </tr>
                                                                <tr>
                                                                    <td> Marca a colocar: </td>
                                                                    <td>
                                                                        <select name="marca_colocar[]" class="form-control" required>
                                                                            <option value="1" selected> SKF </option>
                                                                            <option value="2"> FAG </option>
                                                                            <option value="3"> NSK </option>
                                                                            <option value="4"> NTN </option>
                                                                            <option value="5"> TIMKEN </option>
                                                                            <option value="6"> KOYO </option>
                                                                            <option value="7"> NACHI </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                               
                                                                <tr>
                                                                    <td colspan="2">
                                                                           
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td> 
                                                            <table class="table table-striped" style="font-size:10px">
                                                                <tr>
                                                                        <td colspan="2"><strong>Medidas Reales del Cojinete</strong></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="width:50%"> <span> Posición</span></td>
                                                                        <td> <input type="text" class="form-control text-uppercase" name="pos_cojinete[]" placeholder="Carga / Opuesto" required > 
                                                                            
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:50%"> <span> Diametro Externo</span></td>
                                                                    <td> <input type="number" class="form-control" name="diam_externo[]" step="0.0001" required> 
                                                                        <input type="hidden" name="id_cojinete[]" value="hola" class="idCojinete"> 
                                                                        <input type="hidden" name="id_cojineteMotor[]" value="0"> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                        <td> <span> Diametro Interno</span></td>
                                                                        <td> <input type="number" class="form-control" name="diam_interno[]" step="0.0001" required> </td>
                                                                </tr>
                                                                <tr>
                                                                        <td> <span> Sellos</span></td>
                                                                        <td>
                                                                            <select class="form-control" style="font-size:10px" name="sellos[]" >
                                                                                    <option value="1" > Sin Sellos</option>
                                                                                    <option value="2" > ZZ (Sello Metal)</option>
                                                                                    <option value="3" > 2RS (Sello Hule)</option>
                                                                            </select>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td> <span> Juego Radial</span></td>
                                                                        <td>
                                                                            <select class="form-control" style="font-size:10px" name="juego[]">
                                                                                    <option value="1" > C2 (Normal)</option>
                                                                                    <option value="2" > C3 </option>
                                                                                    <option value="3" > C4</option>
                                                                            </select>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td> <span> Jaula</span></td>
                                                                        <td>
                                                                            <select class="form-control" style="font-size:10px" name="jaula[]">
                                                                                    <option value="1" > ECJ Metal</option>
                                                                                    <option value="2" > ECM Bronce </option>
                                                                                    <option value="3" > ECP Poliamida</option>
                                                                            </select>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td> <span>Tolerancia Alojamiento</span></td>
                                                                        <td>
                                                                            <select class="form-control" style="font-size:10px" name="tolerancia[]">
                                                                                    <option value="1" > K7</option>
                                                                                    <option value="2" > K7 limite H6</option>
                                                                                    <option value="3" > H6</option>
                                                                            </select>
                                                                        </td>
                                                                </tr>
                                                            </table>  
                                                        </td>
                                            </tr>
                                        </table>
                                    </td>
                                        
                                </tr>
                                <tr>
                                    <td>
                                        <h2>Medida Inicial de Alojamiento</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                    <td style="width:130px"> 
                                                            <img src="/img/medidas_cuna1.png" style="max-width:120px"><br>
                                                            <img src="/img/medidas_cuna2.png" style="max-width:120px"> <br>
                                                            <label> Metodo de Medición </label>
                   
                                                        </td>
                                                        <td>
                                                            <table class="table table-hover table-bordered" style="font-size:10px">
                                                                <tr class="headings">
                                                                    <th style="background:#73879C;color:#fff"> </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida A </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida B </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida C </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida D </th>
                                                                </tr>
                                                                <tr>
                                                                       <td class="active"> X </td> 
                                                                       <td> <input class="form-control" type="number" name="med_xa[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_xb[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_xc[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_xd[]" step="0.0001"> </td>
                                                                </tr>
                                                                <tr>
                                                                       <td class="active"> Y </td> 
                                                                       <td> <input class="form-control" type="number" name="med_ya[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_yb[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_yc[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_yd[]" step="0.0001"> </td>
                                                               </tr>
                                                               <tr>
                                                                       <td class="active"> Z </td> 
                                                                       <td> <input class="form-control" type="number" name="med_za[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_zb[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_zc[]" step="0.0001"> </td>
                                                                       <td> <input class="form-control" type="number" name="med_zd[]" step="0.0001"> </td>
                                                                  </tr>
                                                            </table>
                                                        </td>
                                            </tr>
                                        </table>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <h2> Medida Inicial de Eje</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                    <td style="width:130px"> 
                                                            <img src="/img/medidas_eje.png" style="max-width:120px"><br>
                                                            <img src="/img/medidas_eje2.png" style="max-width:120px"><br>
                                                            <label> Metodo de Medición </label>
                   
                                                        </td>
                                                        <td>
                                                            <table class="table table-hover table-bordered" style="font-size:10px">
                                                                <tr class="headings">
                                                                    <th style="background:#73879C;color:#fff;width:45px"> </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida u </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida v </th>
                                                                    <th class="text-center" style="background:#73879C;color:#fff"> Medida w </th>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                     <td class="active"> Pos a </td> 
                                                                     <td> <input class="form-control" type="number" name="med_au[]" step="0.0001"> </td>
                                                                     <td> <input class="form-control" type="number" name="med_av[]" step="0.0001"> </td>
                                                                     <td> <input class="form-control" type="number" name="med_aw[]" step="0.0001"> </td>
                                                                     
                                                                </tr>
                                                                <tr>
                                                                        <td class="active"> Pos b </td> 
                                                                        <td> <input class="form-control" type="number" name="med_bu[]" step="0.0001"> </td>
                                                                        <td> <input class="form-control" type="number" name="med_bv[]" step="0.0001"> </td>
                                                                        <td> <input class="form-control" type="number" name="med_bw[]" step="0.0001"> </td>
                                                                        
                                                                   </tr>
                                                               
                                                            </table>
                                                        </td>
                                            </tr>
                                        </table>
                                    </td>
                                   </tr>
                                   <tr><td><a class='btn btn-danger' data-id-cojinete="0"> Eliminar Cojinete</a></td></tr>
                            </table>


                            {!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico4','method'=>'POST','id' => 'my-dropzone4-a','class'=>'form-horizontal form-label-left']) !!}                           
                            <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                                <div id="new_bearings" >
                                    @if(count($motor->cojinetes)>0)
                                        @foreach($motor->cojinetes as $cojinete)
                                            
                                            <table class='table cojinetico' style='font-size:12px;width:100%'>
                                                    <tr>
                                                        <td>
                                                        <h3 class="titulo">Cojinete {{$cojinete->infoCojinete->designacion}}</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="table">
                                                                <tr>
                                                                        <td style="width:40%"> 
                                                                                <table class="table" >
                                                                                    <tr>
                                                                                        <td style="width:130px" > 
                                                                                            @if($cojinete->infoCojinete->serie == 1)
                                                                                            <img src="/img/serie1.png" style="max-width:120px"> 
                                                                                            @elseif(($cojinete->infoCojinete->serie == 3))
                                                                                            <img src="/img/nu.png" style="max-width:120px"> 
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="text-left"> 
                                                                                            <table class="table table-striped" >
                                                                                                <tr>
                                                                                                        <td> Designación</td>
                                                                                                <td class="designacion">{{$cojinete->infoCojinete->designacion}} </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                        <td> Tipo </td>
                                                                                                        <td class="tipo_rodamiento">{{$cojinete->infoCojinete->getTipo()}}</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td> D </td>
                                                                                                    <td class="diam_externo"> {{$cojinete->infoCojinete->diam_externo}}.00 mm </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                        <td> d </td>
                                                                                                        <td class="diam_interno"> {{$cojinete->infoCojinete->diam_interno}}.00 mm</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                        <td> B </td>
                                                                                                        <td class="ancho"> {{$cojinete->infoCojinete->ancho}}.00 mm</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                        <td> Velocidad Maxima </td>
                                                                                                        <td class="vel"> {{$cojinete->infoCojinete->limite_velocidad}} rpm</td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Marca Original del Cojinete </td>
                                                                                    <td> <input type="text" name="marca_original[]" class="form-control text-uppercase" value="{{$cojinete->marca_original}}" required>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Marca a colocar: </td>
                                                                                        <td>
                                                                                            <select name="marca_colocar[]" class="form-control" required>
                                                                                                <option value="1" {{$cojinete->marca_colocar==1?"selected":""}}> SKF </option>
                                                                                                <option value="2" {{$cojinete->marca_colocar==2?"selected":""}}> FAG </option>
                                                                                                <option value="3" {{$cojinete->marca_colocar==3?"selected":""}}> NSK </option>
                                                                                                <option value="4" {{$cojinete->marca_colocar==4?"selected":""}}> NTN </option>
                                                                                                <option value="5" {{$cojinete->marca_colocar==5?"selected":""}}> TIMKEN </option>
                                                                                                <option value="6" {{$cojinete->marca_colocar==6?"selected":""}}> KOYO </option>
                                                                                                <option value="7" {{$cojinete->marca_colocar==7?"selected":""}}> NACHI </option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td> 
                                                                                <table class="table table-striped">
                                                                                    <tr>
                                                                                            <td colspan="2"><strong>Medidas Reales del Cojinete</strong></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td style="width:50%"> <span> Posición</span></td>
                                                                                    <td> <input type="text" class="form-control text-uppercase" name="pos_cojinete[]" placeholder="Carga / Opuesto" value="{{$cojinete->pos_cojinete}}" required> 
                                                                                                
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                    <td style="width:50%"> <span> Diametro Externo</span></td>
                                                                                    <td> <input type="number" class="form-control" name="diam_externo[]" step="0.0001" value="{{number_format($cojinete->diam_externo,4)}}" required> 
                                                                                        <input type="hidden" name="id_cojinete[]" value="{{$cojinete->id_cojinete}}" class="idCojinete"> 
                                                                                        <input type="hidden" name="id_cojineteMotor[]" value="{{$cojinete->id}}"> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td> <span> Diametro Interno</span></td>
                                                                                            <td> <input type="number" class="form-control" name="diam_interno[]" step="0.0001" required value="{{number_format($cojinete->diam_interno,4)}}"> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td> <span> Sellos</span></td>
                                                                                            <td>
                                                                                                <select class="form-control" style="font-size:10px" name="sellos[]" >
                                                                                                        <option value="1" {{$cojinete->sellos==1?"selected":""}}> Sin Sellos</option>
                                                                                                        <option value="2" {{$cojinete->sellos==2?"selected":""}}> ZZ (Sello Metal)</option>
                                                                                                        <option value="3" {{$cojinete->sellos==3?"selected":""}}> 2RS (Sello Hule)</option>
                                                                                                </select>
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td> <span> Juego Radial</span></td>
                                                                                            <td>
                                                                                                <select class="form-control" style="font-size:10px" name="juego[]">
                                                                                                        <option value="1" {{$cojinete->juego==1?"selected":""}}> C2 (Normal)</option>
                                                                                                        <option value="2" {{$cojinete->juego==2?"selected":""}}> C3 </option>
                                                                                                        <option value="3" {{$cojinete->juego==3?"selected":""}}> C4</option>
                                                                                                </select>
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td> <span> Jaula</span></td>
                                                                                            <td>
                                                                                                <select class="form-control" style="font-size:10px" name="jaula[]">
                                                                                                        <option value="1" {{$cojinete->jaula==1?"selected":""}}> ECJ Metal</option>
                                                                                                        <option value="2" {{$cojinete->jaula==2?"selected":""}}> ECM Bronce </option>
                                                                                                        <option value="3" {{$cojinete->jaula==3?"selected":""}}> ECP Poliamida</option>
                                                                                                </select>
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td> <span>Tolerancia Alojamiento</span></td>
                                                                                            <td>
                                                                                                <select class="form-control" style="font-size:10px" name="tolerancia[]">
                                                                                                        <option value="1" {{$cojinete->tolerancia==1?"selected":""}}> K7</option>
                                                                                                        <option value="2" {{$cojinete->tolerancia==2?"selected":""}}> K7 limite H6 </option>
                                                                                                        <option value="3" {{$cojinete->tolerancia==3?"selected":""}}> H6</option>
                                                                                                </select>
                                                                                            </td>
                                                                                    </tr>
                                                                                </table>  
                                                                            </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                            
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2>Medida Inicial de Alojamiento</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="table">
                                                                <tr>
                                                                        <td style="width:130px"> 
                                                                                <img src="/img/medidas_cuna1.png" style="max-width:120px"><br>
                                                                                <img src="/img/medidas_cuna2.png" style="max-width:120px"> <br>
                                                                                <label> Metodo de Medición </label>
                                    
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-hover table-bordered" style="font-size:10px">
                                                                                    <tr class="headings">
                                                                                        <th style="background:#73879C;color:#fff"> </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida A </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida B </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida C </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida D </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="active"> X </td> 
                                                                                        <td> <input class="form-control" type="number" name="med_xa[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xa==0?"":number_format($cojinete->medidas->first()->med_xa,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_xb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xb==0?"":number_format($cojinete->medidas->first()->med_xb,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_xc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xc==0?"":number_format($cojinete->medidas->first()->med_xc,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_xd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_xd==0?"":number_format($cojinete->medidas->first()->med_xd,4)}}"> </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="active"> Y </td> 
                                                                                        <td> <input class="form-control" type="number" name="med_ya[]" step="0.0001" value="{{$cojinete->medidas->first()->med_ya==0?"":number_format($cojinete->medidas->first()->med_ya,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_yb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yb==0?"":number_format($cojinete->medidas->first()->med_yb,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_yc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yc==0?"":number_format($cojinete->medidas->first()->med_yc,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_yd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_yd==0?"":number_format($cojinete->medidas->first()->med_yd,4)}}"> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td class="active"> Z </td> 
                                                                                        <td> <input class="form-control" type="number" name="med_za[]" step="0.0001" value="{{$cojinete->medidas->first()->med_za==0?"":number_format($cojinete->medidas->first()->med_za,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_zb[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zb==0?"":number_format($cojinete->medidas->first()->med_zb,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_zc[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zc==0?"":number_format($cojinete->medidas->first()->med_zc,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_zd[]" step="0.0001" value="{{$cojinete->medidas->first()->med_zd==0?"":number_format($cojinete->medidas->first()->med_zd,4)}}"> </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h2> Medida Inicial de Eje</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="table">
                                                                <tr>
                                                                        <td style="width:130px"> 
                                                                                <img src="/img/medidas_eje.png" style="max-width:120px"><br>
                                                                                <img src="/img/medidas_eje2.png" style="max-width:120px"><br>
                                                                                <label> Metodo de Medición </label>
                                    
                                                                            </td>
                                                                            <td>
                                                                                <table class="table table-hover table-bordered" style="font-size:10px">
                                                                                    <tr class="headings">
                                                                                        <th style="background:#73879C;color:#fff;width:45px"> </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida u </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida v </th>
                                                                                        <th class="text-center" style="background:#73879C;color:#fff"> Medida w </th>
                                                                                        
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="active"> Pos a </td> 
                                                                                        <td> <input class="form-control" type="number" name="med_au[]" step="0.0001" value="{{$cojinete->medidas->first()->med_au==0?"":number_format($cojinete->medidas->first()->med_au,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_av[]" step="0.0001" value="{{$cojinete->medidas->first()->med_av==0?"":number_format($cojinete->medidas->first()->med_av,4)}}"> </td>
                                                                                        <td> <input class="form-control" type="number" name="med_aw[]" step="0.0001" value="{{$cojinete->medidas->first()->med_aw==0?"":number_format($cojinete->medidas->first()->med_aw,4)}}"> </td>
                                                                                        
                                                                                    </tr>
                                                                                    <tr>
                                                                                            <td class="active"> Pos b </td> 
                                                                                            <td> <input class="form-control" type="number" name="med_bu[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bu==0?"":number_format($cojinete->medidas->first()->med_bu,4)}}"> </td>
                                                                                            <td> <input class="form-control" type="number" name="med_bv[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bv==0?"":number_format($cojinete->medidas->first()->med_bv,4)}}"> </td>
                                                                                            <td> <input class="form-control" type="number" name="med_bw[]" step="0.0001" value="{{$cojinete->medidas->first()->med_bw==0?"":number_format($cojinete->medidas->first()->med_bw,4)}}"> </td>
                                                                                            
                                                                                    </tr>
                                                                                
                                                                                </table>
                                                                            </td>
                                                                </tr>
                                                            <tr><td><a class='btn btn-danger' data-id-cojinete="{{$cojinete->id}}"> Eliminar Cojinete</a></td></tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                        @endforeach
                                    @endif
                                </div>
                                {!! Form::close() !!}  <!--  </form> -->
                                {!! Form::open(['action' => 'DiagnosticosController@saveDiagnostico4','method'=>'POST','files'=>'true','id' => 'my-dropzone4','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}
                                <input type="hidden" name="id_motor" value="{{$motor->id_motor}}">
                                <div id="fotos_desarme4" style="overflow-x:auto;">
                                    <table class="table table-bordered">
                                        @if (sizeof($motor->fotos)>0)
                                                 @foreach($motor->fotos as $foto)
                                                     @if($foto->type==6)
                                                     <tr class='fotica'>
                                                        <td>
                                                        <img src="{{$foto->foto}}" class='img-responsive' style='max-width:90%;padding:10px;border:1px solid #eee'>
                                                        <div style='margin:10px' class='text-center'>
                                                        <a class='btn-sm btn-danger' data-id-foto='{{$foto->id}}' data-id-motor="{{$motor->id_motor}}">Eliminar Parte </a>
                                                        </div>
                                                        </td>
                                                        <td style="width:60%">
                                                                 <span> Posición: (Carga / Opuesto / Thrust / etc.)</span>
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
                                        <div class="dz-default dz-message">
                                            <h2> Coloque Las Siguientes Fotos:</h2>
                                            <ul class="list-group">
                                                
                                                <li class="list-group-item"> Foto del Midendo Tapadera Lado Carga</li>
                                                <li class="list-group-item"> Foto del Midendo Tapadera Lado Opuesto</li>
                                                <li class="list-group-item"> Foto del Midendo Eje Lado Carga</li>
                                                <li class="list-group-item"> Foto del Midendo Eje Lado Opuesto</li>
                                            </ul>
                                        </div>
                                                
                                        </div><!--form group -->
                                        <div class="dropzone-previews"></div>
                                        <button type="hidden" class="btn btn-success" id="submit-all4" style="display:none">Guardar Nuevo Equipo</button>
                                <input type="submit" value="Probar Post">
                            {!! Form::close() !!}  <!--  </form> -->
                          </div>