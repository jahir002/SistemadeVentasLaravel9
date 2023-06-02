@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@stop
   
@section('content')

  
  <a href="roles/create" class="btn btn-primary">Nuevo Rol</a> 
  @can('crear-rol')
  @endcan
  
  <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4"  >
	<thead class="bg-info text-white"  >
		<tr>
			<th class="col-1">NOMBRE</th>
			<th class="col-1">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($roles as $role)
			<tr>
				<td>{{$role->name}}</td>
			
				<td>
					@can('editar-rol')
					<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
					href="/roles/{{$role->id}}/edit">
						<i class="fa fa-lg fa-fw fa-pen"></i>
					</a>
					@endcan
					

					@can('borrar-rol')
					<form class="formulario-eliminar" action="{{route("roles.destroy",$role->id)}}" method="post">
						@csrf
						@method("DELETE")

					    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit">
                               <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
					</form>
					@endcan
					

					
				</td>
			</tr>
		@endforeach
	</tbody>
 </table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

   <!-- Sweet Alert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- Sweet alert  -->
   <script>
	   $('.formulario-eliminar').submit(function(e) {
		   e.preventDefault();
		   Swal.fire({
			   title: 'Deseas Eliminar Este Registro ?',
			   text: "Si lo haces , no se podra recuperar los datos",
			   icon: 'warning',
			   showCancelButton: true,
			   confirmButtonColor: '#3085d6',
			   cancelButtonColor: '#d33',
			   cancelButtonText:'No',
			   confirmButtonText: 'Si'
		   }).then((result) => {
			   if (result.value) {
				   this.submit();
			   }
		   })


	   })
   </script>
   <!-- Mensaje sweet alert -->
   @if (session('eliminar') == 'ok')
	   <script>
		   Swal.fire(
			   'Eliminado',
			   'Los datos han sido eliminados',
			   'success'
		   )
	   </script>
   @endif

   @if (session('crear') == 'ok')
	   <script>
		   Swal.fire(
			   'Creado',
			   'Se logro crear un nuevo elemento',
			   'success'
		   )
	   </script>
   @endif

   @if (session('editar') == 'ok')
	   <script>
		   Swal.fire(
			   'Actualizado',
			   'Se logro modificar los datos',
			   'success'
		   )
	   </script>
   @endif

@stop
