@extends('adminlte::page')

@section('title', 'Marca-Crear')

@section('content_header')
    <h1>Nuevo Marca</h1>
@stop

@section('content')
  <form action="{{route('marcas.update',$marca->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="nombre" name="nombre" value="{{$marca->nombre}}" class="form-control" >
	</div>
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" value="{{$marca->estado}}" name="estado"  class="form-control" placeholder="estado" >
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>

	
	
	<a href="{{route('marcas.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop


    