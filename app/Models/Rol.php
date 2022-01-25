<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public function rol_permiso(){
        return $this->hasMany('App\Models\RolPermiso');
    }
    
    public function registro(){
        return $this->hasOne('App\Models\Registro');
    }

    public function usuario_rol(){
        return $this->hasMany('App\Models\UsuarioRol');
    }


}
