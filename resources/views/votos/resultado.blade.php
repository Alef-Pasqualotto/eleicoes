@extends('base.index')

@section('container')
<a class="btn btn-success mb-2" href="/votos/index">Resultado por Zona/Seção</a>
<h1>Resultado Presidente</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>    
                <td>{{$voto->candidato}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Resultado Deputado Federal</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>    
                <td>{{$voto->candidato}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Resultado Deputado Estadual</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>    
                <td>{{$voto->candidato}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Resultado Governador</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>    
                <td>{{$voto->candidato}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Resultado Senador</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
            <tr>    
                <td>{{$voto->candidato}}</td>
                <td>{{$voto->votos}}</td>    
            </tr>
        @endforeach
    </tbody>
</table>
@endsection


