<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','id_categorias','descripcion','id_marcas','talla','id_proveedors','precioventa','preciocompra','cantidad','stock','estado'];

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categorias');
    }
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'id_marcas');
    }
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'id_proveedors');
    }
    public function detallepedido()
    {
        return $this->hasMany('App\Models\Detallepedido', 'id_productos', 'id');
    }
    public function almacen()
    {
        return $this->hasMany('App\Models\Almacen', 'id_productos', 'id');
    }


}
