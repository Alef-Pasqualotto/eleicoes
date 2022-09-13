<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    function index(){
        $periodos = DB::table('periodos')
        ->SelectRaw('id, nome, date_format(dt_inicio, \'%d/%m/%Y\') as dt_inicio,  date_format(dt_fim, \'%d/%m/%Y\') as dt_fim')
        ->orderBy('dt_inicio')
        ->get();

        return view('periodos.index', ['periodos' => $periodos, 'title' => 'Períodos']);
    }

    function create(){
        return view('periodos.create', ['title' => 'Criar Período']);
    }

    function store(Request $request){
        $data = $request->all();
 
        unset($data['_token']);
 
        DB::table('periodos')->insert($data);
 
        return redirect('/periodos');
    }

    function edit($id){

        $periodos = DB::table('periodos')->where('id', $id)->first();
 
        return view('periodos.edit', ['periodos' => $periodos, 'title' => 'Editar período']);
 
    }
    function update(Request $request){
        $data = $request->all();
        unset($data['_token']);
        
        $id = array_shift($data);

        DB::table('periodos')
            ->where('id',$id)
            ->update(array_intersect_key($data,['nome'=>1,'dt_inicio'=>1, 'dt_fim'=>1]));
 
        return redirect('/periodos');
    }
 
    function show($id){
        $periodos = DB::table('periodos')
            ->selectRaw("
                id,
                nome,
                dt_inicio,
                dt_fim
                ")
                ->Where('id',$id)
                ->first();
 
        return view('periodos.show', ['periodos' => $periodos, 'title' => 'Períodos']);
    }
 
    function destroy($id){
 
        DB::table('periodos')
            ->where('id', $id)
            ->delete();
        return redirect('/periodos');
    }
}
