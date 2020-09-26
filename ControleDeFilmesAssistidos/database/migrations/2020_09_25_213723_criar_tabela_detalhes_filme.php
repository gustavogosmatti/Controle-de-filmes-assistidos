<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDetalhesFilme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('quem_indicou');
            $table->float('avaliacao');
            $table->string('comentario');
            $table->integer('filme_id');

            $table->foreign('filme_id')->references('id')->on('filmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalhes');
    }
}
