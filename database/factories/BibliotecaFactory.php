<?php

namespace Database\Factories;
use App\Models\Biblioteca;
use App\Models\Libros;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\Factory;

class BibliotecaFactory extends Factory
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
        ];
    }
}
