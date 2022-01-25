<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Permiso;

class PermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
            'nombrePermiso'=>$this->faker->randomElement($array = array('Editar','Actualizar','Descargar')),
            'delete'=>FALSE,

        ];
    }
}
