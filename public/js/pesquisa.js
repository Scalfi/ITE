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
});
