<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
        function index(){
            $votos = DB::table('votos')
            ->SelectRaw('id_votos, periodo_id, candidato_id, zona, secao')
            ->orderBy('id_votos')
            ->get();
    
            $eleitores = DB::select('SELECT * FROM eleitores');
            $candidatos = DB::select('SELECT * FROM candidatos');
            $confirma_periodo = DB::select('SELECT dt_inicio, dt_fim FROM periodos WHERE NOW() between dt_inicio and dt_fim');
    
            return view('votos.index', ['votos' => $votos, 'eleitores' => $eleitores, 'title'=> 'votos', 'confirma_periodo' => $confirma_periodo, 'candidatos' => $candidatos]);
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