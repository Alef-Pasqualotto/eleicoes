@extends('base.index')

@section('container')
<h1>Comprovante de votação {{$dados[0]->periodo}}</h1>
<h2 style="text-align:center;">{{$dados[0]->dt_inicio}}</h2>
@endsection
