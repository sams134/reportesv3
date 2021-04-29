<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="http://reportesv2.com/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .densidades{
        position:absolute;
        width: 100%;
    }
    .logo{
        position: absolute;
        top:-10px;
        left:300px;
    }
    .title{
        position: absolute;
        top:90px;
        left:240px;
        font-size: 25px;
    }
    .subtitle{
        position: absolute;
        font-size: 18px;
        font-weight: bold;
    }
    .os-title{
        top:160px;
        left:0px;
    }
    .os{
        color: #770000;
        font-size: 25px;
        left:200px;
        top:155px;
        text-transform: uppercase;
    }
    .cliente-title{
        top:160px;
        text-transform: uppercase;
    }
    .tecnico-title{
        top:190px;
        text-transform: uppercase;
    }
    .causa{
        position: absolute;
        top:220px;
        left:0px;
        width: 100%;
    }
    .datos-placa
    {
        position: absolute;
        top:270px;
        left:0px;
    }
    .conexion
    {
        position: absolute;
        top: 360px;
        left:0px;
    }
    .medidas-nucleo
    {
        position: absolute;
        top:450px;
        left:0px;
        width:40%;
    }
    .motorimg
    {
        position: absolute;
        top:460px;
        left:490px;
        width:320px
    }
    .eje-div
    {
        position: absolute;
        top:640px;
        border: 1px solid #cccccc;
        width:25px;
        height:25px;
    }
    .eje-title
    {
        position: absolute;
        top:640px;
        font-size: 16px;
    }
    .agrupacion
    {
        position: absolute;
        top:700px;
        
        width:48%;
    }
    .active2
    {
        background:#e5e5e5;
    }
    table.table-bordered{
    border:1px solid blue;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid #c2c2c2;
}
table.table-bordered > tbody > tr > td{
    border:1px solid #c2c2c2;
}
    
