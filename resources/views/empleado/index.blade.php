@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados</h1>
@stop
   
@section('content')


 
  @can('crear-empleado')
  <a href="empleados/create" class="btn btn-primary">Nuevo Empleado</a> 
  <br /><br />
  @endcan



 <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="empleados" >
	<thead class="bg-info text-white"  >
		<tr>
			
			<th class="col-2">NOMBRE</th>
			<th class="col-2">DNI</th>
			<th class="col-2">CARGO</th>
			<th class="col-2">TELEFONO</th>
			<th class="col-2">EMAIL</th>
			<th class="col-2">SALARIO</th>
            <th class="col-2">ESTADO</th>
			<th class="col-2">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($empleados as $empleado)
			<tr>				
				<td>{{$empleado->nombre}}</td>
				<td>{{$empleado->dni}}</td>
				<td>{{$empleado->cargo}}</td>
				<td>{{$empleado->telefono}}</td>
				<td>{{$empleado->email}}</td>
				<td>{{$empleado->salario}}</td>

				@if($empleado->estado =='Activo')
			    <td class='text text-success '> 			
				{{$empleado->estado}} 
			    </td>		
			    @endif
				@if($empleado->estado =='Inactivo')
				<td class='text text-danger'> 				
				{{$empleado->estado}} 
			    </td>
			    @endif
			    
				<td>
					
						@can('editar-empleado')
						<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
					    href="/empleados/{{$empleado->id}}/edit">
						  <i class="fa fa-lg fa-fw fa-pen"></i>
					    </a>
					@endcan
					
					
					
					
					@can('borrar-empleado')
					<form class="formulario-eliminar" action="{{route('empleados.destroy',$empleado->id)}}" method="post">
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script> 
	  $(document).ready(function () {
       $('#empleados').DataTable();
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