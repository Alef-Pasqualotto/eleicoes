@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/cursos/create">Novo Curso</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Curso</th>
            <th>Nome Reduzido</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cursos as $curso)
            <tr>
                <td>{{$curso->nome_cursos}}</td>
                <td>{{$curso->nome_reduzido}}</td>    
                <td>
                    <a class="btn btn-warning" href="/cursos/{{$curso->id_cursos}}/edit">Editar</a>
                    <a class="btn btn-info" href="/cursos/{{$curso->id_cursos}}/show">Ver</a>
                    <a class="btn btn-danger" href="/cursos/{{$curso->id_cursos}}/destroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
