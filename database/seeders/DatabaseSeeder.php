<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;
use App\Models\Publicacion;
use App\Models\Comentario;
use App\Models\UsuarioRol;
use App\Models\Registro;
use App\Models\Rol;
use App\Models\RolPermiso;
use App\Models\Libros;
use App\Models\Descargas;
use App\Models\Biblioteca;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolSeeder::class);
       Permiso::factory(10)->create();
       RolPermiso::factory(10)->create();

       Usuario::factory(10)->create();
       UsuarioRol::factory(10)->create();
       Libros::factory(10)->create();
       Descargas::factory(10)->create();
       Registro::factory(10)->create();
       Publicacion::factory(10)->create();
       Biblioteca::factory(10)->create();
       Comentario::factory(10)->create();

    }

}
