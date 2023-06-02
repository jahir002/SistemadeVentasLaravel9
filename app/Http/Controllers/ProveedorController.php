<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

/**
 * Class ProveedorController
 * @package App\Http\Controllers
 *  @return \Illuminate\Http\Response
 */
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        
        $this->middleware('permission:ver-proveedor|crear-proveedor|editar-proveedor|borrar-proveedor' ,['only'=>['index']]);
        $this->middleware('permission:crear-proveedor' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-proveedor' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-proveedor' ,['only'=>['destroy']]);
     
    }
    public function index()
    {
        $proveedors = Proveedor::all();

        return view('proveedor.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor= new Proveedor();
        $proveedor->razonsocial=$request->get('razonsocial');
        $proveedor->numdocumento=$request->get('numdocumento');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->email=$request->get('email');
        $proveedor->estado=$request->get('estado');
        $proveedor->save();

        return redirect()->route('proveedors.index')->with('crear','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        return view('proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);

        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor=  Proveedor::find($id);
        $proveedor->razonsocial=$request->get('razonsocial');
        $proveedor->numdocumento=$request->get('numdocumento');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->email=$request->get('email');
        $proveedor->estado=$request->get('estado');
        $proveedor->save();
        return redirect()->route('proveedors.index')->with('editar','ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();

        return redirect()->route('proveedors.index')->with('eliminar','ok');
            
    }
}
