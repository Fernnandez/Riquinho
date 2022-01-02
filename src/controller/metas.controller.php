<?php
require_once '../model/metas.model.php';

function handleMetas()
{
    $msg = "Meta cadastrada com sucesso";
    $msgError = "Algo deu errado";
    $today = date("Y-m-d");

    session_start();


    if ($_POST['urgencia'] != null && $_POST['data'] != null && $_POST['description'] != null && $_POST['value'] != null) {
        $dados = [
            'ID_USUARIO' => $_SESSION['usuario']['id'],
            'NIVEL_META' => $_POST['urgencia'],
            'DATA_META' => isset($_POST['data']) ? $_POST['data'] : $today,
            'INICIO_META' => $today,
            'DESCRICAO_META' => $_POST['description'],
            'VALOR_META' => $_POST['value'],
        ];
    }

    try {
        createMetas($dados);
        header("Location: ../view/metas.php?msgsuccess=$msg");

    } catch (\Throwable $th) {
        header("Location: ../view/metas.php?errormsg=$msgError");
    }
}

 function listMetas()
{
  $usuario = $_SESSION['usuario']['id'];

  $dados = searchMetas($usuario);

  return $dados;

  header("Location: ../view/metas.php");
} 

function excluirMetas(){
    $usuario = $_SESSION['usuario']['id'];
    $metaExcluir = $_GET['id_meta'];

    $dados = deleteMetas($usuario,$metaExcluir);
  
    return $dados;
  
    header("Location: ../view/metas.php");
}

/* /* function listMetas(){
    $msg = "Busca realizada com sucesso";
    $msgError = "Algo deu errado na busca";
    $usuario = $_SESSION['usuario']['id'];

    if($_GET['Urgente'] != null || $_GET['Moderado'] != null || $_GET['Dispensavel'] != null){
        error_log("Os filtros chegaram");
        $filter = [
            'DISPENSAVEL' => $_GET['Dispensavel'],
            'URGENTE' => $_GET['Urgente'],
            'MODERADO' => $_GET['Moderado']

        ];
        var_dump($filter);

        try {
            searchMetas($usuario,$filter);
            header("Location: ../view/metas.php?msgsuccess=$msg");
    
        } catch (\Throwable $th) {
            header("Location: ../view/metas.php?errormsg=$msgError");
        }
    }
     } */


//verificação do metodo de envio de dados
$metodo = $_SERVER['REQUEST_METHOD'];
if ($metodo === 'POST') {
    error_log("entrou no if");
    try {
        handleMetas();
    } catch (Exception $e) {
        //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    }
}

 if($metodo === 'GET'){
     if ($_GET['id_meta']) {
         try {
             excluirMetas();
         } catch (Exception $e) {
             //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
         }
     }
} 

/* if($metodo === 'GET'){
    try {
        listMetas();
    } catch (Exception $e) {
        //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    }
} */
