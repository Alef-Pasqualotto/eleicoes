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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->dateTime('dt_inicio');
            $table->dateTime('dt_fim');                        
        });

        Schema::create('eleitores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('titulo');
            $table->string('zona');
            $table->string('secao');            
        });

        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('partido');
            $table->string('numero');
            $table->enum('cargo', ['deputado estadual', 'deputado federal', 'senador', 'presidente', 'governador']);
            $table->unsignedBiginteger('periodo');
        });

        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('dt-voto');
            $table->unsignedBiginteger('candidato');
            $table->string('zona');
            $table->string('secao');
        });

        Schema::create('votantes', function (Blueprint $table) {
            $table->id();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votantes');
        Schema::drop('votos');
        Schema::drop('candidatos');
        Schema::drop('eleitores');
        Schema::drop('periodos');        
    }
};