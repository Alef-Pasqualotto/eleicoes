@extends('base.index')

@section('container')
<form action='/candidatos/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' required/>

    @include('components.field', ['type'=> 'text', 'name' => 'nome', 'label' => 'Nome do candidato', 'value' => ""])
    @include('components.field', ['type'=> 'text', 'name' => 'partido', 'label' => 'Partido', 'value' => ""])
    <div class="mb-2">
        <label for="cargo">Cargo</label>
        <div class="form-check">
            <input class="form-check-input" type="radio"  value="deputado estadual" name="cargo" id="deputado estadual">
            <label class="form-check-label" for="deputado estadual">
              Deputado estadual
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="deputado federal" name="cargo" id="deputado federal">
            <label class="form-check-label" for="deputado federal">
              Deputado federal
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="senador" name="cargo" id="senador">
            <label class="form-check-label" for="senador">
              Senador
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="presidente" name="cargo" id="presidente">
            <label class="form-check-label" for="presidente">
              Presidente
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="governador" name="cargo" id="governador">
            <label class="form-check-label" for="governador">
              Governador
            </label>
        </div>
    </div>
    @include('components.field', ['type'=> 'text', 'name' => 'numero', 'label' => 'Número do Candidato', 'value' => ""])
    @include('components.selectPeriodo', ['name' => 'periodo', 'label' => 'Periodos', 'periodo' => $periodos])
    <a class="btn btn-danger" href="/candidatos">Voltar</a>
    @include('components.button', ['color'=> 'primary', 'label' => 'Inserir', 'type' => 'submit'])
  </form>
@endsection
