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
            $query = $pdo->prepare("INSERT INTO METAS (ID_USUARIO,NIVEL_META,DATA_META,INICIO_META,DESCRICAO_META,VALOR_META)
             VALUES (:ID_USUARIO, :NIVEL_META, :DATA_META,:INICIO_META, :DESCRICAO_META, :VALOR_META)");
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
    $query = $pdo->prepare("SELECT ID, NIVEL_META, DATA_META,INICIO_META, DESCRICAO_META, VALOR_META FROM METAS
    WHERE ID_USUARIO = $user");
    $query->execute();
    //var_dump($query);
    return $query->fetchAll();
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
