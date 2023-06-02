@extends('adminlte::page')

@section('title', 'Detalleventa-Editar')

@section('content_header')
    <h1>EditarDetalleventa</h1>
@stop

@section('content')


  <form action="{{route('detalleventas.update',$detalleventa->id)}}" method="post" enctype="multipart/form-data">
	@csrf
    @method('PUT')
<div class="mb-3">
                                <label for="" class="form-label">Venta</label>
                                {!! Form::select('idven', $ventas,$detalleventa->idven , ['class'=>'form-control', 'placeholder'=>'Ventas ID']) !!}        
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Producto</label>
                                {!! Form::select('id_productos', $productos, $detalleventa->id_productos, ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
                            </div>

                        
                        
                            <div class="mb-3">
                                <label for="" class="form-label">Precio</label> 
                                <input type="text" id="precio" value="{{$detalleventa->precio}}" name="precio" class="form-control"  tabindex="3">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Cantidad</label> 
                                <input type="number" id="cantidad" value="{{$detalleventa->cantidad}}" name="cantidad" class="form-control"  tabindex="3">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">igv</label>
                                <select id="igv" name="igv" class="form-control" value="{{$detalleventa->igv}}" placeholder="estado" tabindex="4">
                                    <option value="0.18">18%</option>
                                    <option value="0.16">16%</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado</label>
                                <select id="estado" name="estado" class="form-control" value="{{$detalleventa->estado}}" placeholder="estado" tabindex="4">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                  </select>
                            </div>
	
	

	
	
	<a href="{{route('detalleventas.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop