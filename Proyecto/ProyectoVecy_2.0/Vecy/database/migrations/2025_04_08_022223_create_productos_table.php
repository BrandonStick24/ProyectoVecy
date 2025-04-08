<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('pkid_prod')->primary();         // ID del producto (PK)
            $table->string('nom_prod', 70);                  // Nombre del producto
            $table->string('desc_prod', 50)->nullable();     // Descripción
            $table->double('pre_prod');                      // Precio
            $table->boolean('est_prod');                     // Estado (1 activo, 0 inactivo)

            $table->string('fknit_neg', 10);                 // FK al negocio
            $table->unsignedInteger('fkid_t_prod')->nullable(); // FK al tipo de producto

            // Claves foráneas
            $table->foreign('fknit_neg')
                  ->references('pknit_neg')
                  ->on('negocios')
                  ->onDelete('cascade');

            $table->foreign('fkid_t_prod')
                  ->references('pkid_t_prod')
                  ->on('tipos_producto')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
