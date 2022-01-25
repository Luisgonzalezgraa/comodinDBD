<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comentario;
use App\Models\Libros;
use App\Models\Usuario;

class ComentarioFactory extends Factory
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
            'idLibro' => Libros::all()->random()->id,
            'mensaje'=>$this->faker->catchPhrase,
        ];
    }
}
