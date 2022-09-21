@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/votos">Resultado por Zona/Seção</a>
<h2>Resultado Presidente</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Candidato</th>
            <th>Quantidade de votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($presidentes as $presidente)
            <tr>    
                <td>{{$presidente->nome}}</td>
                <td>{{$presidente->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Resultado Deputado Federal</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Candidato</th>
            <th>Quantidade de votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deputadosfederal as $deputadofederal)
            <tr>    
                <td>{{$deputadofederal->nome}}</td>
                <td>{{$deputadofederal->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Resultado Deputado Estadual</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Candidato</th>
            <th>Quantidade de votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deputadosestadual as $deputadoestadual)
            <tr>    
                <td>{{$deputadoestadual->nome}}</td>
                <td>{{$deputadoestadual->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Resultado Governador</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Candidato</th>
            <th>Quantidade de votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($governadores as $governador)
            <tr>    
                <td>{{$governador->nome}}</td>
                <td>{{$governador->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Resultado Senador</h2>
<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Candidato</th>
            <th>Quantidade de Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($senadores as $senador)
            <tr>    
                <td>{{$senador->nome}}</td>
                <td>{{$senador->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>
@endsection


