@extends('adminlte::page')

@section('title', 'DetallePedidos-Crear')

@section('content_header')
    <h1>Nuevo Detalle del Pedido</h1>
@stop

@section('content')
  <form action="{{route('detallepedidos.store')}}" method="post" enctype="multipart/form-data">
	@csrf

	<div class="mb-3">
		<label for="" class="form-label">Pedidos</label>
		{!! Form::select('id_pedidos', $pedidos, 'id_pedidos', ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Productos</label>
		{!! Form::select('id_productos', $productos, 'id_productos', ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
	</div>


	
	<div class="mb-3">
		<label for="" class="form-label">Cantidad</label> 
		<input type="number" id="cantidad" name="cantidad" class="form-control" >
	</div>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" name="estado" class="form-control" placeholder="estado" >
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>

	
	
	<a href="{{route('detallepedidos.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop