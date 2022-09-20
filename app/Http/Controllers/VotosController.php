<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
        function index(){

            $votos = DB::select('SELECT candidatos.nome, votos.zona, votos.secao, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id GROUP BY candidatos.nome ORDER BY votos.zona');
            $candidatos = DB::select('SELECT * FROM candidatos inner join votos on votos.candidato = candidatos.nome');
            $confirma_periodo = DB::select('SELECT dt_inicio, dt_fim FROM periodos WHERE NOW() between dt_inicio and dt_fim');
    
            return view('votos.index', ['votos' => $votos, 'title'=> 'votos', 'confirma_periodo' => $confirma_periodo, 'candidatos' => $candidatos]);
        }
    
        function create(){
            return view('votos.create', ['title' => 'Criar votos']);
        }
    
        function store(Request $request){
            $data = $request->all();
            
            $eleitor_id = DB::select('SELECT eleitor_id FROM eleitores WHERE titulo = ' + $data['titulo']);
            
            $verificacoes = DB::select('SELECT eleitor_id, periodo_id FROM periodos
                                        LEFT JOIN votantes ON periodos.id = votantes.periodo_id AND votantes.eleitor_id = ' + $eleitor_id + '                                        
                                        WHERE NOW() BETWEEN dt_inicio and dt_fim');
            if($verificacoes != null){
                $voto['cadidato'] = $data['candidato'];
                $voto['zona'] = $data['zona'];
                $voto['secao'] = $data['secao'];       
                $voto['dt-voto'] = $data['dt-voto'];
                     
                $votante['eleitor_id'] = $eleitor_id;
                $votante['periodo_id'] = $verificacoes['periodo_id'];


                DB::table('votos')->insert($voto);
                DB::table('votante')->insert($votante);
            }
            return redirect('/votos');
        }
     
        function show($zona){
            $candidatos = DB::select('votos')
            ->join('periodos', 'candidatos.periodo', '=', 'periodos.id')
            ->SelectRaw('candidatos.id, candidatos.nome, candidatos.partido, candidatos.numero, candidatos.cargo, periodos.nome as periodo')
            ->orderBy('candidatos.nome')
            ->get();

            $votos = DB::select('SELECT candidatos.nome, votos.zona, votos.secao, COUNT(votos.id) as votos FROM votos INNER JOIN candidatos ON votos.candidato = candidatos.id WHERE votos.zona = $zona GROUP BY candidatos.nome');
            return view('votos.show', ['votos' => $votos, 'title' => 'votos']);
        }
}