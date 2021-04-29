
@extends('layouts.new_internal')
@section('content')
  
          <div class="">
        
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalle de Material <small>Reporte de Actividad</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{$material->foto}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                    <h3>{{$material->material}}</h3>

                      <ul class="list-unstyled user_data">
                        
                        @if ($material->id_proveedor1)
                             <li>
                                <i class="fa fa-map-marker user-profile-icon"></i><a href="">{{$material->proveedor1->proveedor}}</a> 
                            </li>
                        @endif  
                        @if ($material->id_proveedor2)
                            <li>
                               <i class="fa fa-map-marker user-profile-icon"></i><a href="">{{$material->proveedor2->proveedor}}</a>
                            </li>
                        @endif  
                        @if ($material->id_proveedor3)
                            <li>
                               <i class="fa fa-map-marker user-profile-icon"></i> <a href="">{{$material->proveedor3->proveedor}}</a>
                            </li>
                        @endif  
                      </ul>
                      <table class="table table-hover">
                            <tr>
                                    <td>Existencias:</td>
                                    <td>
                                        {{$material->existencias()}} {{$material->unidad}}
                                    </td>
                                </tr>
                          <tr>
                              <td>Maximo:</td>
                              <td>{{$material->maximo}} {{$material->unidad}}</td>
                          </tr>
                          <tr>
                                <td>Minimo:</td>
                                <td>{{$material->minimo}} {{$material->unidad}}</td>
                          </tr>
                          
                      </table>
                      <a class="btn btn-success"><i class="fa fa-plus-square m-right-xs"></i> Compra</a>
                      <br />

                      <!-- start skills -->
                      <br>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Cantidades en bodega ({{$material->existencias()}})</p>
                          <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="15" ></div>
                          </div>
                        </li>
                        <li>
                          <p>Rotacion</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-blue" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        
                      </ul>
                      <br>
                      <div class="ln_solid"></div>
                      <h3>Opciones</h3>
                      <ul class="list-unstyled user_data">
                            <li >
                            <p>  <a href="/materiales/{{$material->id}}/edit">Editar Material</a> </p>
                            <p>  <a href="/materiales/{{$material->id}}/edit">Eliminar Material</a> </p>
                            </li>
                                
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Cardex de Compras y Salidas</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="calendario" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>                           
                      </div>
                      <h3>Salidas</h3>
                      <table class="table table-stripped jambo_table">
                            <thead>
                                <tr class="headings">
                                        <th>#</th>
                                        <th>OS</th>
                                        <th>Fecha</th>
                                        <th>Tecnico</th>
                                        <th>Cantidad</th>
                                </tr>
                                
                            </thead>
                        </table>
                        <h3>Compras</h3>
                        <table class="table table-stripped jambo_table">
                              <thead>
                                  <tr class="headings">
                                          <th>#</th>
                                          <th>OS</th>
                                          <th>Fecha</th>
                                          <th>Tecnico</th>
                                          <th>Cantidad</th>
                                  </tr>
                                  
                              </thead>
                          </table>

                      
                    </div>
                  </div>
                </div>
                <div class="x_panel">
                        <div class="x_title">
                                <h2>Descripcion de Material </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p>
                                    {{$material->descripcion}}
                            </p>
                            <p>
                                <div class="x_panel">
                                        <div class="x_panel" id="prev_datasheet">
                                               <a href="{{$material->datasheet}}">
                                                    <img src="/img/pdf.png" alt="" style="max-width:150px" class="img-thumbnail">
                                                    <p style="block">{{explode('/',$material->datasheet)[5]}}</p>
                                                </a>
                                            </div>
                                </div>
                            </p>
                        </div>
                </div>

              </div>
            </div>
          </div>
          
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script>
function init_daterangepicker2() {
    
        if( typeof ($.fn.daterangepicker) === 'undefined'){ return "fallo"; }
        console.log('iniciado !!!');
        
        var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#calendario span').html(start.format('D/M/YYYY') + ' - ' + end.format('D/M/YYYY'));
        };

        var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2013',
        maxDate: moment().subtract(1,'days'),
        dateLimit: {
            days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'DD/MM/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Buscar',
            cancelLabel: 'Limpiar',
            fromLabel: 'De',
            toLabel: 'A',
            customRangeLabel: 'Personalizado',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        }
        };

        $('#calendario span').html(moment().subtract(29, 'days').format('D/M/YYYY') + ' - ' + moment().format('D/M/YYYY'));
        $('#calendario').daterangepicker(optionSet1, cb);
        $('#calendario').on('show.daterangepicker', function() {
        console.log("show event fired");
        });
        $('#calendario').on('hide.daterangepicker', function() {
        console.log("hide event fired");
        });
        $('#calendario').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#calendario').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
        });
        $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
    });

}


$(document).ready(function(){
    
    init_daterangepicker2()
    
});
</script>
@endsection
