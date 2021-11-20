<?php
require '../../database/conectar.php';

function criarTransacao($dados)
{
  // var_dump($dados);
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO TRANSACOES (ID_USUARIO, TIPO_TRAN, DATA_TRAN, VALOR_TRAN, INFO)
     VALUES (:ID_USUARIO,:TIPO_TRAN, :DATA_TRAN, :VALOR_TRAN, :INFO)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function buscarTransacao($user)
{
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT ID, TIPO_TRAN, DATA_TRAN, VALOR_TRAN, INFO FROM TRANSACOES 
    WHERE ID_USUARIO = $user");
    $query->execute();
    return $query->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
