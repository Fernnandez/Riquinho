<?php

require_once '../model/transacao.model.php';
require_once '../model/carteira.model.php';

function Transacao()
{
  session_start();

  $today = date("Y-m-d");
  // $carteira = buscarCarteira($_SESSION['usuario']['id']);

  $dados = [
    'ID_CARTEIRA' => '1',
    'TIPO_TRANSA' => $_POST['tipo'],
    'DATA_TRANSA' => $today,
    'VALOR_TRANSA' => $_POST['valor']
  ];

  // var_dump($dados);
  criarTransacao($dados);
  // header("Location: ../view/home.php");
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  try {
    Transacao();
  } catch (Exception $e) {
    header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    var_dump($e->getMessage());
  }
}
