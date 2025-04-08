<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->string('pknit_neg', 10)->primary();
            $table->string('nom_neg', 65);
            $table->string('direcc_neg', 50);
            $table->text('desc_neg')->nullable();

            $table->unsignedInteger('fkid_mun')->nullable();
            $table->string('fkt_doc', 2);
            $table->string('fkid_usuario', 15);

            // Relaciones (claves foráneas)
            $table->foreign('fkid_mun')->references('pkid_mun')->on('municipios')->onDelete('set null');
            $table->foreign('fkt_doc')->references('pkt_doc')->on('tipo_doc')->onDelete('cascade');
            $table->foreign('fkid_usuario')->references('pkid_usuario')->on('usuarios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('negocios');
    }
}
