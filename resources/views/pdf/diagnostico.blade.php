<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://reportesv2.com/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="http://reportesv2.com/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


<style type="text/css">
    div.page
    {
        page-break-after: always;
        page-break-inside: avoid;
    }
    .tituloReporte{
        font-weight:600;
        position:absolute;
    }
    .actives{
        background:#6882a4;
        color:#fff;
    }
    .titulos {
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
      }
      .supertitle
      {
          
          font-size: 34;
          left:20px;
          font-weight: 800;
          color: #bdd3e9;
      }
      .supersubtitle
      {
          
          font-size: 20;
          left:20px;
          font-weight: 100;
          color: #bdd3e9;
      }
      .title1{
          
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
         
         left:460;
         font-size: 30;
         font-weight: bold;
         color: #fff;
         text-transform: uppercase;
     }
     .cliente{
         top: 195;
         left:460;
         font-size: 20;         
         color: #fff;
         text-transform: uppercase;
     }
     .title3{
        
        
        font-weight: bolder;
        color: #0070c0; 
     }
     .comentarios-cliente{
         position: absolute;
         
         width:600px;
         height: 40px;
         
         left:260;
         font-size: 10;
         padding:5px;
         overflow: auto;
     }
     
     .footer-text
     {
        
        font-size: 12;
        left:485;
        color:#fff;
     }
     .root_cause{
         margin:0px;
         padding:0px;
     }
     .root_cause tr{
        margin:0px;
         padding:0px;
     }
     .root_cause td{
        margin:0px;
         padding:0px;
     }
</style>

<div class="page" >
    <h1 style="top:90px;border-bottom:4px solid #444;color:#444" class="tituloReporte">REPORTE &nbsp;&nbsp;&nbsp;</h1><h1 class="tituloReporte" style="border-bottom:4px solid #336699;color:#336699;top:90px;left:185px"> DE DIAGNOSTICO </h1>
    <span style="position:absolute;top:160px;font-size:23px;font-weight:500;text-transform:uppercase">{!!$motor->cliente->cliente!!} </span>
    <span style="position:absolute;top:190px;font-size:20px;font-weight:400;text-transform:uppercase">ORDEN DE SERVICIO : <b>{!!$motor->year!!}-{!!$motor->os!!}</b> </span>
    <img src="http://reportesv2.com/img/logo.jpg" style="max-width:350px;position:absolute;top:220px;left:580px">
    <img src="http://reportesv2.com{!!$motor->firstFoto()->thumb!!}" style="width:750px;height:545px;position:absolute;top:429px;left:140px"> 
<img src="http://reportesv2.com/img/caratula.png" style="width:891px;height:720px;position:absolute;top:350px;left:30px">
<span style="position:absolute;top:470px;left:35px;font-size:20px;font-weight:400;text-transform:uppercase;color:#fff">{!!($motor->diagnostico->trabajo_electrico==1)?"Mantenimiento":($motor->diagnostico->trabajo_electrico==2?"Rebobinado":"Reparacion")!!} de {!!$motor->id_tipoequipo!!} </span>
<span style="position:absolute;top:540px;left:35px;font-size:18px;font-weight:400;text-transform:uppercase;color:#fff">MARCA: {!!$motor->marca!!}</span>
<span style="position:absolute;top:570px;left:35px;font-size:18px;font-weight:400;text-transform:uppercase;color:#fff">Potencia: {!!$motor->hp!!} {!!$motor->hpkw==1?"KW":"HP"!!}</span>
<span style="position:absolute;top:600px;left:35px;font-size:18px;font-weight:400;text-transform:uppercase;color:#fff">RPM: {!!$motor->rpm!!} </span>
<span style="position:absolute;top:630px;left:35px;font-size:18px;font-weight:400;text-transform:uppercase;color:#fff">Voltaje: {!!$motor->volts!!} V</span>

<span style="position:absolute;top:1160px;left:515px;font-size:20px;font-weight:600;color:#336699">CLINICA DE MOTORES ELECTRICOS</span>
<span style="position:absolute;top:1185px;left:712px;font-size:16px;font-weight:500;color:#444">TEL: (502) 2331-1596</span>
<span style="position:absolute;top:1210px;left:572px;font-size:16px;font-weight:500;color:#444">23 AVE 28-46 ZONA 5, GUATEMALA CA</span>
<span style="position:absolute;top:1235px;left:727px;font-size:17px;font-weight:500;color:#0000aa">www.cmeamir.com</span>
<span style="position:absolute;top:1260px;left:722px;font-size:16px;font-weight:500;color:#444">FECHA: {!!date("d-m-Y", strtotime($motor->diagnostico->fecha_fin_diagnostico))!!}</span>
    &nbsp;
</div>
<div class="page" >
    <div id="heading">
        <img src="http://reportesv2.com/img/prueba3.png" style="max-width:920px">
    </div>
    <div id="clinica" >
        @php($tp = 1356)
    <p class="supertitle titulos" style="top:{!!1*$tp+40!!}px;">CLINICA DE MOTORES ELECTRICOS </p>
        <p class="supersubtitle titulos" style="top:{!!1*$tp+80!!}px;"> ORDEN DE SERVICIO</p>
        <p class="title1 titulos" style="top:{!!1*$tp+150!!}px;">CAUSA RAIZ DE FALLO</p>
        
        <p class="os titulos" style="top:{!!1*$tp+165!!}px;"> {!!$motor->year!!}-{!!$motor->os!!}</p>
        <p class="cliente titulos" style="top:{!!1*$tp+200!!}px;"> {!!$motor->cliente->cliente!!}</p>
    </div>
    <div id="placa" style="position:absolute;top:1600;width:100%">
            <p class="title3 titulos" style="font-size:25">DATOS DE PLACA</p>
            <table class="table table-hover titulos" style="font-size:12px;top:40">
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
                    
                </table>
                <p class="title3 titulos" style="font-size:16;top:150">FECHA DE INGRESO A TALLER:</p>
                <div id="comentarios" class="comentarios-cliente" style="top:145"> 
                        <SPAN style="font-size:17px;font-weight:600">{!!date("d-m-Y", strtotime($motor->fecha_ingreso))!!} </SPAN>
                </div>
    </div>
    <div id="footer" class="titulos" style="top:{!!1*$tp+1161!!}">
        
            <img src="http://reportesv2.com/img/footer.png" style="max-width:920px">
            
        </div>
        
    
    <div id="placa" style="position:absolute;top:1780;width:100%">
            <p class="title3 titulos" style="font-size:25">CAUSA DE FALLO</p>
            <table class="table titulos" style="font-size:10px;top:30">
                <tr>
                    <td style="width:60%;">
                       


                            <table class="table" style="font-size:12px;">
                                    
                                                        <tr>
                                                            <td colspan="6"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Falla por alimentación de voltaje:</p> </td>
                                                        </tr>
                                                        <tr >
                                                        <td class="text-right">  
                                                            <div style="border:1px solid #444;width:20px;height:20px;background:{!!$motor->diagnostico->alto_voltaje==1?"#7ecd0c":""!!}"> &nbsp;</div>
                                                        </td>
                                                        <td > Alto / Bajo Voltaje </td>
                                                        
                                                        <td class="text-right"> 
                                                            <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->desfase==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                        </td>    
                                                        <td> Desfase </td>
                                                        
                                                        <td class="text-right">  
                                                                <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->pico_voltaje==1?"#7ecd0c":""!!}"> &nbsp;</div>  
                                                        </td>
                                                        <td> Pico Voltaje </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                                <td colspan="6"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Falla Mecánica:</p> </td>
                                                        </tr>
                                                        <tr >
                                                            <td class="text-right"> 
                                                                <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->desbalance==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                            </td>
                                                            <td > Desbalance </td>
                                                            <td class="text-right">  
                                                                 <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->desalineacion==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                            </td>
                                                            <td> Desalineacion </td>
                                                            <td class="text-right">  
                                                                    <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->desajuste==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                             </td>
                                                            <td> Desajuste en Ejes o Tapaderas </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right"> 
                                                                    <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->rod_inapropiado==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                                    </td>
                                                                <td > Falla de Cojinete </td>
                                                                <td class="text-right">  
                                                                        <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->exceso_carga==1?"#7ecd0c":""!!}"> &nbsp;</div>   
                                                                 </td>
                                                                <td> Exceso de Carga Radial / Axial </td>
                                                                <td class="text-right"> <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->golpe_mecanico==1?"#7ecd0c":""!!}"> &nbsp;</div>   </td>
                                                                <td> Golpes o Maltratos </td>
                                                            </tr>
                                                            <tr>
                                                                    <td colspan="6"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Falla de Lubricación:</p> </td>
                                                            </tr>
                                                        <tr >
                                                            <td class="text-right"> <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->falta_lubricacion==1?"#7ecd0c":""!!}"> &nbsp;</div>    </td>
                                                            <td > Falta de Lubricación </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->exceso_lubricacion==1?"#7ecd0c":""!!}"> &nbsp;</div>    </td>
                                                            <td> Exceso de Lubricación </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->exceso_contaminacion==1?"#7ecd0c":""!!}"> &nbsp;</div>    </td>
                                                            <td> Exceso de Contaminación </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->falla_sello==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td > Falla de Sistema de Sellado de grasa </td>
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->mala_grasa==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td> Grasa Inapropiada</td>
                                                                <td class="text-right">  </td>
                                                                <td>  </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                    <td colspan="6"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Falla Eléctrica:</p> </td>
                                                            </tr>
                                                        <tr >
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->sobrecarga==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td > Sobre-carga </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->falla_ventilacion==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td> Falla de Ventilación </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->pico_amperaje==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td> Pico de Amperaje </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->mal_diseno==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td > Mal diseño de fábrica </td>
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->perdida_eficiencia==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td> Pérdida de Eficiencia</td>
                                                                <td class="text-right"> <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->mala_conexion==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td> Mala Conexión </td>
                                                        </tr>
                                                        <tr>
                                                                <td colspan="6"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Falla de Aislamiento:</p> </td>
                                                        </tr>
                                                        <tr >
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->corto_humedad==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td > Corto a tierra por humedad </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->corto_aislamiento==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td> Corto a tierra par mal aislamiento </td>
                                                            <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->corto_vueltas==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                            <td> Corto entre vueltas </td>
                                                        </tr>
                                                        <tr >
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->golpe_bobinado==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td > Golpe en bobinado </td>
                                                                <td class="text-right">  <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->roze_rotor==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td> Roce de rotor</td>
                                                                <td class="text-right"> <div style="border:1px solid #444;width:25px;height:25px;background:{!!$motor->diagnostico->corto_cables==1?"#7ecd0c":""!!}"> &nbsp;</div> </td>
                                                                <td> Corto en Cables Alimentación </td>
                                                        </tr>
                                    
                                </table>




                    </td>
                    <td style="">
                            @foreach($motor->fotos as $foto)
                                @if ($foto->type==4)
                                    <div style="border:1px solid #ccc;padding:10px"> 
                                        <img src="http://reportesv2.com{!!$foto->thumb!!}" style="max-width:350px;">
                                        <div style="display:block;font-size:12px" class="text-center"><b>{!!$foto->titulo!!}</b></div>
                                        <div style="display:block">{!!$foto->descripcion!!}</div>
                                    </div>
                    
                                @endif
                            @endforeach
                    </td>
                </tr>
                <tr style="padding:0px;margin:0px">
                        <td colspan="2" style="border:0px;padding:0px;margin:0px"> <p class="title3" style="font-size:16;padding:0px;margin:0px">Notas Complementarias:</p> </td>
                </tr>
                <tr style="padding:0px;margin:0px">
                    <td colspan="2" style="border:0px;padding:0px;margin:0px"> 
                        <div style="border: 0px;width:85%;height:110px;">{!! $motor->diagnostico->descripcion!!} </div>
                    </td>
                </tr>
            </table>
    </div>
    <p class="footer-text" style="position:absolute;top:{!!$tp+1270!!}"><b>CLINICA DE MOTORES ELECTRICOS AMIR </b>
        <br> 23 ave 28-46 zona 5. GUATEMALA C.A.
        <BR> servicio@cmeamir.com
        <BR> (502) 2331-1596
        
    </p>
</div>

@php($page = 0)
@for($key=0,$fotos = $motor->getFotosDesarmeClean();$key<count($fotos);$key)
   @php($tp = 1355*(2+$page++))
   
   <div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Partes en buen estado'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">LISTADO DE PARTES</p>
    <p class="title3 titulos" style="font-size:18;top:{!!$tp+280!!}"><img src="http://reportesv2.com/img/ok.png" style="max-width:24px;margin:5px">Partes en buen estado</p>
        @php($i=0)
        
        <table class="table" style="position:absolute;top:{!!$tp+310!!}">
            @for(;$i<6&&($key+$i)<count($fotos);$i++)
                <tr>
                    <td class="text-center">
                            <img src="http://reportesv2.com{!!$fotos[$key+$i]->thumb!!}" style="max-height:250px"> 
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i]->descripcion!!}</div> 

                    </td>
                    @if(($key+$i+1)<count($fotos))
                    <td class="text-center"> 
                            <img src="http://reportesv2.com{!!$fotos[$key+$i+1]->thumb!!}" style="max-height:250px"> 
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i+1]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i+1]->descripcion!!}</div> 
                        @php($i++)
                    </td>
                    @endif
                    
                </tr>
            @endfor
        </table>
        @php($key+=$i)
   </div>
@endfor


@for($key=0,$fotos = $motor->getFotosReemplazo();$key<count($fotos);$key)
    @php($tp = 1355*(2+$page++))
   <div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Partes para reemplazo'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">LISTADO DE PARTES</p>
    <p class="title3 titulos" style="font-size:18;top:{!!$tp+280!!}"> <img src="http://reportesv2.com/img/replace.png" style="max-width:24px;margin:5px">Partes para reemplazo</p>
        @php($i=0)
        
        <table class="table" style="position:absolute;top:{!!$tp+310!!}">
            @for(;$i<6&&($key+$i)<count($fotos);$i++)
                <tr>
                    <td class="text-center">
                            <img src="http://reportesv2.com{!!$fotos[$key+$i]->thumb!!}" style="max-height:230px"> 
                            <div style="display:block;font-size:14px;margin:7px" ><span class="label label-warning"> Es necesario reemplazar </span></div>
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i]->descripcion!!}</div> 

                    </td>
                    @if(($key+$i+1)<count($fotos))
                    <td class="text-center"> 
                            <img src="http://reportesv2.com{!!$fotos[$key+$i+1]->thumb!!}" style="max-height:230px"> 
                            <div style="display:block;font-size:14px;margin:7px" ><span class="label label-warning"> Es necesario reemplazar </span></div>
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i+1]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i+1]->descripcion!!}</div> 
                        @php($i++)
                    </td>
                    @endif
                    
                </tr>
            @endfor
        </table>
        @php($key+=$i)
   </div>
@endfor



@for($key=0,$fotos = $motor->getFotosReparacion();$key<count($fotos);$key)
    @php($tp = 1355*(2+$page++))
   <div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Partes para reparacion'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">LISTADO DE PARTES</p>
    <p class="title3 titulos" style="font-size:18;top:{!!$tp+280!!}"><img src="http://reportesv2.com/img/repair.png" style="max-width:24px;margin:5px">Partes para reparacion</p>
        @php($i=0)
        
        <table class="table" style="position:absolute;top:{!!$tp+310!!}">
            @for(;$i<6&&($key+$i)<count($fotos);$i++)
                <tr>
                    <td class="text-center">
                            <img src="http://reportesv2.com{!!$fotos[$key+$i]->thumb!!}" style="max-height:230px"> 
                            <div style="display:block;font-size:14px;margin:7px" ><span class="label label-danger"> Es necesario reparar </span></div>
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i]->descripcion!!}</div> 

                    </td>
                    @if(($key+$i+1)<count($fotos))
                    <td class="text-center"> 
                            <img src="http://reportesv2.com{!!$fotos[$key+$i+1]->thumb!!}" style="max-height:230px"> 
                            <div style="display:block;font-size:14px;margin:7px" ><span class="label label-danger"> Es necesario reparar </span></div>
                            <div style="display:block;font-size:12px" ><b>{!!$fotos[$key+$i+1]->titulo!!}</b></div>
                            <div style="display:block">{!!$fotos[$key+$i+1]->descripcion!!}</div> 
                        @php($i++)
                    </td>
                    @endif
                    
                </tr>
            @endfor
        </table>
        @php($key+=$i)
   </div>
@endfor

@if ($motor->diagnostico->trabajo_electrico == 1)
@php($tp = 1355*(2+$page++))
<div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Trabajo Electrico'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">TRABAJO ELECTRICO A REALIZAR</p>

        <h1 class="title3" style="position: absolute;top:{!!$tp+280!!}px"> {!!$motor->diagnostico->trabajo_electrico==1?"MANTENIMIENTO PREVENTIVO A BOBINADO":($motor->diagnostico->trabajo_electrico==2?"REBOBINADO DE EQUIPO":"REPARACION PARCIAL EN EQUIPO")!!}</h1>
        <div class="text-center" style="position: absolute;top:{!!$tp+340!!}px;width:900px;">
            <center>
    <table class="table table-bordered"  style="width:90%;margin:20px">
        <tr> 
            <td class="active" style="width:50%"> <b>Nivel de Contaminación</b></td>
            <td> {!!$motor->diagnostico->getContaminacion()!!}
        </tr>
        <tr>
            <td class="active"> <b>Químicos a Utilizar en Lavado</b></td>
            <td class="padding:0px">
                <ul class="list-group" style="margin:0px">
                    @foreach($motor->diagnostico->getQuimicos() as $quimico)
                        <li class="list-group-item active" style="margin:1px;"> {!!$quimico!!}
                        <span class="badge badge-default badge-pill" style="margin:1px;">{!!$motor->diagnostico->cantidad_reprocesos!!} Veces</span>
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td class="active"><b> ¿Es necesario colocar termo-encogible en puntas? </b></td>
            <td> {!!$motor->diagnostico->iCheckTermo==1?"Si es necesario":"No, No es necesario"!!} </td>
        </tr>
        <tr>
                <td class="active"><b> ¿Es necesario re-entallar terminales?</b></td>
                <td> {!!$motor->diagnostico->iCheckTerminales==1?"Si es necesario":"No, No es necesario"!!} </td>
            </tr>
    </table>
            </center>
        </div>
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+680!!}px;left:330px">FOTOGRAFÍAS BOBINADO</p>
    <table class="table" style="position:absolute;top:{!!$tp+710!!}">
        <tr>
        @for($key=0,$fotos=$motor->getFotosElectrico();$key<count($fotos)&&$key<2;$key++)
            <td class="text-center">
                <img src="http://reportesv2.com{!!$fotos[$key]->thumb!!}" style="max-height:300px"> 
                <div style="display:block;font-size:14px;margin:7px" >
                    @if ($motor->diagnostico->contaminacion >1)
                    <span class='label label-danger'>Es necesario dar mantenimiento</span>
                    @elseif($motor->diagnostico->contaminacion ==1)
                    <span class='label label-warning'>Es recomendable dar mantenimiento</span>
                    @else
                    <span class='label label-success'>No es necesario lavar</span>
                    @endif
                </div>
                <div style="display:block;font-size:12px" ><b>{!!$fotos[$key]->titulo!!}</b></div>
                <div style="display:block">{!!$fotos[$key]->descripcion!!}</div> 

        </td>
        @endfor
    </tr>
    </table>
</div>
@elseif ($motor->diagnostico->trabajo_electrico == 2)
@php($tp = 1355*(2+$page++))
<div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Trabajo Electrico'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">TRABAJO ELECTRICO A REALIZAR</p>

        <h1 class="title3" style="position: absolute;top:{!!$tp+270!!}px"> {!!$motor->diagnostico->trabajo_electrico==1?"MANTENIMIENTO PREVENTIVO A BOBINADO":($motor->diagnostico->trabajo_electrico==2?"REBOBINADO DE EQUIPO":"REPARACION PARCIAL EN EQUIPO")!!}</h1>
        <div class="text-center" style="position: absolute;top:{!!$tp+320!!}px;width:900px;">
            <center>
    <table class="table table-bordered"  style="width:90%;margin:20px;font-size:{!!$motor->diagnostico->iCheckSeparar==1?'10px':'12px'!!};">
        <tr> 
            <td class="active" style="width:40%"> <b>Potencia </b></td>
            <td> {!!$motor->infoMotor->reales==1?"Aproximadamente":""!!} {!!$motor->hp!!} {!!$motor->hpkw==1?"KW":"HP"!!} </td>
        </tr>
        
        <tr>
            <td class="active"><b> ¿Es necesario extraer el nucleo del housing? </b></td>
            <td> {!!$motor->diagnostico->iCheckExtraer==1?"Si es necesario":"No, No es necesario"!!} </td>
        </tr>
        <tr>
                <td class="active"><b> Tipo de Carcaza:</b></td>
                <td> {!!$motor->diagnostico->getCarcaza()!!} </td>
        </tr>
        <tr>
            <td class="active"><b> Velocidades:</b></td>
            <td> {!!$motor->diagnostico->getVelocidades()!!} [{!!$motor->rpm!!}rpm] </td>
        </tr>
        <tr>
            <td class="active"><b> ¿Se requiere tratamiento de resinas epoxicas? </b></td>
            <td> {!!$motor->diagnostico->iCheckEpoxitar==1?"Si es necesario":"No, No es necesario"!!} </td>
        </tr>
        <tr>
            <td class="active"><b> Puntas de salida </b></td>
            <td> {!!$motor->diagnostico->puntas_salida!!} </td>
        </tr>
        <tr>
        <td class="active"><b> Complejidad </b></td>
            <td>
                 
                 <table style="width:90%">
                     <tr>
                         @for($i=1;$i<=5;$i++)
                     <td style="margin:1px;border:1px solid #444;background:{!!$motor->diagnostico->complejidad>=$i?$motor->diagnostico->makeColor($i):'#fff'!!}">&nbsp;</td>
                         @endfor
                     </tr>
                 </table>
            </td>
        </tr>
        <tr>
            <td class="active"><b>¿ Hay puntos calientes o arrastre en nucleo? </b></td>
            <td> {!!$motor->diagnostico->iCheckSeparar==1?"Si, hay problemas en nucleo":"No, no hay problemas en nucleo"!!} </td>
        </tr>
        @if($motor->diagnostico->iCheckSeparar==1)
        <tr>
            <td class="active"><b>Zonas afectadas en nucleo </b></td>
            <td class="text-center">
            <img src="{!!$motor->diagnostico->bobinado_puntos!!}" style="max-height:200px">
            </td>
        </tr>
        @endif
    </table>
            </center>
        </div>
        <p class="title3 titulos" style="font-size:20;top:{!!$motor->diagnostico->iCheckSeparar==1?$tp+830:$tp+680!!}px;left:330px">FOTOGRAFÍAS BOBINADO</p>
    <table class="table" style="position:absolute;top:{!!$motor->diagnostico->iCheckSeparar==1?$tp+860:$tp+710!!}">
        <tr>
        @for($key=0,$fotos=$motor->getFotosElectrico();$key<count($fotos)&&$key<2;$key++)
            <td class="text-center">
                <img src="http://reportesv2.com{!!$fotos[$key]->thumb!!}" style="max-height:{!!$motor->diagnostico->iCheckSeparar==1?'250px':'300px'!!}"> 
                <div style="display:block;font-size:14px;margin:7px" >
                    
                    <span class='label label-danger'>Es necesario rebobinar</span>
                    
                </div>
                <div style="display:block;font-size:12px" ><b>{!!$fotos[$key]->titulo!!}</b></div>
                <div style="display:block">{!!$fotos[$key]->descripcion!!}</div> 

        </td>
        @endfor
    </tr>
    </table>
</div>
@elseif ($motor->diagnostico->trabajo_electrico == 3)
@php($tp = 1355*(2+$page++))
<div class="page">
        @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Trabajo Electrico'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+230!!}px">TRABAJO ELECTRICO A REALIZAR</p>

        <h1 class="title3" style="position: absolute;top:{!!$tp+270!!}px"> {!!$motor->diagnostico->trabajo_electrico==1?"MANTENIMIENTO PREVENTIVO A BOBINADO":($motor->diagnostico->trabajo_electrico==2?"REBOBINADO DE EQUIPO":"REPARACION PARCIAL EN EQUIPO")!!}</h1>
        <div class="text-center" style="position: absolute;top:{!!$tp+320!!}px;width:900px;">
            <center>
    <table class="table table-bordered"  style="width:90%;margin:20px;font-size:12px">
        <tr> 
            <td class="active" style="width:40%"> <b>Potencia </b></td>
            <td> {!!$motor->infoMotor->reales==1?"Aproximadamente":""!!} {!!$motor->hp!!} {!!$motor->hpkw==1?"KW":"HP"!!} </td>
        </tr>
        
        
        <tr>
            <td class="active"><b> Descripcion del trabajo a realizar </b></td>
            <td> {!!$motor->diagnostico->desc_bobinado!!} </td>
        </tr>
        <tr>
        
    </table>
            </center>
        </div>
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+650!!}px;left:330px">FOTOGRAFÍAS BOBINADO</p>
    <table class="table" style="position:absolute;top:{!!$motor->diagnostico->iCheckSeparar==1?$tp+860:$tp+710!!}">
        <tr>
        @for($key=0,$fotos=$motor->getFotosElectrico();$key<count($fotos)&&$key<2;$key++)
            <td class="text-center">
                <img src="http://reportesv2.com{!!$fotos[$key]->thumb!!}" style="max-height:{!!$motor->diagnostico->iCheckSeparar==1?'250px':'300px'!!}"> 
                <div style="display:block;font-size:14px;margin:7px" >
                    
                    <span class='label label-danger'>Es necesario rebobinar</span>
                    
                </div>
                <div style="display:block;font-size:12px" ><b>{!!$fotos[$key]->titulo!!}</b></div>
                <div style="display:block">{!!$fotos[$key]->descripcion!!}</div> 

        </td>
        @endfor
    </tr>
    </table>
