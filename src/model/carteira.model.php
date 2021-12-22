<?php
require '../../database/conectar.php';

function criarCarteira($dados)
{
  var_dump($dados);
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
