    @extends('layouts.app')


    @section('css')
        <link href="{{ asset('css/pesquisa.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panelLoader.css') }}" rel="stylesheet">
    @section('content')

    @section('sidebar')
        @parent
    @endsection

    @section('content')
        <div class="container" id="cotentStepSecond">
            <form action="/save/stepsecond" method="post" id="formSecondStep">
                <input type="hidden" name="finalizado" value="1">
                @csrf
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Fomulário etapa final. </strong>
                    </div>
                    <div class="card-body">
                        <div id="secondStep">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <strong>Caracterização da Família segunda etapa.</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="pessoasDeficiencia"><i class="fas fa-wheelchair"></i><strong> Pessoa com Deficiência: </strong></label>
                                            <select name="pessoas_deficiencia" class="form-control form-select-sm" id="pessoas_deficiencia">
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                            <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12 deficiencia d-none">
                                            <label for="tipoDeficiencia"><i class="fas fa-wheelchair"></i><strong> Qual o tipo deficiência ?: </strong></label>
                                            <select name="tipo_deficiencia" class="form-control form-select-sm" id="selectTipoDeficiencia">
                                                <option value="0">Selecione ...</option>
                                                <option value="mental">Mental</option>
                                                <option value="fisica">Física</option>
                                                <option value="visual">Visual</option>
                                                <option value="auditiva">Auditiva</option>
                                                <option value="mutipla">Múltipla</option>
                                            </select>
                                            <small class="text-muted">Selecione o tipo de deficiencia.</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12  deficiencia d-none">
                                            <label for="mebro_familia"><i class="fas fa-wheelchair"></i>Qual membro da família ?:</label>
                                            <input type="text" name="mebro_familia" id="membro_familia" class="form-control" value="">
                                            <small class="text-muted">Ex: Pai, Mãe, Filho</small>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="reposanvelFamilia"><i class="fas fa-user-check"></i><strong> Responsável pela família: </strong></label>
                                            <select name="reponsavel_familia" class="form-control form-select-sm" id="selectReponsavelFamilia">
                                                <option value="0">Selecione ...</option>
                                                <option value="mãe">Mãe</option>
                                                <option value="pai">Pai</option>
                                                <option value="avô">Avô</option>
                                                <option value="avó">Avó</option>
                                                <option value="outros">Outros</option>
                                            </select>
                                            <small class="text-muted">Selecione o responsavel pela família.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success float-right mt-2" id="btnStepSecond"><i class="fa fa-paper-plane mr-2"></i>Finalizar</button>
                    </div>
                </div>
                          <div class="form-group col-md-4 col-sm-12">
                        <label for="cidade"><i class=" mr-2 fas fa-city"></i><strong> Cidade: </strong></label>
                        <select name="cidade_id" class="form-control form-select-sm" id="selectCidade">
                            <option value="{{$cidade->id}}">{{$cidade->name}}</option>
                        </select>
                    <small class="text-muted">Selecione a cidade.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="cras"><i class=" mr-2 fas fa-passport"></i><strong> Cras: </strong></label>
                        <select name="cras_id" class="form-control form-select-sm" id="selectCras">
                            <option value="">Selecione...</option>
                            @foreach ($cras as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    <small class="text-muted">Selecione o cras.</small>
                    </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

