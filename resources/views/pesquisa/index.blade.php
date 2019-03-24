    @extends('layouts.app')


    @section('css')
        <link src="{{ asset('css/pesquisa.css') }}" rel="stylesheet">
    @section('content')
    @section('sidebar')
        @parent
    @endsection

    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <strong>Fomulário </strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="cidade"><i class="fas fa-city"></i><strong> Cidade: </strong></label>
                            <select name="cidade" class="form-control form-select-sm" id="selectCidade">
                                <option value="{{$cidade->id}}">{{$cidade->name}}</option>
                            </select>
                        <small class="text-muted">Selecione a cidade.</small>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="cras"><i class="fas fa-passport"></i><strong> Cras: </strong></label>
                            <select name="cras" class="form-control form-select-sm" id="selectCras">
                                <option value="0">Selecione um CRAS...</option>
                                @foreach ($cras as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        <small class="text-muted">Selecione o cras.</small>
                        </div>
                        <div class="form-group col-md-4 col-sm-12" id="divBairros"></div>
                    </div>
                    <div class="d-none">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <strong>Caracterização da Família </strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="qtdPessoas"><i class="fas fa-users"></i><strong> Quantidades de Pessoas no domicílio: </strong></label>
                                        <select name="qtdPessoas" class="form-control form-select-sm" id="selectQtdPessoas">
                                            <option value="0">Selecione a quantidade de pessoas</option>
                                            <option value="um_ou_dois">De 01 a 02</option>
                                            <option value="tres_ou_quatro">De 03 a 04</option>
                                            <option value="cinco_ou_seis">De 05 a 06</option>
                                            <option value="sete_oito">De 07 a 08</option>
                                            <option value="nove_ou_mais">Acima de 08</option>
                                        </select>
                                        <small class="text-muted">Selecione a quantidade de pessoas no domicílio.</small>
                                    </div>
                                    <div class="form-group col-12">
                                        <strong><label>Faixa Etária:</label></strong>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label for="qtd_idade"><i class="fas fa-hashtag"></i> 0 a 11  anos e 11 meses:</label>
                                        <input type="number" name="qtd_idade_1" class="form-control">
                                        <small class="text-muted">Digite o número de pessoas</small>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label for="qtd_idade"><i class="fas fa-hashtag"></i> 12 a 17 anos e 11 meses:</label>
                                        <input type="number" name="qtd_idade_2" class="form-control">
                                        <small class="text-muted">Digite o número de pessoas</small>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label for="qtd_idade"><i class="fas fa-hashtag"></i> 18 a 59 anos e 11 meses:</label>
                                        <input type="number" name="qtd_idade_3" class="form-control">
                                        <small class="text-muted">Digite o número de pessoas</small>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label for="qtd_idade"><i class="fas fa-hashtag"></i> 60 anos a 69 anos e 11 meses:</label>
                                        <input type="number" name="qtd_idade_4" class="form-control">
                                        <small class="text-muted">Digite o número de pessoas</small>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label for="qtd_idade"><i class="fas fa-hashtag"></i> Acima de 70 anos:</label>
                                        <input type="number" name="qtd_idade_5" class="form-control">
                                        <small class="text-muted">Digite o número de pessoas</small>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="pessoasDeficiencia"><i class="fas fa-wheelchair"></i><strong> Pessoa com Deficiência: </strong></label>
                                        <select name="pessoasDeficiencia" class="form-control form-select-sm" id="pessoasDeficiencia">
                                            <option value="false">Não</option>
                                            <option value="true">Sim</option>
                                        </select>
                                        <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

