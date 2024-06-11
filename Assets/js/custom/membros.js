function excluirMembro(id) {
    var codMembro = $('#rowDeleteMembro_' + (id - 1)).attr("data-id");
    var nomeMembro = $('#rowDeleteMembro_' + (id - 1)).attr("data-nome");
    Swal.fire({
        title: 'Confirma?',
        text: "Deseja realmente excluir o usuário " + nomeMembro + " de id: " + codMembro + " ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Não, cancelar!",
        preConfirm: function () {
            $.ajax({
                type: "POST",
                url: "../controller/ControllerMembro.php",
                data: {
                    acao: "excluir",
                    id: codMembro
                },
                success: function (result) {
                    if (result == 1) {
                        Swal.fire("Excluido com sucesso");
                        var table = $('#sampleTable').DataTable();
                        table.ajax.reload(null, false);
                    } else {
                        Swal.fire("Algo deu errado!");
                    }
                }
            });
        }
    });
    return false;
}


// Função para editar Usuarios
$(document).ready(function () {
    $('#btnEditarMembro').click(function () {

        var dados = $('#edMembro-form').serializeArray();
        $.ajax({
            type: "POST",
            url: "../controller/ControllerMembro.php",
            data: dados,
            success: function (result) {
                if (result == 1) {
                    Swal.fire("editado com sucesso");
                    $('#editarMembro').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);

                } else {
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    Swal.fire("erro ao editar");
                }
            }
        });
        return false;
    });
});


$(document).ready(function () {
    $('#btnCadMembro').click(function () {
        var dados = $('#cadMembro-form').serializeArray();
        $.ajax({
            type: "POST",
            url: "../controller/ControllerMembro.php",
            data: dados,
            success: function (result) {
                if (result == 1) {
                    Swal.fire("cadastrado com sucesso");
                    $('#cadastrarMembro').modal('hide');
                    var table = $('#sampleTable').DataTable();
                    table.ajax.reload(null, false);
                    $("#cadMembro-form").trigger('reset');
                } else {
                    Swal.fire("Algo deu errado!");
                }
            }
        });
        return false;
    });
});



$('#btnModalCadMembro').click(function () {

    $('#cadastrarMembro').modal('show');
});


function editarMembro(id) {
    var idMembro = $('#rowEditarMembro_' + (id - 1)).attr("data-id");
    var nomeMembro = $('#rowEditarMembro_' + (id - 1)).attr("data-nome");
    var cpf = $('#rowEditarMembro_' + (id - 1)).attr("data-cpf");
    var usuario = $('#rowEditarMembro_' + (id - 1)).attr("data-usuario");
    var senha = $('#rowEditarMembro_' + (id - 1)).attr("data-senha");


    $('#editarMembro').modal('show');
    $('.modal .modal-dialog .modal-content .modal-header #nome-membro').text("Editar o membro " + nomeMembro);
    $('.modal .modal-dialog .modal-content .modal-body #nome').val(nomeMembro);
    $('.modal .modal-dialog .modal-content .modal-body #cpf').val(cpf);
    $('.modal .modal-dialog .modal-content .modal-body #usuario').val(usuario);
    $('.modal .modal-dialog .modal-content .modal-body #senha').val(senha);
    $('.modal .modal-dialog .modal-content .modal-body #id').val(idMembro);


    // $('.modal .modal-dialog .modal-content .modal-body #nomeMembro').val(nomeMembro);

}


