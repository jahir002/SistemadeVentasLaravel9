<?php

namespace App\Http\Controllers;

use App\Models\Detalleventa;


use Illuminate\Http\Request;

use App\Models\Producto;

use App\Models\Venta;
use  PDF;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;





/**
 * Class DetalleventaController
 * @package App\Http\Controllers
 */
class DetalleventaController extends Controller
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

        $detalleventas = Detalleventa::all();
        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');
        $totaless = 0;
        $ventasPorFecha = $detalleventas->groupBy(function ($detalleventa) {
            return Carbon::parse($detalleventa->venta->fechaemision)->format('Y-m-d');
        })->map(function ($ventas, $fecha) {
            return $ventas->count();
        });

        foreach ($detalleventas as $detalleventa) {
            $totaless = $totaless + $detalleventa->total;
        }
        return view('detalleventa.index', compact('detalleventas', 'ventas', 'productos', 'totaless', 'ventasPorFecha'));
    }

    public function pdf()
    {
        $detalleventas = Detalleventa::all();
        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');
        $totaless = 0;
        foreach ($detalleventas as $detalleventa) {
            $totaless = $totaless + $detalleventa->total;
        }

        $pdf = PDF::class::loadView("detalleventa.pdf", ['detalleventas' => $detalleventas, 'ventas' => $ventas, 'productos' => $productos, 'totaless' => $totaless]);

        $fechaactual = date('Y-m-d');


        return $pdf->download('reporte__' . $fechaactual . '.pdf');
    }

    public function export()
    {


        $detalleventas = Detalleventa::with('producto', 'venta')->get();


        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');

        // Crear un nuevo archivo Excel
        $archivo = new Spreadsheet();
        $hoja = $archivo->getActiveSheet();

        // Agregar los encabezados de columna
        $hoja->setCellValue('A1', 'ID');
        $hoja->setCellValue('B1', 'ID Venta');
        $hoja->setCellValue('C1', 'ID Producto');
        $hoja->setCellValue('D1', 'Precio');
        $hoja->setCellValue('E1', 'Cantidad');
        $hoja->setCellValue('F1', 'Subtotal');
        $hoja->setCellValue('G1', 'IGV');
        $hoja->setCellValue('H1', 'Total');
        $hoja->setCellValue('I1', 'Estado');

        // Agregar los datos al archivo Excel
        $fila = 2;
        foreach ($detalleventas as $detalleventa) {
            $hoja->setCellValue('A' . $fila, $detalleventa->id);
            $hoja->setCellValue('B' . $fila, $detalleventa->venta->fechaemision);
            $hoja->setCellValue('C' . $fila, $detalleventa->producto->nombre);
            $hoja->setCellValue('D' . $fila, $detalleventa->precio);
            $hoja->setCellValue('E' . $fila, $detalleventa->cantidad);
            $hoja->setCellValue('F' . $fila, $detalleventa->subtotal);
            $hoja->setCellValue('G' . $fila, $detalleventa->igv);
            $hoja->setCellValue('H' . $fila, $detalleventa->total);
            $hoja->setCellValue('I' . $fila, $detalleventa->estado);
            $fila++;
        }

        // Configurar el formato de la celda
        $estilo = [
            'font' => ['bold' => true],
        ];
        $hoja->getStyle('A1:E1')->applyFromArray($estilo);

        $date=date("Y-m-d");

        // Guardar el archivo Excel
        $writer = new Xlsx($archivo);
        $nombreArchivo = 'reporte_ventas_'.$date.'.xlsx';
        $rutaArchivo = storage_path('app/public/' . $nombreArchivo);
        $writer->save($rutaArchivo);

        // Descargar el archivo Excel
        return Response::download($rutaArchivo, $nombreArchivo)->deleteFileAfterSend(true);
    }





    public function create()

    {
        $detalleventa = new Detalleventa();
        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('detalleventa.create', compact('detalleventa', 'ventas', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalleventa = new Detalleventa();
        $detalleventa->idven = $request->get('idven');
        $detalleventa->id_productos = $request->get('id_productos');
        $detalleventa->precio = $request->get('precio');
        $detalleventa->cantidad = $request->get('cantidad');

        $a = $detalleventa->precio;
        $b = $detalleventa->cantidad;

        $sub = $a * $b;
        //
        $detalleventa->subtotal = $sub;

        $detalleventa->igv = $request->get('igv');

        //
        $c = $detalleventa->igv;

        $dd = $sub * $c;

        $ii = $sub + $dd;
        $detalleventa->total = $ii;

        $detalleventa->estado = $request->get('estado');

        $detalleventa->save();



        return redirect()->route('detalleventas.index')->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleventa = Detalleventa::find($id);
        $ventas = Venta::pluck('fechaemision', 'id');
        $productos = Producto::pluck('nombre', 'id');

        return view('detalleventa.edit', compact('detalleventa', 'ventas', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Detalleventa $detalleventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $detalleventa = Detalleventa::find($id);
        $detalleventa->idven = $request->get('idven');
        $detalleventa->id_productos = $request->get('id_productos');
        $detalleventa->precio = $request->get('precio');
        $detalleventa->cantidad = $request->get('cantidad');

        $a = $detalleventa->precio;
        $b = $detalleventa->cantidad;

        $sub = $a * $b;
        //
        $detalleventa->subtotal = $sub;

        $detalleventa->igv = $request->get('igv');

        //
        $c = $detalleventa->igv;

        $dd = $sub * $c;

        $ii = $sub + $dd;
        $detalleventa->total = $ii;

        $detalleventa->estado = $request->get('estado');

        $detalleventa->save();


        return redirect()->route('detalleventas.index')->with('editar', 'ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleventa = Detalleventa::find($id)->delete();

        return redirect()->route('detalleventas.index')->with('eliminar', 'ok');
    }
}
