<?php
require '../../database/conectar.php';

function criarCarteira($dados)
{
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO CARTEIRA (NAME, ID_USUARIO, DESCRICAO) VALUES (:NAME , :ID_USUARIO, :DESCRICAO)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function buscarCarteira($usuarioId)
{
  try {
    global $pdo;
    $sql = "SELECT ID FROM USUARIO WHERE ID_USUARIO = :ID_USUARIO";
    $sql = $pdo->prepare($sql);
    $sql->bindValue("ID_USUARIO", $usuarioId);
    $sql->execute();
    return $sql->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};
