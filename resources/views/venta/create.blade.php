@extends('adminlte::page')

@section('title', 'Venta-Crear')

@section('content_header')
    <h1>Nuevo Venta</h1>
@stop

@section('content')
  <form action="{{route('ventas.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	

	<div class="mb-3">
		<label for="" class="form-label">Fecha de Emision</label> 
		<input type="datetime-local" id="fechaemision" name="fechaemision" class="form-control" >
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Formato de pago</label>
		<select id="formatopago" name="formatopago" class="form-control" placeholder="estado" >
    		<option value="Tarjeta">Tarjeta</option>
    		<option value="Efectivo">Efectivo</option>
  		</select>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Empleados</label>
		{!! Form::select('id_empleados', $empleados, 'id_empleados', ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Clientes</label>
		{!! Form::select('id_clientes', $clientes, 'id_clientes', ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
	</div>
	
	<a href="{{route('ventas.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop
