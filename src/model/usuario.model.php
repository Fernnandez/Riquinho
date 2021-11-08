<?php
require '../../database/conectar.php';
function criarUsuario($dados)
{
  try {
    global $pdo;
    $query = $pdo->prepare('INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function getUsuario($email, $senha)
{
  try {
    global $pdo;
    $sql = "SELECT email, senha FROM usuario WHERE email = :email AND senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue("email", $email);
    $sql->bindValue("senha", $senha);
    $sql->execute();
    return $sql->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
