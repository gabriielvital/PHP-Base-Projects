<?php

require_once ('../Dao/DaoMembro.php');
$membrosDao = new DaoMembro();

function mask($val, $mask) {

    $maskared = '';
    $k = 0;

    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }

    return $maskared;
}

$encoding = 'UTF-8';

// Select na tabela membros...
$stmtMembros = $membrosDao->runQuery("SELECT * FROM Membro");
$stmtMembros->execute();

$data = array();

$i = 0;
// Mostrar tabela...
while ($rowMembros = $stmtMembros->fetch(PDO::FETCH_ASSOC)) {

    $data[$i]{'idMembro'} = $rowMembros['idMembro'];
    $data[$i]{'nomeMembro'} = $rowMembros['nomeMembro'];
    $data[$i]{'usuarioMembro'} = $rowMembros['usuarioMembro'];
    $data[$i]{'cpfMembro'} = $rowMembros['cpfMembro'];
    $data[$i]{'senhaMembro'} = $rowMembros['senhaMembro'];
    $data[$i]{'button'} = '
              <a id="rowEditarMembro_' . $i . '" data-id="' . $rowMembros['idMembro'] . '" data-nome="' . $rowMembros['nomeMembro'] . '"data-cpf="' . $rowMembros['cpfMembro'] . '"data-usuario="' . $rowMembros['usuarioMembro'] . '"data-senha="' . $rowMembros['senhaMembro'] . '" onclick="editarMembro(' . ($i + 1) . ')" data-tooltip="tooltip" title="Editar Membro"><span class="mdi mdi-account-key"></span> Editar</a></li>
              <a id="rowDeleteMembro_' . $i . '" data-id="' . $rowMembros['idMembro'] . '" data-nome="' . $rowMembros['nomeMembro'] . '" onclick="excluirMembro(' . ($i + 1) . ')" data-tooltip="tooltip" title="Excluir"><span class="mdi mdi-delete-forever"></span> Excluir</a></li>
           ';

    $i++;
}



$datax = array('data' => $data);

function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
}

echo raw_json_encode($datax);
?>