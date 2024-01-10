<?php
@session_start();


?>

<?php 

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `alunos` WHERE id_aluno = $id";

$deletar = mysqli_query($conexao,$sql);
?>

<?php
       if (isset($_SESSION['logado']) && ($_SESSION['logado'] == 1)) {      
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

<div class="container" style="width: 400px;"></div>
<center>
    <div style="margin-top: 30px;">
        <h3>Aluno excluído com sucesso</h3>
    </div>
    <div style="margin-top: 20px;">
        <a href="listar_alunos.php" class="btn btn-sm botao letra">Ir para lista de alunos</a>
    </div>
</center>

<?php
} else{
    header('Location:negado.php');
}



    ?>