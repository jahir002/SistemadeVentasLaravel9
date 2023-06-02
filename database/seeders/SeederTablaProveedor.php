<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;
class SeederTablaProveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prov= new Proveedor();
        $prov->id=1;
        $prov->razonsocial="Garcia Armenteros";
        $prov->numdocumento="78341078";
        $prov->direccion="av larco Nro 123";
        $prov->telefono="988012670";
        $prov->email="AGracia123@gmail.com";
        $prov->estado="Activo";

        $prov->save();
    }
}
