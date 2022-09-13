@extends('base.index')

@section('container')

<ul>
    <li>ID: {{$eleitores->id}}</li>
    <li>Nome: {{$eleitores->nome}}</li>
    <li>Título de Eleitor: {{$eleitores->titulo}}</li>
    <li>Zona de Eleição: {{$eleitores->zona}}</li>
    <li>Seção: {{$eleitores->secao}}</li>
</ul>
<a class="btn btn-danger" href="/eleitores">Voltar</a>

@endsection
