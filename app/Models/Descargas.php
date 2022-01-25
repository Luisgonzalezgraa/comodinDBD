<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descargas extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function libros(){
        return $this->belongsTo('App\Models\Libros');
    }
}
