<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','estado','imagen'];

    public function producto()
    {
        return $this->hasMany('App\Models\Producto', 'id_categorias', 'id');
    }
}
