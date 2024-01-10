<?php
@session_start();


?>


<?php 
include 'conexao.php';

$id = $_GET['id'];

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
    #container {
        width: 500px;
    }

     a.botao{
                background:#A88D1F ;
            }
            a.letra{
                color: #FFFFFF;
            }
            button.letra{
                color: #FFFFFF;
            }
    </style>

</head>

<body>

    <div class="container" style="margin-top: 40px" id="container">

        <h3>Formulário de cadastro</h3>

        <form action="_atualizar_atraso.php" method="post" style="margin-top: 20px">
            <?php 

            
            $sql = "SELECT b.*, a.nomealuno,a.matricula FROM `atrasos` b 
            JOIN alunos a ON(a.id_aluno = b.codaluno)
            WHERE b.id = $id;";
            $buscar = mysqli_query($conexao,$sql);
            while ($array = mysqli_fetch_array($buscar)) {
                $id = $array['id'];
                $motivo = $array['motivo'];
                $matricula = $array['matricula'];
                $nomealuno = $array['nomealuno'];

               

            ?>

            
            <div class="form-group">
                <label>Matrícula do aluno</label>
                <input type="number" class="form-control" name="matricula" value="<?php echo $matricula?>" disabled>
                <input type="number" class="form-control" name="id" value="<?php echo $id?>" style="display:none;">
            </div>
            <div class="form-group">
                <label>Nome do aluno</label>
                <input type="text" class="form-control" name="nomealuno" value="<?php echo $nomealuno?>" disabled>
            </div>
        
            <div class="form-group">
                <label>Motivo do atraso</label>
                <input type="text" class="form-control" name="motivo" value="<?php echo $motivo?>">

                </select>
            </div>
            
            <div style="text-align: right;">
                <button type="submit" id="botao" class="btn bg-success btn-sm letra">Atualizar</button>
                <a href="listar_atrasos.php" role="button" class="btn botao letra btn-sm">Voltar</a>
            </div>
            <?php } ?>
        </form>
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