</style>
<div class="densidades">
    <img src="http://reportesv2.com/img/logobw.jpg" style="max-width:250px;" class="logo">
    <h1 class="title">HOJA DE DATOS DE MOTOR</h1>

    <span class="subtitle os-title">ORDEN DE SERVICIO:</span>
    <span class="subtitle os">{{$motor->year}}-{{$motor->os}}</span>

    <span class="subtitle cliente-title" style="left:500px;">CLIENTE:</span>
    <span class="subtitle cliente-title" style="left:590px;font-weight:500">{{$motor->cliente->cliente}}</span>

    <span class="subtitle tecnico-title" style="left:0px;">TECNICO:</span>
    <span class="subtitle tecnico-title" style="left:100px;border-bottom:2px solid #000;width:300px;top:188px">{{$tecnico->name}}</span>

    <span class="subtitle tecnico-title" style="left:500px;">MARCA:</span>
    <span class="subtitle tecnico-title" style="left:580px;">{{$motor->marca}}</span>

    <table class="causa table table-bordered" style="border:1px solid #550000">
        <tr>
            <td class="active2" style="width:180px">CAUSA DE FALLO</td>
            <td></td>
        </tr>
    </table>
    <table class="datos-placa table table-bordered">
        <tr>
            <td style="width:16%" class="active2">POTENCIA</td>
             <td style="width:16%">{{$motor->hp}} 
                 {{$motor->hpkw==1?"Kw":"Hp"}} </td>
            <td style="width:16%" class="active2">RPM</td>
             <td style="width:16%">{{$motor->rpm}}</td>
            <td style="width:16%" class="active2">HZ</td>
             <td style="width:16%">{{$motor->hz}}</td>
        </tr>
        <tr>
                <td style="width:16%" class="active2">POLOS</td>
                 <td style="width:16%"> </td>
                <td style="width:16%" class="active2">RANURAS</td>
                <td style="width:16%"></td>
                <td style="width:16%" class="active2">FASES</td>
        <td style="width:16%"> {{$motor->phases}}</td>
            </tr>
    </table>
    <table class="conexion table table-bordered">
        <tr>
            <td style="width:20%" class="active2">VOLTAJES</td>
            <td style="width:30%"></td>
            <td style="width:20%" class="active2">AMPERAJES</td>
            <td style="width:30%"></td>
        </tr>
        <tr>
                <td style="width:20%" class="active2">CONEXION</td>
                <td style="width:30%"></td>
                <td style="width:20%" class="active2">CIRCUITOS</td>
                <td style="width:30%"></td>
            </tr>
    </table>
    <table class="table table-bordered medidas-nucleo">
        <tr>
            <td class="active2" style="width:45%">LARGO NUCLEO:</td>
            <td style="width:55%"></td>
        </tr>
        <tr>
                <td class="active2" style="width:45%">DIAM. NUCLEO:</td>
                <td style="width:55%"></td>
        </tr>
        <tr>
                <td class="active2" style="width:45%">BACK IRON:</td>
                <td style="width:55%"></td>
        </tr>
        <tr>
                <td class="active2" style="width:45%">ANCHO DIENTE:</td>
                <td style="width:55%"></td>
        </tr>
        <tr>
                <td class="active2" style="width:45%">PROF. RANURA:</td>
                <td style="width:55%"></td>
        </tr>
       
    </table>
    <img src="http://reportesv2.com/img/motor.jpg" alt="" class="motorimg">
    <div class="eje-div" style="left:430px;"></div>
    <span class="eje-title" style="left:460px">EJE LADO IZQUIERDO</span>
    <div class="eje-div" style="left:660px;"></div>
    <span class="eje-title" style="left:690px">EJE LADO DERECHO</span>

    @if ($motor->phases == 3)
    <span style="position:absolute;top:675px;left:0px;font-size:18px;font-weight:bold">BOBINADO TRIFASICO</span>
    
    @endif
    @if ($motor->phases == 1)
    <span style="position:absolute;top:675px;left:0px;font-size:18px;font-weight:bold">BOBINADO DE MARCHA</span>
    @endif
    <table class="table table-bordered agrupacion">
        <tr>
                <td class="active2" style="width:50%">BOBINAS X GRUPO:</td>
                <td style="width:50%"></td>
        </tr>
        <tr>
                <td class="active2" style="width:50%">GRUPOS:</td>
                <td style="width:50%"></td>
        </tr>
    </table>
    @if ($motor->phases == 1)
    <table class="table table-bordered agrupacion" style="left:450px">
            <tr>
                    <td class="active2" style="width:50%">BOBINAS X GRUPO:</td>
                    <td style="width:50%"></td>
            </tr>
            <tr>
                    <td class="active2" style="width:50%">GRUPOS:</td>
                    <td style="width:50%"></td>
            </tr>
    </table>
    @endif


    <span style="position:absolute;top:810px;left:0px;font-size:16px;font-weight:bold">CALIBRES:</span>
    <span style="position:absolute;top:840px;left:0px;font-size:16px;font-weight:bold">HILOS:</span>
    <table class="table table-bordered" style="position:absolute;top:785px;left:100px;width:35%">
        <tr style="height:30px">
            <td style="width:25%"></td>
            <td style="width:25%"></td>
            <td style="width:25%"></td>
            <td style="width:25%"></td>
        </tr>
        <tr style="height:30px">
                <td style="width:25%"></td>
                <td style="width:25%"></td>
                <td style="width:25%"></td>
                <td style="width:25%"></td>
            </tr>
    </table>

    @if ($motor->phases == 1)
    <span style="position:absolute;top:810px;left:450px;font-size:16px;font-weight:bold">CALIBRES:</span>
    <span style="position:absolute;top:840px;left:450px;font-size:16px;font-weight:bold">HILOS:</span>
    <table class="table table-bordered" style="position:absolute;top:785px;left:550px;width:35%">
        <tr style="height:30px">
            <td style="width:25%"></td>
            <td style="width:25%"></td>
            <td style="width:25%"></td>
            <td style="width:25%"></td>
        </tr>
        <tr style="height:30px">
                <td style="width:25%"></td>
                <td style="width:25%"></td>
                <td style="width:25%"></td>
                <td style="width:25%"></td>
            </tr>
    </table>
    @endif

    <span style="position:absolute;top:880px;left:0px;font-size:16px;font-weight:bold">PASO 1-:</span>
    <span style="position:absolute;top:910px;left:0px;font-size:16px;font-weight:bold">VUELTAS:</span>
    <table class="table table-bordered" style="position:absolute;top:855px;left:100px;width:38%">
        <tr style="height:30px">
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
        </tr>
        <tr style="height:30px">
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
        </tr>
    </table>

    @if ($motor->phases == 1)
    <span style="position:absolute;top:880px;left:450px;font-size:16px;font-weight:bold">PASO 1-:</span>
    <span style="position:absolute;top:910px;left:450px;font-size:16px;font-weight:bold">VUELTAS:</span>
    <table class="table table-bordered" style="position:absolute;top:855px;left:550px;width:38%">
        <tr style="height:30px">
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
        </tr>
        <tr style="height:30px">
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
            <td style="width:16%"></td>
        </tr>
    </table>
    @endif
    
    <table class="table table-bordered" style="position:absolute;top:935px;left:0px;">
        <tr>
                <td class="active2" style="width:13%">#PUNTAS:</td>
                <td style="width:16%"></td>
                <td class="active2" style="width:20%">LARGO PUNTAS:</td>
                <td style="width:16%"></td>
                <td class="active2" style="width:20%">CALIBRE PUNTAS:</td>
                <td style="width:16%"></td>
        </tr>
    </table>
    <div class="eje-div" style="left:0px;top:1010px"></div>
    <span class="eje-title" style="left:40px;top:1010px">ALAMBRE CLASE F</span>
    <div class="eje-div" style="left:0px;top:1040px"></div>
    <span class="eje-title" style="left:40px;top:1040px">ALAMBRE ULTRASHIELD</span>

    <div class="eje-div" style="left:300px;top:1010px"></div>
    <span class="eje-title" style="left:340px;top:1010px">BOBINADO ORIGINAL</span>
    <div class="eje-div" style="left:300px;top:1040px"></div>
    <span class="eje-title" style="left:340px;top:1040px">YA REBOBINADO</span>

    <div class="eje-div" style="left:600px;top:1010px"></div>
    <span class="eje-title" style="left:640px;top:1010px">SECUENCIA ABC</span>
    <div class="eje-div" style="left:600px;top:1040px"></div>
    <span class="eje-title" style="left:640px;top:1040px">SECUENCIA ACB</span>

    <span style="position:absolute;top:1085px;left:0px;font-size:16px;font-weight:bold">MONTAJE* :</span>
    <span style="position:absolute;top:1115px;left:100px;font-size:10px;font-weight:400">*Si hay diferentes vueltas por bobina :</span>
    <table class="table table-bordered" style="position:absolute;top:1060px;left:100px;width:50%">
            <tr style="height:30px">
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
                <td style="width:10%"></td>
            </tr>
    </table>
    <span style="position:absolute;top:1130px;left:0px;font-size:16px;font-weight:bold">DIAGRAMA :</span>
    <div style="border:1px solid #ccc;width:100%;height:150px;position:absolute;top:1150px;left:0px"></div>
</div>