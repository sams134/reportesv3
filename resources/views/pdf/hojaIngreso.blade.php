<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://reportesv2.com/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<table style="width:100%;" class="table-bordered">
    <tr>
        <td>
            <img src="http://reportesv2.com/img/logobw.jpg" style="max-width:300px">
        </td>
        <td style="text-align:right;vertical-align:top">
            <table class="table-bordered" style="width:100%">
                <tr>
                    <td style="text-align:right;vertical-align:top"><h1 class="text-uppercase" style="font-size:60px"> {{$motor->year}}-{{$motor->os}}</h1></td>
                </tr>
                <tr>
                    <td style="text-align:right;vertical-align:top"> <b style="font-size:20px">{{$motor->cliente->cliente}}</b> </td>
                </tr>
                <tr>
                        <td style="text-align:right;vertical-align:top"> <span style="font-size:18px">Fecha Ingreso: {!!date("d/m/Y H:i:s", strtotime($motor->fecha_ingreso))!!} </span></td>
                    </tr>
            </table>
            
                
        </td>
    </tr>
</table>
<h3 style="text-decoration:underline"> Datos de Placa (Según Oficina)</h3>
<table class="table table-bordered">
    <tr>
        <td class="active"> Marca </td> <td> {{$motor->marca}}</td> <td class="active"> Serie</td> <td> {{$motor->serie}}</td><td class="active"> Modelo </td> <td> {{$motor->modelo}}</td>
    </tr>
    <tr>
        <td class="active"> Potencia </td> <td> {{$motor->hp}}</td> <td class="active"> Rpm</td> <td> {{$motor->rpm}}</td><td class="active"> Voltajes </td> <td> {{$motor->volts}}</td>
    </tr>
    <tr>
        <td class="active"> Amperajes </td> <td> {{$motor->amps}}</td> <td class="active"> Hz</td> <td> {{$motor->hz}}</td><td class="active"> Pf </td> <td> {{$motor->pf}}</td>
    </tr>
</table>
<h3 style="text-decoration:underline">Fotografías de Ingreso</h3>
<table style="width:100%">
    <tr>
@for($i=0;$i<count($motor->fotos);$i++)
   @if($motor->fotos[$i]->type <= 2)
      <td>  <img src="http://reportesv2.com{{$motor->fotos[$i]->thumb}}" style="max-width:215px;border:1px solid #ccc;padding:10px;"> </td>
   @endif
@endfor
    </tr>
    </tr>
</table>
<h3 style="text-decoration:underline"> Datos (Según Técnico)</h3>       
<table>
<tr>
    <td>
        <b> HP / KW </b>
    </td>
    <td>
        <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
    </td>
    <td>
        <b> Polos </b>
    </td>
    <td>
        <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
    </td>
    <td>
        <b> Ranuras </b>
    </td>
    <td>
        <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
    </td>
</tr>
<tr>
        <td>
            <b> Frecuencia </b>
        </td>
        <td>
            <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
        </td>
        <td>
            <b> Puntas salida </b>
        </td>
        <td>
            <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
        </td>
        <td>
            <b>Circuitos  </b>
        </td>
        <td>
            <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
        </td>
    </tr>
    <tr>
            <td>
                <b> Y / D </b>
            </td>
            <td>
                <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
            </td>
            <td>
                <b> Voltaje Op. </b>
            </td>
            <td>
                <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
            </td>
            <td>
                <b>Amperaje Op.  </b>
            </td>
            <td>
                <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
            </td>
        </tr>   
</table>
<h3 style="text-decoration:underline"> Medidas de Nucleo </h3>
<table>
    <tr>
            <td>
                    <b>Diametro  </b>
                </td>
                <td>
                    <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
                </td>
                <td>
                    <b>Largo  </b>
                </td>
                <td>
                    <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
                </td>
                <td>
                    <b>Back Iron </b>
                </td>
                <td>
                    <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
                </td>
    </tr>
    <tr>
            <td>
                <b>Diente  </b>
            </td>
            <td>
                <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
            </td>
            <td>
                <b>Prof. Ranura  </b>
            </td>
            <td>
                <div style="width:200px;height:30px;border:1px solid #444;margin:10px"> </div>
            </td>
    </tr>
