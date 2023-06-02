<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
class SeederTablaCliente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = new Cliente();
        $clientes->nombre="John Ramirez";
        $clientes->tipodocumento="DNI";
        $clientes->numerodocumento="70845678";
        $clientes->telefono="901243610";
        $clientes->email="John7084@gmail.com";
        $clientes->save();
    }
}
