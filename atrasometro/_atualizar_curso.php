<?php 

include 'conexao.php';

$id = $_POST['id'];
$curso = $_POST['curso'];


$sql = "UPDATE `cursos` SET `curso`='$curso' WHERE id_curso = $id";
    
$atualiza = mysqli_query($conexao,$sql);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <style>
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
        <h3>Categoria atualizada com sucesso!</h3>
    </div>
    <div style="margin-top: 10px;">
        <a href="listar_cursos.php" class="btn btn-sm botao letra">Ir para lista de cursos</a>
    </div>
</center>