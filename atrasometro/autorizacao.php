<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <title>Autorização de Atraso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .autorizacao {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            margin-top: 50px;
        }
        .dados-aluno {
            margin-bottom: 20px;
        }
        .campo-assinatura {
            margin-top: 50px;
        }
         @media print {
            body {
                background-color: white;
                color: #000;
            }
           #imprimirButton, #imprimirText {
            display: none;
        }
        a#esconderlink{
             display: none;


        }

        button {
            background-color: #A88D1F;
            color: #FFFFFF;
            align-items: center;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
        }

         a.botao{
            background-color: #A88D1F;
            color: #FFFFFF;
            align-items: center;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            width: 140px;
            height: 45px;
            cursor: pointer;
            }

            a.letra{
                color: #FFFFFF;
            }
           
    </style>
</head>
<body>
    <div class="autorizacao">
        <img src="assets/cedup2.png" alt="logo" width="100px" style="margin-bottom:10px; border-radius: 100px;">
        <h1 align="center">Autorização de entrada</h1>
        <?php
// Recupere o ID do atraso da query string
if (isset($_GET['id_atraso'])) {
    $id_atraso = $_GET['id_atraso'];

    // Realize a consulta para obter os detalhes do atraso
    // Substitua isso com sua lógica de consulta ao banco de dados
    include 'conexao.php';
    $sql = "SELECT a.*, al.nomealuno
            FROM atrasos a
            JOIN alunos al ON a.codaluno = al.id_aluno
            WHERE a.id = $id_atraso";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        // Obtenha os dados do atraso
        $dadosAtraso = mysqli_fetch_assoc($resultado);

        // Exibir o nome do aluno
        $nomeAluno = isset($dadosAtraso['nomealuno']) ? $dadosAtraso['nomealuno'] : 'Nome não disponível';
        echo "Aluno(a): $nomeAluno<br>";

        // Exibir o horário
        $horario = $horario = isset($dadosAtraso['hora_atraso']) ? date('H:i:s', strtotime($dadosAtraso['hora_atraso'])) : 'Horário não disponível';

        echo "Horário: $horario<br>";

        // Exibir a turma
        $data = isset($dadosAtraso['data_atraso']) ? date('d/m/Y', strtotime($dadosAtraso['data_atraso'])) : 'Data não disponível';

        echo "Data: $data<br>";
    } else {
        echo "Erro na consulta ao banco de dados: " . mysqli_error($conexao);
    }
} else {
    echo "ID do atraso não foi recebido.";
}
?>
    <br>
    <br>
    <p align="center">-------------------------------------------------------------</p>
    
    <h3 align="center"><b>Zaira C. Silva</b></h3>

        <div class="estilo">
    <button id="imprimirButton" class="btn btn-sm btn-success " onclick="printPage()">
    <span id="imprimirText">Imprimir Relatório</span>
    </button>

    <a id="esconderlink" href="menu.php" role="button" class="btn btn-sm btn-warning">Voltar</a>
         </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
    </div>
</body>
</html>