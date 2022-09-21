@extends('base.index')

@section('container')
<form action='/eleitores/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' required/>

    @include('components.field', ['type'=> 'text', 'name' => 'nome', 'label' => 'Nome', 'value' => ""])
    <div class="mb-2">
    <label for="titulo" class="form-label">Título de Eleitor</label>
    <input type="number" value="" max="999999999999" min="111111111111" name="titulo" class="form-control" id="titulo" required="">
</div>
    @include('components.field', ['type'=> 'text', 'name' => 'zona', 'label' => 'Zona de Eleição', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'secao', 'label' => 'Seção', 'value' => ""])
    <a class="btn btn-danger" href="/eleitores">Voltar</a>
    @include('components.button', ['color'=> 'primary', 'label' => 'Inserir', 'type' => 'submit'])
  </form>
@endsection
