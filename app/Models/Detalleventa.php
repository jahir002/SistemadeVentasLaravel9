<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detalleventa
 *
 * @property $id
 * @property $idven
 * @property $id_productos
 * @property $precio
 * @property $cantidad
 * @property $subtotal
 * @property $igv
 * @property $total
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalleventa extends Model
{
    
    static $rules = [
		'idven' => 'required',
		'id_productos' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
		'subtotal' => 'required',
		'igv' => 'required',
		'total' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idven','id_productos','precio','cantidad','subtotal','igv','total','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

 
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_productos');
    }


    

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'idven');
    }
    

}
