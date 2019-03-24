    @extends('layouts.app')


    @section('css')
        <link href="{{ asset('css/pesquisa.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panelLoader.css') }}" rel="stylesheet">
    @section('content')

    @section('sidebar')
        @parent
    @endsection

    @section('content')
        <div class="container" id="cotentStepOne">
            <form action="/save/stepone" method="post" id="formOneStep">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <input type="hidden" name="second_step" value="1">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Fomulário primeira estapa.</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="cidade"><i class="fas fa-city"></i><strong> Cidade: </strong></label>
                                <select name="cidade_id" class="form-control form-select-sm" id="selectCidade">
                                    <option value="{{$cidade->id}}">{{$cidade->name}}</option>
                                </select>
                            <small class="text-muted">Selecione a cidade.</small>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="cras"><i class="fas fa-passport"></i><strong> Cras: </strong></label>
                                <select name="cras_id" class="form-control form-select-sm" id="selectCras">
                                    <option value="">Selecione...</option>
                                    @foreach ($cras as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            <small class="text-muted">Selecione o cras.</small>
                            </div>
                            <div class="form-group col-md-4 col-sm-12" id="divBairros"></div>
                        </div>
                        <div class="d-none" id="oneStep">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    <strong>Caracterização da Família </strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="qtdPessoas"><i class="fas fa-users"></i><strong> Quantidades de Pessoas no domicílio: </strong></label>
                                            <select name="qtd_pessoas" class="form-control form-select-sm" id="selectQtdPessoas">
                                                <option value="0">Selecione ...</option>
                                                <option value="um_ou_dois">De 01 a 02</option>
                                                <option value="tres_ou_quatro">De 03 a 04</option>
                                                <option value="cinco_ou_seis">De 05 a 06</option>
                                                <option value="sete_ou_oito">De 07 a 08</option>
                                                <option value="nove_ou_mais">Acima de 08</option>
                                            </select>
                                            <small class="text-muted">Selecione a quantidade de pessoas no domicílio.</small>
                                        </div>
                                        <div class="form-group col-12">
                                            <strong><label>Faixa Etária:</label></strong>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="qtd_idade"><i class="fas fa-hashtag"></i> 0 a 11  anos e 11 meses:</label>
                                            <input type="number" name="qtd_idade_1" class="form-control qtd_idade" value="0">
                                            <small class="text-muted">Digite o número de pessoas</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="qtd_idade"><i class="fas fa-hashtag"></i> 12 a 17 anos e 11 meses:</label>
                                            <input type="number" name="qtd_idade_2" class="form-control qtd_idade" value="0">
                                            <small class="text-muted">Digite o número de pessoas</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="qtd_idade"><i class="fas fa-hashtag"></i> 18 a 59 anos e 11 meses:</label>
                                            <input type="number" name="qtd_idade_3" class="form-control qtd_idade" value="0">
                                            <small class="text-muted">Digite o número de pessoas</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="qtd_idade"><i class="fas fa-hashtag"></i> 60 anos a 69 anos e 11 meses:</label>
                                            <input type="number" name="qtd_idade_4" class="form-control qtd_idade" value="0">
                                            <small class="text-muted">Digite o número de pessoas</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label for="qtd_idade"><i class="fas fa-hashtag"></i> Acima de 70 anos:</label>
                                            <input type="number" name="qtd_idade_5" class="form-control qtd_idade" value="0">
                                            <small class="text-muted">Digite o número de pessoas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2" id="btnStepOne"><i class="fa fa-paper-plane mr-2"></i>Enviar</button>
                    </div>
                </div>
            </form>

            <form action="/save/stepsecond" method="post" class="d-none" id="formSecondStep">
                @csrf
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <strong>Fomulário segunda estapa. </strong>
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
                                            <select name="pessoasDeficiencia" class="form-control form-select-sm" id="pessoas_deficiencia">
                                                <option value="false">Não</option>
                                                <option value="true">Sim</option>
                                            </select>
                                            <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12 deficiencia d-none">
                                            <label for="tipoDeficiencia"><i class="fas fa-wheelchair"></i><strong> Qual o tipo deficiência ?: </strong></label>
                                            <select name="tipo_deficiencia" class="form-control form-select-sm" id="tipoDeficiencia">
                                                <option value="">Selecione ...</option>
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
                                            <input type="text" name="mebro_familia" class="form-control">
                                            <small class="text-muted">Ex: Pai, Mãe, Filho</small>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="qtdPessoas"><i class="fas fa-user-check"></i><strong> Responsável pela família: </strong></label>
                                            <select name="reposanvel_familia" class="form-control form-select-sm" id="selectReponsavelFamilia">
                                                <option value="">Selecione ...</option>
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
                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2"><i class="fa fa-paper-plane mr-2"></i>Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

