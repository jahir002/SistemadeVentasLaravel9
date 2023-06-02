@extends('adminlte::page')

@section('title', 'Cliente-Crear')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')
  <form action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="nombre" name="nombre" class="form-control" >
	</div>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Tipo de Documento</label>
		<select id="tipodocumento" name="tipodocumento" class="form-control" placeholder="tipodocumento" >
    		<option value="RUC">RUC</option>
    		<option value="DNI">DNI</option>
  		</select>
	</div>

	
	<div class="mb-3">
		<label for="" class="form-label">Numero de Documento</label> 
		<input type="text" id="numerodocumento" name="numerodocumento" class="form-control" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Telefono</label> 
		<input type="text" id="telefono" name="telefono" class="form-control" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Email</label> 
		<input type="text" id="email" name="email" class="form-control" >
	</div>
	<a href="{{route('clientes.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop


    