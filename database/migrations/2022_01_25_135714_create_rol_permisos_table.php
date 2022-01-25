<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('delete');
            $table->unsignedBigInteger('idRol')->nullable();
            $table->foreign('idRol')->references('id')->on('rols');

            $table->unsignedBigInteger('idPermiso')->nullable();
            $table->foreign('idPermiso')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_permisos');
    }
}
