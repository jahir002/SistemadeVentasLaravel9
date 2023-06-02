<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    
protected $fillable = ['razonsocial','numdocumento','direccion','telefono','email','estado'];


/**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function pedidos()
{
    return $this->hasMany('App\Models\Pedido', 'id_proveedors', 'id');
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function productos()
{
    return $this->hasMany('App\Models\Producto', 'id_proveedors', 'id');
}

public function almacens()
    {
        return $this->hasMany('App\Models\Almacen', 'id_proveedors', 'id');
    }

}
