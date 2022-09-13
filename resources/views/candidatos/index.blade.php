@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/candidatos/create">Novo Candidato</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Partido</th>
            <th>Número do Candidato</th>
            <th>Cargo</th>
            <th>Período</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidatos as $candidato)
            <tr>
                <td>{{$candidato->nome}}</td>
                <td>{{$candidato->partido}}</td>
                <td>{{$candidato->numero}}</td>
                <td>{{$candidato->cargo}}</td> 
                <td>{{$candidato->periodo}}</td>  
                <td>
                    <a class="btn btn-warning" href="/candidatos/{{$candidato->id}}/edit">Editar</a>
                    <a class="btn btn-info" href="/candidatos/{{$candidato->id}}/show">Ver</a>
                    <a class="btn btn-danger" href="/candidatos/{{$candidato->id}}/destroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
