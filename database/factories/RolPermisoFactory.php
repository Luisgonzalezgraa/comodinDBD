<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RolPermiso;
use App\Models\Rol;
use App\Models\Permiso;

class RolPermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idRol' => Rol::all()->random()->id,
            'idPermiso' => Permiso::all()->random()->id,
            'delete' => FALSE,
        ];
    }
}
