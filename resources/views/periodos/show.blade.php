@extends('base.index')

@section('container')

<ul>
    <li>ID: {{$periodos->id}}</li>
    <li>Ano: {{$periodos->nome}}</li>
    <li>Data Inicial: {{$periodos->dt_inicio}}</li>
    <li>Data Final: {{$periodos->dt_fim}}</li>
</ul>
<a class="btn btn-danger"  href="/periodos">Voltar</a>

@endsection
