<?php 

include 'conexao.php';

$id = $_POST['id'];
$funcionario = $_POST['funcionario'];


$sql = "UPDATE `funcionarios` SET `nome_funcionario`='$funcionario' WHERE id_funcionario = $id";
    
$atualiza = mysqli_query($conexao,$sql);
?>

<style>
            
           a.botao{
                background:#A88D1F ;
            }
            a.letra{
                color: #FFFFFF;
            }

            

        </style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container" style="width: 400px;"></div>
<center>
    <div style="margin-top: 30px;">
        <h3>Funcionario atualizado com sucesso!</h3>
    </div>
    <div style="margin-top: 10px;">
        <a href="listar_funcionarios.php" class="btn btn-sm botao letra">Ir para lista de funcionarios</a>
    </div>
</center>