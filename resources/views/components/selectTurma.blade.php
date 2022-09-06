<select name="turma_id" id="turma_id" class="form-select">
    @foreach($turmas as $turma)
    <option value="{{$turma->id_turmas}}" curso_id="{{$turma->curso_id}}">{{$turma->nome_turmas}}</option>
@endforeach
</select>