<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->string('pknit_neg', 10); // NIT del negocio (PK)
            $table->string('nom_neg', 65);   // Nombre del negocio
            $table->string('direcc_neg', 50); // Dirección
            $table->text('desc_neg')->nullable(); // Descripción
            $table->unsignedInteger('fkid_mun')->nullable(); // Municipio (FK)

            $table->string('fkt_doc', 2);     // Tipo de doc del propietario
            $table->string('fkid_usuario', 15); // ID del propietario

            // Clave primaria
            $table->primary('pknit_neg');

            // Clave foránea compuesta hacia usuarios
            $table->foreign(['fkt_doc', 'fkid_usuario'])
                  ->references(['pkfkt_doc', 'pkid_usuario'])
                  ->on('usuarios')
                  ->onDelete('cascade');

            // Clave foránea hacia municipios
            $table->foreign('fkid_mun')
                  ->references('pkid_mun')
                  ->on('municipios')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('negocios');
    }
}
