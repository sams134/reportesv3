@extends('layouts.internal')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             @include('inc.intsidebar')
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
             @include('inc.intnavbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <br>
              @include('inc.messages') <br>
              @include('inc.titulo') <br>

         {{--  {!! Form::open(['route' => 'files.store','method'=>'POST','files'=>'true','id' => 'my-dropzone','class'=>'form-horizontal form-label-left input_mask dropzone']) !!}  --}}
         <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data" id="my-dropzone" class="form-horizontal form-label-left input_mask dropzone">
              <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.informacion_cliente') 
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.informacion_equipo')  
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.inventario')  
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.operacion')
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.trabajos')  
                  </div> <!--columna -->
                  <div class="col-lg-6 col-md-12 col-xs-12">
                              @include('motores.inc.fotos')
                  </div> <!--columna -->
               </div>  <!--  </row> -->
               <br>
                                              
              <div class="form-group">
                     <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">                      
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" id="submit-all">Guardar Nuevo Equipo</button>
                            <button type="submit" class="btn btn-success" id="">submit</button>
                     </div>
              </div>
              <div class="ln_solid"></div>
              <input type="hidden" name="contactohide" value="" id="contactohide">
              <input type="hidden" name="tipoequipohide" value="Motor" id="tipoequipohide">
            </form>     
      </div>
    </div>
  </div>


 @include('inc.footer')
 
 <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
 <script src="{{asset('vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
 
 <script type="text/javascript">
      $(document).ready(function(){

            $(".checkTrabajo").click(function(event){        
         });
            // cargar el valor del select tipo equipo en variable hidden para que se vaya en la forma
            $('#id_tipoequipo').editableSelect({filter:false}).on('hidden.editable-select', function (e, li) {
                  if (li == null)     
                        $('#tipoequipohide').val($('#id_tipoequipo').val());
                  else 
                        $('#tipoequipohide').val(li.text());   
                  
            });

            // cargar el valor del select contacto en variable hidden para que se vaya en la forma
            // cargar el email y telefono via ajax
            $('#contactoTXT').editableSelect({filter:false}).on('select.editable-select', function (e, li) {
                  if (li == null)
                          $('#contactohide').val($('#contactoTXT').val());
                  else
                    $('#contactohide').val(li.text());   
                  var getRequest = '/contactoSelect/'+li.val();
                  
                  $.get(getRequest,function(data)     
                  {
                        var contacto = JSON.parse(data);  
                        $('#id_email').val(contacto.email);
                        $("#id_telefonoTXT").val(contacto.telefono);

                  });
            });

            
            
            $('#clienteSelect').change(function(){
                  var getRequest = '/clienteSelect/'+$('#clienteSelect').val();
                  
                  $.get(getRequest,function(data)
                  {
                        var contactos = JSON.parse(data);
                        $('#contactoTXT').editableSelect('clear'); 
                        for (i=0;i<contactos.length;i++)
                               $('#contactoTXT').editableSelect('add',function(){
                                    $(this).val(contactos[i].id);
                                    $(this).text(contactos[i].contacto);
		                  });         
                  });
            });

            $('#addWork').click(function(){
                  $('#table_works').append("<tr><td style='width:60%'> <input type='text' name='works[]' class='form-control col-md-12' placeholder='Trabajo Especifico'> </td><td><div class='checkbox'><label><input type='checkbox' checked='checked'  class='checkTrabajo'> Cotizar<input type='hidden' name='cotizarTrabajo[]' value='1'></label></div></td> <td>  <a class='btn btn-danger' id='delWork'><i class='fa fa-minus-circle'> Eliminar </i></a></td></tr>");
            });
            // eliminar trabajos especificos
            $("#table_works").click(function(event){
                  var element = $(event.target);
                  if (event.target.nodeName == 'I' || event.target.nodeName == 'A')
                    element.closest("tr").remove();
                  else
                     
                  if (element.attr('type')=="checkbox")
                  {
                        var num = $(event.target).next().val();
                        num = (1*num+1)%2;
                        $(event.target).next().val(num);
                  }
            });
            
            $("#emergencia").knob({"change" :function(v){
                  if (v>=7) {
                        $('#emergencia').trigger(
                              'configure',{"fgColor":"#d9534f","inputColor":"#d9534f",}
                        );
                        $('#cobro').show();
                  }
                  else{
                        $('#emergencia').trigger(
                              'configure',{"fgColor":"#26B99A","inputColor":"#26B99A",}
                        );
                        $('#cobro').hide();
                  }

            }});
      });
  </script>
<script type="text/javascript">
      $(function () { 
        $('#datetimepicker1').datetimepicker();
      });
  </script>
  
  <script>
            Dropzone.options.myDropzone = {
                     autoProcessQueue: false,
                     uploadMultiple: true,
                     maxFiles: 10,
                     maxFilesize : 39,
                     parallelUploads: 4,
                     acceptedFiles: ".jpeg,.jpg,.png,.gif",
                     addRemoveLinks: true, 
                     headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                     
                     init: function() {
                         var submitBtn = document.querySelector("#submit-all");
                         myDropzone = this;
                         
                         submitBtn.addEventListener("click", function(e){
                              e.preventDefault();
                              e.stopPropagation();
                              $('#datetimepicker1 input[type=text]').css({'background-color' : '#fff', 'border':'1px solid #ccc'});
                              $('#year').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                              $('#newOs').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                              $('#contactoTXT').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                              $('#id_tipoequipo').css({'background-color' : '#Fff', 'border':'1px solid #ccc'});
                              var validated = true;
                              var equipo = null;
                              if ($('#clienteSelect').val() == 0 ){
                                 validated = false;
                                 alert("Falta el cliente");
                              }
                              
                              if ($('#year').val() == "")
                              {
                                    validated = false;
                                    $('#year').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                                    alert('Falta el año');
                                    equipo = equipo==null?$('#year'):equipo;
                              }
                              if ($('#newOs').val() == "")
                              {
                                    validated = false;
                                    $('#newOs').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                                    alert('Falta el numero de orden');
                                    equipo = equipo==null?$('#newOs'):equipo;
                              }

                              if ($('#datetimepicker1 input[type=text]').val() == ""){
                                validated = false;
                                $('#datetimepicker1 input[type=text]').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                                equipo = equipo==null?$('#datetimepicker1 input[type=text]'):equipo;
                                alert('Falta la fecha');
                              }
                              
                              
                             
                             if ($('#contactohide').val() == ""){
                                    $('#contactoTXT').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                                    validated = false;
                                    alert('Falta el contacto')
                                    equipo = equipo==null?$('#contactoTXT'):equipo;
                             }
                             if ($('#tipoequipohide').val() == ""){
                                    $('#id_tipoequipo').css({'background-color' : '#FAEDEC', 'border':'1px solid #E85445'});
                                    validated = false;
                                    alert('Falta el Tipo de Equipo');
                                    equipo = equipo==null?$('#id_tipoequipo'):equipo;

                             }
                              

                              if (validated){
                                   // $("#my-dropzone").submit();
                                    if (myDropzone.files.length > 0 )                      
                                       myDropzone.processQueue();  
                                    else
                                      alert('Debe de cargar almenos una imagen del equipo');
                                    
                              }else
                              {
                                    $('html, body').animate({
                                          scrollTop: equipo.offset().top
                                    }, 1000);
                              }
                         });
                         this.on("addedfile", function(file) {
                          //   alert("file uploaded");
                         });
                         
                         this.on("complete", function(file) {
                              if (file.accepted){
                              
                                      var loc = window.location;
                                      loc.href = loc.protocol+"//"+loc.hostname+"/motores";
                                      //myDropzone.removeFile(file);
                               }
                         });
                         this.on("processing", function() {
                               this.options.autoProcessQueue = true;
                        });
                        
           
                         this.on("success", function(file,response) {  myDropzone.processQueue.bind(myDropzone); console.log(response); });
                         this.on("error", function(file,response){if (!file.accepted) this.removeFile(file); console.log(response)});
                     }
                 };
           </script>

@endsection