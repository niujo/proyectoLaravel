<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //
    protected $table = 'detalle_venta';
    protected $fillable = [
        'idVenta',
        'idProducto',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;
}
