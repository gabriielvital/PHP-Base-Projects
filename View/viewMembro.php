
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- bibliotecas necessárias -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.jqueryui.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title></title>
    </head>
    <body>

        <div class="row">
            <div class="col">
                <button id="btnModalCadMembro" class="btn btn-primary" type="submit">Novo membro</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">
                        <table id="sampleTable" class="mdl-data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Usuario</th>
                                    <th>Senha</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



            <!-- -->
            <div id="cadastrarMembro" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="nome-membro"></h4>
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="cadMembro-form" method="POST">
                                <input type="hidden" name="acao" value="adicionar">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Nome</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="nomeE" name="nome" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">CPF</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="cpfE" name="cpf" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Usuario</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="usuarioE" name="usuario" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Senha</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="senhaE" name="senha" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button id="btnCadMembro" class="btn btn-primary" type="submit">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- -->
            <div id="editarMembro" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="nome-membro"></h4>
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="edMembro-form" method="POST">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="acao" value="editar">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Nome</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="nome" name="nome" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">CPF</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Usuario</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="usuario" name="usuario" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="col-lg-12 control-label">Senha</label>
                                            <div class="col-lg-12">
                                                <input class="form-control" type="text" id="senha" name="senha" placeholder="" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button id="btnEditarMembro" class="btn btn-primary" type="submit">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>        <!-- Bootstrap core JavaScript -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <!-- Custom js -->
            <script src="../assets/js/custom/membros.js"></script>
            <!-- Sweet alert js -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            <!-- bibliotecas do dtable -->
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.jqueryui.min.js"></script>


            <script>
                $(document).ready(function () {
                    $('#sampleTable').DataTable({
                        "columnDefs": [
                            {
                                targets: [0, 1, 2, 3, 4]
                            }
                        ],
                        "ajax": {
                            "url": "viewAjaxMembro.php",
                            "type": "POST"
                        },
                        "columns": [
                            {"data": "nomeMembro"},
                            {"data": "cpfMembro"},
                            {"data": "usuarioMembro"},
                            {"data": "senhaMembro"},
                            {"data": "button"}
                        ],
                        "order": [[0, 'asc']],
                        "oPaginate": {
                            "sPrevious": "Prev",
                            "sNext": "Next"
                        },
                        "info": false,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                        responsive: true,
                        "language": {
                            "lengthMenu": "Mostrar _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado",
                            "info": "Mostrando a página _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíveis",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                            "search": "Pesquisar registros"
                        },
                        "oPaginate": {
                            "sPrevious": "Prev",
                            "sNext": "Next"
                        }
                    });
                });
            </script>
    </body>
</html>
