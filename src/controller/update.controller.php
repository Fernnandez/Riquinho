<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';
require_once "../controller/redirect.controller.php";

if ($_GET['id_transa'] != null || $_GET['id_transa'] != "") {
    
    function transa()
    {

        $id_transacao = $_GET['id_transa'];
        session_start();

        $usuario = $_SESSION['usuario']['id'];
        $dados = buscarTransacaoEdit($usuario, $id_transacao);
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
   
        session_start();

        $today = date("Y-m-d");
        $dados = [
            'ID_USUARIO' => $_SESSION['usuario']['id'],
            'TIPO_TRAN' => $_POST['tipo'],
            'DATA_TRAN' => $today,
            'VALOR_TRAN' => $_POST['valor'],
            'INFO' => $_POST['info'],
            'ID_TRANSACAO' => $_POST['ID'],
        ];

        $msg = "Transação atualizada com sucesso";
        updateTransacao($dados);
        header("Location: ../view/home.php?msgsuccess=$msg");
        
    }
    return transacaoUpdate();
}
