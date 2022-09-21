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

        $eleitor = DB::select('SELECT id, zona, secao FROM eleitores WHERE titulo = ' . $data['tituloeleitor']);

        
        
        $verificacoes = DB::select('SELECT eleitor_id, periodo_id FROM periodos
                                        LEFT JOIN votantes ON periodos.id = votantes.periodo_id AND votantes.eleitor_id = ' . $eleitor[0]->id );
       if ($verificacoes != null) {
            
                
                $data['listavotos'] = substr($data['listavotos'], 1);

                $candidatos = explode(',', $data['listavotos']);
            
                $totaldevotos = count($candidatos);

                $contador = 0;

                while ($contador < $totaldevotos){
                    if($candidatos[$contador] != null){
                   $candidatos[$contador] = DB::select('SELECT candidatos.id FROM candidatos WHERE candidatos.numero = '. $candidatos[$contador]);
                   
                DB::table('votos')->insert([
                    ['dt-voto' => NOW(), 'candidato' => $candidatos[$contador], 'zona' => $eleitor[$contador]->zona, 'secao' => $eleitor[$contador]->secao],                    
                ]);
                    }
                $contador++;
                }

                $votante['eleitor_id'] = $eleitor[0]->id;
                $votante['periodo_id'] = 5;
                
                DB::table('votantes')->insert($votante);
            };
            return redirect('/votos');
        }
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
