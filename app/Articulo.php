<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Marca;

class Articulo extends Model
{
    protected $table = 'articles';
    public function nombreMarca()
    {
        return $this->belongsTo(Marca::class,'marca');
    }
    
}
