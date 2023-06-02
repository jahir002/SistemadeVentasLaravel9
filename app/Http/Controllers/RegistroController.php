<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Registro;

class RegistroController extends Controller
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
        $registros= Registro::all();
        $almacens= Almacen::pluck('codigopro','id');

        return view('registro.index',compact('registros', 'almacens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacens= Almacen::pluck('codigopro','id');

        return view('registro.create',compact('almacens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro= new Registro();
    

        $res=Registro::all();
        $cou=$res->cout();
        $coutv=$cou+1;

        $registro->codigoregistro = "Regis-".$coutv;

        $registro->fechaentrada = $request->get('fechaentrada');

        $registro->id_almacens = $request->get('id_almacens');

        $registro->direcioninicial = $request->get('direcioninicial');
        $registro->direcionfinal = $request->get('direcionfinal');

        $registro->cantidad = $request->get('cantidad');
        $registro->valortotal = $request->get('valortotal');

        $registro->actividad = $request->get('actividad');
        $registro->estado = $request->get('estado');
        $registro->save();





        return redirect()->route('registros.index')->with('crear','ok');
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
        $registro = Registro::find($id);
        
        $almacens= Almacen::pluck('codigopro','id');

        return view('registro.edit',compact('registro', 'almacens'));
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
        $registro= Registro::find($id);

        $regis=$registro->cout()+1;

        $codii="Reg-".$regis;

        $registro->codigoregistro = $codii;

        $registro->fechaentrada = $request->get('fechaentrada');

        $registro->id_almacens = $request->get('id_almacens');

        $registro->direcioninicial = $request->get('direcioninicial');
        $registro->direcionfinal = $request->get('direcionfinal');

        $registro->cantidad = $request->get('cantidad');
        $registro->valortotal = $request->get('valortotal');

        $registro->actividad = $request->get('actividad');
        $registro->estado = $request->get('estado');
        $registro->save();

        return redirect()->route('registros.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro= Registro::find($id);
        $registro->delete();

        return redirect()->route('registros.index')->with('eliminar','ok');
    }
}
