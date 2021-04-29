@extends('layouts.new_internal')
@section('content')

<div class="col-sm-12">
        <div class="x_panel">
                <div class="x_title">
                        <h2>Nuevo Material <small>Ingrese Datos</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        {!! Form::open(['action' => 'MaterialesController@store','method'=>'POST','files'=>'true','class'=>'form-horizontal form-label-left input_mask']) !!}
                            <div class="form-group">
                                {{Form::label('material_lbl','Nombre Material:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                  {{Form::text('material','',['class'=>'form-control','placeholder'=>'Nombre del Material','required'=>'required'])}} 
                                  <small>Colocar: Categoria - Material - Marca - Modelo especifico(Ej. Alambre - AWG # 15 - Essex Superior - UltraShield</small>
                               </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('unidad_lbl','Unidad de despacho:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="unidad" id="" class="form-control">
                                       @foreach ($unidades as $unidad)
                                           <option value="{{$unidad->unidad}}">{{$unidad->unidad}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('min_lbl','Minimo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                   <div class=" col-md-4 col-sm-9 col-xs-12">
                                      <input type="text" class="form-control" name="minimo" value="1">
                                   </div>
                                   {{Form::label('max_lbl','Maximo:',['class'=>'control-label col-md-1 col-sm-3 col-xs-12'])}}
                                   <div class=" col-md-4 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="maximo" value="5">
                                   </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('desc','Descripcion (Opcional):',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                      {{Form::textarea('descripcion','',['class'=>'form-control','id'=>'coment','placeholder'=>'Toda la informacion adicional que se tenga del material'])}}
                                   </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('prov1','Proveedor 1:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="proveedor1" id="" class="form-control">
                                            <option value="0" selected>Ninguno</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->proveedor}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('prov2','Proveedor 2:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="proveedor2" id="" class="form-control">
                                            <option value="0" selected>Ninguno</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->proveedor}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('prov3','Proveedor 3:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="proveedor3" id="" class="form-control">
                                            <option value="0" selected>Ninguno</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->proveedor}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('Fotolbl','Fotografia Material:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="file" class="form-control" name="foto" accept=".jpg,.png">
                                   </div>
                            </div>
                            <div class="form-group">
                                    {{Form::label('datasheetlbl','Hoja de Datos:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="file" class="form-control" name="datasheet" accept=".pdf">
                                   </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          
						            <button class="btn btn-primary" type="reset">Borrar</button>
                                    <button type="submit" class="btn btn-success">Guardar Material</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                </div>
        </div>
</div>
@endsection