@extends('base.index')

@section('container')
<div class="container-xl">
<h2 style="text-align:center;">Comprovante de votação {{$dados[0]->periodo}}</h2>
<h1 style="text-align:center;">{{$dados[0]->dt_inicio}}</h1>
<h2 style="text-align:center;">{{$dados[0]->eleitor}}
<h3 style="text-align:center;">Inscrição: {{$dados[0]->titulo}}</h3>
<h3 style="text-align:center;">Zona: {{$dados[0]->zona}} Seção: {{$dados[0]->secao}}</h3>
</div>
@endsection
