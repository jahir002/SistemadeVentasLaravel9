<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
class SeederTablaDetaMarca extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marca=new Marca();
        $marca->nombre="NIKE";
        $marca->estado="Activo";
        $marca->save();
    }
}
