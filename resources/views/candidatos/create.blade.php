@extends('base.index')

@section('container')
<form action='/candidatos/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' required/>

    @include('components.field', ['type'=> 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'partido', 'label' => 'Partido', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'numero', 'label' => 'Número do Candidato', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'cargo', 'label' => 'Cargo', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'periodo', 'label' => 'Cargo', 'value' => ""])
    <a class="btn btn-danger" href="/candidatos">Voltar</a>
    @include('components.button', ['color'=> 'primary', 'label' => 'Inserir', 'type' => 'submit'])
  </form>
@endsection
