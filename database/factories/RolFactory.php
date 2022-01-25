<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rol;

class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            return [
                'nombreRol'=>$this->faker->randomElement($array = array('Administrador','Desarrollador','Usuario')),
                'delete'=>FALSE
            ];
        ];
    }
}
