<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;
class SeederTablaEmpleado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado= new Empleado();
        $empleado->nombre="Carlos Ruiz";
        $empleado->dni="78901064";
        $empleado->cargo="Encargado de Venta";
        $empleado->telefono="901045127";
        $empleado->email="Carlos789@gmail.com";
        $empleado->salario=1200.00;
        $empleado->estado="Activo";
        $empleado->save();
    }
}
