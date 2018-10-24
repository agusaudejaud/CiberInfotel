<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;
class Pedido extends Model
{
        protected $table = 'pedidos';
       protected $fillable = ['id', 'numeroorden', 'proveedor', 'fecha'];

      public function nombreProveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor');
    }
    
     
      
}
