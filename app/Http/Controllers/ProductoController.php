<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto' ,['only'=>['index']]);
        $this->middleware('permission:crear-producto' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-producto' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-producto' ,['only'=>['destroy']]);
     
 }


    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::pluck('nombre', 'id');
        return view('producto.index', compact('productos', 'categorias'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre', 'id');
        $marcas = Marca::pluck('nombre', 'id');
        $proveedors = Proveedor::pluck('razonsocial', 'id');
        return view('producto.create', compact('categorias','marcas','proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->nombre = $request->get('nombre');
        $productos->id_categorias = $request->get('id_categorias');
        $productos->descripcion = $request->get('descripcion');
        $productos->id_marcas = $request->get('id_marcas');
        $productos->talla = $request->get('talla');
        $productos->id_proveedors = $request->get('id_proveedors');
        $productos->precioventa = $request->get('precioventa');
        $productos->preciocompra = $request->get('preciocompra');
        $productos->cantidad = $request->get('cantidad');
        $productos->stock = $request->get('stock');
        $productos->estado = $request->get('estado');
        
        $productos->save();
        
        

        return redirect()->route('productos.index')->with('crear','ok');
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
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('nombre', 'id');
        $marcas = Marca::pluck('nombre', 'id');
        $proveedors = Proveedor::pluck('razonsocial', 'id');
        return view('producto.edit', compact('producto', 'categorias','marcas','proveedors'));
       
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
        $productos = Producto::find($id);
        if (!$productos) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        $productos->nombre = $request->get('nombre');
        $productos->id_categorias = $request->get('id_categorias');
        $productos->descripcion = $request->get('descripcion');
        $productos->id_marcas = $request->get('id_marcas');
        $productos->talla = $request->get('talla');
        $productos->id_proveedors = $request->get('id_proveedors');
        $productos->precioventa = $request->get('precioventa');
        $productos->preciocompra = $request->get('preciocompra');
        $productos->cantidad = $request->get('cantidad');
        $productos->stock = $request->get('stock');
        $productos->estado = $request->get('estado');

        $productos->save();



        return redirect()->route('productos.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos')->with('eliminar','ok');
    }
}
