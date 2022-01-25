<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registro;
use App\Models\Rol;
use App\Models\Usuario;

class RegistroFactory extends Factory
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
            'estado' => FALSE,
        ];
    }
}
