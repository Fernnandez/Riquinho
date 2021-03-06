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
    if ($usuario) {
      session_start();
      $_SESSION['usuario'] = $usuario;
      $_SESSION['id'] = $usuario->id;
      redirect("../view/home.php");
    } else {
      throw new Exception('E-mail ou senha inválidos');
    }
  } else {
    throw new Exception('Preencha todos os campos');
  }
}

function logout()
{
  session_start();
  session_destroy();
  redirect("../../index.php");
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  try {
    login($_POST['email'], $_POST['senha']);
  } catch (Exception $e) {
    header('Location: ../view/login.php?msg=' . $e->getMessage());
  }
} else if ($metodo === 'GET') {
  logout();
}
