@extends('adminlte::page')

@section('title', 'Empleado-Editar')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
<form action="{{route('empleados.update',$empleado->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')

	

	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="{{ $empleado->nombre}}" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Dni</label> 
		<input type="text" id="dni" name="dni" class="form-control" placeholder="dni" value="{{ $empleado->dni}}" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Cargo</label> 
		<input type="text" id="cargo" name="cargo" class="form-control" placeholder="cargo" value="{{ $empleado->cargo}}" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Telefono</label> 
		<input type="text" id="telefono" name="telefono" class="form-control" placeholder="telefono" value="{{ $empleado->telefono}}" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Email</label> 
		<input type="text" id="email" name="email" class="form-control" placeholder="email" value="{{ $empleado->email}}" >
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Salario</label> 
		<input type="text" id="salario" name="salario" class="form-control" placeholder="salario" value="{{ $empleado->salario}}" >
	</div>

	
	
	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" name="estado" value="{{ $empleado->estado}}" class="form-control" placeholder="estado" tabindex="4">
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>
	
	
	<a href="{{route('empleados.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@stop

