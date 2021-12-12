<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';
require_once "../controller/redirect.controller.php";

error_log("entrou na mulesta");
error_log('valor que vem da função externa');
if ($_GET['id_transa'] != null || $_GET['id_transa'] != "") {
    function transa()
    {

        $id_transacao = $_GET['id_transa'];
        error_log($id_transacao);
        error_log('***');

        error_log('ENTROU NESTA MERDA');
        session_start();

        $usuario = $_SESSION['usuario']['id'];
        //$id_transacao = $_POST['id_transacao'];
        $dados = buscarTransacaoEdit($usuario, $id_transacao);
        //var_dump($dados);

        //var_dump($dados);
        error_log('valor do id dentro do controller');
        error_log($id_transacao);
        error_log("valor da query");

        return $dados;
        buscarTransacaoEdit($dados, $id_transacao);
        header("Location: ../view/update.php");
        exit;
    }

    return transa();
}

if ($_GET['id_transa'] == null || $_GET['id_transa'] == "") {
    function transacaoUpdate()
    {
        error_log("entrou na função que realmente vai atualizar");
        session_start();

        $today = date("Y-m-d");
        //$carteira = buscarCarteira($_SESSION['usuario']['id']);
        $dados = [
            'ID_USUARIO' => $_SESSION['usuario']['id'],
            'TIPO_TRAN' => $_POST['tipo'],
            'DATA_TRAN' => $today,
            'VALOR_TRAN' => $_POST['valor'],
            'INFO' => $_POST['info'],
            'ID_TRANSACAO' => $_POST['ID'],
        ];

        $msg = "Transação atualizada com sucesso";
        // var_dump($dados);
        updateTransacao($dados);
        header("Location: ../view/home.php?msgsuccess=$msg");
    }
    return transacaoUpdate();
}
