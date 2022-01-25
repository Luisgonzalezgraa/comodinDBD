<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasFactory;
    public function permiso(){
        return $this->belongsTo('App\Models\Permiso');
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }
}
