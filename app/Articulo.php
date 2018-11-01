<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Marca;
use Illuminate\Support\Facades\DB;
class Articulo extends Model
{
    protected $table = 'articles';
    protected $fillable = ['nombre', 'marca', 'precio_venta', 'descripcion'];
    public function nombreMarca()
    {
        return $this->belongsTo(Marca::class,'marca');
    }
    
    public static function listaArt(){
        $articulos = DB::select('SELECT 
        articles.*,
        IFNULL((SELECT 
            SUM(detallepedidos.cantidad) 
         FROM detallepedidos 
         WHERE detallepedidos.articulo=articles.id),0) AS Stock,
         marcas.nombre AS nombreMarca
      FROM articles 
      INNER JOIN marcas ON marcas.id = articles.marca');
     return $articulos;
    }
    
}
