<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
class SeederTablaProducto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro=new Producto();
        $pro->id=1;
        $pro->nombre ="polo verano 2023";
        $pro->id_categorias = 1;
        $pro->descripcion = "polo de algodon con diseño simple";
        $pro->id_marcas = 1;
        $pro->talla ="M";
        $pro->id_proveedors =1;
        $pro->precioventa = 24.90;
        $pro->preciocompra = 20.00;
        $pro->cantidad = 1;
        $pro->stock = 30;
        $pro->estado = "Activo";
        $pro->save();
    }
}
