@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/periodos/create">Novo Periodo</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data de Início</th>
            <th>Data Final</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($periodos as $periodos)
            <tr>
                <td>{{$periodos->nome}}</td>
                <td>{{$periodos->dt_inicio}}</td>
                <td>{{$periodos->dt_fim}}</td>
                <td>
                    <a class="btn btn-warning" href="/periodos/{{$periodos->id}}/edit">Editar</a>
                    <a class="btn btn-info" href="/periodos/{{$periodos->id}}/show">Ver</a>
                    <a class="btn btn-danger" href="/periodos/{{$periodos->id}}/destroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
