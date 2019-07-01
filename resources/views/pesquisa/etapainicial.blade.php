    @extends('layouts.app')


    @section('css')
        <link href="{{ asset('css/pesquisa.css') }}" rel="stylesheet">
        <link href="{{ asset('css/panelLoader.css') }}" rel="stylesheet">
    @section('content')

    @section('sidebar')
        @parent
    @endsection

    @section('content')
        <div class="container" id="cotentStepInicial">
            <form action="/save/stepinical" method="post" id="formInicialStep">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <input type="hidden" name="first_step" value="1">
                <div class="row">
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="nome"><i class=" mr-2 fas fa-signature"></i><strong> Nome: </strong></label>
                        <input type="text" name="name" class="form-control form-control-sm">   
                        <small class="text-muted">Digite o nome.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="idade"><i class=" mr-2 fas fa-signature"></i><strong> idade: </strong></label>
                         <input type="numver" name="idade" class="form-control form-control-sm">   
                        <small class="text-muted">Digite a idade.</small>
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
                    <div class="form-group col-md-4 col-sm-12" id="divBairros"></div>
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-users mr-2"></i><strong>Caracterização da Família:: </strong></label>
                    </div>       
                   <div class="form-group col-md-4 col-sm-12">
                        <label for="reposanvelFamilia"><i class="fas  mr-2 fa-user-check"></i><strong> Responsável pela família: </strong></label>
                        <input type="text" name="reponsavel_familia" class="form-control form-control-sm">   
                        <small class="text-muted">Ex: pai,mãe, avó, avô etc.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="genero"><i class="fas  mr-2 fa-venus-mars"></i><strong> Gênero </strong></label>
                        <select name="genero" class="form-control form-select-sm" id="genero">
                            <option value="homem">Homem</option>
                            <option value="mulher">Mulher</option>
                            <option value="outros">Outros</option>
                        </select>
                        <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                    </div>                                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtdPessoas"><i class=" mr-2 fas fa-users"></i><strong> Quantidades de Pessoas no domicílio: </strong></label>
                        <input type="number" name="qtd_pessoas" id="qtd_pessoas" class="form-control form-control-sm">   
                        <small class="text-muted">Digite a quantidade de pessoas no domicílio.</small>
                    </div>
                    <div class="form-group col-12">
                        <strong><label>Faixa Etária:</label></strong>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i>0 a 3 anos</label>
                        <input type="number" name="qtd_idade_1" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 3 a 6 anos:</label>
                        <input type="number" name="qtd_idade_2" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 6 a 15 anos</label>
                        <input type="number" name="qtd_idade_3" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 18 a 29 anos</label>
                        <input type="number" name="qtd_idade_4" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> Adulto:</label>
                        <input type="number" name="qtd_idade_5" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> Idoso:</label>
                        <input type="number" name="qtd_idade_6" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="pessoasDeficiencia"><i class=" mr-2 fas fa-wheelchair"></i><strong> Pessoa com Deficiência: </strong></label>
                        <select name="pessoas_deficiencia" class="form-control form-select-sm" id="pessoas_deficiencia">
                            <option value="">Não</option>
                            <option value="True">Sim</option>
                        </select>
                        <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                    </div>            
                     <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-graduation-cap mr-2"></i><strong>Escolaridade dos menbros da família: </strong></label>
                    </div>
                     <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Infantil</label>
                        <input type="number" name="escolaridade_infantantil" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Fudamental I :</label>
                        <input type="number" name="escolaridade_fundamental_um" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Fundamental II</label>
                        <input type="number" name="escolaridade_fundamental_dois" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Médio Completo</label>
                        <input type="number" name="escolaridade_medio_completo" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Médio Incompleto</label>
                        <input type="number" name="escolaridade_medio_incompleto" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Superior Completo:</label>
                        <input type="number" name="escolaridade_superior_completo" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Superior Incompleto:</label>
                        <input type="number" name="escolaridade_superior_incompleto" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>CEJA:</label>
                        <input type="number" name="escolaridade_ceja" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>EJA:</label>
                        <input type="number" name="escolaridade_eja" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                     <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Não alfabetizado
(acima de 8 anos):</label>
                        <input type="number" name="escolaridade_nao_alfabetizado" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-users mr-2"></i><strong>Renda Mensal Familiar: </strong></label>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="fonte_de_renda"><i class=" mr-2 fas fa-wheelchair"></i><strong> Fonte de renda: </strong></label>
                        <select name="fonte_de_renda" class="form-control form-select-sm" id="fonte_de_renda">
                            <option value="formal">Formal</option>
                            <option value="informal">Informal</option>
                            <option value="desempregrado">Desempregado</option>
                        </select>
                        <small class="text-muted">Selecione a forma de renda da familia.</small>
                    </div>                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="fonte_de_renda"><i class=" mr-2 fas fa-wheelchair"></i><strong> Fonte de renda: </strong></label>
                        <select name="fonte_de_renda" class="form-control form-select-sm" id="fonte_de_renda">
                            <option value="formal">Aposentado/Pensonista :</option>
                            <option value="extrema_probreza">Extrema Pobreza (até R$ 89,00)</option>
                            <option value="pobreza">Pobreza (de R$ 89,01 até R$ 178,00)</option>
                            <option value="um_quarto">Até ¼ do SM (R$249,50) </option>
                            <option value="meio_a_um">De ½ a 01 SM (R$ 499,00 a 998,00)</option>
                            <option value="um_a_dois">De 01 a 02 SM (R$ 998,00 a 1.996,00)</option>
                            <option value="dois_a_tres">De 02 a 03 SM (R$ 1.996,00 a 2.994,00)</option>
                            <option value="acima_de_tres">Acima de 03 SM </option>
                            <option value="doacao">Sem renda/Vive de doações</option>
                        </select>
                        <small class="text-muted">Selecione a forma de renda da familia.</small>
                    </div>                  
                     <div class="form-group col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2" id="btnStepInical"><i class="fa fa-paper-plane mr-2"></i>Próxima etapa</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

