<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://reportesv2.com/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
      .titulos {
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
      }
      .supertitle
      {
          top: 40px;
          font-size: 34;
          left:20px;
          font-weight: bold;
          color: #bdd3e9;
      }
      .supersubtitle
      {
          top: 80px;
          font-size: 20;
          left:20px;
          font-weight: 100;
          color: #bdd3e9;
      }
      .title1{
          top: 150px;
          font-size: 25;
          text-decoration: underline;
          left:20px;
          font-weight: 100;
          color: #fff;
        
      }
      .title2{
          top: 165px;
          font-size: 20;
          left:20px;
          font-weight: 100;
          color: #fff;
      }
     .os{
         top: 160;
         left:455;
         font-size: 30;
         font-weight: bold;
         color: #fff;
         text-transform: uppercase;
     }
     .cliente{
         top: 195;
         left:455;
         font-size: 19;         
         color: #fff;
         text-transform: uppercase;
     }
     .title3{
        top:230;
        
        font-weight: bolder;
        color: #0070c0; 
     }
     .comentarios-cliente{
         position: absolute;
         
         width:600px;
         height: 40px;
         top:415;
         left:240;
         font-size: 10;
         padding:5px;
         overflow: auto;
     }
     .footer {
         top:1161;
     }
     .footer-text
     {
        top:1270;
        font-size: 12;
        left:485;
        color:#fff;
     }
     .check{
         border: 1px solid #444;
         width:25;
         margin-bottom:5px;
     }
    </style>

<div id="heading">
    <img src="http://reportesv2.com/img/prueba3.png" style="max-width:920px">
</div>
<div id="clinica" >
    <p class="supertitle titulos">CLINICA DE MOTORES ELECTRICOS </p>
    <p class="supersubtitle titulos"> ORDEN DE SERVICIO</p>
    <p class="title1 titulos" >RECEPCION DE EQUIPO</p>
    
    <p class="os titulos"> {!!$motor->year!!}-{!!$motor->os!!}</p>
    <p class="cliente titulos"> {!!$motor->cliente->cliente!!}</p>
</div>
<div id="placa">
    <p class="title3 titulos" style="font-size:25">DATOS DE PLACA</p>
    <table class="table table-hover titulos" style="font-size:12px;top:270">
            <tr>
                    <td class="active"> Marca </td>
                    <td class="text-capitalize"> {!!$motor->marca!!}
                    <td class="active"> Serie </td>
                    <td class="text-uppercase"> {!!$motor->serie!!}
                    <td class="active"> Modelo </td>
                    <td class="text-uppercase"> {!!$motor->modelo!!}
            </tr>
            <tr>
                    <td class="active"> Potencia </td>
                    <td>
                                @if($motor->infoMotor != null)
                                {!!$motor->infoMotor->reales == 1?"&asymp;":""!!}
                              @endif
                              {!!$motor->hp!!} 
                              {!!$motor->hpkw==1?"KW":"HP"!!} 
                    </td>
                    <td class="active"> Volts </td>
                    <td> {!!$motor->volts!!}
                    <td class="active"> Amps </td>
                    <td> {!!$motor->amps!!}
            </tr>
            <tr>
                    <td class="active"> Rpm </td>
                    <td> {!!$motor->rpm!!} 
                    <td class="active"> Factor de Potencia </td>
                    <td> {!!$motor->pf!!}
                    <td class="active"> Efficiencia </td>
                    <td> {!!$motor->eff!!}
            </tr>
            <tr>
                    <td class="active"> Hz. </td>
                    <td> {!!$motor->hz!!} 
                    <td class="active"> Frame </td>
                    <td class="text-uppercase"> {!!$motor->frame!!}
                    <td class="active">Enclosure  </td>
                    <td> {!!$motor->id_encl!!}
            </tr>
        </table>
        <p class="title3 titulos" style="font-size:16;top:420">COMENTARIOS DE CLIENTE:</p>
        <div id="comentarios" class="comentarios-cliente"> 
                  {!!$motor->comentarios!!}
        </div>