</table>
@if ($motor->phases == 4)
    <h3 style="text-decoration:underline;margin-bottom:10px;"> Bobinado Trifasico </h3>
    <table>
        <tr>
            <td><b>BOBINAS X GRUPO: </b> <br>&nbsp;</td>
            <td><div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:950px;left:{{150}};position:absolute"> </div> </td>
        </tr>
        <tr>
            <td> <b>GRUPOS:</b></td>
            <td> <div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:990px;left:{{150}};position:absolute"> </div></td>
        </tr>
    </table>
    <h3 style="text-decoration:underline;margin-bottom:10px;"> Calibres </h3>
    <table>
        <tr >
            <td> <b> AWG  </b> </td>
            <td> 
                @for($i=1;$i<5;$i++)
                        <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1060px;left:{{25+$i*61}};position:absolute"> </div>
                    @endfor
                </td>       
        </tr>
        <tr> <td>&nbsp;</td></tr>
        <tr>
                <td> <b> Hilos </b> </td>
                <td> 
                    @for($i=1;$i<5;$i++)
                            <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1100px;left:{{25+$i*61}};position:absolute"> </div>
                        @endfor
                    </td>       
            </tr>
    </table>
    <h3> Agrupamiento </h3>
    <table>
            <tr >
                <td> <b> Paso 1-  </b> </td>
                <td> 
                    @for($i=1;$i<7;$i++)
                            <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1180px;left:{{25+$i*61}};position:absolute"> </div>
                        @endfor
                    </td>       
            </tr>
            <tr> <td>&nbsp;</td></tr>
            <tr>
                    <td> <b> Vueltas </b> </td>
                    <td> 
                        @for($i=1;$i<7;$i++)
                                <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1220px;left:{{25+$i*61}};position:absolute"> </div>
                            @endfor
                        </td>       
                </tr>
        </table>
@else

<h3 style="text-decoration:underline;margin-bottom:10px;"> Bobinado Marcha</h3>
<table>
    <tr>
        <td><b>BOBINAS X GRUPO: </b> <br>&nbsp;</td>
        <td><div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:950px;left:{{150}};position:absolute"> </div> </td>
    </tr>
    <tr>
        <td> <b>GRUPOS:</b></td>
        <td> <div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:990px;left:{{150}};position:absolute"> </div></td>
    </tr>
</table>
<h3 style="text-decoration:underline;margin-bottom:10px;position:absolute;top:910px;left:460px"> Bobinado Arranque</h3>
<table style="position:absolute;top:965px;left:460px">
        <tr>
            <td><b>BOBINAS X GRUPO: </b> <br>&nbsp;</td>
            <td><div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:-15px;left:{{150}};position:absolute"> </div> </td>
        </tr>
        <tr>
            <td> <b>GRUPOS:</b></td>
            <td> <div style="width:180px;height:30px;border:1px solid #444;margin:10px;top:25px;left:{{150}};position:absolute"> </div></td>
        </tr>
    </table>
<h3 style="text-decoration:underline;margin-bottom:10px;"> Calibres </h3>
<table>
    <tr >
        <td> <b> AWG  </b> </td>
        <td> 
            @for($i=1;$i<5;$i++)
                    <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1060px;left:{{25+$i*61}};position:absolute"> </div>
                @endfor
            </td>       
    </tr>
    <tr> <td>&nbsp;</td></tr>
    <tr>
            <td> <b> Hilos </b> </td>
            <td> 
                @for($i=1;$i<5;$i++)
                        <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1100px;left:{{25+$i*61}};position:absolute"> </div>
                    @endfor
                </td>       
        </tr>
</table>
<h3 style="text-decoration:underline;margin-bottom:10px;position:absolute;top:1025px;left:460px"> Calibres </h3>
<table style="position:absolute;top:1080px;left:460px">
    <tr >
        <td> <b> AWG  </b> </td>
        <td> 
            @for($i=1;$i<5;$i++)
                    <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:-15px;left:{{25+$i*61}};position:absolute"> </div>
                @endfor
            </td>       
    </tr>
    <tr> <td>&nbsp;</td></tr>
    <tr>
            <td> <b> Hilos </b> </td>
            <td> 
                @for($i=1;$i<5;$i++)
                        <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:25px;left:{{25+$i*61}};position:absolute"> </div>
                    @endfor
                </td>       
        </tr>
</table>
<h3 style="text-decoration:underline;margin-bottom:10px;"> Agrupamiento </h3>
<table>
        <tr >
            <td> <b> Paso 1-  </b> </td>
            <td> 
                @for($i=1;$i<6;$i++)
                        <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1180px;left:{{25+$i*61}};position:absolute"> </div>
                    @endfor
                </td>       
        </tr>
        <tr> <td>&nbsp;</td></tr>
        <tr>
                <td> <b> Vueltas </b> </td>
                <td> 
                    @for($i=1;$i<6;$i++)
                            <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:1220px;left:{{25+$i*61}};position:absolute"> </div>
                        @endfor
                    </td>       
            </tr>
    </table>
    <h3 style="text-decoration:underline;margin-bottom:10px;position:absolute;top:1140px;left:460px"> Agrupamiento </h3>
    <table style="position:absolute;top:1200px;left:460px">
            <tr >
                <td> <b> Paso 1-  </b> </td>
                <td> 
                    @for($i=1;$i<6;$i++)
                            <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:-15px;left:{{25+$i*61}};position:absolute"> </div>
                        @endfor
                    </td>       
            </tr>
            <tr> <td>&nbsp;</td></tr>
            <tr>
                    <td> <b> Vueltas </b> </td>
                    <td> 
                        @for($i=1;$i<6;$i++)
                                <div style="width:60px;height:30px;border:1px solid #444;margin:10px;top:25px;left:{{25+$i*61}};position:absolute"> </div>
                            @endfor
                        </td>       
                </tr>
        </table>

@endif