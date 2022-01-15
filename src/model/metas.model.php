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

function searchMetas($user)
{
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

function deleteMetas($user,$idMeta){
    try {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM METAS WHERE ID = ?");
        $query->bindParam(1, $idMeta);
        $query->execute();
        return $query->fetchAll();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
}