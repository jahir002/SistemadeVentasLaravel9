<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            // tabla usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            // Area de Productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //

            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',

            'ver-empleado',
            'crear-empleado',
            'editar-empleado',
            'borrar-empleado',

            'ver-proveedor',
            'crear-proveedor',
            'editar-proveedor',
            'borrar-proveedor',

            // Area de Pedidos
            'ver-pedidos',
            'crear-pedidos',
            'editar-pedidos',
            'borrar-pedidos',
           //
            'ver-documento',
            'crear-documento',
            'editar-documento',
            'borrar-documento',
           // Area de Ventas
            'ver-venta',
            'crear-venta',
            'editar-venta',
            'borrar-venta',
            //

            // Are de Almacen
            'ver-almacen',
            'crear-almacen',
            'editar-almacen',
            'borrar-almacen',

            
          
        ];  

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }

    }
}
