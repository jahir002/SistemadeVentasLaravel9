@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop
   
@section('content')

@can('crear-usuario')
 <a href="{{ route('usuarios.create')}}" class="btn btn-primary">Nuevo Usuario</a> 
 <br /><br />
@endcan
 
@can('ver-usuario')
 <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="usuarios" >
	<thead class="bg-info text-white"  >
		<tr>
			<th class="col-1">CODIGO</th>
			<th class="col-1">NOMBRE</th>
			<th class="col-1">E-MAIL</th>
			<th class="col-1">ROL</th>
			<th class="col-1">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($usuarios as $usuario)
			<tr>
				<td>{{$usuario->id}}</td>
				<td>{{$usuario->name}}</td>
				<td>{{$usuario->email}}</td>
				
				<td>
					@if(!empty($usuario->getRoleNames()))
					   @foreach($usuario->getRoleNames() as $rolName)
					   <h5>
						 <span>
							{{$rolName}}
						 </span>
					   </h5>
					   @endforeach

					@endif
				   
				</td>
			
				<td>
					
						@can('editar-usuario')
						<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar"
					href="/usuarios/{{$usuario->id}}/edit">
					<i class="fa fa-lg fa-fw fa-pen"></i>
					</a>
					@endcan

					@can('borrar-usuario')
					<form class="formulario-eliminar" action="{{route("usuarios.destroy",$usuario->id)}}" method="post">
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
@endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	
@stop

@section('js') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	
    <script> 
	  $(document).ready(function () {
       $('#usuarios').DataTable();
       });
	</script>

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