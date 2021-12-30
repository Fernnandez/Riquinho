<?php

    function handleMetas(){
        error_log("entrou");

        $msg = "Meta cadastrada com sucesso";
        $msgError = "Algo deu errado";
        
        //session_start();
      
        $today = date("Y-m-d");

        $dados = [
          
          //'ID_USUARIO' => $_SESSION['usuario']['id'],
          'NIVEL_META' => $_POST['urgencia'],
          'DATA_META' => isset($_POST['data']) ? $_POST['data'] : $today,
          'DESCRICAO_META' => $_POST['description'],
          'VALOR_META' => $_POST['value'],
        ];

        var_dump($dados);
    }

    $metodo = $_SERVER['REQUEST_METHOD'];

    if ($metodo === 'POST') {
        error_log("entrou no if");
        try {
            handleMetas();
        } catch (Exception $e) {
          //header("location: ../view/cadastro.php?msg=" . $e->getMessage());
        }
      }
      
?>