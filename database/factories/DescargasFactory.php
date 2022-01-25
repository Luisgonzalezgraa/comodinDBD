<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Descargas;
use App\Models\Libros;
use App\Models\Usuario;

class DescargasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idLibro' => Libros::all()->random()->id,
            'idUsuario' => Usuario::all()->random()->id,
            'fechaDescarga' => $this->faker->date,
            'fechaEntrega' => $this->faker->date,
        ];
    }
}
