@extends('base.index')

@section('container')

<ul>
    <li>ID: {{$candidatos->id}}</li>
    <li>Nome: {{$candidatos->nome}}</li>
    <li>Partido: {{$candidatos->partido}}</li>
    <li>Número do Candidato: {{$candidatos->numero}}</li>
    <li>Cargo: {{$candidatos->cargo}}</li>
    <li>Período: {{$candidatos->periodo}}</li>
</ul>
<a class="btn btn-danger" href="/candidatos">Voltar</a>

@endsection
