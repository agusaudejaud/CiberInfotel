<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Articulo;

class Marca extends Model
{
    protected $table = 'marcas';
    public function Articulo()
    {
        return $this->hasMany(Articulo::class);
    }
    
}
