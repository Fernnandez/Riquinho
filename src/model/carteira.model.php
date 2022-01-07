<?php
require '../../database/conectar.php';

function criarCarteira($dados)
{
  // var_dump($dados);
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO CARTEIRA (NOME, ID_USUARIO, DESCRICAO) VALUES 
    (:NOME,:ID_USUARIO,:DESCRICAO)');
    $query->execute($dados);
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
};

function buscarCarteira($usuarioId)
{
  try {
    global $pdo;
    $sql = $pdo->prepare("SELECT ID, NOME, DESCRICAO FROM CARTEIRA WHERE ID_USUARIO = $usuarioId");
    $sql->execute();
    return $sql->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function buscarCarteiraEdit($user, $id)
{
  try {
    global $pdo;
    $sql = $pdo->prepare("SELECT ID, ID_USUARIO, NOME, DESCRICAO 
    FROM CARTEIRA WHERE ID_USUARIO = $user AND ID = $id");
    $sql->execute();
    return $sql->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
function updateCarteira($dados)
{

  try {
    global $pdo;

    $smt = $pdo->prepare('UPDATE CARTEIRA SET NOME = :NOME, DESCRICAO = :DESCRICAO, ID_USUARIO = :ID_USUARIO 
    WHERE ID = :ID');
    $smt->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};
