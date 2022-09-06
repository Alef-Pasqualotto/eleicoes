@extends('base.index')

@section('container')
<form action='/eleitores/update' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
    <input type="hidden" value="{{$cursos->id_cursos}}" name="id"/>

    @include('components.field', ['type' => 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => $eleitores->nome])
    @include('components.field', ['type' => 'text', 'name' => 'nome_reduzido', 'label' => 'Nome Reduzido', 'value' => $cursos->nome_reduzido])
    <a class="btn btn-danger" href="/cursos">Voltar</a>
    @include('components.button', ['type' => 'submit', 'color' => 'primary', 'label' => 'Alterar'])
</form>
@endsection
