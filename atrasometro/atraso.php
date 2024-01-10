<?php
  @session_start();
       if (isset($_SESSION['logado']) && ($_SESSION['logado'] == 1)) {     
       include 'conexao.php';
    ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tela - Atrasos</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script>
      function colocafoco(){
        document.getElementById("centered-input").focus();
      }
    </script>

	<style>
  body {
  	background-color: #181920;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  #centered-container {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

   #centered-input {
    width: 300px; /* Defina a largura desejada para o input */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

    #centered-image {
    max-width: 100%;
    margin-bottom: 20px;
    width: 250px;
    height: 250px;
  }

  button.botao{
    width: 75px;
    height: 30px;
    border-radius: 20px;
    background:#A88D1F ;

  }
  button.letra{
    color: #FFFFFF;
  }

    a.botao{
      background:#A88D1F ;
    }
    a.letra{
      color: #FFFFFF;
    }

</style>
</head>
<body onLoad="colocafoco()">
	 	<div id="centered-container">
	<img src="assets/cedup.png" alt="Logo Cedup" id="centered-image">
  <!-- O input está aqui -->
  <form method="POST" action="formulario1.php">
  <input type="text" id="centered-input" placeholder=" " name="codigo">
  </form>
  <br>
  <a href="menu.php" class="btn btn-sm botao letra"><span style="color:#FFF">Voltar</span></a>
  <br>
  <br>
  <div style="color:#FFFFFF">
 <h5>Hora atual: <span id="horaAtual"></span></h5>
</div>
    <script>
        function atualizarSegundos() {
            var elementoHoraAtual = document.getElementById('horaAtual');
            var agora = new Date();
            var segundos = agora.getSeconds();

            // Formate os segundos com um zero à esquerda, se necessário
            var segundosFormatados = segundos < 10 ? "0" + segundos : segundos;

            elementoHoraAtual.textContent = agora.getHours() + ":" + agora.getMinutes() + ":" + segundosFormatados;
        }

        // Atualize os segundos a cada segundo (1000ms)
        setInterval(atualizarSegundos, 1000);

        // Inicialize a exibição dos segundos
        atualizarSegundos();
    </script>
  		</div>


      
</body>
  <?php
  }
 
  ?>
</html>