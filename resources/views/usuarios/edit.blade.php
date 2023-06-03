@extends('adminlte::page')

@section('title', 'Usuario-Editar')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<form action="/usuarios/{{$usuario->id}}" method="post" enctype="multipart/form">
	@csrf
	@method('PUT')
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="name" name="name" class="form-control" placeholder="name" value="{{$usuario->name}}" tabindex="2">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Email</label>
		<input type="text" id="email" name="email" class="form-control" placeholder="email" value="{{$usuario->email}}">
	</div>

	<div class="mb-3">
			<label for="" class="form-label">Clave</label>
			<input type="text" id="password" name="password" class="form-control" 
			placeholder="password" value="{{$usuario->password}}"  tabindex="4">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Confirmar Clave</label>
		<input type="text" id="confirm-password" name="confirm-password" class="form-control" value="{{$usuario->password}}" placeholder="confirm-password"  tabindex="8">
    </div>
	<div class="mb-3">
		<label for="" class="form-label">Roles</label>
	
		{!! Form::select('roles[]',$roles,[],array('class'=>'form-control')) !!}
    </div>



	<a href="{{route('usuarios.index')}}"  class="btn btn-danger" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop