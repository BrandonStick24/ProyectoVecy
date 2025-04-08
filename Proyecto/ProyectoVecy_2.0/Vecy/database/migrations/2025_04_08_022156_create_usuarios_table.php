<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('pkfkt_doc', 2); // Tipo de documento
            $table->string('pkid_usuario', 15); // Número de documento
            $table->string('pri_nom', 35);
            $table->string('seg_nom', 35)->nullable();
            $table->string('pri_ape', 35);
            $table->string('seg_ape', 35)->nullable();
            $table->string('correo_elec', 45);
            $table->string('password', 15);
            $table->unsignedInteger('fkid_rol')->nullable();

            // Clave primaria compuesta
            $table->primary(['pkfkt_doc', 'pkid_usuario']);

            // FK hacia la tabla de roles
            $table->foreign('fkid_rol')->references('pkid_rol')->on('roles')->onDelete('set null');

            // FK hacia la tabla de tipos de documento
            $table->foreign('pkfkt_doc')->references('pkid_doc')->on('tipos_documento')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
