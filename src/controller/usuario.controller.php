<?php

require_once('../model/usuario.model.php');

function cirarcontroller() {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confirmarSenha = $_POST['confirmarSenha'];

  if ($senha != $confirmarSenha) {
    echo 'senha errada';
    return;
  }

  criarUsuario([
    'nome' => $nome,
    'email' => $email,
    'senha' => sha1($senha)
  ]);
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  cirarcontroller();
}