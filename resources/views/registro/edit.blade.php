@extends('adminlte::page')

@section('title', 'Registros-Editar')

@section('content_header')
    <h1>Editar Registros</h1>
@stop
   
@section('content')
                        <form method="POST" action="{{ route('registros.update',$registro->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf
							@method('PUT')

							<div class="mb-3">
                                <label for="" class="form-label">Fecha del Registro</label> 
                                <input type="date" id="fechaentrada" name="fechaentrada" class="form-control" value="{{$registro->fechaentrada}}" placeholder="fechaentrada" tabindex="2">
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Almacen</label>
                                {!! Form::select('id_almacens', $almacens, 'id_almacens', ['class'=>'form-control', 'placeholder'=>'Almacen ID']) !!}        
                            </div>
							<div class="mb-3">
                                <label for="" class="form-label">Direccion  Inicial</label> 
                                <input type="text" id="direcioninicial" name="direcioninicial" class="form-control" value="{{$registro->direcioninicial}}"  placeholder="direccioninicial" tabindex="2">
                            </div>
							<div class="mb-3">
                                <label for="" class="form-label">Direccion Final</label> 
                                <input type="text" id="direcionfinal" name="direcionfinal" class="form-control" value="{{$registro->direcionfinal}}" placeholder="direccionfinal" tabindex="2">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Cantidad</label> 
                                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{$registro->cantidad}}"  placeholder="Cantidad" tabindex="2">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Valor Total</label> 
                                <input type="text" id="valortotal" name="valortotal" class="form-control"  value="{{$registro->valortotal}}" placeholder="Valor" tabindex="2">
                            </div>

							<div class="mb-3">
                                <label for="" class="form-label">Actividad</label>
                                <select id="actividad" name="actividad" class="form-control"  value="{{$registro->actividad}} placeholder="estado" tabindex="4">
                                    <option value="Entrada">Entrada</option>
                                    <option value="Salida">Salida</option>
                                  </select>
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select id="estado" name="estado" class="form-control" value="{{$registro->estado}} placeholder="estado" tabindex="4">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                  </select>
                            </div>

                            <a href="{{route('registros.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>

                        </form>
                   
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop