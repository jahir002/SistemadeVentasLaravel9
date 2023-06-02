<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        return view('categoria.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]); 
        $categoria = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagencat =
                date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagencat);
            $categoria['imagen'] = "$imagencat";
        }
        Categoria::create($categoria);
        return redirect()->route('categorias.index')->with('crear','ok');
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
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]); 
        $cat = $request->all();

        if ($request->hasFile('imagen')) {
            $imagens = $request->file('imagen');
            $rutaGuardarImg = 'imagen/';
            $imagencat =
                date('YmdHis') . '.' .$imagens->getClientOriginalExtension();
            $imagens->move($rutaGuardarImg, $imagencat);
            $cat['imagen'] = "$imagencat";

        }
        else {
            unset($cat['imagen']);
        }
        $categoria->update($cat);
        return redirect()->route('categorias.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('eliminar','ok');
    }
}
