@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/votos/resultado">Resultado da Eleição</a>
<h1>Resultado por Zona</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Zona</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>
                <td>{{$voto->nome}}</td>    
                <td>{{$voto->zona}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>
