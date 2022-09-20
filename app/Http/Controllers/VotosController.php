<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
        function index(){
            $votos = DB::table('votos')
            ->SelectRaw('candidato, zona, secao')
            ->orderBy('id')
            ->get();
    
            $candidatos = DB::select('SELECT * FROM candidatos inner join votos on votos.candidato = candidatos.nome');
            $confirma_periodo = DB::select('SELECT dt_inicio, dt_fim FROM periodos WHERE NOW() between dt_inicio and dt_fim');

            foreach ($candidatos as $candidato){
                $QuantidadeVotos = DB::select('SELECT COUNT(dt-voto) from votos inner join candidatos on candidatos.nome = votos.candidato');
            }
    
            return view('votos.index', ['votos' => $votos, 'eleitores' => $eleitores, 'title'=> 'votos', 'confirma_periodo' => $confirma_periodo, 'candidatos' => $candidatos]);
        }
    
        function create(){
            return view('votos.create', ['title' => 'Criar votos']);
        }
    
        function store(Request $request){
            $data = $request->all();
            
            
            $verificacoes = DB::select('SELECT eleitor_id FROM periodo
                                        LEFT JOIN votantes ON periodo.id = votantes.periodo AND votantes.eleitor_id = ' + $data[''] + '
                                        LEFT JOIN eleitores ON eleitores.id = votantes.eleitor_id
                                        WHERE NOW() BETWEEN dt_inicio and dt_fim');
            if($verificacoes != null && $verificacoes['eleitores.id'] == null){
                $voto['cadidato'] = $data['candidato'];
                $voto['zona'] = $data['zona'];
                $voto['secao'] = $data['secao'];       
                $voto['dt-voto'] = $data['dt-voto'];
                     
                $votante['eleitor'] = $verificacoes['eleitor'];

                DB::table('votos')->insert($voto);
                //DB::table('votantes')->insert();
            }
            return redirect('/votos');
        }
     
        function show($id){
            $votos = DB::table('votos')
                ->selectRaw("
                id_votos, 
                data,
                periodo_id, 
                candidato,
                zona,
                secao
                ")
                ->find($id);
     
            return view('votos.show', ['votos' => $votos, 'title' => 'votos']);
}
}