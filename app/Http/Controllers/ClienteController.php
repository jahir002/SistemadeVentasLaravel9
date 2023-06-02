<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente' ,['only'=>['index']]);
        $this->middleware('permission:crear-cliente' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-cliente' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-cliente' ,['only'=>['destroy']]);
     
 }


    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes= new Cliente();
        $clientes->nombre=$request->get('nombre');
        $clientes->tipodocumento=$request->get('tipodocumento');
        $clientes->numerodocumento=$request->get('numerodocumento');
        $clientes->telefono=$request->get('telefono');
        $clientes->email=$request->get('email');
        $clientes->save();

        return redirect()->route('clientes.index')->with('crear','ok');

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
    public function edit( $id)
    {
        $cliente=Cliente::find($id);
        return view('cliente.edit',compact('cliente'));
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
        $cliente=Cliente::find($id);
        $cliente->nombre=$request->get('nombre');
        $cliente->tipodocumento=$request->get('tipodocumento');
        $cliente->numerodocumento=$request->get('numerodocumento');
        $cliente->telefono=$request->get('telefono');
        $cliente->email=$request->get('email');
        $cliente->save();

        return redirect()->route('clientes.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return redirect('/clientes')->with('eliminar','ok');

    }
}
