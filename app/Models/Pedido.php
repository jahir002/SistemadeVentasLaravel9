<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $id_proveedors
 * @property $fechapedido
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Detallepedido[] $detallepedidos
 * @property Proveedor $proveedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    protected $fillable = ['id_proveedors','fechapedido','estado'];

    public function detallepedido()
    {
        return $this->hasMany('App\Models\Detallepedido', 'id_pedidos', 'id');
    }
    
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'id_proveedors');
    }
    

}
