<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerMembro
 *
 * @author Thiago
 */
//ação recebida da view
$acao = $_POST["acao"];

switch ($acao) {
    case 'adicionar':
        adicionarMembro();
        break;
    case 'editar':
        editarMembro();
        break;
    case 'excluir':
        excluirMembro();
        break;
}

function adicionarMembro() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelMembro.php');
    require_once ('../Dao/DaoMembro.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoMembro();
    $membro = new ModelMembro();

    //campos a serem recebidos da view
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    //adiciono os elementos em um objeto Membro
    $membro->setNome($nome);
    $membro->setCpf($cpf);
    $membro->setUsuario($usuario);
    $membro->setSenha($senha);

    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->adicionarMembro($membro);
}

function editarMembro() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelMembro.php');
    require_once ('../Dao/DaoMembro.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoMembro();
    $membro = new ModelMembro();

    //campos a serem recebidos da view
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    //adiciono os elementos em um objeto Membro
    $membro->setId($id);
    $membro->setNome($nome);
    $membro->setCpf($cpf);
    $membro->setUsuario($usuario);
    $membro->setSenha($senha);

    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->editarMembro($membro);
}

function excluirMembro() {
    //inclui o modelo, a dao e a database
    require_once ('../Model/ModelMembro.php');
    require_once ('../Dao/DaoMembro.php');
    require_once('../Database/Database.php');

    //instancia das classes
    $db = new Database();
    $dao = new DaoMembro();
    $membro = new ModelMembro();

    //id do usuário a ser deletado
    $id = $_POST['id'];

    $membro = new ModelMembro();
    $membro->setId($id);
    
    //chamo a função da DAO, que efetivamente manipula o BD
    $dao->excluirMembro($membro);
}
