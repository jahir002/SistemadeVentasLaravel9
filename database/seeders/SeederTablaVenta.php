<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venta;

class SeederTablaVenta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ventas = new Venta();
        $ventas->id=1;
        $ventas->serie="SV-20230518-1";
        $ventas->numero="NV-1";
        $ventas->fechaemision="2023-05-13T18:20";
        $ventas->formatopago="Efectivo";
        $ventas->id_empleados=1;
        $ventas->id_clientes=1;

        

        $ventas->save();
        
    }
}
