@extends('adminlte::page')

@section('title', 'Proveedor-Crear')

@section('content_header')
    <h1>Nuevo Proveedor</h1>
@stop

@section('content')
  <form action="{{route('proveedors.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	
	<div class="mb-3">
		<label for="" class="form-label">razonsocial</label> 
		<input type="text" id="razonsocial" name="razonsocial" class="form-control" >
	</div>

    <div class="mb-3">
		<label for="" class="form-label">numdocumento</label> 
		<input type="text" id="numdocumento" name="numdocumento" class="form-control" >
	</div>

    <div class="mb-3">
		<label for="" class="form-label">direccion</label> 
		<input type="text" id="direccion" name="direccion" class="form-control" >
	</div>

    <div class="mb-3">
		<label for="" class="form-label">telefono</label> 
		<input type="text" id="telefono" name="telefono" class="form-control" >
	</div>

    <div class="mb-3">
		<label for="" class="form-label">email</label> 
		<input type="text" id="email" name="email" class="form-control" >
	</div>

    <div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" name="estado" class="form-control" placeholder="estado" >
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>

	

	
	
	<a href="{{route('proveedors.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