</div>
@endif

    @for($key=0;$key<count($motor->cojinetes);$key++)
        @php($tp = 1356*(2+$page++))
        @php($cojinete=$motor->cojinetes[$key])
        <div class="page">
            @include("pdf.diagnostico.header",['tp'=>$tp,'tit'=>'Informacion Cojinetes'])
        <p class="title3 titulos" style="font-size:20;top:{!!$tp+270!!}px;text-transform:uppercase">COJINETE LADO {!!$cojinete->pos_cojinete!!}</p>
            <table class="table" style="position:absolute;top:{!!$tp+300!!};font-size:12px">
                    <tr>
                        <td style="width:130px" > <img src="http://reportesv2.com/img/serie1.png" style="max-width:140px"> </td>
                        <td class="text-left" style="width:40%"> 
                            <table class="table table-striped" style="font-size:12px">
                                    <tr>
                                            <td colspan="2"><strong>Medidas Teoricas del Cojinete</strong></td>
                                    </tr>
                                <tr>
                                        <td> Designación </td>
                                <td class="designacion">{!!$cojinete->infoCojinete->designacion!!}</td>
                                </tr>
                                
                                <tr>
                                    <td> D </td>
                                    <td class="diam_externo"> {!!$cojinete->infoCojinete->diam_externo!!}.00 mm </td>
                                </tr>
                                <tr>
                                        <td> d </td>
                                        <td class="diam_interno"> {!!$cojinete->infoCojinete->diam_interno!!}.00 mm</td>
                                </tr>
                                <tr>
                                        <td> B </td>
                                        <td class="ancho"> {!!$cojinete->infoCojinete->ancho!!}.00 mm</td>
                                </tr>
                                <tr>
                                        <td> Tipo </td>
                                        <td class="tipo_rodamiento">{!!$cojinete->infoCojinete->getTipo()!!}</td>
                                </tr>
                                <tr>
                                        <td> Velocidad Maxima </td>
                                        <td class="vel"> {!!$cojinete->infoCojinete->limite_velocidad!!} rpm</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:40%">
                                <table class="table table-striped" style="font-size:12px">
                                        <tr>
                                                <td colspan="2"><strong>Medidas Reales del Cojinete</strong></td>
                                        </tr>
                                        <tr>
                                                <td> Designación </td>
                                        <td class="designacion">{!!$cojinete->infoCojinete->designacion!!} {!!$cojinete->getSufix()!!}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:50%"> <span> Diametro Externo</span></td>
                                            <td> {!!$cojinete->diam_externo!!} mm</td>
                                        </tr>
                                        <tr>
                                                <td> <span> Diametro Interno</span></td>
                                                <td> {!!$cojinete->diam_interno!!} mm</td>
                                        </tr>
                                        <tr>
                                                <td> <span> Sellos</span></td>
                                                <td>
                                                        {!!$cojinete->getSellos()!!}
                                                </td>
                                        </tr>
                                        <tr>
                                                <td> <span> Juego Radial</span></td>
                                                <td>
                                                        {!!$cojinete->getJuego()!!}
                                                </td>
                                        </tr>
                                        <tr>
                                                <td> <span> Jaula</span></td>
                                                <td>
                                                        {!!$cojinete->getJaula()!!}
                                                </td>
                                        </tr>
                                    </table>  
                        </td>
                    </tr>
            </table>
            <table class="table" style="position:absolute;top:{!!$tp+560!!};font-size:12px">
                    <tr>
                        <td class="active" style="width:25%"> Marca Original del Cojinete </td>
                    <td style="width:25%"> {!!$cojinete->marca_original!!}
                   
                        <td class="active" style="width:25%"> Marca a colocar: </td>
                        <td >
                            {!!$cojinete->getMarca()!!}
                        </td>
                    </tr>
                </table>
                
                <p class="title3 titulos" style="font-size:20;top:{!!$tp+600!!}px;text-transform:uppercase">MEDIDAS ALOJAMIENTO</p>
                <table class="table" style="position:absolute;top:{!!$tp+630!!};font-size:12px">
                        <tr>
                                <td style="width:150px"> 
                                        <img src="http://reportesv2.com/img/medidas_cuna1.png" style="max-width:100px"><br>
                                        <img src="http://reportesv2.com/img/medidas_cuna2.png" style="max-width:100px"> <br>
                                        <label> Metodo de Medición </label>

                                    </td>
                                    <td>
                                        <table class="table table-hover table-bordered" style="font-size:10px">
                                            <tr class="headings">
                                                <th style="background:#73879C;color:#fff;width:8%"> </th>
                                                <th class="text-center" style="background:#73879C;color:#fff;width:23%" > Medida A </th>
                                                <th class="text-center" style="background:#73879C;color:#fff;width:23%"> Medida B </th>
                                                <th class="text-center" style="background:#73879C;color:#fff;width:23%"> Medida C </th>
                                                <th class="text-center" style="background:#73879C;color:#fff;width:23%"> Medida D </th>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="active"> X </td> 
                                                <td> {!!$cojinete->medidas->first()->med_xa==0?"":number_format($cojinete->medidas->first()->med_xa,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_xb==0?"":number_format($cojinete->medidas->first()->med_xb,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_xc==0?"":number_format($cojinete->medidas->first()->med_xc,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_xd==0?"":number_format($cojinete->medidas->first()->med_xd,3)." mm"!!} </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="active"> Y </td> 
                                                <td> {!!$cojinete->medidas->first()->med_ya==0?"":number_format($cojinete->medidas->first()->med_ya,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_yb==0?"":number_format($cojinete->medidas->first()->med_yb,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_yc==0?"":number_format($cojinete->medidas->first()->med_yc,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_yd==0?"":number_format($cojinete->medidas->first()->med_yd,3)." mm"!!} </td>
                                        </tr>
                                        <tr class="text-center">
                                                <td class="active"> Z </td> 
                                                <td> {!!$cojinete->medidas->first()->med_za==0?"":number_format($cojinete->medidas->first()->med_za,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_zb==0?"":number_format($cojinete->medidas->first()->med_zb,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_zc==0?"":number_format($cojinete->medidas->first()->med_zc,3)." mm"!!} </td>
                                                <td> {!!$cojinete->medidas->first()->med_zd==0?"":number_format($cojinete->medidas->first()->med_zd,3)." mm"!!} </td>
                                            </tr>
                                            <tr>
                                                    <td colspan="2" class="active">Máxima holgura <b>permitida</b> {!!$cojinete->tolerancia<=2?"(K7)":"(H6)"!!}: </td>
                                                    <td colspan="1">(+) {!!$cojinete->getMaxTolerancia()!!}  &#181;m</td>
                                                    <td colspan="1" class="active"> Holgura encontrada: </td>
                                                    <td colspan="1">{!!$cojinete->medidas->first()->getMaxHolguraCojinete()!!} &#181;m</td>
                                            </tr>
                                            <tr>
                                            <td colspan="2" class="active">Mínima interferencia <b>permitida</b> {!!$cojinete->tolerancia<=2?"(K7)":"(H6)"!!}: </td>
                                                    <td colspan="1"> (+) {!!$cojinete->getMinTolerancia()!!}  &#181;m</td>
                                                    <td colspan="1" class="active">Interfenecia encontrada: </td>
                                                    <td colspan="1">{!!$cojinete->medidas->first()->getMaxInterferenciaCojinete()!!} &#181;m</td>
                                            </tr>
                                            <tr>
                                                    <td colspan="2" class="active">Recomendamos: </td>
                                                    <td colspan="3"> {!!$cojinete->medidas->first()->getRecomendacion()!!} </td>
                                            </tr>
                                        </table>
                                    </td>
                        </tr>
                    </table>
                    
                    <p class="title3 titulos" style="font-size:20;top:{!!$tp+870!!}px;text-transform:uppercase">MEDIDAS EJE</p>
                    <table class="table" style="position:absolute;top:{!!$tp+910!!};font-size:12px">
                            <tr style="vertical-align:top" class="text-top">
                                    <td style="width:150px;vertical-align:top"> 
                                            
                                            <img src="http://reportesv2.com/img/medidas_eje.png" style="max-width:100px;position:absolute;top:10px">
                                            <img src="http://reportesv2.com/img/medidas_eje2.png" style="max-width:90px;position:absolute;top:100px">
                                            <label style="position:absolute;top:190px"> Metodo de Medición </label>

                                        </td>
                                        
                                        <td>
                                            <table class="table table-hover table-bordered" style="font-size:10px">
                                                <tr class="headings">
                                                    <th style="background:#73879C;color:#fff;width:25%"> </th>
                                                    <th class="text-center" style="background:#73879C;color:#fff;width:25%"> Medida u </th>
                                                    <th class="text-center" style="background:#73879C;color:#fff;width:25%"> Medida v </th>
                                                    <th class="text-center" style="background:#73879C;color:#fff;width:25%"> Medida w </th>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td class="active"> Pos a </td> 
                                                    <td> {!!$cojinete->medidas->first()->med_au==0?"":number_format($cojinete->medidas->first()->med_au,3)!!} </td>
                                                    <td> {!!$cojinete->medidas->first()->med_av==0?"":number_format($cojinete->medidas->first()->med_av,3)!!} </td>
                                                    <td> {!!$cojinete->medidas->first()->med_aw==0?"":number_format($cojinete->medidas->first()->med_aw,3)!!} </td>
                                                    
                                                </tr>
                                                <tr>
                                                        <td class="active"> Pos b </td> 
                                                        <td> {!!$cojinete->medidas->first()->med_bu==0?"":number_format($cojinete->medidas->first()->med_bu,3)!!} </td>
                                                        <td> {!!$cojinete->medidas->first()->med_bv==0?"":number_format($cojinete->medidas->first()->med_bv,3)!!} </td>
                                                        <td> {!!$cojinete->medidas->first()->med_bw==0?"":number_format($cojinete->medidas->first()->med_bw,3)!!} </td>
                                                        
                                                </tr>
                                                <tr>
                                                <td colspan="1" class="active">Mínima interferencia permitida ({!!$cojinete->getToleranciasEjeTraduccion($cojinete->getToleranciaEje())!!}): </td>
                                                        <td colspan="1">{!!$cojinete->getMaxToleranciaEje()!!} &#181;m</td>
                                                        <td colspan="1" class="active">Ajuste más holgado: </td>
                                                        <td colspan="1">{!!$cojinete->medidas->first()->getMaxInterferenciaEje()!!} &#181;m</td>
                                                </tr>
                                                <tr>
                                                        <td colspan="1" class="active">Maxima interferencia permitida ({!!$cojinete->getToleranciasEjeTraduccion($cojinete->getToleranciaEje())!!}): </td>
                                                        <td colspan="1"> {!!$cojinete->getMinToleranciaEje()!!} &#181;m</td>
                                                        <td colspan="1" class="active">Ajuste con mayor interferencia: </td>
                                                        <td colspan="1">{!!$cojinete->medidas->first()->getMaxHolguraEje()!!} &#181;m</td>
                                                </tr>
                                                <tr>
                                                        <td colspan="1" class="active">Recomendamos </td>
                                                        <td colspan="3"> {!!$cojinete->medidas->first()->getRecomendacionEje()!!} </td>
                                                </tr>
                                            </table>
                                        </td>
                            
                            </tr>      
                        </table>
                        
                        <table style="position:absolute;top:{!!$tp+1120!!}">
                            <tr>
                            @for($i=0,$j=0;$i<count($motor->fotos)&&$j<4;$i++)
                                @if($motor->fotos[$i]->type==6)
                                  @php($j++)
                                    <td> 
                                    <img src="http://reportesv2.com{!!$motor->fotos[$i]->thumb!!}" style="max-width:200px;padding:5px;">
                                    </td>
                                @endif
                            @endfor
                            </tr>
                        </table>
                        
                        
        </div>
        
    @endfor


   



