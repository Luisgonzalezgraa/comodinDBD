<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UsuarioRol;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioRolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idUsuario' => Usuario::all()->random()->id,
            'idRol' => Rol::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
