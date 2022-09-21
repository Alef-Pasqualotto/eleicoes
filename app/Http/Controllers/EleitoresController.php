<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleitoresController extends Controller
{
    function index(){
        $eleitores = DB::table('eleitores')
        
        ->SelectRaw('id, nome, titulo, zona, secao')
        ->orderBy('nome')
        ->get();

        return view('eleitores.index', ['eleitores' => $eleitores, 'title' => 'Eleitores']);
    }

    function create(){
        return view('eleitores.create', ['title' => 'Adicionar eleitor']);
    }

    function store(Request $request){
        $data = $request->all();
 
        unset($data['_token']);
 
        DB::table('eleitores')->insert($data);
 
        return redirect('/eleitores');
    }

    function edit($id){

        $eleitores = DB::table('eleitores')->where('id', $id)->first();
 
        return view('eleitores.edit', ['eleitores' => $eleitores, 'title' => 'Editar eleitor']);
 
    }
    function update(Request $request){
        $data = $request->all();
        unset($data['_token']);
        
        $id = array_shift($data);

        DB::table('eleitores')
            ->where('id',$id)
            ->update(array_intersect_key($data,['nome'=>1, 'titulo'=>1, 'zona'=>1, 'secao'=>1]));
 
        return redirect('/eleitores');
    }
 
    function show($id){
        $eleitores = DB::table('eleitores')
            ->selectRaw("
                id,
                nome,
                titulo,
                zona,
                secao
                ")
                ->Where('id',$id)
                ->first();
 
        return view('eleitores.show', ['eleitores' => $eleitores, 'title' => 'Eleitores']);
    }
 
    function destroy($id){
 
        DB::table('eleitores')
            ->where('id', $id)
            ->delete();
        return redirect('/eleitores');
    }

    function mostraComprovante(){
        
    $dados = DB::select('SELECT periodos.nome AS periodo, eleitores.nome AS eleitor, DATE_FORMAT(dt_inicio, "%d/%m/%Y") AS dt_inicio, eleitores.zona, eleitores.secao
                         FROM eleitores INNER JOIN votantes ON votantes.eleitor_id = eleitores.id AND votantes.id = '. 1 .' 
                         INNER JOIN periodos ON periodos.id = votantes.periodo_id;');
        return view('eleitores.comprovante', ['title' => 'Comprovante', 'dados' => $dados]);
    }
}
