<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://reportesv2.com/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.titulo{
    color:#0075da;
    font-size: 18px;
    font-weight: bold;
    position: absolute;
}
.titulo2
{
    font-size: 25px;
    font-weight: bold;
    margin: 10px;
    color:#0075da;
    position: absolute;
}
.texto-b
{
    position: absolute;
    font-weight: bold;
}
.texto
{
    position: absolute;
}
.comentarios-cliente
{
    position: absolute;
    top:180px;
}
.supertitle{
    position: absolute;
    top:10px;
    left:0px;
    font-size: 30px;
    font-weight: bold;
    color: #444;
}
.title3
{
    position: absolute;
    top:180px;
}
table.table-bordered > thead > tr > th{
    border:1px solid #c2c2c2;
}
table.table-bordered > tbody > tr > td{
    border:1px solid #c2c2c2;
}
</style>


 <img src="http://reportesv2.com/img/logo_small.jpg" alt="" style="max-width:200px;left:700px;position:absolute;"></td>
 
        <span class="supertitle">SOLICITUD DE MATERIALES</span>
        {{-- <span class=" pull-right titulo" style="top:100px;left:0px">Orden de Servicio</span> <br> --}}
        <span style="position:absolute;left:0px;top:120px;font-size:15px;font-weight:bold">TECNICO: </span>
<span style="position:absolute;left:90px;top:120px;font-size:15px;font-weight:400;border-bottom:1px solid #c2c2c2;width:300px;text-align:center"> {{$tecnico->name}}</span>

        <span style="position:absolute;left:400px;top:120px;font-size:15px;font-weight:bold">CLIENTE: </span>
        <span style="position:absolute;left:480px;top:120px;font-size:15px;font-weight:500;border-bottom:1px solid #c2c2c2;width:400px;text-align:center">{{$motor->cliente->cliente}} </span>

        <span class="pull-right titulo2 text-uppercase" style="top:30px;left:-10px">OS: {{$motor->year}}-{{$motor->os}}</span>

    
        <span class=" pull-right" style="position:absolute;left:0px;top:160px;font-size:15px;font-weight:bold">DATOS DE PLACA</span> <br>

        <div id="placa">
                
                <table class="table table-bordered titulos" style="font-size:12px;top:180;width:100%;left:0px;position:absolute">
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
                                <td class="active"> Hz. </td>
                                <td> {!!$motor->hz!!} 
                                <td class="active"> Efficiencia </td>
                                <td> {!!$motor->eff!!}
                        </tr>
                        
                    </table>
                    <span style="position:absolute;left:0px;top:290px;font-size:15px;font-weight:500">COMENTARIOS DE CLIENTE:</span>
                    <span style="position:absolute;left:210px;top:290px;font-size:15px;font-weight:500">{!!$motor->comentarios!!}</span>
                    <span style="position:absolute;left:0px;top:320px;font-size:20px;font-weight:bold">MATERIALES:</span>
                    <table class="data table table-striped no-margin" style="font-size:small;position:absolute;left:0px;top:350px">
                            <thead>
                              <tr>
                                
                                <th>Cantidad</th>
                                <th>Material</th>
                                <th>Presentacion</th>
                                <th>Despachado</th>
                              </tr>
                            </thead>
                            <tbody>
                                  @foreach ($motor->pedido_materiales as $key=>$pedido)
                                      <tr>
                                      
                                      <td>{{$pedido->cantidad}}</td>
                                      <td>{{$pedido->material}}</td>
                                      <td>{{$pedido->presentacion}}</td>
                                        <td>
                                            @if($pedido->despachado == 0)
                                              No
                                              @elseif($pedido->despachado == 100)
                                              si
                                              @else
                                               {{$pedido->despachado}}%
                                              @endif
                                        </td>
                                      </tr>
                                  @endforeach
                            </tbody>
                          </table>
            </div>
            <span style="position:absolute;left:0px;top:1250px;font-size:15px;font-weight:bold">SUPERVISADO POR: </span>
<span style="position:absolute;left:150px;top:1250px;font-size:15px;font-weight:400;border-bottom:1px solid #c2c2c2;width:300px;text-align:center">&nbsp; </span>
<span style="position:absolute;left:500px;top:1250px;font-size:15px;font-weight:bold">Fecha: </span>

<span style="position:absolute;left:550px;top:1250px;font-size:15px;font-weight:400;border-bottom:1px solid #c2c2c2;width:300px;text-align:center">{{date('d/m/Y')}} </span> 
