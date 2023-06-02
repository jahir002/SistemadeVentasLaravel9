<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venta;

use App\Models\DetalleVenta;
use App\Models\Producto;

use App\Models\Empleado;
use App\Models\Cliente;
use  PDF;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class VentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('permission:ver-venta|crear-venta|editar-venta|borrar-venta', ['only' => ['index']]);
        $this->middleware('permission:crear-venta', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-venta', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-venta', ['only' => ['destroy']]);
    }



    public function index()
    {
        $ventas = Venta::all();
        $empleados  = Empleado::pluck('nombre', 'id');
        $clientes  = Cliente::pluck('nombre', 'id');
    
        // producto mas vendido

        $productoMasVendido = Producto::join('detalleventas', 'productos.id', '=', 'detalleventas.id_productos')
            ->select('productos.id', DB::raw('MAX(productos.nombre) as nombre'), DB::raw('SUM(detalleventas.cantidad) as total_ventas'))
            ->groupBy('productos.id')
            ->orderByDesc('total_ventas')
            ->first();





        return view('venta.index', compact('ventas', 'empleados', 'clientes', 'productoMasVendido'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados  = Empleado::pluck('nombre', 'id');
        $clientes  = Cliente::pluck('nombre', 'id');
        return view('venta.create', compact('empleados', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $ventas = new Venta();

        $ven = Venta::all();
        $cou = $ven->count();
        $coutv = $cou + 1;

        $ventas->serie = "SV-" . date('Ymd') . "-" . $coutv;
        $ventas->numero = "NV-" . $coutv;
        $ventas->fechaemision = $request->get('fechaemision');
        $ventas->formatopago = $request->get('formatopago');
        $ventas->id_empleados = $request->get('id_empleados');
        $ventas->id_clientes = $request->get('id_clientes');



        $ventas->save();
        return redirect()->route('ventas.index')->with('crear', 'ok');
    }

    public function boleta($id)
    {
        // venta
        $datosventa = Venta::find($id);
        $empleados  = Empleado::pluck('nombre', 'id');
        $clientes  = Cliente::pluck('numerodocumento', 'nombre', 'id');


        // detalle venta
        $detalleventas = Detalleventa::all();
        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');

        $pdf = PDF::class::loadView("venta.boleta", ['detalleventas' => $detalleventas, 'ventas' => $ventas, 'productos' => $productos, 'datosventa' => $datosventa, 'clientes' => $clientes, 'empleados' => $empleados]);

        $fechaem = $datosventa->fechaemision;

        return $pdf->download('reporte__' . $fechaem . '.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);
        $empleados  = Empleado::pluck('nombre', 'id');
        $clientes  = Cliente::pluck('nombre', 'id');
        return view('venta.edit', compact('venta', 'empleados', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $ventas = Venta::find($id);

        $ventas->fechaemision = $request->get('fechaemision');
        $ventas->formatopago = $request->get('formatopago');
        $ventas->id_empleados = $request->get('id_empleados');
        $ventas->id_clientes = $request->get('id_clientes');


        $ventas->save();
        return redirect()->route('ventas.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        $venta->delete();
        return redirect()->route('ventas.index')->with('eliminar', 'ok');
    }
}
