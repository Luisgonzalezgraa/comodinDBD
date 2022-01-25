<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libros;

class LibrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreLibro'=>$this->faker->name,
            'fechaCreacion'=> $this->faker->date,
            'autor'=>$this->faker->name,
            'linkLibro'=>$this->faker->url,
            'delete' =>FALSE,
        ];
    }
}
