<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol; 

class RolSeeder extends Seeder{
    public function run(){
        $roles = [[
            'nombreRol' => 'Administrador',
            'delete' => FALSE,
        ],
        [
            'nombreRol' => 'Usuario',
            'delete' => FALSE,
        ],
        [
            'nombreRol' => 'Desarrollador',
            'delete' => FALSE,
        ],
        
    ];
        foreach($roles as $rol){
            Rol::create($rol);
        }
    }
}