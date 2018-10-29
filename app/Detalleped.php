<?php

namespace App;
use App\Articulo;
use Illuminate\Database\Eloquent\Model;

class Detalleped extends Model
{
    protected $table = 'detallepedidos';
    protected $fillable = ['cantidad', 'articulo', 'pedido', 'precio_costo'];


    public function nombreArticulo()
{
    return $this->belongsTo(Articulo::class,'articulo');
}
}


