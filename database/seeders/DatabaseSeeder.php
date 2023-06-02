<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([

        
        SeederTablaUsuario::class,
        SeederTablaPermisos::class,
        
        SeederTablaCliente::class,
        SeederTablaEmpleado::class,
        SeederTablaProveedor::class,

        SeederTablaDetaCategoria::class,
        SeederTablaDetaMarca::class,

        SeederTablaProducto::class,

        SeederTablaVenta::class,
        SeederTablaDetaVenta::class,





       ]);

    }
}
