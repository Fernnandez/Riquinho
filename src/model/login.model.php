<?php

class Usuario{
    public function login($email,$senha){
        global $pdo;
        //var_dump($usuario,$senha);

        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        //var_dump($sql);
        $sql->bindValue("email",$email);
        $sql->bindValue("senha",$senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            //var_dump('entrou');

            //var_dump($dado['usuario']);

            $_SESSION['id'] = $dado['id'];
            return true;
        }else{
            //var_dump('n entrou');
            return false;
        }
    }
}
?>