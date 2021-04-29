@extends('layouts.new_internal')
@section('content')

<div class="well">
    <a href="/materiales/create" class="btn btn-primary">Agregar un Material Nuevo</a>    
</div>

<div class="col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Buscar Materiales</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['action' => 'ClientesController@findLike','method'=>'POST','class'=>'col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search']) !!}
                            
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nombre Material" name="nombre_cliente">
                <span class="input-group-btn">
                <button class="btn btn-default" type="default">Buscar</button>
                </span>
            </div>
                {!! Form::close() !!}  
                <br>
        </div>
    </div>
    <div class="x_panel">
            <div class="x_title">
                    <h2>MATERIALES <small>Listado general</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover table-striped" style="text-align:center">
                    <thead style="text-align:center">
                        <th style="width:5%;text-align:center">#</th>
                        <th style="width:30%;text-align:left">Material</th>
                        <th style="text-align:center">Dimensional</th>
                        <th style="text-align:center">Existencias</th>
                        <th style="text-align:center">Operaciones</th>
                    </thead>
                    <tbody>
                        @foreach ($materiales as $cont=>$material)
                            <tr>
                                <td>{{$cont+1}}</td>
                                <td style="text-align:left"><a href="/materiales/{{$material->id}}" > {{$material->material}}</a></td>
                                <td class="text-capitalize">{{$material->unidad}}</td>
                                <td style="text-align:center"> {{$material->existencias()}}</td>
                                <td>
                                    <a href="/materiales/compra/{{$material->id}}" class="btn btn-xs btn-primary">Cargar Material</a>
                                    <a href="/materiales/compra/{{$material->id}}" class="btn btn-xs btn-warning">Descargar Material</a>
                                    <a href="/materiales/compra/{{$material->id}}" class="btn btn-xs btn-success">Solicitar Compra</a>
                                </td>
                            </tr>
                        @endforeach
                        {!!$materiales->render()!!}
                    </tbody>
                </table>
            </div>

    </div>
</div>
@endsection