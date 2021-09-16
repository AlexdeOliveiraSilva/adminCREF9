function savePartner() {
    var error = false;
    $("#name").removeClass("error");
    $("#description").removeClass("error");
    $("#image").removeClass("error");
    if ($("#name").val() == "") {
        error = true;
        $("#name").addClass("error");
    }
    if ($("#description").val() == "") {
        error = true;
        $("#description").addClass("error");
    }






    return !error;
}


$(".mask-money").maskMoney({
    prefix: "",
    decimal: ".",
    thousands: ""
});


$('.phone').mask('(00) 0000-00000');

$('.cep').mask('00.000-000');
$('.cpf').mask('000.000.000-00');
$('.cnpj').mask('00.000.000/0000-00');


$(".cep").on("blur", function (e) {
    var e = $(this).val();
    e = e.replace(/\D/g, "");
    $.get("https://viacep.com.br/ws/" + e + "/json/", function (data) {
        $("#address").val(data.logradouro);

        $("#neighborhood").val(data.bairro);
        $("#city").val(data.localidade);
        $("#uf").val(data.uf);




        $("#numero").focus();
    });

})


function validar() {
    var d = $("#cpf").val();
    var dialog = bootbox.dialog({
        message: '<p><i class="fa fa-spin fa-spinner"></i> Carregando...</p>'
    });

    $.post(base_url + "index.php/Customers/searchCPF", { cpf: d }, function (data) {
        dialog.modal('hide');
        bootbox.hideAll();
        if (data.status === "OK") {
            bootbox.confirm({
                message: "O cliente " + data.nome + " esta validado. Deseja confirma a entrega do beneficio?",
                buttons: {
                    confirm: {
                        label: 'Sim',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Não',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.post(base_url + "index.php/Customers/saveRegistre", { customers: data.id }, function (data1) {
                            bootbox.hideAll();
                            $("#cpf").val("");
                            bootbox.hideAll();
                            $("#cpf").focus();
                            
                        });
                    }
                    else{
                        bootbox.hideAll();
                    }
                }
            });


        } else {
            bootbox.hideAll();
            bootbox.dialog({
                message: "<font color=red>CPF não encontrado</font>",
                buttons: {
                    cancel: {
                        label: 'OK',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    bootbox.hideAll();
                }
            });
        }

    });

}