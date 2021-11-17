<!--Esta parte de codigo verifica se o usuario esta logado, dando acesso a pagina de cadastro  !-->
<?php
session_start();
if ((!isset($_SESSION['usuario']) === true)) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/homepage.css" />
  <title>Riquinho</title>
  <style>
    .modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: rgba(0,0,0,0.8);
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}

.modal:target {
  opacity: 1;
  pointer-events: auto;
}

.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: rgba(0,0,0,0.8);
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}

.modal:target {
  opacity: 1;
  pointer-events: auto;
}

.modal > div {
  position: relative;
  margin: 10% auto;
  padding: 15px 20px;
  background: #fff;
}

.formtran{
  width: 900px;
  height: 700px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-direction: column;
}

.infoTran{
  display: flex;
  justify-content: space-around;
  flex-direction: column;
}

#tituloTran{
  color: black;
  font-size: 50px;
}

#tipoTran{
  color: green;
  font-size: 40px;
  text-align: center;
}

input{
 width: 300px;
 height: 70px;
 border: 1px solid green;
}

label{
  color: black;
  font-size: 20px;
}

.input{
  display: flex;
  justify-content: center;
  align-items: center;
flex-direction: column;
}

.fromTranInput{
   width: 700px;
   height: 500px;
}

.camposText{
  display: flex;
  width: 700px;
  height: 300px;
  justify-content: space-around;
  flex-direction: row;
  flex-wrap: wrap;
}

.btnOpcoes{
  display: flex;
  justify-content: space-around;
  height: 200px;
  align-items: center;
}

.salvar{
  width: 250px;
  height: 70px;
  background-color: blue;
  color: white;
  font-size: 30px;
  border: none;
}
.cancelar{
  width: 250px;
  height: 70px;
  border: 1px solid red;
  background-color: white;
  color: red;
  font-size: 30px;
}
  </style>
</head>

<body>
  <header class="header">
    <h2 class="logo">
      <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
    </h2>
    <span>Bem-vindo <?= $_SESSION['usuario']['nome'] ?></span>
    <a class="button" href="../controller/login.controller.php">Sair</a>
  </header>
  <div class="main">
    <div class="receitas">
    <a href="#abrirModal"><h1 class="title-section">
        <img src="../../public/assets/mais.png" alt="icon-mais" />
        Receitas
      </h1></a>
      <h2>R$ 2250,00</h2>

      <ul class="lista-transacoes">
        <li class="lista-transacoes-row">
          <span>R$ 1500,00</span>
          <span>08/11/2021</span>
          <span class="row-info" title="Salário">Salário</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 500,00</span>
          <span>25/10/2021</span>
          <span class="row-info" title="Frella">Frella </span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 250,00</span>
          <span>08/11/2021</span>
          <span class="row-info" title="Manutenção de sistema">Manutenção de sistema</span>
        </li>
      </ul>
    </div>
    <div class="gastos">
      <h1 class="title-section">
        <img src="../../public/assets/botao-de-menos.png" alt="icon-menos" />
        Gastos
      </h1>
      <h2>R$ 900,00</h2>
      <ul class="lista-transacoes">
        <li class="lista-transacoes-row">
          <span>R$ 500,00</span>
          <span>01/11/2021</span>
          <span class="row-info" title="Alimentação">Alimentação</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 200,00</span>
          <span>25/10/2021</span>
          <span class="row-info" title="Festa no sábado">Festa no sábado</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 100,00</span>
          <span>20/10/2021</span>
          <span class="row-info" title="Internet">Internet</span>
        </li>
        <li class="lista-transacoes-row">
          <span>R$ 100,00</span>
          <span>20/10/2021</span>
          <span class="row-info" title="Roupas e sapato para fim de ano">Roupas e sapato para fim de ano</span>
        </li>
      </ul>
    </div>
  </div>




<div id="abrirModal" class="modal">
  
<div class="formtran">

<div class="infoTran">
<h1 id="tituloTran">Nova Transação</h1>
<h2 id="tipoTran">Receita</h2>

</div>
<section class="fromTranInput">
  <form action="#">
    <section class="camposText">
    <div class="input">
  <label for="data"><b>Data</b></label></b>
  <input type="text" id="data" name="data">

      </div>
      <div class="input">
      <label for="valor"><b>Valor</b></label></b>
  <input type="text" id="valor" name="valor">

      </div>
      <div class="input">
      <label for="info"><b>Info</b></label></b>
  <input type="text" id="info" name="info" style="width: 500px;">

      </div>


    </section>

  <section class="btnOpcoes">
  <button class="salvar">Salvar</button>
  <a href="#fechar" title="Fechar" class="fechar">
<button class="cancelar">Cancelar</button></a>
</section>

  </form>
</section>
</div>
</div>


</body>

</html>