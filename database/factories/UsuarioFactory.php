<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreUsuario'=>$this->faker->userName,
            'email'=>$this->faker->email,
            'contrasenia'=>$this->faker->password,
            'fechaNacimiento'=>$this->faker->date,
            'delete' =>FALSE
        ];
    }
}
