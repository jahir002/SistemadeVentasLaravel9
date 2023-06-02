<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
        $this->middleware('permission:ver-empleado|crear-empleado|editar-empleado|borrar-empleado' ,['only'=>['index']]);
        $this->middleware('permission:crear-empleado' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-empleado' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-empleado' ,['only'=>['destroy']]);
     
 }

     
    public function store(Request $request)
    {
        $empleado= new Empleado();
        $empleado->nombre=$request->get('nombre');
        $empleado->dni=$request->get('dni');
        $empleado->cargo=$request->get('cargo');
        $empleado->telefono=$request->get('telefono');
        $empleado->email=$request->get('email');
        $empleado->salario=$request->get('salario');
        $empleado->estado=$request->get('estado');
        $empleado->save();
        return redirect()->route('empleados.index')->with('crear','ok');
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
        $empleado=Empleado::find($id);
        
        return view('empleado.edit',compact('empleado'));
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
        $empleado=Empleado::find($id);
        $empleado->nombre=$request->get('nombre');
        $empleado->dni=$request->get('dni');
        $empleado->cargo=$request->get('cargo');
        $empleado->telefono=$request->get('telefono');
        $empleado->email=$request->get('email');
        $empleado->salario=$request->get('salario');
        $empleado->estado=$request->get('estado');
        $empleado->save();
        return redirect()->route('empleados.index')->with('editar','ok');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=Empleado::find($id);
        $empleado->delete();
        return redirect('/empleados')->with('eliminar','ok');

    }
}
