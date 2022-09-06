@extends('base.index')

@section('container')
<form action='/periodos/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>

    @include('components.field', ['type'=> 'number', 'name' => 'ano', 'label' => 'Ano', 'value' => ""])
    @include('components.field', ['type'=> 'date', 'name' => 'dt_inicio', 'label' => 'Data de Início', 'value' => ""])
    @include('components.field', ['type'=> 'date', 'name' => 'dt_fim', 'label' => 'Data Final', 'value' => ""])
    <a class="btn btn-danger" href="/periodos">Voltar</a>
    @include('components.button', ['color'=> 'primary', 'label' => 'Inserir', 'type' => 'submit'])
  </form>
@endsection
