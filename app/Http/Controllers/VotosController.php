<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
    function index()
    {

        $votos = DB::select('SELECT candidatos.nome, votos.zona, votos.secao, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id GROUP BY candidatos.nome, votos.zona ORDER BY votos.zona');
        $secaos = DB::select('SELECT candidatos.nome, votos.zona, votos.secao, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id GROUP BY candidatos.nome, votos.secao ORDER BY votos.secao');

        return view('votos.index', ['votos' => $votos, 'title' => 'votos', 'secaos' => $secaos]);
    }

    function create()
    {
        return view('votos.create', ['title' => 'Criar votos']);
    }

    function store(Request $request)
    {
        $data = $request->all();

        $eleitor = DB::select('SELECT eleitor_id, zona, secao FROM eleitores WHERE titulo = ' + $data['titulo']);

        $verificacoes = DB::select('SELECT eleitor_id, periodo_id FROM periodos
                                        LEFT JOIN votantes ON periodos.id = votantes.periodo_id AND votantes.eleitor_id = ' + $eleitor['id'] + '                                        
                                        WHERE NOW() BETWEEN dt_inicio and dt_fim');
        if ($verificacoes != null) {
            DB::transaction(function ($data, $eleitor, $verificacoes) {
                
                $data['linha'] = substr($data['linha'], 1);

                $candidatos = explode(',', $data['linha']);

                for($i = 0; $i < count($candidatos); $i++){
                    if($candidatos[$i] != null){
                   $candidatos[$i] = DB::select('SELECT candidatos.id FROM candidatos WHERE candidatos.numero = '. $candidatos[$i]);
                    }
                }

                DB::table('votos')->insert([
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[0], 'zona' => $eleitor['zona'], 'secao' => $eleitor['secao']],
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[1], 'zona' => $eleitor['zona'], 'secao' => $eleitor['secao']],
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[2], 'zona' => $eleitor['zona'], 'secao' => $eleitor['secao']],
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[3], 'zona' => $eleitor['zona'], 'secao' => $eleitor['secao']],
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[4], 'zona' => $eleitor['zona'], 'secao' => $eleitor['secao']],
                ]);
//federal, estadual, senador, governador, presidente
                $voto['cadidato'] = $data['candidato'];
                $voto['zona'] = $data['zona'];
                $voto['secao'] = $data['secao'];
                $voto['dt-voto'] = $data['dt-voto'];

                $votante['eleitor_id'] = $eleitor['id'];
                $votante['periodo_id'] = $verificacoes['periodo_id'];


                DB::table('votos')->insert($voto);
                DB::table('votante')->insert($votante);
            });
        }
        return redirect('/votos');
    }

    function resultado()
    {
        $senadores = DB::select('SELECT candidatos.nome, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id where candidatos.cargo = "senador" GROUP BY candidatos.nome ORDER BY votos DESC LIMIT 1');
        $govenadores = DB::select('SELECT candidatos.nome, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id where candidatos.cargo = "governador" GROUP BY candidatos.nome ORDER BY votos DESC LIMIT 1');
        $presidentes = DB::select('SELECT candidatos.nome, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id where candidatos.cargo = "presidente" GROUP BY candidatos.nome ORDER BY votos DESC LIMIT 1');
        $deputadosfederal = DB::select('SELECT candidatos.nome, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id where candidatos.cargo = "deputado estadual" GROUP BY candidatos.nome ORDER BY votos DESC LIMIT 1 ');
        $deputadosestadual = DB::select('SELECT candidatos.nome, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id where candidatos.cargo = "deputado federal" GROUP BY candidatos.nome ORDER BY votos DESC LIMIT 1');

        return view('votos.resultado', ['senadores' => $senadores, 'governadores' => $govenadores, 'presidentes' => $presidentes, 'deputadosfederal' => $deputadosfederal, 'deputadosestadual' => $deputadosestadual, 'title' => 'Resultado']);
    }
}
