@extends('adminlte::page')

@section('title', 'Categoria-Crear')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
<form action="/productos/{{$producto->id}}" method="post" enctype="multipart/form">
	@csrf
	@method('PUT')

	

	<div class="mb-3">
		<label for="" class="form-label">Nombre</label> 
		<input type="text" id="nombre" name="nombre" class="form-control" value="{{$producto->nombre}}" placeholder="Nombre" tabindex="2">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Categoria</label>
		{!! Form::select('id_categorias', $categorias, $producto->id_categorias, ['class'=>'form-control', 'placeholder'=>'Categoria ID']) !!}        
	</div>
	

	<div class="mb-3">
		<label for="" class="form-label">Descripcion</label> 
		<input type="text" id="descripcion" name="descripcion"  value="{{$producto->descripcion}}" class="form-control"  tabindex="3">
	</div>


	<div class="mb-3">
		<label for="" class="form-label">Marcas</label>
		{!! Form::select('id_marcas', $marcas, $producto->id_marcas, ['class'=>'form-control', 'placeholder'=>'Marca ID']) !!}        
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Talla</label> 
		<input type="text" id="talla" name="talla" class="form-control" value="{{$producto->talla}}"  tabindex="3">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Proveedores</label>
		{!! Form::select('id_proveedors', $proveedors, $producto->id_proveedors, ['class'=>'form-control', 'placeholder'=>'Proveedor ID']) !!}        
	</div>


	<div class="mb-3">
		<label for="" class="form-label">Precioventa</label> 
		<input type="text" id="precioventa" name="precioventa" value="{{$producto->precioventa}}" class="form-control"  tabindex="3">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Preciocompra</label> 
		<input type="text" id="preciocompra" name="preciocompra"  value="{{$producto->preciocompra}}" class="form-control"  tabindex="3">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Cantidad</label> 
		<input type="number" id="cantidad" name="cantidad" class="form-control"  value="{{$producto->cantidad}}" tabindex="3">
	</div>

	<div class="mb-3">
		<label for="" class="form-label">Stock</label> 
		<input type="text" id="stock" name="stock" class="form-control"  value="{{$producto->stock}}"  tabindex="3">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">Estado</label>
		<select id="estado" name="estado" class="form-control"  value="{{$producto->estado}}" placeholder="estado" tabindex="4">
    		<option value="Activo">Activo</option>
    		<option value="Inactivo">Inactivo</option>
  		</select>
	</div>

	
	<a href="{{route('productos.index')}}"  class="btn btn-danger" tabindex="6">Cancelar</a>
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