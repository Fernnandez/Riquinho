<?php

require '../../database/conectar.php';
require '../../src/model/usuario.model.php';

function redirect($path)
{
  header("Location: $path");
}

function login($email, $senha)
{
  if (isset($email) != null && isset($senha) != null && !empty($email) && !empty($senha)) {
    $usuario = getUsuario($email, sha1($senha));
    if (count($usuario) > 0) {
      session_start();
      $_SESSION['id'] = $usuario['email'];
      redirect("../view/home.php");
    }
  }
}

function logout()
{
  session_start();
  session_destroy();
  redirect("../view/login.php");
}


$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  login($_POST['email'], $_POST['senha']);
} else if ($metodo === 'GET') {
  logout();
}
