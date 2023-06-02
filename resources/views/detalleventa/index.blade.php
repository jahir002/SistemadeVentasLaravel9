@extends('adminlte::page')

@section('title', 'detalleventas')

@section('content_header')
    <h1>Detalles de Venta</h1>
@stop

@section('content')

    <div class="container">
        <div class="row col-15">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <br>
    <hr><br>
    @can('crear-venta')
        <a href="{{ route('detalleventas.create') }}" class="btn btn-primary">Nuevo </a>

        <a href="{{ route('detalleventas.pdf') }}" class="btn btn-danger">Reporte PDF
            <i class="fa fa-lg fa-fw fa-file-pdf"></i>
        </a>
        <a href="{{ route('detalleventas.export') }}" class="btn btn-success">Reporte Excel <i
                class="fa fa-lg fa-fw fa-file-invoice"></i>
        </a>
    @endcan

    <br /><br />
    <x-adminlte-card title="Total de Ventas" theme="lime" icon="fas fa-lg fa-user">
        $/. {{ $totaless }}
    </x-adminlte-card>

    <table class="table table-responsive-sm table-striped table-bordered shadow-lg  mt-4" id="detalleventas">

        <thead class="bg-info text-white">
            <tr>
            <tr>


                <th id="fechav" class="col-3">Fecha de la Ventas</th>
                <th class="col-3">Productos</th>
                <th class="col-3">Precio</th>
                <th class="col-3">Cantidad</th>
                <th class="col-3">Subtotal</th>
                <th class="col-3">Igv</th>
                <th class="col-3">Total</th>
                <th class="col-3">Estado</th>
                <th class="col-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalleventas as $detalleventa)
                <tr>


                    <td>{{ $detalleventa->venta->fechaemision }}</td>
                    <td>{{ $detalleventa->producto->nombre }}</td>
                    <td>{{ $detalleventa->precio }}</td>
                    <td>{{ $detalleventa->cantidad }}</td>
                    <td>{{ $detalleventa->subtotal }}</td>
                    <td>{{ $detalleventa->igv }}</td>
                    <td>{{ $detalleventa->total }}</td>

                    <td>{{ $detalleventa->estado }}</td>


                    <td>




                        @can('editar-venta')
                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"
                                href="/detalleventas/{{ $detalleventa->id }}/edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                        @endcan

                        @can('borrar-venta')
                            <form class="formulario-eliminar" action="{{ route('detalleventas.destroy', $detalleventa->id) }}"
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        // Array de colores para las barras
        const colores = ['lightcoral', 'aquamarine', '', 'lightgreen', 'lightseagreen', 'lightsalmon'];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $ventasPorFecha->keys() !!},
                datasets: [{
                    label: 'Nro de Ventas por Fecha de Venta',
                    data: {!! $ventasPorFecha->values() !!},
                    borderWidth: 1,
                    backgroundColor: colores // Asignar los colores a las barras
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#detalleventas').DataTable();
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
