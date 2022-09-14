<div class="mb-2">
<label for="periodo" class="form-label">{{ $label }}</label>
<select name="periodo" id="periodo" class="form-select">
    @foreach($periodos as $periodo)    
    <option value="{{$periodo->id}}" name="{{$periodo->id}}">{{$periodo->nome}}</option>
@endforeach
</select>
</div>