</div>
<div id="inventario">
        <p class="title3 titulos" style="font-size:25; top:450">INVENTARIO DE PARTES</p>
        <table class="table table-bordered titulos" style="font-size:12px;top:490">
                <tr>
                        <td class="active"><b> Acople </b></td>
                        <td> {!!$motor->inventario->acople==1?"S&iacute; trae":($motor->inventario->acople==3?"No trae":"Mal estado")!!}</td>
                        <td class="active"><b> Caja de Conexiones </b> </td>
                        <td> {!!$motor->inventario->caja_conexiones==1?"S&iacute; trae":($motor->inventario->caja_conexiones==3?"No trae":"Mal estado")!!} </td>
                        <td class="active"><b> Tapa Caja de Conexiones </b> </td>
                        <td> {!!$motor->inventario->tapa_caja==1?"S&iacute; trae":($motor->inventario->tapa_caja==3?"No trae":"Mal estado")!!} </td>
                </tr>
                <tr>
                        <td class="active"><b> Difusor </b></td>
                        <td> {!!$motor->inventario->difusor==1?"S&iacute; trae":($motor->inventario->difusor==3?"No trae":"Mal estado")!!}</td>
                        <td class="active"><b> Ventilador </b> </td>
                        <td> {!!$motor->inventario->ventilador==1?"S&iacute; trae":($motor->inventario->ventilador==3?"No trae":"Mal estado")!!} </td>
                        <td class="active"><b> Bornera </b> </td>
                        <td> {!!$motor->inventario->bornera==1?"S&iacute; trae":($motor->inventario->bornera==3?"No trae":"Mal estado")!!} </td>
                </tr>
                <tr>
                        <td class="active"><b> Cuña </b></td>
                        <td> {!!$motor->inventario->cunia==1?"S&iacute; trae":($motor->inventario->cunia==3?"No trae":"Mal estado")!!}</td>
                        <td class="active"><b> Graseras </b> </td>
                        <td> {!!$motor->inventario->graseras==1?"S&iacute; trae":($motor->inventario->graseras==3?"No trae":"Mal estado")!!} </td>
                        <td class="active"><b> Cáncamo </b> </td>
                        <td> {!!$motor->inventario->cancamo==1?"S&iacute; trae":($motor->inventario->cancamo==3?"No trae":"Mal estado")!!} </td>
                </tr>
                <tr>
                        <td class="active"><b> Placa </b></td>
                        <td> {!!$motor->inventario->placa==1?"S&iacute; trae":($motor->inventario->placa==3?"No trae":"Mal estado")!!}</td>
                        <td class="active"><b> Tornillos Completos </b> </td>
                        <td> {!!$motor->inventario->tornillos==1?"S&iacute; trae":($motor->inventario->tornillos==3?"No trae":"Mal estado")!!} </td>
                        <td class="active"><b> Capacitores </b> </td>
                        <td> {!!$motor->inventario->capacitor==1?"S&iacute; trae":($motor->inventario->capacitor==3?"No trae":"Mal estado")!!} </td>
                </tr>
                <tr>
                        <td colspan="6">
                             <b>Adicionales: </b> {!!$motor->inventario->comentarios!!}
                        </td>
                </tr>
        </table>
</div>
<p class="title3 titulos" style="font-size:25; top:675">FOTOGRAFIAS</p>
<div id="fotos" class="titulos" style="top:710; border:0px solid #eee;">
    @if(count($motor->fotos) >0 )
    <table class="table">
            <tr>
          @for($i = 0;$i<sizeof($motor->fotos);$i++)
             @if($motor->fotos[$i]->type <= 2)
             <td> <img src="http://reportesv2.com{!!$motor->fotos[$i]->thumb!!}" style="max-width:210px"> </td>
            @endif
          @endfor
        </tr>
    </table>
    @else
        <p> No se Ingresaron Fotos </p>
    @endif
