<?php
@session_start();


?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php
       if (isset($_SESSION['logado']) && ($_SESSION['logado'] == 1)) {      
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
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

</head>

<body>

<?php 


$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}

?>

    <div class="container" style="margin-top: 40px" id="container">

        <h3>Formulário de cadastro</h3>

        <form action="_inserir_aluno.php" method="post" style="margin-top: 20px">
            <div class="form-group">
                <label>Nome do Aluno</label>
                <input type="text" class="form-control" name="nomealuno" placeholder="Insira o nome do aluno"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Número da matrícula</label>
                <input type="number" class="form-control" name="matricula" placeholder="Insira o número da matrícula"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Turma</label>
                <select class="form-control" name="num_curso" >

                    <?php 
                    include 'conexao.php';



                    $sql = "SELECT * FROM `cursos` ";
                    $buscar = mysqli_query($conexao,$sql);
                    while ($array = mysqli_fetch_array($buscar)) {
                        $id_curso = $array['id_curso'];
                        $num_curso = $array['num_curso'];
                        
                    ?>
                    

                    <option value=<?php echo $num_curso ?>><?php echo $num_curso ?></option>

                    <?php  } ?>
                </select>
                <br>

                <div style="text-align: right;">
                <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
                <button type="submit" id="botao" class="btn btn-success btn-sm">Cadastrar</button>
            </div>
            </form>
            </div>

            <!--
            <div class="form-group">
                <label>Turma</label>
                <select class="form-control" name="turma">

                    <?php 
                    include 'conexao.php';

                    $sql = "SELECT * FROM `turma` order by turma ASC";
                    $buscar = mysqli_query($conexao,$sql);

                    while ($array = mysqli_fetch_array($buscar)) {
                        $id_turma = $array['id_turma'];
                        $nome_turma = $array['turma'];
                        
                    ?>
                    <option><?php echo $nome_turma ?></option>

                    <?php  } ?>
                </select>
            </div>
        -->
                




            
            <div class="form-group">
                <label>Funcionário</label>
                <select class="form-control" name="nome_funcionario">

                    <?php 
                    include 'conexao.php';

                    $sql2 = "SELECT * FROM `funcionarios`";
                    $buscar2 = mysqli_query($conexao,$sql2);

                    while ($array2 = mysqli_fetch_array($buscar2)) {
                        $id_funcionario = $array2['id_funcionario'];
                        $funcionario = $array2['nome_funcionario'];
                        
                    ?>
                    <option><?php echo $funcionario ?></option>


                    <?php  } ?>

                </select>
            </div>
            <div style="text-align: right;">
                <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
                <button type="submit" id="botao" class="btn btn-success btn-sm">Cadastrar</button>
            </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <?php
} else{
    header('Location:negado.php');
}
?>

</body>

</html>