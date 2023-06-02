@extends('adminlte::page')

@section('title', 'Categoria-Editar')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<form action="{{route('categorias.update',$categoria->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')

	

	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="{{ $categoria->nombre}}" tabindex="2">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Descripcion</label> 
		<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $categoria->descripcion}}"  tabindex="3">
	</div>
	
	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" name="estado" value="{{ $categoria->estado}}" class="form-control" placeholder="estado" tabindex="4">
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>
	<div class="mb-3">
		<img id="imagenselect" style="max-height: 300px"  src="/imagen/{{$categoria->imagen}}">
	</div>
	<div class="mb-3">
		<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                            </div>
                        <input name="imagen" id="imagen" type='file' class="hidden" />
                        </label>
	</div>
	<a href="{{route('categorias.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenselect').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
    </script> 
@stop