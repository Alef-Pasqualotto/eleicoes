@extends('base.index')

@section('container')
<form action='/candidatos/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{$candidatos->id}}" name="id"/>

    @include('components.field', ['type' => 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => $candidatos->nome])
    @include('components.field', ['type' => 'text', 'name' => 'partido', 'label' => 'Partido', 'value' => $candidatos->partido])
    @include('components.field', ['type' => 'text', 'name' => 'numero', 'label' => 'Número do Candidato', 'value' => $candidatos->numero])
    @include('components.field', ['type' => 'text', 'name' => 'cargo', 'label' => 'Cargo', 'value' => $candidatos->cargo])
    @include('components.selectPeriodo', ['name' => 'periodos', 'label' => 'Periodos', 'periodos' => $periodos])
    <a class="btn btn-danger" href="/candidatos">Voltar</a>
    @include('components.button', ['type' => 'submit', 'color' => 'primary', 'label' => 'Alterar'])
</form>
@endsection
