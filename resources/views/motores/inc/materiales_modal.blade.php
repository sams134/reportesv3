<div class="modal fade bs-materiales-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h3 class="modal-title" id="myModalLabel">Agregar Materiales</h3>
        </div>
        <div class="modal-body">
        <input type="hidden" id="id_motor" value="{{$motor->id_motor}}">
          <h4>Busqueda de Materiales</h4>
          <div class="input-group">
            <input type="text" class="form-control" id="buscador_material">
            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary">Buscar</button>
                          </span>
          </div>
          <table class="table table-stripped jambo_table" style="font-size:x-small;display:none" id="tabla_db">
            <thead>
                <tr class="headings">
                        <th>#</th>
                        <th>Material</th>
                        <th>Existencias</th>
                        <th style="width:25%">Cantidad</th>
                        <th>Presentacion</th>
                        <th>Pedir</th>
                </tr>                
            </thead>
            <tbody>
                @for ($i = 0; $i < 0; $i++)
                    <tr style="line-height:10px">
                    <td>{{$i+1}}</td>
                    <td>{{$materiales[$i]->material}}</td>
                    <td>{{$materiales[$i]->existencias()}}</td>
                    <td> <input type="text" class="form-control" style="font-size:small;height:23px"> </td>
                    <td> <button class="btn btn-primary btn-xs" id-material="{{$materiales[$i]->id}}"><i class="fa fa-plus-circle m-right-xs" ></i> Agregar</button> </td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <table class="table table-stripped jambo_table" style="font-size:x-small;display:none" id="tabla_unico">
                <thead>
                    <tr class="headings">
                            <th>Material</th>
                            <th>Presentacion</th>
                            <th style="width:25%">Cantidad</th>
                            <th>Pedir</th>
                    </tr>                
                </thead>
                <tbody>
                    <tr>
                        <td> <input type="text" class="form-control" style="font-size:small;height:23px" id="material_unico"></td>
                        <td> <input type="text" class="form-control" style="font-size:small;height:23px" id="presentacion_unico"></td>
                        <td><input type="text" class="form-control" style="font-size:small;height:23px" id="cantidad_unico"></td>
                        <td><button class="btn btn-primary btn-xs"><i class="fa fa-plus-circle m-right-xs"></i> Agregar</button></td>
                    </tr>
                </tbody>
        </table>
        <table class="table table-stripped jambo_table" style="font-size:x-small" id="pedido_table">
            <thead>
                    <tr class="headings">
                            <th>Cant</th>
                            <th>Material</th>
                            <th>Presentacion</th>
                            <th>Eliminar</th>
                         </tr>
            </thead>
            <tbody>

            </tbody>
           
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_pedido">Realizar Pedido</button>
        </div>

      </div>
    </div>
  </div><!--end of materiales modal -->