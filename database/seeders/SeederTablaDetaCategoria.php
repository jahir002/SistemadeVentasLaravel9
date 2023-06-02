<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class SeederTablaDetaCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria=new Categoria();
       // $categoria->id=null;
        $categoria->nombre="Ropa de Verano";
        $categoria->descripcion="Ropa de la Temporada de Verano 2023 ";
        $categoria->estado="Activo";
        $categoria->imagen="20230511024147.jpg";
        //$categoria->created_at=date('Y-m-d H:i:s');
       // $categoria->updated_at=date('Y-m-d H:i:s');
        $categoria->save();   
    }
}
