@extends('base.index')

@section('container')
<div class="d-flex justify-content-center">
<div class="card text-center" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Comprovante de votação {{$dados[0]->periodo}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$dados[0]->dt_inicio}}</h6>
    <p class="card-text">{{$dados[0]->eleitor}}</p>
    <p class="card-text">Inscrição: {{$dados[0]->titulo}}</p>
    <p class="card-text">Zona: {{$dados[0]->zona}} Seção: {{$dados[0]->secao}}</p>
  </div>
</div>
</div>




<!-- <div class="container-xl">
<h2 style="text-align:center;">Comprovante de votação {{$dados[0]->periodo}}</h2>
<h1 style="text-align:center;">{{$dados[0]->dt_inicio}}</h1>
<h2 style="text-align:center;">{{$dados[0]->eleitor}}
<h3 style="text-align:center;">Inscrição: {{$dados[0]->titulo}}</h3>
<h3 style="text-align:center;">Zona: {{$dados[0]->zona}} Seção: {{$dados[0]->secao}}</h3>
</div> -->
@endsection
