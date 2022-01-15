<?php
require '../../database/conectar.php';

function createMetas($dados)
{
    session_start();
    $msgError = "Usuario Invalido/não autenticado";
    $user_identification = $_SESSION['usuario']['id'];

    if ($user_identification) {
        try {
            global $pdo;
            $query = $pdo->prepare("INSERT INTO METAS (ID_USUARIO,NIVEL_META,DATA_META,INICIO_META,DESCRICAO_META,VALOR_META,ID_CARTEIRA)
             VALUES (:ID_USUARIO, :NIVEL_META, :DATA_META,:INICIO_META, :DESCRICAO_META, :VALOR_META, :ID_CARTEIRA)");
            $query->execute($dados);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        error_log("usuario não está logado");
        header("Location: ../view/metas.php?errormsg=$msgError");
    }
}

function updateMetas($dados)
{
  error_log("Entrou");
  error_log($dados['ID_META']);
  error_log($dados['NIVEL_META']);
  error_log($dados['DATA_META']);
  error_log($dados['DESCRICAO_META']);
  error_log($dados['ID_CARTEIRA']);

  try {
    global $pdo;
    $query = $pdo->prepare('UPDATE METAS SET NIVEL_META = :NIVEL_META, DATA_META = :DATA_META, INICIO_META =  :INICIO_META, DESCRICAO_META = :DESCRICAO_META , VALOR_META =  :VALOR_META , ID_CARTEIRA =  :ID_CARTEIRA, ID_USUARIO = :ID_USUARIO WHERE ID_META = :ID_META AND ID_USUARIO = :ID_USUARIO');
    $query->execute($dados);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
};

function searchMetas($user)
{
  error_log("A MERDA DO UPDATE ESTÁ ENTRANDO NESTA MULESTA...");
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT ID_META, NIVEL_META, DATA_META,INICIO_META, DESCRICAO_META, VALOR_META, NOME FROM METAS JOIN CARTEIRA ON CARTEIRA.ID = METAS.ID_CARTEIRA WHERE METAS.ID_USUARIO = $user");

    $query->execute();
    //var_dump($query);
    return $query->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function searchMetasEdit($user, $idMeta)
{
  error_log("VALOR DO ID DA META PARA O SELECT");
  error_log($idMeta);
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT ID_META, NIVEL_META, DATA_META,INICIO_META, DESCRICAO_META, VALOR_META, NOME FROM METAS JOIN CARTEIRA ON CARTEIRA.ID = METAS.ID_CARTEIRA WHERE METAS.ID_USUARIO = $user AND ID_META = $idMeta");

    $query->execute();
    //var_dump($query);
    return $query->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function deleteMetas($user,$idMeta){
    try {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM METAS WHERE ID_META = ?");
        $query->bindParam(1, $idMeta);
        $query->execute();
        return $query->fetchAll();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
}

