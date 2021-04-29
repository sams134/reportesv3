<div class="x_panel" >
    <div class="x_title">
          <h2>Trabajos especificos a realizar<small>Listar trabajos puntuales</small></h2>
          <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a> </li>
               <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
    </div> <!--x title -->
    <div class="x_content" style="display:inline">
                <br />
                 <!--<form class="form-horizontal form-label-left input_mask">-->
                            <div class="form-group">
                                        Listar en este apartado trabajos especificos a realizar, (fabricacion de Difusor, Fabricación de Caja de bornera, cambio a 3 puntas de salida etc,)
                                        <a class="btn btn-primary" id="addWork">Agregar</a>
                                 </div><!--form group -->
              <div class="form-group">
                            <table class="table col-md-12 col-sm-12 col-xs-12" id="table_works">
                                  <tr>
                                        <td style="width:60%">{{Form::text('works[]','',['class'=>'form-control col-md-12','placeholder'=>"Trabajo Especifico"])}} </td>
                                        <td>
                                                    <div class="checkbox">
                                                                <label>
                                                                  <input type="checkbox" checked="checked"  class="checkTrabajo"> Cotizar
                                                                  <input type="hidden" name="cotizarTrabajo[]" value="1">
                                                                </label>
                                                              </div>
                                        </td>
                                        <td>  <a class="btn btn-danger" id="delWork"><i class="fa fa-minus-circle"> Eliminar</i></a></td>
                                  </tr>
                            </table>
                      
                    
                      

                      
              </div><!--form group -->
    </div> <!--x content -->
</div>  <!--x panel --> 