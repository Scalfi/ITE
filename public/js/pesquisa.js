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
            },
            error: function (){
                swal('Caro usúario', 'Ocorreu um erro por favor atualize a pagina','error')
            }
        });
        
    });

    $("#pessoas_deficiencia").change(function () { 
        if ( $("#pessoas_deficiencia option:selected").val() == '1' ) {
            $(".deficiencia").removeClass("d-none");
        } else {
            $(".deficiencia").addClass("d-none");
        }
        
    });


    var stepOne = {
        beforeSubmit: function(){
            $("#cotentStepOne").addClass('whirl');
        },
        success: function(data){
            $("#cotentStepOne").removeClass ('whirl');
            if (data.status == 'sucesso') {
                window.location.href = '/pesquisa/secondstep/'
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
            $("#cotentStepOne").addClass('whirl');
        },
        success: function(data){
            $("#cotentStepOne").removeClass('whirl');
            if (data.status == 'sucesso') {
                swal('Sucesso!','Formúlario concluido com sucesso.','success').then(function (){
                    window.location.href = '/pesquisa/firststep/'
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


    $("#btnStepOne").prop('disabled', true)
    $("#btnStepSecond").prop('disabled', true)

    $(".qtd_idade").blur(function(event) {

        let elem = $(".qtd_idade")
        var soma = 0
        $.each(elem, function(index, value) {
            if (!isNaN(parseInt(value.value))) {
                soma = soma + parseInt(value.value);
            }
        });

        if ($("#selectQtdPessoas option:selected").val() == 'um_ou_dois') {
            $("#btnStepOne").prop('disabled', false)

            if ( soma > 1 && soma > 2 ) {
                swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio!', 'error')
                $(".qtd_idade").val(0)
                $("#btnStepOne").prop('disabled', true)
            }


        } else if ($("#selectQtdPessoas option:selected").val() == 'tres_ou_quatro') {
            if (soma > 3 && soma > 4 ) {
                swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio', 'error')
                $(".qtd_idade").val(0)
                $("#btnStepOne").prop('disabled', true)
            }

            if( soma < 3 || soma < 4) {
                $("#btnStepOne").prop('disabled', true)
            }            

            if( soma == 3 || soma == 4) {
                $("#btnStepOne").prop('disabled', false)
            }
            
        } else if ($("#selectQtdPessoas option:selected").val() == 'cinco_ou_seis') {

            if (soma > 5 && soma > 6 ) {
                swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio!', 'error')
                $(".qtd_idade").val(0)
                $("#btnStepOne").prop('disabled', true)
            }

            if( soma < 5 || soma < 6) {
                $("#btnStepOne").prop('disabled', true)
            }

            if( soma == 5 || soma == 6) {
                $("#btnStepOne").prop('disabled', false)
            }

        } else if ($("#selectQtdPessoas option:selected").val() == 'sete_ou_oito') {

            if (soma > 7 && soma > 8 ) {
                swal('Caro usúario', 'Quantidade de pessoas não pode exceder o número de pessoas que residem no domicílio!', 'error')
                $("#btnStepOne").prop('disabled', true)
                $(".qtd_idade").val(0)
            }


            if( soma < 7 || soma < 8) {
                $("#btnStepOne").prop('disabled', false)
            } 

            if( soma == 7 || soma == 8) {
                $("#btnStepOne").prop('disabled', false)
            }
        }

    });

    $("#selectReponsavelFamilia").change(function(event) {
        $("#btnStepSecond").prop('disabled', false)
    });
});

/**
 * Da um display block no primeiro step
 */
function oneStep() 
{
    $("#oneStep").removeClass("d-none");
}
