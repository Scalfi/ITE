
<label for="bairros"><i class="fas fa-map-marked-alt"></i><strong> Bairros: </strong></label>
<select name="bairro" class="form-control form-select-sm" id="selectBairros">
<option value="0">Selecione um Bairro...</option>
@foreach ($bairros as $bairro)
    <option value="{{$bairro->id}}">{{$bairro->name}}</option>
@endforeach
</select>
<small class="text-muted">Selecione o bairro.</small>
