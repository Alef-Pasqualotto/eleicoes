<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatosController extends Controller
{
    function index(){
        $candidatos = DB::table('candidatos')
        ->SelectRaw('id, nome, partido, numero, cargo, periodo')
        ->orderBy('nome')
        ->get();

        return view('candidatos.index', ['candidatos' => $candidatos, 'title' => 'Candidatos']);
    }

    function create(){
        return view('candidatos.create', ['title' => 'Adicionar candidato']);
    }

    function store(Request $request){
        $data = $request->all();
 
        unset($data['_token']);
 
        DB::table('candidatos')->insert($data);
 
        return redirect('/candidatos');
    }

    function edit($id){

        $candidatos = DB::table('candidatos')->where('id', $id)->first();
 
        return view('candidatos.edit', ['candidatos' => $candidatos, 'title' => 'Editar candidato']);
 
    }
    function update(Request $request){
        $data = $request->all();
        unset($data['_token']);
        
        $id = array_shift($data);

        DB::table('candidatos')
            ->where('id',$id)
            ->update(array_intersect_key($data,['nome'=>1, 'partido'=>1, 'numero'=>1, 'cargo'=>1, 'periodo'=>1]));
 
        return redirect('/candidatos');
    }
 
    function show($id){
        $candidatos = DB::table('candidatos')
            ->selectRaw("
                id,
                nome,
                partido,
                numero,
                cargo,
                periodo
                ")
                ->Where('id',$id)
                ->first();
 
        return view('candidatos.show', ['candidatos' => $candidatos, 'title' => 'Candidatos']);
    }
 
    function destroy($id){
 
        DB::table('candidatos')
            ->where('id', $id)
            ->delete();
        return redirect('/candidatos');
    }

}
