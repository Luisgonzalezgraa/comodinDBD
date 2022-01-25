<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    public function descargas(){
        return $this->hasMany('App\Models\Descargas');
    }

    public function comentario(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function publicacion(){
        return $this->hasMany('App\Models\Publicacion');
    }

    public function biblioteca(){
        return $this->hasMany('App\Models\Biblioteca');
    }

}
