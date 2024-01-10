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
    <title>CRUD</title>
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

include 'conexao.php';

$sql = "SELECT `nivel_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario' and `status` = 'Ativo'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];

?>

    <div class="container" style="width:500px; margin-top:40px;">
        <center>
            <img src="assets/cedup2.png" alt="logo" width="150px" style="margin-bottom:10px; border-radius: 100px;">
            <h4>Cadastro de usuário</h4>
        </center>

        <form action="_insert_usuario.php" method="post">
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome completo"
                    autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="mail" class="form-control" placeholder="Seu e-mail" autocomplete="off"
                    required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input id="txtSenha" type="password" name="senha" class="form-control" placeholder="Sua senha"
                    autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Confirmar senha</label>
                <input type="password" name="senha2" class="form-control" placeholder="Confirme sua senha"
                    autocomplete="off" required oninput="validaSenha(this)">
                <small>Precisa ser igual a senha digitada acima.</small>
            </div>
            <div class="form-group">
                <label>Nível de acesso</label>
                <select name="nivel" class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2">Funcionário</option>
                    <option value="3">Conferente</option>
                </select>
            </div>
            <div style="text-align:right;">
                <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar</a>
                <button class=" btn btn-sm btn-success" type="submit" id="botao">Cadastrar</button>
            </div>
        </form>

        <footer class="text-center mt-4">
        <p>&copy; 2023 - Salvador e Irruan</p>
    </footer>

    </div>

    <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <script>
    function validaSenha(input) {
        if (input.value != document.getElementById('txtSenha').value) {
            input.setCustomValidity('Repita a senha corretamente');
        } else {
            input.setCustomValidity('');
        }
    }
    </script>

    <?php
} else{
    header('Location:negado.php');
}
?>
</body>

</html>