<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function biblioteca(){
        return $this->hasMany('App\Models\Biblioteca');
    }
    public function usuario_rol(){
        return $this->hasMany('App\Models\UsuarioRol');
    }
    public function registro(){
        return $this->hasOne('App\Models\Registro');
    }

    public function descargas(){
        return $this->hasMany('App\Models\Descargas');
    }

    public function comentario(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function publicacion(){
        return $this->hasMany('App\Models\Publicacion');
    }



}
