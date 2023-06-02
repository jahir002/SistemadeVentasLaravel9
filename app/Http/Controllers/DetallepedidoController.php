<?php

namespace App\Http\Controllers;

use App\Models\Detallepedido;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class DetallepedidoController extends Controller
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
        $detallepedidos =Detallepedido::all();
        $productos  = Producto::pluck('nombre', 'id');
        $pedidos  = Pedido::pluck('fechapedido','id');

        return view('detallepedido.index',compact('detallepedidos','productos','pedidos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos  = Producto::pluck('nombre', 'id');
        $pedidos  = Pedido::pluck('fechapedido','id');

        return view('detallepedido.create',compact('productos' ,'pedidos'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detallepedido= new Detallepedido();
        $detallepedido->id_pedidos=$request->get('id_pedidos');
        $detallepedido->id_productos=$request->get('id_productos');
        $detallepedido->cantidad=$request->get('cantidad');
        $detallepedido->estado=$request->get('estado');
        $detallepedido->save();

        return redirect()->route('detallepedidos.index')->with('crear','ok');
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
        $detallepedido = Detallepedido::find($id);
        $productos  = Producto::pluck('nombre', 'id');
        $pedidos  = Pedido::pluck('fechapedido','id');

        return view('detallepedido.edit', compact('detallepedido','productos','pedidos'));

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
        $detallepedido = Detallepedido::find($id);
        $detallepedido->id_pedidos=$request->get('id_pedidos');
        $detallepedido->id_productos=$request->get('id_productos');
        $detallepedido->cantidad=$request->get('cantidad');
        $detallepedido->estado=$request->get('estado');
        $detallepedido->save();
        return redirect()->route('detallepedidos.index')->with('editar','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallepedido=Detallepedido::find($id);
        $detallepedido->delete();
        return redirect()->route('detallepedidos.index')->with('eliminar','ok');
    }
}
