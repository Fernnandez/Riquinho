<?php

require_once '../model/usuario.model.php';

function cadastroUsuario()
{
  $dados = [
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'senha' => $_POST['senha'],
    'confirmarSenha' => $_POST['confirmarSenha']
  ];

  if ($dados['senha'] !== $dados['confirmarSenha']) {
    throw new Exception("As senhas são difrentes");
  }

  if(strlen($dados['senha']) < 8){
    throw new Exception("Senha muito pequena"); 
  }

  $usuario = buscarUsuarioEmail($dados['email']);

  foreach ($dados as $key => $value) {
    if (isset($value) === null || empty($value)) {
      throw new Exception("O campo $key é obrigatorio");
    }
  }

  if ($usuario) {
    throw new Exception("E-mail já cadastrado.");
  }

  criarUsuario([
    'nome' => $dados['nome'],
    'email' => $dados['email'],
    'senha' => sha1($dados['senha']),
  ]);
}

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
  $msgsuccess = "Usuário cadastrado com sucesso";
  try {
    cadastroUsuario();
    header("location: ../view/login.php?msgsuccess=$msgsuccess");
  } catch (Exception $e) {
    header("location: ../view/cadastro.php?msg=" . $e->getMessage());
    var_dump($e->getMessage());
  }
}