</div>
<table  style="position:absolute;top:890;border:1 px solid #eee;width:920px">
    <TR>
        <td style="width:50%;vertical-align:top">
                <div id="trabajos" style="padding:10px">
                        <p class="title3" style="font-size:25;">TRABAJOS A REALIZAR</p>
                        <div style="font-size:10">   
                                 @if(count($motor->trabajos)>0)
                                       @foreach($motor->trabajos as $trabajo)
                                        <input value="" class="check"> <span class="text-capitalize "> {!!$trabajo->trabajo!!} </span>
                                        @if($trabajo->autorizado == 1)
                                           <span class="label label-success"> Autorizado el {!!date("d/m/y g:i A", strtotime($trabajo->fecha_autorizado))!!}</span>
                                        @else
                                                @if($trabajo->cotizar == 1)
                                                <span class="label label-warning"> Realizar Cotizaci&oacute;n </span>
                                                @else
                                                        @if($trabajo->cotizar == 0 && $trabajo->autorizado==0)
                                                        <span class="label label-danger"> Trabajo no Autorizado </span>
                                                        @endif
                                                @endif
                                        @endif
                                         <br>
                                       @endforeach
                                @else
                                        <span> No Hay Trabajos especificos </span>
                                @endif
                                        

                                     
                        </div>
                </div>
        </td>
        <td style="width:50%;vertical-align:top">
                <div id="recepcion" style="padding:10px">
                        <p class="title3" style="font-size:25;display:none">INFORMACION DE RECEPCION</p>
                        <div class="well" >
                        <table style="font-size:12;vertical-align:top;width:400px;padding:0px">
                            <tr>
                                <td> <B>Equipo Recibido por:</B> <P>{!!$motor->recibido!!}</P>
                                </td>
                                <td>
                                     <B>Fecha Recepcion:</B> <P>{!!date("d/m/y g:i A", strtotime($motor->created_at))!!}</P> 
                                </td>
                            </tr>
                            <tr>
                                    <td> <B>Cliente:</B> <P>{!!$motor->cliente->cliente!!}</P>
                                    </td>
                                    <td>
                                    <B>Contacto:</B> <P></P> 
                                    </td>
                            </tr>
                            <tr>
                                    <td> <B>Telefono Contacto:</B> <P></P>
                                    </td>
                                    <td>
                                    <B>Email Contacto:</B> <P></P> 
                                    </td>
                            </tr>
                            <tr>
                                    <td> <B>Nivel de Emergencia:</B> <P>{!!$motor->giveEmergency()!!}</P>
                                    </td>
                                    <td>
                                    <B>Empezar a trabajar:</B> <P> {!!$motor->infoMotor->cotizar==1?"No, Presentar Cotizacion":"Si, empezar a trabajar"!!}</P> 
                                    </td>
                            </tr>
                            <tr>
                                    <td> <B>Facturar A:</B> <P></P>
                                    </td>
                                    <td>
                                    
                                    </td>
                            </tr>
                            <tr>
                                    <td colspan="2"> <B>Direccion Fiscal:</B> 
                                    </td>
                                    
                            </tr>
                        </table>
                       
                        
                        
                        </div>
                </div>
        </td>
    </TR>
</table>

 

<div id="footer" class="footer titulos">
        
        <img src="http://reportesv2.cme/img/footer.png" style="max-width:920px">
        
    </div>
    <p class="titulos footer-text"><b>CLINICA DE MOTORES ELECTRICOS AMIR </b>
        <br> 23 ave 28-46 zona 5. GUATEMALA C.A.
        <BR> servicio@cmeamir.com
        <BR> (502) 2331-1596
        
    </p>
    <img src="http://reportesv2.com/img/delivery.png" style="max-width:75px;position:absolute;top:1180;left:10"> 
    
    <table class="table titulos" style="width:700;top:1190;font-size:10;left:100">
        <tr>
                <td class="active"> Tipo de Pintura </td>
                <td> Sintetica </td>
                <td class="active"> Tipo de Embalaje </td>
                <td> Entarimado - Strech - Flejado - Rotulado </td>
        </tr>
        <tr>
                <td class="active"> Entregar Reporte </td>
                <td> Si</td>
                <td class="active"> Entregar Piezas Cambiadas </td>
                <td> Si </td>
        </tr>
    </table>
<script src="http://reportesv2.com/vendors/jquery/dist/jquery.js"></script>
