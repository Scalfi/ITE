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
            <form action="/save/formulario" method="post" id="formInicialStep">
                @csrf
                <input  type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <input  type="hidden" name="finalizado" value="1">
                <div class="row">
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="nome"><i class=" mr-2 fas fa-signature"></i><strong> Nome: </strong></label>
                        <input required type="text" name="name" class="form-control form-control-sm">   
                        <small class="text-muted">Digite o nome.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="telefone"><i class=" mr-2 fas fa-phone"></i><strong> Telefone: </strong></label>
                         <input required type="text" minlength=14 name="telefone" id="telefone" class="form-control form-control-sm">   
                        <small class="text-muted">Digite o telefone.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="idade"><i class=" mr-2 fas fa-signature"></i><strong> idade: </strong></label>
                         <input required type="number" name="idade" class="form-control form-control-sm">   
                        <small class="text-muted">Digite a idade.</small>
                    </div>
                    {{--<div class="form-group col-md-4 col-sm-12">
                        <label for="cras"><i class=" mr-2 fas fa-passport"></i><strong> Cras: </strong></label>
                        <select name="cras_id" class="form-control form-select-sm" id="selectCras">
                            <option value="">Selecione...</option>
                            @foreach ($cras as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Selecione o cras.</small>
                    </div>--}}
                   
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="cep"><i class=" mr-2 fas fa-map-marker"></i><strong> CEP: </strong></label>
                         <input required type="text" name="cep" id="cep" class="form-control form-control-sm">   
                        <small class="text-muted">Digite a o CEP.</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="rua"><i class=" mr-2 fas fa-map-marker"></i><strong> Rua: </strong></label>
                         <input  type="text" name="rua" id="rua" class="form-control form-control-sm" readonly>   
                    </div>        
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="divBairros"><i class=" mr-2 fas fa-map-marker"></i><strong> Bairro: </strong></label>
                         <input  type="text" name="bairro" id="bairro" class="form-control form-control-sm" readonly>   
                    </div>        
                    {{--<div class="form-group col-md-4 col-sm-12" id="divBairros"></div>--}}

                    <div class="form-group col-md-4 col-sm-12">
                        <label for="cidade"><i class=" mr-2 fas fa-map-marker"></i><strong> Cidade: </strong></label>
                         <input  type="text" name="cidade" id="cidade" class="form-control form-control-sm" readonly>   
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="uf"><i class=" mr-2 fas fa-map-marker"></i><strong> UF: </strong></label>
                         <input  type="text" name="uf" id="uf" class="form-control form-control-sm" readonly>   
                    </div>        
                   <div class="form-group col-md-4 col-sm-12">
                        <label for="numero_residencia"><i class=" mr-2 fas fa-map-marker"></i><strong> Número da residência: </strong></label>
                         <input required type="text" name="numero_residencia" id="numero_residencia" class="form-control form-control-sm">   
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-users mr-2"></i><strong>Caracterização da Família:</strong></label>
                    </div>       
                   <div class="form-group col-md-4 col-sm-12">
                        <label for="reposanvelFamilia"><i class="fas  mr-2 fa-user-check"></i><strong> Responsável pela família: </strong></label>
                        <input required type="text" name="reponsavel_familia" class="form-control form-control-sm">   
                        <small class="text-muted">Ex: pai,mãe, avó, avô etc.</small>
                    </div> 

                    <div class="form-group col-md-4 col-sm-12">
                        <label for="reposanvelFamilia"><i class=" mr-2 fas fa-hashtag"></i><strong> Idade do responsável pela família: </strong></label>
                        <input required type="number" name="reponsavel_familia_idade" class="form-control form-control-sm">   
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
                        <input required type="number" name="qtd_pessoas" id="qtd_pessoas" class="form-control form-control-sm">   
                        <small class="text-muted">Digite a quantidade de pessoas no domicílio.</small>
                    </div>
                    <div class="form-group col-12">
                        <strong><label>Faixa Etária:</label></strong>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i>0 a 3 anos</label>
                        <input required type="number" name="qtd_idade_1" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 4 a 5 anos:</label>
                        <input required type="number" name="qtd_idade_2" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 6 a 14 anos</label>
                        <input required type="number" name="qtd_idade_3" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>                    
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 15 a 17 anos</label>
                        <input required type="number" name="qtd_idade_4" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 18 a 29 anos</label>
                        <input required type="number" name="qtd_idade_5" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 30 a 59:</label>
                        <input required type="number" name="qtd_idade_6" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="qtd_idade"><i class=" mr-2 fas fa-hashtag"></i> 60 ou mais:</label>
                        <input required type="number" name="qtd_idade_7" class="form-control qtd_idade" value="0">
                        <small class="text-muted">Digite a faixa etária de idade das pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="pessoasDeficiencia"><i class=" mr-2 fas fa-wheelchair"></i><strong> Pessoa com Deficiência: </strong></label>
                        <select name="pessoas_deficiencia" class="form-control form-select-sm" id="pessoas_deficiencia">
                            <option value="">Não</option>
                            <option value="1">Sim</option>   
                        </select>
                        <small class="text-muted">Selecione se existe pessoa com defiência na casa.</small>
                    </div>            
                     <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-graduation-cap mr-2"></i><strong>Escolaridade dos membros da família: </strong></label>
                    </div>
                     <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Infantil</label>
                        <input required type="number" name="escolaridade_infantantil" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Fudamental I :</label>
                        <input required type="number" name="escolaridade_fundamental_um" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Fundamental II</label>
                        <input required type="number" name="escolaridade_fundamental_dois" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Médio Completo</label>
                        <input required type="number" name="escolaridade_medio_completo" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Médio Incompleto</label>
                        <input required type="number" name="escolaridade_medio_incompleto" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Superior Completo:</label>
                        <input required type="number" name="escolaridade_superior_completo" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Ensino Superior Incompleto:</label>
                        <input required type="number" name="escolaridade_superior_incompleto" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>CEJA:</label>
                        <input required type="number" name="escolaridade_ceja" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>EJA:</label>
                        <input required type="number" name="escolaridade_eja" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>
                     <div class="form-group col-md-4 col-sm-12">
                        <label for="escolaridade"><i class=" mr-2 fas fa-hashtag"></i>Não alfabetizado (acima de 8 anos):</label>
                        <input required type="number" name="escolaridade_nao_alfabetizado" class="form-control escolaridade" value="0">
                        <small class="text-muted">Digite o número de pessoas</small>
                    </div>         
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="fora_da_escola"><i class=" mr-2 fas fa-hashtag"></i>Há membros em idade escolar (4 aos 17 anos) fora da escola? Quantos?</label>
                        <input required type="number" name="fora_da_escola" class="form-control" value="0">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-users mr-2"></i><strong>Renda Mensal Familiar: </strong></label>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="fonte_de_renda"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Fonte de renda: </strong></label>
                        <select name="fonte_de_renda" class="form-control form-select-sm" id="fonte_de_renda">
                            <option value="formal">Formal</option>
                            <option value="informal">Informal</option>
                            <option value="desempregrado">Desempregado</option>
                            <option value="aposentado">Aposentado </option>
                            <option value="pensionista">Pensonista </option>
                        </select>
                        <small class="text-muted">Selecione a forma de renda da familia.</small>
                    </div>                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="quantidade_de_renda"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Fonte de renda: </strong></label>
                        <select name="quantidade_de_renda" class="form-control form-select-sm" id="quantidade_de_renda">
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
                     <div class="form-group col-md-4 col-sm-12">
                        <label for="auxilio"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Auxílio: </strong></label>
                        <select name="auxilio" class="form-control form-select-sm" id="auxilio">
                            <option value="nao">Não recebe auxílio</option>
                            <option value="organizacao_ou_intituicao">Organizações/Instituições religiosas</option>
                            <option value="comunidade">Grupos de apoio da comunidade</option>
                            <option value="familiares">Familiares ou conhecidos</option>
                            <option value="outros">Outros</option>
                        </select>
                        <small class="text-muted">De quem recebe auxílio em situação de dificuldade?</small>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="beneficios"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Benefícios: </strong></label>
                        <select name="beneficios" class="form-control form-select-sm" id="beneficios">
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                        <small class="text-muted">A família recebe benefícios de transferência de renda? (BF; BPC; Renda Cidadã; Ação Jovem)</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 divQualBeneficio d-none">
                        <label for="qual_beneficio"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Quais benefícios?: </strong></label>
                        <input type="text" name="qual_beneficio" class="form-control" value="">

                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="cadastro_unico"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Possui Cadastro Único? </strong></label>
                        <select name="cadastro_unico" class="form-control form-select-sm" id="cadastro_unico">
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-home mr-2"></i><strong>Moradia: </strong></label>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="tempo_reside_municipio"><i class=" mr-2 fas fa-city"></i><strong> Quanto tempo reside no município? </strong></label>
                        <input required type="text" name="tempo_reside_municipio" class="form-control form-control-sm">   
                        <small class="text-muted">Exemplo: 1 ano, 2 anos, 3 anos...</small>
                    </div>                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="tempo_reside_bairro"><i class=" mr-2 fas fa-city"></i><strong> Quanto tempo reside no bairro? </strong></label>
                        <input required type="text" name="tempo_reside_bairro" class="form-control form-control-sm">   
                        <small class="text-muted">Exemplo: 1 ano, 2 anos, 3 anos...</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="membro_na_rua"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Existe membro da família em situação de rua? </strong></label>
                        <select name="membro_na_rua" class="form-control form-select-sm" id="membro_na_rua">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>          
                    
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-home mr-2"></i><strong>Condição Habitacional: </strong></label>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="tipo_residencia"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Residência: </strong></label>
                        <select name="tipo_residencia" class="form-control form-select-sm" id="tipo_residencia">
                            <option value="propria">Própria</option>
                            <option value="invadida">Invadida</option>
                            <option value="cedida">Cedida</option>
                            <option value="alugada">Alugada</option>
                            <option value="financiada">Financiada</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="tipo_material_residencia"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Material Predominante: </strong></label>
                        <select name="tipo_material_residencia" class="form-control form-select-sm" id="tipo_material_residencia">
                            <option value="reciclavel">Reciclável</option>
                            <option value="madeira">Madeira</option>
                            <option value="misto">Misto</option>
                            <option value="alvenaria">Alvenaria</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="agua_encanada"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Água encanada: </strong></label>
                        <select name="agua_encanada" class="form-control form-select-sm" id="agua_encanada">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div> 
                    {{--<div class="form-group col-md-4 col-sm-12">
                        <label for="possui_acessibilidade"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Possui Acessibilidade: </strong></label>
                        <select name="possui_acessibilidade" class="form-control form-select-sm" id="possui_acessibilidade">
                            <option value="espacos_internos_para_rua">Espaços internos como na comunicação com a rua</option>
                            <option value="espacos_internos_com_barreiras_para_rua">Espaços internos, mas possui ‘’barreiras’’na comunicação com a rua</option>
                            <option value="nao">Não possui condições de acessibilidade</option>
                        </select>
                    </div>--}}
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="energia"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Energia: </strong></label>
                        <select name="energia" class="form-control form-select-sm" id="energia">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>                  
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="escoamento_sanitario"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Escoamento sanitário: </strong></label>
                        <select name="escoamento_sanitario" class="form-control form-select-sm" id="escoamento_sanitario">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>                    
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="banheiro"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Banheiro: </strong></label>
                        <select name="banheiro" class="form-control form-select-sm" id="banheiro">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>                  
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="coleta_de_lixo"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Coleta do Lixo: </strong></label>
                        <select name="coleta_de_lixo" class="form-control form-select-sm" id="coleta_de_lixo">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>                    
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="pavimentacao"><i class=" mr-2 fas fa-dollar-sign"></i><strong> Pavimentação da Rua: </strong></label>
                        <select name="pavimentacao" class="form-control form-select-sm" id="pavimentacao">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>
                     <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-bus mr-2"></i><strong>Transporte: </strong></label>
                    </div> 
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="acesso_transporte_publico"><i class=" mr-2 fas fa-bus-alt"></i><strong> Acesso ao transporte público ? </strong></label>
                        <select name="acesso_transporte_publico" class="form-control form-select-sm" >
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>                    
                    </div>                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="atende_necessidades"><i class=" mr-2 fas fa-thumbs-up"></i><strong>  O transporte público atende as necessidades? </strong></label>
                        <select name="atende_necessidades" class="form-control form-select-sm" >
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>                    
                    </div>                
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="transporte_proprio"><i class=" mr-2 fas fa-car"></i><strong>  Transporte próprio? </strong></label>
                        <select name="transporte_proprio" class="form-control form-select-sm" >
                            <option value="nao">Não</option>
                            <option value="sim">Sim</option>
                        </select>                    
                    </div>     
                    <div class="form-group col-md-12 col-sm-12 text-center">
                        <label for=""><i class="fas  mr-2 fa-home mr-2"></i><strong>Acessos: </strong></label>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="acessos"><i class=" mr-2 fas fa-passport"></i><strong> Por que nunca acessou a unidade do CRAS? </strong></label>
                        <select name="acesso_cras" class="form-control form-select-sm" id="acessos">
                            <option value="desconhecimento">Desconhecimento</option>
                            <option value="dificuldade_de_acesso">Dificuldade de acesso/trajeto</option>
                            <option value="dificuldade_para_atendimento">Dificuldade para o atendimento</option>
                            <option value="nunca_precisou">Nunca precisou</option>
                            <option value="insatisfacao">Insatisfação</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="interesse_cras"><i class=" mr-2 fas fa-passport"></i><strong> Há interesse: </strong></label>
                        <select name="interesse_cras" class="form-control form-select-sm" id="interesse_cras">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>                      
                    {{--<div class="form-group col-md-4 col-sm-12">
                        <label for="atendimento_creas"><i class=" mr-2 fas fa-passport"></i><strong> A família é atendida pelo CREAS?</strong></label>
                        <select name="atendimento_creas" class="form-control form-select-sm" id="atendimento_creas">
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>--}}              
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="familia_acesso_politicas"><i class=" mr-2 fas fa-passport"></i><strong> A família tem acesso a outras Políticas Públicas?</strong></label>
                        <select name="familia_acesso_politicas" class="form-control form-select-sm" id="familia_acesso_politicas">
                            <option value="cultura">Cultura</option>
                            <option value="lazer">Lazer</option>
                            <option value="esporte">Esporte</option>
                            <option value="saude">Saúde</option>
                            <option value="educacao">Educação</option>
                        </select>
                    </div>   
                     <div class="form-group col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2" id="btnStepInical"><i class="fa fa-paper-plane mr-2"></i>Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/pesquisa.js') }}" defer></script>
    @section('content')

