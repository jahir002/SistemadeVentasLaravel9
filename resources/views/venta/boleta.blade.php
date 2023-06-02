<!DOCTYPE html>
<html lang="en">
@php

setlocale(LC_TIME, 'es_ES'); 
$mess = strftime('%B');
$sunatot=0;

@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Boleta {{$datosventa->numero}}</title>
</head>

<body>
    <h1 class="text-center"><strong>Boleta de la Venta {{$datosventa->serie}}</strong> </h1>
    <br>
    <hr><br>
    <h2>Datos Generales</h2>
    <br>
	<h4>Fecha de Emision: {{$datosventa->fechaemision}}</h4>
	<h4>Empleado: {{$datosventa->empleado->nombre}}</h4>
	<h4>Cliente: {{$datosventa->cliente->nombre}}</h4>

    <h4>Numero de Documento del Cliente: {{$datosventa->cliente->numerodocumento}}</h4>

    <br>
    <hr><br>
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-dark text-white">
            <tr>	
                <th class="col-2">Fecha de la Ventas</th>
                <th class="col-2">Productos</th>
                <th class="col-2">Precio</th>
                <th class="col-2">Cantidad</th>
                <th class="col-2">Subtotal</th>
                <th class="col-2">Igv</th>
                <th class="col-2">Total</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach ($detalleventas as $detalleventa)
			@if($detalleventa->venta->fechaemision == $datosventa->fechaemision )
			<tr>
                    <td>{{ $detalleventa->venta->fechaemision }}</td>
                    <td>{{ $detalleventa->producto->nombre }}</td>
                    <td>{{ $detalleventa->precio }}</td>
                    <td>{{ $detalleventa->cantidad }}</td>
                    <td>{{ $detalleventa->subtotal }}</td>
                    <td>{{ $detalleventa->igv }}</td>
                    <td>{{ $detalleventa->total }}</td>
                    

					@php
					$sunatot=$sunatot+$detalleventa->total; 

					

					@endphp


                </tr>
			@endif
                
            @endforeach
        </tbody>
    </table>

	<br><hr><br>
	<h4>Total a Pagar : s/. {{$sunatot}} </h4>

</body>

</html>


