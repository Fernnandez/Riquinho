<?php
require_once '../model/carteira.model.php';

function createCarteira()
{
  session_start();
  $msg = "Carteira cadastrada com sucesso";
  $msgError = "Algo deu errado";

  $dados = [
    'ID_USUARIO' => $_SESSION['usuario']['id'],
    'NOME' => $_POST['name'],
    'DESCRICAO' => $_POST['description'],
  ];
  if (criarCarteira($dados)) {
    header("Location: ../view/carteira.php?msgsuccess=$msg");
  } else {
    header("Location: ../view/carteira.php?errormsg=$msgError");
  }
}

function findCarteira()
{
  $user = $_SESSION['usuario']['id'];
  $dados = buscarCarteira($user);
  return $dados;
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  try {
    createCarteira();
  } catch (Exception $e) {
    echo ($e->getMessage());
  }
}
