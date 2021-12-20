<?php
require_once '../model/carteira.model.php';

function createCarteira()
{
  $dados = [
    'ID_USUARIO' => $_SESSION['usuario']['id'],
    'NAME' => $_POST['name'],
    'DESCRICAO' => $_POST['description'],
  ];
  criarCarteira($dados);
  header("Location: ../view/home.php");
}
