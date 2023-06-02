<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_productos');
    }

    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id', 'id_pedidos');
    }


}
