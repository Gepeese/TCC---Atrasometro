<?php 

include 'conexao.php';

$id = $_POST['id'];
$nomealuno = $_POST['nomealuno'];
$num_curso = $_POST['curso'];
//$nome_curso = $_POST['nome_curso'];
//$funcionario = $_POST['funcionario'];

$sql = "SELECT 
            cursos.id_curso
            FROM
            cursos WHERE cursos.num_curso = '$num_curso'";

            $id_curso = mysqli_query($conexao,$sql);
            $result = mysqli_fetch_array($id_curso);          
            $d = $result['id_curso'];
    $sql = "UPDATE alunos SET
            alunos.nomealuno = '$nomealuno',
            alunos.cursoaluno = '$d'
            WHERE alunos.id_aluno = '$id'";

            


//$sql = "UPDATE alunos SET nomealuno = '$nomealuno',cursoaluno= '$cursoaluno',
//turmaaluno= '$turmaaluno',funcionario= '$funcionario' WHERE id_aluno = $id";
  
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
        <h3>Atualizado com sucesso!</h3>
    </div>
    <div style="margin-top: 10px;">
        <a href="listar_alunos.php" class="btn btn-sm botao letra">Ir para lista de alunos</a>
    </div>
</center>