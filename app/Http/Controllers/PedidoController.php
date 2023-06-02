<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Proveedor;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        
        $this->middleware('permission:ver-pedidos|crear-pedidos|editar-pedidos|borrar-pedidos' ,['only'=>['index']]);
        $this->middleware('permission:crear-pedidos' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-pedidos' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-pedidos' ,['only'=>['destroy']]);
     
 }


    public function index()
    {
        $pedidos = Pedido::all();
        

        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = Proveedor::pluck('razonsocial', 'id');
        return view('pedido.create',compact('proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $pedido = new Pedido();
        $pedido->id_proveedors=$request->get('id_proveedors');
        $pedido->fechapedido=$request->get('fechapedido');
        $pedido->estado=$request->get('estado');
        $pedido->save();

        return redirect()->route('pedidos.index')->with('crear','ok');
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
        $pedido = Pedido::find($id);
        $proveedors = Proveedor::pluck('razonsocial', 'id');

        return view('pedido.edit', compact('pedido', 'proveedors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $pedido->id_proveedors=$request->get('id_proveedors');
        $pedido->fechapedido=$request->get('fechapedido');
        $pedido->estado=$request->get('estado');
        $pedido->save();
        return redirect()->route('pedidos.index')->with('editar','ok');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('eliminar','ok');
    }
}
