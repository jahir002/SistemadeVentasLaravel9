<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

/**
 * Class AlmacenController
 * @package App\Http\Controllers
 */
class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
        $this->middleware('permission:ver-almacen|crear-almacen|editar-almacen|borrar-almacen' ,['only'=>['index']]);
        $this->middleware('permission:crear-almacen' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-almacen' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-almacen' ,['only'=>['destroy']]);
     
 }


    public function index()
    {
        $almacens = Almacen::all();
        $proveedors = Proveedor::pluck('razonsocial', 'id');
        $productos = Producto::pluck('nombre', 'id');

        return view('almacen.index', compact('almacens', 'proveedors', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $proveedors = Proveedor::pluck('razonsocial', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('almacen.create', compact('proveedors', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $almacen =new Almacen();

        $idess=$almacen->id;

        $alm=Almacen::all();
        $cou=$alm->count();
        $coutv=$cou+1;
        $codis="Prod-".$coutv;
        $almacen->codigopro=$codis;

        $almacen->id_productos=$request->get('id_productos');
        $almacen->id_proveedors=$request->get('id_proveedors');

        $almacen->cantidad=$request->get('cantidad');

        $almacen->valortotal=$request->get('valortotal');

        $almacen->estado=$request->get('estado');
       

        $almacen->save();

        return redirect()->route('almacens.index')
            ->with('crear','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $almacen = Almacen::find($id);
        $proveedors = Proveedor::pluck('razonsocial', 'id');
        $productos = Producto::pluck('nombre', 'id');

        return view('almacen.edit', compact('almacen', 'proveedors', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Almacen $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $almacen=Almacen::find($id);  
        $almacen->id_productos=$request->get('id_productos');
        $almacen->id_proveedors=$request->get('id_proveedors');

        $almacen->cantidad=$request->get('cantidad');

        $almacen->valortotal=$request->get('valortotal');

        $almacen->estado=$request->get('estado');
       

        $almacen->save();
        
        return redirect()->route('almacens.index')->with('editar','ok') ;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $almacen = Almacen::find($id);
        $almacen ->delete();

        return redirect()->route('almacens.index')
        ->with('eliminar','ok');
    }
}
