<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metas e Objetivos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/homepage.css" />
  <link rel="stylesheet" href="../../public/css/global.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .opcoes{
            width: 100%;
            height: 100px;

            display: flex;
            justify-content: center;
            flex-direction: row;
            justify-content: space-around;
        }

        .prioridades {
            width: 100%;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            flex-wrap: wrap;

            padding: 40px;
        }

        .prioridadesCard {
            width: 400px;
            height: 200px;
            border-radius: 4px;

            margin: 20px;

            background-color: whitesmoke;
        }

        #nivelPrioridade {
            width: 100%;
            height: 30px;

            display: flex;
            justify-content: center;
            align-items: flex-end;
            flex-direction: row;

            padding: 10px;
        }

        #nivel {
            width: 150px;
            height: 5px;
            background-color: red;

            margin-left: 250px;
        }

        .descricaoObj{
            width: 100%;
            min-height: 90px;
            padding: 20px;

            font-size: 20px;
            color: darkgrey;
            font-family: 'Righteous', cursive;

        }

        small{
            width: 100%;
            padding: 17px;

            font-size: 18px;
            font-family: 'Righteous', cursive;
            color: darkgray;
        }

        b{
            color: 	#363636;
        }

        .op{
            width: 100%;
        }

        button{
            width: 130px;
            height: 30px;

            background-color: darkgrey;

            color: white;

            font: 20px;
            font-family: 'Righteous', cursive;
            border: none;
            border-radius: 4px;
            margin-left: 260px;
            
            cursor: pointer;
        }
        button:hover{
            background-color: #363636;
            transition: all;
        }

    </style>
</head>

<body>
    <nav class="opcoes">
    <h2 class="logo" style="font-family: 'Righteous', cursive;">
        <img src="../../public/assets/wallet.png" alt="logo" />Riquinho
      </h2>

      <h2 class="title-section" style="font-family: 'Righteous', cursive;">
          <img src="../../public/assets/mais.png" alt="icon-mais" id="abre-receita" />
          Criar Meta
        </h2>
    </nav>
    <div class="prioridades">
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: red;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>
            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: red;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar um Celular com 120GB de memoria disponivel
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: red;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Fazer a feira do Natal e do Ano novo
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: green;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: green;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: green;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: yellow;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: yellow;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>
        <div class="prioridadesCard">
            <div id="nivelPrioridade">
                <div id="nivel" style="background-color: yellow;">
                </div>
            </div>
            <div class="infoObj">
                <p class="descricaoObj">
                    Comprar Um SSD para o meu Notebook
                </p>
                <small>Dias Restantes: <b>270 Dias</b></small><br>
                <small>Valor: <b>R$ 250,55</b></small>
            </div>

            <div class="op">
                <button>Excluir</button>
            </div>
        </div>

    </div>

    <div id="modal-receita" class="modal-container">
    <div class="modal">
      <button id="close-receita">x</button>
      <div class="infoTran">
        <h1 class="tituloTran" style="font-family: 'Righteous', cursive;">Nova Meta</h1>
      </div>
      <form class="form" method="POST" action="../controller/carteira.controller.php">
        <div class="input-sup">
          <div class="input">
            <label for="text"><b>Valor do Objetivo</b></label></b>
            <input type="text" id="name" name="name" class="receita">
          </div>
          <div class="input">
            <label for="text"><b>Data Final Conclusão</b></label></b>
            <input type="date" id="data" name="data" class="receita">
          </div>

          
          <div class="input">
            <label for="text"><b>Descrição</b></label></b>
            <textarea nid="description" name="description" class="receita" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="input">
            <label for="text"><b>Urgencia</b></label></b>
            <select >
  <option value="Urgente">Urgente</option>
  <option value="Moderado">Moderado</option>
  <option value="Dispensavel">Dispensavel</option>
</select>>
        <div class="btnOpcoes">
          <button class="salvar">Salvar</button>
          <a href='home.php' class="cancelar">Cancelar</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    function abreModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add("ativo");
    }

    function fechaModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.remove("ativo");
    }

    // modal receita
    const btn_receita = document.getElementById("abre-receita");
    btn_receita.addEventListener("click", () => {
      abreModal("modal-receita");
    });
    const close_receita = document.getElementById("close-receita")
    close_receita.addEventListener("click", () => {
      fechaModal('modal-receita')
    })

    // modal gasto
    const btn_gasto = document.getElementById("abre-gasto");
    btn_gasto.addEventListener("click", () => {
      abreModal("modal-gasto");
    });
    const close_gasto = document.getElementById("close-gasto")
    close_gasto.addEventListener("click", () => {
      fechaModal('modal-gasto')
    })
    setTimeout(function() {

      var a = document.getElementById("div-teste");

      a.style = "display:none"


    }, 2000);
  </script>

</body>

</html>