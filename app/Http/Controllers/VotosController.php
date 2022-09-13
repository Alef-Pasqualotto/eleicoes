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
            
            
            //NOW() between dt_inicio and dt_fim
            //$verificacoes = DB::select('SELECT * FROM votantes INNER JOIN periodos ON periodo.id = votantes.id WHERE eleitor = $data['eleitor']');
            if($confirma_periodo != null){                
                $voto['cadidato'] = $data['candidato'];
                $voto['zona'] = $data['zona'];
                $voto['secao'] = $data['secao'];       
                $voto['dt-voto'] = $data['dt-voto'];
                     
                $votante['eleitor'] = $data['eleitor'];
                $votante['eleitor'] = $data['eleitor'];

                DB::table('votos')->insert($voto);
                DB::table('votantes')->insert();
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