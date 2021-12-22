<?php
require '../../database/conectar.php';

function criarTransacao($dados)
{
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO TRANSACOES (ID_USUARIO, ID_CARTEIRA, TIPO_TRAN, DATA_TRAN, VALOR_TRAN, INFO)
     VALUES (:ID_USUARIO, :ID_CARTEIRA, :TIPO_TRAN, :DATA_TRAN, :VALOR_TRAN, :INFO)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function updateTransacao($dados)
{
  try {
    global $pdo;
    $query = $pdo->prepare('UPDATE TRANSACOES SET TIPO_TRAN = :TIPO_TRAN, DATA_TRAN = :DATA_TRAN, VALOR_TRAN =  :VALOR_TRAN, INFO = :INFO WHERE ID_USUARIO = :ID_USUARIO AND ID = :ID_TRANSACAO');
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

function buscarTransacaoEdit($user, $id_transacao)
{
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT ID, TIPO_TRAN, DATA_TRAN, VALOR_TRAN, INFO FROM TRANSACOES
    WHERE ID_USUARIO = $user AND ID = $id_transacao");
    $query->execute();
    return $query->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
