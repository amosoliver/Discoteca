<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discos', function (Blueprint $table) {
            $table->bigIncrements('id_disco');
            $table->string('ds_disco');
            $table->integer('ano');
            $table->integer('quantidade');
            $table->float('preco');
            $table->unsignedBigInteger('id_artista');
            $table->foreign('id_artista')->references('id_artista')->on('artistas');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')->references('id_genero')->on('generos');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discos');
    }
};
