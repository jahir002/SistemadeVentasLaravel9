@extends('adminlte::page')

@section('title', 'Almacenes-Crear')

@section('content_header')
    <h1>Crear Almacenes</h1>
@stop
   
@section('content')
                        <form method="POST" action="{{ route('almacens.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Producto</label>
                                {!! Form::select('id_productos', $productos, 'id_productos', ['class'=>'form-control', 'placeholder'=>'Producto ID']) !!}        
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Proveedor</label>
                                {!! Form::select('id_proveedors', $proveedors, 'id_proveedors', ['class'=>'form-control', 'placeholder'=>'Proveedor ID']) !!}        
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Cantidad</label> 
                                <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad" tabindex="2">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Valor Total</label> 
                                <input type="text" id="valortotal" name="valortotal" class="form-control" placeholder="Valor" tabindex="2">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select id="estado" name="estado" class="form-control" placeholder="estado" tabindex="4">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                  </select>
                            </div>

                            <a href="{{route('almacens.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>

                        </form>
                   
@stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
