<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
</head>

<style>
     .table{
        width:100%;border-collapse:collapse;border-color:#ccc;border-spacing: 0;
     }
     .table td{
         padding:8px;
         border-top:1px solid #ddd;
         vertical-align: top;

     }
     
</style>

<body>
        <span> Estimado </span> <br>
        <strong> {{$motor->infoMotor->contacto}} </strong> <br>
        <span style="text-transform:uppercase"> {{$motor->cliente->cliente}} </span> <br>
        <span> Presente </span>
        <br><br><br>

       <p> 
       El dia de hoy {{date("d-m-Y", strtotime($motor->fecha_ingreso))}} recibimos su equipo "{{$motor->id_tipoequipo}}" identificado por ustedes como {{$motor->infoMotor->nombre_equipo}} para reparacion.
       <table style="width:100%;border-collapse:collapse;border-color:#ccc;border-spacing: 0;border:1px solid #ccc">
           <tr>
                <td style="border:1px solid #ccc;background:#eee;width:20%"> HP </td>
                <td style="border:1px solid #ccc;"> {{$motor->hp}} {{$motor->hpkw==0?"HP":"KW"}} </td>
          
                <td style="border:1px solid #ccc;background:#eee;width:20%"> RPM </td>
                <td style="border:1px solid #ccc;"> {{$motor->rpm}} </td>
           </tr>
           <tr>
                <td style="border:1px solid #ccc;background:#eee;width:20%"> Marca </td>
                <td style="border:1px solid #ccc;"> {{$motor->marca}} </td>

                <td style="border:1px solid #ccc;background:#eee;width:20%"> Serie </td>
                <td style="border:1px solid #ccc;"> {{$motor->serie}} </td>
           </tr>
           <tr>
                <td style="border:1px solid #ccc;background:#eee;width:20%"> Modelo </td>
                <td style="border:1px solid #ccc;"> {{$motor->modelo}} </td>
                <td style="border:1px solid #ccc;background:#eee;width:20%"> Voltaje </td>
                <td style="border:1px solid #ccc;"> {{$motor->volts}} </td>
           </tr>
           
       </table>
       <br>
       @if($motor->infoMotor->emergencia >= 6) 
       Este equipo esta entrando como emergencia, y tenga la confianza que haremos todo lo posible para recuperar su equipo en el menor tiempo posible <br>
       @endif
       Le adjuntamos el documento de ingreso donde le detallamos los datos de placa, inventario de partes, y trabajos a realizar.
       Por favor cualquier duda o comentario, escribirnos a cmeamir@cmeamir.com.
       </p> <br>

     <p> Sin ning&uacute;n otro pendiente <br>
        Nos suscribimos muy atentamente,<br>
        <strong> CLINICA DE MOTORES ELECTRICOS AMIR</strong>
     </p>


       
</body>

</html>