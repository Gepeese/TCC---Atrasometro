<?php 

include 'conexao.php';

$turma = $_POST['turma'];

$sql = "INSERT INTO `turma`(`turma`) VALUES ('$turma')";
$inserir = mysqli_query($conexao, $sql);

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
       a.botao{
                background:#A88D1F ;
            }
            a.letra{
                color: #FFFFFF;
            }
    </style>

<div class="container" style="widith: 500px; margin-top: 30px;">
    <center>
        <h4>Turma adicionada com sucesso!</h4>
    </center>
    <div style="padding-top: 20px;">
        <center>
            <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
        </center>
    </div>

</div>