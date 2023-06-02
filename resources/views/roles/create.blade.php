@extends('adminlte::page')

@section('title', 'Rol-Crear')

@section('content_header')
    <h1>Nuevo Rol</h1>
@stop

@section('content')
<form action="/roles" method="post" enctype="multipart/form">
	@csrf
	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="name" name="name" class="form-control" placeholder="name" tabindex="2">
	</div>
	

	<div class="mb-3">
		<label for="" class="form-label">Permisos para roles</label>
		<br>
		<button type="button" class="btn btn-primary" onclick="selectAllOptions()">Seleccionar todo</button>
		<button type="button" class="btn btn-danger" onclick="deselectAllOptions()">Quitar Todo</button>
		<br>
		@foreach($permission as $value) 
		   <br />
		  <label>
			  {{ Form::checkbox('permission[]',$value->id,false,array('class'=>'name'))}}
			  {{$value->name}}
		  </label>
		  

		@endforeach	
    </div>


	<a href="{{route('roles.index')}}"  class="btn btn-danger" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function selectAllOptions() {
        let checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
        });
    }
</script>

<script>
    function deselectAllOptions() {
        let checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
    }
</script>
@stop

