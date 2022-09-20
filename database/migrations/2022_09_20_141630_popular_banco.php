<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('eleitores')->insert([
            ['id' => '1', 'nome' => 'Cristian', 'titulo' => '112255447788', 'zona' => 'Escola em Feliz', 'secao' => '001'],
            ['id' => '2', 'nome' => 'Cefalopode', 'titulo' => '995511442233', 'zona' => 'Posto do Ivan', 'secao' => '002'],
            ['id' => '3', 'nome' => 'Sepeu', 'titulo' => '322348845115', 'zona' => 'Instituto IP (Ivan Pra)', 'secao' => '003'],
            ['id' => '4', 'nome' => 'Isabel', 'titulo' => '654123987', 'zona' => 'Clube Regatas do Sr Pra', 'secao' => '004'],
            ['id' => '5', 'nome' => 'Ana', 'titulo' => '785412369874', 'zona' => 'Secao de CPU no Caita', 'secao' => '004']
        ]);

        DB::table('periodos')->insert([
            ['id' => '1', 'nome' => 'Eleicoes 2018 T1', 'dt_inicio' => '2020-10-07', 'dt_fim' => '2020-10-07'],
            ['id' => '2', 'nome' => 'Eleicoes 2018 T2', 'dt_inicio' => '2020-10-28', 'dt_fim' => '2020-10-28'],
            ['id' => '3', 'nome' => 'Eleicoes 2014 T1', 'dt_inicio' => '2020-10-05', 'dt_fim' => '2020-10-05'],
            ['id' => '4', 'nome' => 'Eleicoes 2014 T2', 'dt_inicio' => '2020-10-26', 'dt_fim' => '2020-10-26']
        ]);

        Schema::table('candidatos', function (Blueprint $table) {
            $table->foreign('periodo')->references('id')->on('periodos')->onDelete('cascade');

            DB::table('candidatos')->insert([
                // Deputado Estadual
                ['id' => '1', 'nome' => 'Monteiro Lobato', 'partido' => 'Partido Sitio', 'numero' => '33221', 'cargo' => 'deputado estadual', 'periodo' => 1],
                ['id' => '2', 'nome' => 'Machado de Assis', 'partido' => 'Os Casmurros', 'numero' => '14725', 'cargo' => 'deputado estadual', 'periodo' => 1],
                // Presidente
                ['id' => '3', 'nome' => 'Homem-Sereia', 'partido' => 'Mexilhoes', 'numero' => '33', 'cargo' => 'presidente', 'periodo' => 1],
                ['id' => '4', 'nome' => 'Sr. Sirigueijo', 'partido' => 'Partido Cascudo', 'numero' => '44', 'cargo' => 'presidente', 'periodo' => 1],
                // Senador
                ['id' => '5', 'nome' => 'Maestro Shifu', 'partido' => 'Cunguifu', 'numero' => '852', 'cargo' => 'senador', 'periodo' => 1],
                ['id' => '6', 'nome' => 'Oogway', 'partido' => 'Tratuga', 'numero' => '741', 'cargo' => 'senador', 'periodo' => 1],
                // Deputado Federal
                ['id' => '7', 'nome' => 'Velociraptor', 'partido' => 'Acre Unido', 'numero' => '7744', 'cargo' => 'deputado federal', 'periodo' => 1],
                ['id' => '8', 'nome' => 'Pteranodonte', 'partido' => 'Partido Cretaceo', 'numero' => '4477', 'cargo' => 'deputado federal', 'periodo' => 1],
                // Governador
                ['id' => '9', 'nome' => 'Isaque Niuton', 'partido' => 'Gravidade Universal Brasileira', 'numero' => '42', 'cargo' => 'governador', 'periodo' => 1],
                ['id' => '10', 'nome' => 'Alberto Einstein', 'partido' => 'Mrs. Genio', 'numero' => '88', 'cargo' => 'governador', 'periodo' => 1]
            ]);
        });
        
        DB::statement('ALTER TABLE votos modify candidato BIGINT(20) unsigned;');
        Schema::table('votos', function (Blueprint $table) {
            $table->foreign('candidato')->references('id')->on('candidatos')->onDelete('cascade');

            DB::table('votos')->insert([
                ['id' => '1', 'candidato' => 2, 'dt-voto' => '2020-10-07', 'secao' => '001', 'zona' => 'Escola em Feliz'],
                ['id' => '2', 'candidato' => 3, 'dt-voto' => '2020-10-07', 'secao' => '001', 'zona' => 'Escola em Feliz'],
                ['id' => '3', 'candidato' => 5, 'dt-voto' => '2020-10-07', 'secao' => '001', 'zona' => 'Escola em Feliz'],
                ['id' => '4', 'candidato' => 7, 'dt-voto' => '2020-10-07', 'secao' => '001', 'zona' => 'Escola em Feliz'],
                ['id' => '5', 'candidato' => 9, 'dt-voto' => '2020-10-07', 'secao' => '001', 'zona' => 'Escola em Feliz'],
                ['id' => '6', 'candidato' => 2, 'dt-voto' => '2020-10-07', 'secao' => '002', 'zona' => 'Posto do Ivan'],
                ['id' => '7', 'candidato' => 4, 'dt-voto' => '2020-10-07', 'secao' => '002', 'zona' => 'Posto do Ivan'],
                ['id' => '8', 'candidato' => 7, 'dt-voto' => '2020-10-07', 'secao' => '002', 'zona' => 'Posto do Ivan'],
                ['id' => '9', 'candidato' => 10, 'dt-voto' => '2020-10-07', 'secao' => '002', 'zona' => 'Posto do Ivan'],
                ['id' => '10', 'candidato' => 5, 'dt-voto' => '2020-10-07', 'secao' => '002', 'zona' => 'Posto do Ivan'],
                ['id' => '11', 'candidato' => 2, 'dt-voto' => '2020-10-07', 'secao' => '003', 'zona' => 'Instituto IP (Ivan Pra)'],
                ['id' => '12', 'candidato' => 3, 'dt-voto' => '2020-10-07', 'secao' => '003', 'zona' => 'Instituto IP (Ivan Pra)'],
                ['id' => '13', 'candidato' => 6, 'dt-voto' => '2020-10-07', 'secao' => '003', 'zona' => 'Instituto IP (Ivan Pra)'],
                ['id' => '14', 'candidato' => null, 'dt-voto' => '2020-10-07', 'secao' => '003', 'zona' => 'Instituto IP (Ivan Pra)'],
                ['id' => '15', 'candidato' => 10, 'dt-voto' => '2020-10-07', 'secao' => '003', 'zona' => 'Instituto IP (Ivan Pra)'],
                ['id' => '16', 'candidato' => 1, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Clube Regatas do Sr Pra'],
                ['id' => '17', 'candidato' => null, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Clube Regatas do Sr Pra'],
                ['id' => '18', 'candidato' => 6, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Clube Regatas do Sr Pra'],
                ['id' => '19', 'candidato' => 7, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Clube Regatas do Sr Pra'],
                ['id' => '20', 'candidato' => 9, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Clube Regatas do Sr Pra'],
                ['id' => '21', 'candidato' => null, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Secao de CPU no Caita'],
                ['id' => '22', 'candidato' => 3, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Secao de CPU no Caita'],
                ['id' => '23', 'candidato' => 6, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Secao de CPU no Caita'],
                ['id' => '24', 'candidato' => 8, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Secao de CPU no Caita'],
                ['id' => '25', 'candidato' => 10, 'dt-voto' => '2020-10-07', 'secao' => '004', 'zona' => 'Secao de CPU no Caita']
            ]);
        });

        DB::table('votantes')->insert([
            ['id' => '1', 'eleitor_id' => '1', 'periodo_id' => '1'],
            ['id' => '2', 'eleitor_id' => '2', 'periodo_id' => '1'],
            ['id' => '3', 'eleitor_id' => '3', 'periodo_id' => '1'],
            ['id' => '4', 'eleitor_id' => '4', 'periodo_id' => '1'],
            ['id' => '5', 'eleitor_id' => '5', 'periodo_id' => '1']            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('votantes')->delete();
        
        DB::table('votos')->delete();        
        Schema::table('votos', function (Blueprint $table) {
            $table->dropForeign(['candidato']);
        });
        
        DB::table('candidatos')->delete();
        Schema::table('candidatos', function (Blueprint $table) {
            $table->dropForeign(['periodo']);
        });

        DB::table('periodos')->delete();
        DB::table('eleitores')->delete();
    }
};
