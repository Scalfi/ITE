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
                <input type="hidden" name="second_step" value="1">
                <div id="oneStep">
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
                            <button type="submit" class="btn btn-sm btn-primary float-right mt-2" id="btnStepOne"><i class="fa fa-paper-plane mr-2"></i>Próxima etapa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

