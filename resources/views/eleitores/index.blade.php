@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/eleitores/create">Novo Eleitor</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Título de Eleitor</th>
            <th>Zona de Eleição</th>
            <th>Seção</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eleitores as $eleitor)
            <tr>
                <td>{{$eleitor->nome}}</td>
                <td>{{$eleitor->titulo}}</td>
                <td>{{$eleitor->zona}}</td>
                <td>{{$eleitor->secao}}</td>    
                <td>
                    <a class="btn btn-warning" href="/eleitores/{{$eleitores->id_eleitores}}/edit">Editar</a>
                    <a class="btn btn-info" href="/eleitores/{{$eleitores->id_eleitores}}/show">Ver</a>
                    <a class="btn btn-danger" href="/eleitores/{{$eleitores->id_eleitores}}/destroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
