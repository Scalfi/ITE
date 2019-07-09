$( document ).ready(function() {
    $("#selectCras").change(function () { 
        $.ajax({
            url: "/bairro",
            type: 'POST',
            dataType: "html",
            data: {
                id : $("#selectCras option:selected").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#divBairros").html(response)
                liberarButton(0)
            },
            error: function (){
                swal('Caro usúario', 'Ocorreu um erro por favor atualize a pagina','error')
            }
        });
        
    });

    $("#pessoas_deficiencia").change(function () { 
        if ( $("#pessoas_deficiencia option:selected").val() == '1' ) {

            $(".deficiencia").removeClass("d-none");
            $("#selectReponsavelFamilia").trigger('change')

        } else {
            $(".deficiencia").addClass("d-none");
            $("#membro_familia").val("")
            $("#selectTipoDeficiencia").val(0).change()
        }
        
    });

    $("#membro_familia").keyup(function(event) {
        $("#selectReponsavelFamilia").trigger('change')
    });    

    $("#selectTipoDeficiencia").change(function(event) {
        $("#selectReponsavelFamilia").trigger('change')
    });

    var stepInicial = {
        beforeSubmit: function(){
            $("#cotentStepInicial").addClass('whirl');
        },
        success: function(data){
            $("#cotentStepIncial").removeClass ('whirl');
            if (data.status == 'sucesso') {
                swal('Sucesso!','Formúlario concluido com sucesso.','success').then(function (){
                    window.location.href = '/pesquisa/formulario'
                }); 
            } else {
                swal('Ooops!', data.mensagem, 'error').then(function (){
                    if (data.dados.reload == 'true') location.reload();
                });
            }
        }
    };
 
    // bind form using 'ajaxForm' 
    $('#formInicialStep').ajaxForm(stepInicial); 


    var stepOne = {
        beforeSubmit: function(){
            $("#cotentStepOne").addClass('whirl');
        },
        success: function(data){
            $("#cotentStepOne").removeClass ('whirl');
            if (data.status == 'sucesso') {
                window.location.href = '/pesquisa/secondstep'
            } else {
                swal('Ooops!', data.mensagem, 'error').then(function (){
                    if (data.dados.reload == 'true') location.reload();
                });
            }
        }
    };
 
    // bind form using 'ajaxForm' 
    $('#formOneStep').ajaxForm(stepOne); 

    var stepSecond = {
        beforeSubmit: function(){
            $("#cotentStepSecond").addClass('whirl');
        },
        success: function(data){
            $("#cotentStepSecond").removeClass('whirl');
            if (data.status == 'sucesso') {
                swal('Sucesso!','Formúlario concluido com sucesso.','success').then(function (){
                    window.location.href = '/pesquisa/etapainicial'
                }); 
            } else {
                swal('Ooops!', data.mensagem, 'error').then(function (){
                    if (data.dados.reload == 'true') location.reload();
                });
            }
        }
    };
 
    // bind form using 'ajaxForm' 
    $('#formSecondStep').ajaxForm(stepSecond); 

    $(".qtd_idade").blur(function(event) {
        let pessoas_domicilio = $("#qtd_pessoas").val();
        let elem = $(".qtd_idade")
        var soma = 0
        $.each(elem, function(index, value) {
            if (!isNaN(parseInt(value.value))) {
                soma = soma + parseInt(value.value);
            }
        });

        if ( soma > pessoas_domicilio ) {
            swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio!', 'error')
            $(".qtd_idade").val(0)
        }
        

    });

    $(".escolaridade").blur(function(event) {
        let pessoas_domicilio = $("#qtd_pessoas").val();
        let elem = $(".escolaridade")
        var soma = 0
        $.each(elem, function(index, value) {
            if (!isNaN(parseInt(value.value))) {
                soma = soma + parseInt(value.value);
            }
        });

        if ( soma > pessoas_domicilio ) {
            swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio!', 'error')
            $(".escolaridade").val(0)
        }
        

    });

    /*$("#selectReponsavelFamilia").change(function(event) {
        
        if ( $("#pessoas_deficiencia option:selected").val() == 1 ) {
            
            if ( $.trim($("#membro_familia").val()) == "" || $("#selectTipoDeficiencia option:selected").val() == 0 || $("#selectReponsavelFamilia option:selected").val() == 0 ) {
                $("#btnStepSecond").prop('disabled', true)
            } else {
                $("#btnStepSecond").prop('disabled', false)
            }
        } else if($("#selectReponsavelFamilia option:selected").val() != 0) {
            $("#btnStepSecond").prop('disabled', false)
        }
    });


    $("#btnStepInical").prop('disabled', true)

    $("#selectQtdPessoas").change(function(event) {
        $(".qtd_idade").trigger('blur')
    });*/



    function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    function maskFoneCliente(fone) {

        let masks = ['(99) 99999-9999', '(99) 9999-9999'];

        let numero = fone.replace(/\D/g, "");
        let contato = numero[0] == '0' ? numero.substr(numero.trim(), 1) : numero.trim();
        let mask = (contato[2] == '9') ? masks[0] : masks[1];
        return mask
    }

    let fone  = {
        onKeyPress: function(fone, e, field, options) {
           field.mask(maskFoneCliente(fone), options);
        }
    };


    $('#telefone').mask(maskFoneCliente($("#telefone").val()), fone);
    $("#cep").mask("99999-999");

});

function liberarButton(data) {
    if (data == 0) {
        $(".btn").prop('disabled', true)

    } else {
        $(".btn").prop('disabled', false)

    }
}