<?php

namespace Database\Factories;
use App\Models\Publicacion;
use App\Models\Libros;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fechaPublicacion' => $this->faker->date,
            'idLibro' => Libros::all()->random()->id,
            'idUsuario'=> Usuario::all()->random()->id,
            'delete' => FALSE
        ];
    }
}
