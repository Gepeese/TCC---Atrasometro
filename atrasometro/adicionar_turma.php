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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
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

    <div class="container" style="margin-top: 40px; width:500px;">

        <center>
            <h3>Cadastro de turmas</h3>
        </center>

        <form action="_inserir_turma.php" method="post" style="margin-top: 20px">
            <div class="form-group">
                <label>Número da turma</label>
                <input type="text" class="form-control" name="turma" placeholder="Insira o numero da turma"
                    autocomplete="off">
            </div>
            <div style="text-align: right;">
                <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
                <button type="submit" id="botao" class="btn btn-success btn-sm">Adicionar</button>
            </div>
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