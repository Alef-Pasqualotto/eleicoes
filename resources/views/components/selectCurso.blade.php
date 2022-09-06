<div class="mb-2">
<select name="curso_id" id="curso_id " class="form-select">
    @foreach($cursos as $curso)
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <option name="{{ $name }}" value="{{$curso->id_cursos}}"  >{{$curso->nome_cursos}}</option>
</div>

@endforeach
</select>