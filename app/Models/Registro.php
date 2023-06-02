<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    
    public function almacens()
    {
        return $this->hasOne('App\Models\Almacen', 'id', 'id_almacens');
    }
}
