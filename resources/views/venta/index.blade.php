@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')


    @can('crear-venta')
        <a href="ventas/create" class="btn btn-primary">Nuevo Venta</a>
    @endcan

    <br /><br />
    <x-adminlte-card title="Numero de Ventas" theme="lime" icon="fas fa-lg fa-user">
        {{ $ventas->count() }} Ventas
    </x-adminlte-card>

    <x-adminlte-card title="Producto mas Vendido" theme="purple" icon="fas fa-lg fa-shopping-cart" >

        @if ($productoMasVendido)
            <p class="card-text">Nombre: {{ $productoMasVendido->nombre }}</p>
            <p class="card-text">Total de ventas del Producto: {{ $productoMasVendido->total_ventas }}</p>
        @else
            <p class="card-text">No se encontraron ventas</p>
        @endif

    </x-adminlte-card>




    <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="ventas">
        <thead class="bg-info text-white">
            <tr>


                <th class="col-2">SERIE</th>
                <th class="col-2">NUMERO</th>

                <th class="col-2">FECHA DE EMISION</th>
                <th class="col-2">FORMATO DE PAGO</th>

                <th class="col-2">EMPLEADO</th>
                <th class="col-2">CLIENTE</th>



                <th class="col-2">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->serie }}</td>
                    <td>{{ $venta->numero }}</td>

                    <td>{{ $venta->fechaemision }}</td>
                    <td>{{ $venta->formatopago }}</td>

                    <td>{{ $venta->empleado->nombre }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>


                    <td>

                        @can('editar-venta')
                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
                                href="/ventas/{{ $venta->id }}/edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>


                            <form action="/ventas/{{ $venta->id }}/boleta" method="post" enctype="multipart/form-data">

                                @csrf

                                <button class="btn btn-xs btn-default text-warning mx-1 shadow" title="Boleta" type="submit">
                                    <i class="fa fa-lg fa-fw fa-file-invoice"></i>
                                </button>
                            </form>
                        @endcan


                        @can('borrar-venta')
                            <form class="formulario-eliminar" action="{{ route('ventas.destroy', $venta->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

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
        $(document).ready(function() {
            $('#ventas').DataTable();
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
                cancelButtonText: 'No',
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
