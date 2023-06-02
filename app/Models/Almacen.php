<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 *
 * @property $id
 * @property $codigopro
 * @property $id_productos
 * @property $id_proveedors
 * @property $cantidad
 * @property $valortotal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Proveedor $proveedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Almacen extends Model
{
    
    static $rules = [
		'codigopro' => 'required',
		'id_productos' => 'required',
		'id_proveedors' => 'required',
		'cantidad' => 'required',
		'valortotal' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigopro','id_productos','id_proveedors','cantidad','valortotal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productos()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_productos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedors()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'id_proveedors');
    }

    public function registro()
    {
        return $this->hasMany('App\Models\Registro', 'id_almacens', 'id');
    }
    

}
