<?php

    $email = '';
    $senha = '';
    error_log('entrou na autenticação');

    if (isset($_POST['email']) != null && isset($_POST['senha']) != null && !empty($_POST['email']) && !empty($_POST['senha'])) {


        require '../../database/conectcar.php';

        require '../../src/model/login.model.php';
        $u = new Usuario();


        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        error_log('lia do coco entrou');
        error_log($email);
        error_log($senha);
        error_log('********');


        if($u->login($email,$senha) == true){
            if(isset($_SESSION['id'])){
                error_log('entrou na autenticação');
             header("location: ../../../../src/view/home.php");
     
            }else{
             header("location: ../../../../index.php");
            }
         }else{
             header("location: ../../../../index.php");
         }
     }else{
         header("location: ../../../../index.php");
     }


?>