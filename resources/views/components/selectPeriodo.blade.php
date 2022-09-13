<select name="periodos" id="periodos" class="form-select">
    @foreach($periodos as $periodo)
    <option value="{{$periodo->nome}}" id="{{$periodo->nome}}">{{$periodo->nome}}</option>
@endforeach
</select>