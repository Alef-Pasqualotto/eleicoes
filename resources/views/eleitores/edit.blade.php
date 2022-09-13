@extends('base.index')

@section('container')
<form action='/eleitores/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{$eleitores->id}}" name="id"/>

    @include('components.field', ['type' => 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => $eleitores->nome])
    @include('components.field', ['type' => 'text', 'name' => 'titulo', 'label' => 'Título de Eleitor', 'value' => $eleitores->titulo])
    @include('components.field', ['type' => 'text', 'name' => 'zona', 'label' => 'Zona de Eleição', 'value' => $eleitores->zona])
    @include('components.field', ['type' => 'text', 'name' => 'secao', 'label' => 'Seção', 'value' => $eleitores->secao])
    <a class="btn btn-danger" href="/eleitores">Voltar</a>
    @include('components.button', ['type' => 'submit', 'color' => 'primary', 'label' => 'Alterar'])
</form>
@endsection
