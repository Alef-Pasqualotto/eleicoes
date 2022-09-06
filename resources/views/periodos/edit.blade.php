@extends('base.index')

@section('container')
<form action='/periodos/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{ $periodos->id_periodos }}" name="id_periodos"/>

    @include('components.field', ['type' => 'number', 'name' => 'ano', 'label' => 'Ano', 'value' => $periodos->ano])
    @include('components.field', ['type' => 'date', 'name' => 'dt_inicio', 'label' => 'Data de Início', 'value' => $periodos->dt_inicio])
    @include('components.field', ['type' => 'date', 'name' => 'dt_fim', 'label' => 'Data Final', 'value' => $periodos->dt_fim])
    <a class="btn btn-danger" href="/periodos">Voltar</a>
    @include('components.button', ['type' => 'submit', 'color' => 'primary', 'label' => 'Alterar'])
</form>
@endsection
