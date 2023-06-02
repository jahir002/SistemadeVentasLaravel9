@extends('adminlte::page')

@section('title', 'Registros')

@section('content_header')
    <h1>Registros</h1>
@stop
   
@section('content')

  @can('crear-almacen')
  <a href="{{route('registros.create')}}" class="btn btn-primary">Nuevo </a> 
  <br /><br />
  @endcan
 


  
  
 <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="registros" >
	<thead class="bg-info text-white"  >
		<tr>
			
			<th class="col-2">CODIGO REGISTRO </th>
            <th class="col-2">FECHA </th>
            <th class="col-2">CODIGO ALMACEN </th>

            <th class="col-2">DIRECCION INICIAL</th>
            <th class="col-2">DIRECCION FINAL </th>

			<th class="col-2">CANTIDAD</th>
            <th class="col-2">VALOR TOTAL </th>

			
            <th class="col-2">ACTIVIDAD REGISTRADA </th>

			<th class="col-2">ESTADO</th>
			<th class="col-2">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($registros as $registro)
			<tr>				
				<td>{{$registro->codigoregistro}}</td>
				<td>{{$registro->fechaentrada}}</td>
                <td>{{$registro->almacens->codigopro}}</td>
				<td>{{$registro->direcioninicial}}</td>
				<td>{{$registro->direcionfinal}}</td>

                <td>{{$registro->cantidad}}</td>
                <td>{{$registro->valortotal}}</td>
				<td>{{$registro->actividad}}</td>
                <td>{{$registro->estado}}</td>

			    <td>
				
					@can('editar-almacen')
					<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
					href="{{route('registros.edit',$registro->id)}}">
						<i class="fa fa-lg fa-fw fa-pen"></i>
					</a>

                    @endcan
					
					@can('borrar-almacen')
					<form class="formulario-eliminar" action="{{route('registros.destroy',$registro->id)}}" method="post">
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
       $('#registros').DataTable();
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