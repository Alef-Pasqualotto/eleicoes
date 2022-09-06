<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     
            unset($data['_token']);
     
            $confirma_periodo = DB::select('SELECT id_periodos, dt_inicio, dt_fim FROM periodos WHERE NOW() between dt_inicio and dt_fim');
            if($confirma_periodo != null){
                $data['periodo_id'] = strval($confirma_periodo[0]->id_periodos);
                DB::table('votos')->insert($data);
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