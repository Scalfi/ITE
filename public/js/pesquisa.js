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
                window.location.href = '/pesquisa/firststep'
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

});

function liberarButton(data) {
    if (data == 0) {
        $(".btn").prop('disabled', true)

    } else {
        $(".btn").prop('disabled', false)

    }
}