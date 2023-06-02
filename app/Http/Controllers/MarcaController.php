<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
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
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marcas= new Marca();
        $marcas->nombre=$request->get('nombre');
        $marcas->estado=$request->get('estado');  
        $marcas->save();
        return redirect()->route('marcas.index')->with('crear','ok');
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
        $marca=Marca::find($id);

        return view('marca.edit',compact('marca'));
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
        $marca=Marca::find($id);
        $marca->nombre=$request->get('nombre');
        $marca->estado=$request->get('estado');
        $marca->save();
        return redirect()->route('marcas.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcas=Marca::find($id);
        $marcas->delete();

        return redirect()->route('marcas.index')->with('eliminar','ok');
    }
}
