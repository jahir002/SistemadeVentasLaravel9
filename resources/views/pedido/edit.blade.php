@extends('adminlte::page')

@section('title', 'Pedido-Editar')

@section('content_header')
    <h1>Editar Pedido</h1>
@stop

@section('content')
  <form action="{{route('pedidos.update',$pedido->id)}}" method="post" enctype="multipart/form-data">
	@csrf
    @method('PUT')
	
    <div class="mb-3">
		<label for="" class="form-label">Proveedores</label>
		{!! Form::select('id_proveedors', $proveedors, 'id_proveedors', ['class'=>'form-control', 'placeholder'=>'Proveedor ID']) !!}        
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Fecha pedido</label> 
		<input type="datetime-local" id="fechapedido" value="{{$pedido->fechapedido}}" name="fechapedido" class="form-control" >
	</div>
	

	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" value="{{$pedido->estado}}" name="estado" class="form-control" placeholder="estado" >
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>

	
	
	<a href="{{route('pedidos.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop
