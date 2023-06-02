<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Detalleventa;

class SeederTablaDetaVenta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detalleventa = new Detalleventa();
        $detalleventa->idven = 1;
        $detalleventa->id_productos = 1;
        $detalleventa->precio = 24.00;
        $detalleventa->cantidad = 1;

        $a = $detalleventa->precio;
        $b = $detalleventa->cantidad;

        $sub = $a * $b;

        $detalleventa->subtotal = $sub;

        $detalleventa->igv = 0.18;

        //
        $c = $detalleventa->igv;

        $dd = $sub * $c;

        $ii = $sub + $dd;
        $detalleventa->total = $ii;

        $detalleventa->estado = "Activo";

        $detalleventa->save();
    }
}
