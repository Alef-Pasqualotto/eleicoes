<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatosController extends Controller
{
    function index()
    {
        $candidatos = DB::table('candidatos')
            ->join('periodos', 'candidatos.periodo', '=', 'periodos.id')
            ->SelectRaw('candidatos.id, candidatos.nome, candidatos.partido, candidatos.numero, candidatos.cargo, periodos.nome as periodo')
            ->orderBy('candidatos.nome')
            ->get();

        return view('candidatos.index', ['candidatos' => $candidatos, 'title' => 'Candidatos']);
    }

    function create()
    {
        $periodos = DB::select('SELECT * FROM periodos');
        return view('candidatos.create', ['title' => 'Adicionar candidato', 'periodos' => $periodos]);
    }

    function store(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        DB::table('candidatos')->insert($data);

        return redirect('/candidatos');
    }

    function edit($id)
    {

        $candidatos = DB::table('candidatos')
            ->where('id', $id)->first();
        $periodos = DB::select('SELECT * FROM periodos');

        return view('candidatos.edit', ['candidatos' => $candidatos, 'title' => 'Editar candidato', 'periodos' => $periodos]);
    }
    function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $id = array_shift($data);

        DB::table('candidatos')
            ->where('id', $id)
            ->update(array_intersect_key($data, ['nome' => 1, 'partido' => 1, 'numero' => 1, 'cargo' => 1, 'periodo' => 1]));

        return redirect('/candidatos');
    }

    function show($id)
    {
        $candidatos = DB::table('candidatos')
            ->selectRaw("
                id,
                nome,
                partido,
                numero,
                cargo,
                periodo
                ")
            ->Where('id', $id)
            ->first();

        return view('candidatos.show', ['candidatos' => $candidatos, 'title' => 'Candidatos']);
    }

    function destroy($id)
    {

        DB::table('candidatos')
            ->where('id', $id)
            ->delete();
        return redirect('/candidatos');
    }

    function buscaJson()
    {

        $json = DB::select('SELECT GROUP_CONCAT( CONCAT( "\"", numero, "\": ", JSON_OBJECT("nome", nome, "partido", partido)) SEPARATOR ", " ) AS linha FROM candidatos  GROUP BY cargo;');
        if ($json) {
         
            $path = 'etapas.json';
            $jsonString = ('
                {
                    "-1": {
                        "titulo": "titulo de eleitor",
                        "numeros": 12,
                        "candidatos": {}
                    },


                    "0": {
                        "titulo": "deputado federal",
                        "numeros": 4,
                        "candidatos": {' .
                            $json[1]->linha
                            . '}
                    },

                    "1": {
                        "titulo": "deputado estadual",
                        "numeros": 5,
                        "candidatos": {' .
                            $json[0]->linha
                            . '}
                    },
                        
                    "2": {
                        "titulo": "senador",
                        "numeros": 3,
                        "candidatos": {' .
                            $json[2]->linha
                            . '}
                    },

                    "3": {
                        "titulo": "governador",
                        "numeros": 2,
                        "candidatos": {' .
                            $json[4]->linha
                            . '}
                    },

                    "4": {
                        "titulo": "presidente",
                        "numeros": 2,
                        "candidatos": {' .
                            $json[3]->linha
                            . '}
                    }
                }');

            $fp = fopen($path, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
            return view('urna.index', ['title' => 'Bem-vindo!']);
        }
    }
}
