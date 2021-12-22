<?php
require_once '../model/carteira.model.php';

function createCarteira()
{
  $msg = "Carteira cadastrada com sucesso";
  $msgError = "Algo deu errado";
  session_start();

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

return createCarteira();
