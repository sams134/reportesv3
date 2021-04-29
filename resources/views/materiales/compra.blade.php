@extends('layouts.new_internal')
@section('content')

<div class="col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>INGRESO DE MATERIAL A BODEGA <small>{{$material->material}}</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {!! Form::open(['action' => 'MaterialesController@compra_insert','method'=>'POST','class'=>'form-horizontal form-label-left input_mask']) !!}
    <input type="hidden" name="id_material" value="{{$material->id}}">
    <input type="hidden" name="material" value="{{$material->material}}">
            <div class="form-group">
                {{Form::label('cant_lbl','Cantidad a Ingresar: ('.$material->unidad.")",['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" class="form-control" name="cantidad" required step="any">      
                </div>
            </div>
            <div class="form-group">
                {{Form::label('op_lbl','Operacion:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="operacion" id="" class="form-control">
                        <option value="1">Compra</option>
                        <option value="2">Ingreso por Consignacion</option>
                        <option value="3">Ingreso por Inventario Previo</option>
                      
                    </select>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('prov_lbl','Proveedor:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="proveedor" id="" class="form-control">
                        <option value="0">Ocacional</option>
                         @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->id_proveedor}}">{{$proveedor->proveedor}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('fact_lbl','No. Factura: (opcional)',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" name="factura">      
                </div>
            </div>
            <div class="form-group">
                {{Form::label('prec_lbl','Precio Unitario (Q):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" class="form-control" name="precio" step="any">      
                </div>
            </div>
            <div class="form-group">
                {{Form::label('cant_cod','Codigo Comprador:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" class="form-control" name="codigo" required>      
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                
                 <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Realizar compra</button>
              </div>
            </div>
        {!! Form::close() !!}
    </div>

    </div>
</div>
@endsection