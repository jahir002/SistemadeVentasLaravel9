@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop
   
@section('content')

 @can('crear-producto')
  <a href="categorias/create" class="btn btn-primary">Nuevo Categoria</a> 
  
 @endcan




 <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="categorias" >
	<thead class="bg-info text-white"  >
		<tr>
			
			<th class="col-3">NOMBRE</th>
			<th class="col-3">DESCRIPCION</th>
			<th class="col-3">ESTADO</th>
			<th class="col-3">IMAGEN</th>
			<th class="col-3">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categorias as $categoria)
			<tr>				
				<td>{{$categoria->nombre}}</td>
				<td>{{$categoria->descripcion}}</td>
				@if($categoria->estado =='Activo')
			    <td class='text text-success '> 			
				{{$categoria->estado}} 
			    </td>		
			    @endif
				@if($categoria->estado =='Inactivo')
				<td class='text text-danger'> 				
				{{$categoria->estado}} 
			    </td>
			    @endif
			    <td>
					<img src="/imagen/{{$categoria->imagen}}" width="100%"/>
				</td>
				<td>
					@can('editar-producto')
					<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
					href="/categorias/{{$categoria->id}}/edit">
						<i class="fa fa-lg fa-fw fa-pen"></i>
					</a>

					@endcan
					
						
					
					@can('borrar-producto')
					<form class="formulario-eliminar" 
					action="{{route('categorias.destroy',$categoria->id)}}"  method="post">
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
   <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script> 
	  $(document).ready(function () {
       $('#categorias').DataTable();
       });
	</script>


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