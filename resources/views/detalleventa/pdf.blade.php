<!DOCTYPE html>
<html lang="en">




@php

setlocale(LC_TIME, 'es_ES'); 
$mess = strftime('%B');
@endphp




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reporte pdf</title>
</head>

<body>
    <h1>Reporte General del Ventas</h1>
    <br>
    <hr><br>
    <h2><strong>Datos Generales</strong></h2>
    <br>
    <h4>Fecha: {{ date('Y-m-d') }}</h4>
    <h4>Reporte del mes de {{ $mess }}</h4>
    <h4>Monto total de Ganancias de Venta :$/ {{ $totaless }} </h4>
    <br>
    <hr><br>
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-dark text-white">
            <tr>
                <th class="col-2">Fecha de la Ventas</th>
                <th class="col-2"> Productos</th>
                <th class="col-2">Precio</th>
                <th class="col-2">Cantidad</th>
                <th class="col-2">Subtotal</th>
                <th class="col-2">Igv</th>
                <th class="col-2">Total</th>
                <th class="col-2">Estado</th>

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
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
