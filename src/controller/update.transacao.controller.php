<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';
// require_once "../controller/redirect.controller.php";


function findTransacao()
{
  $id_transacao = $_GET['id_transa'];
  $usuario = $_SESSION['usuario']['id'];
  $dados = buscarTransacaoEdit($usuario, $id_transacao);
  return $dados;
}

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

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  $msgsuccess = "Usuário cadastrado com sucesso";
  $errormsg = "Usuário cadastrado com sucesso";
  try {
    transacaoUpdate();
    header("Location: ../view/home.php?msgsuccess=$msg");
  } catch (Exception $e) {
    header("Location: ../view/home.php?errormsg=$errormsg");
  }
} else {
  findTransacao();
}
