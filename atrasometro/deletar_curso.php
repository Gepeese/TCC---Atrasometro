<?php
@session_start();


?>

<?php 

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `cursos` WHERE id_curso = $id";

$deletar = mysqli_query($conexao,$sql);
?>


<?php
       if (isset($_SESSION['logado']) && ($_SESSION['logado'] == 1)) {      
    ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container" style="width: 400px;"></div>
<center>
    <div style="margin-top: 30px;">
        <h3>Curso excluído com sucesso</h3>
    </div>
    <div style="margin-top: 20px;">
        <a href="listar_cursos.php" class="btn btn-sm btn-primary">Ir para lista de cursos</a>
    </div>
</center>

<?php
} else{
    header('Location:negado.php');
}



    ?>