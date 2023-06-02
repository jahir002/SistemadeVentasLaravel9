<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable=[
       'serie','numero','fechaemision','formatopago','id_empleados',
           'id_clientes'
    ];

    
   

    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'id_empleados');
    }

    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_clientes');
    }


    
    public function detalleventa()
    {
        return $this->hasMany('App\Models\Detalleventa', 'idven', 'id');
    }

    

    


}
