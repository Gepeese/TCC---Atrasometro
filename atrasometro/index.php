<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
    #tamanho {
        width: 400px;
    }

    .box {
        border-radius: 15px;
        border: 0.1em solid;
        padding: 30px;
        border-color: #cfd6dc;
    }
    div.fundo{
        background: #181920;
    }

    label.letra{
        color: #FFF;
    }
    h4.letra{
        color: #FFF;
    }
    button.botao{
        background: #A88D1F;
    }
    button.letra{
        color: #FFF;
    }
    body.fundocedup{
        background: url(assets/fundo_cedup.png)  no-repeat ;
        background-size: cover;

    }
    p.letra{
        color: #FFF;
    }
    </style>


</head>
    
<body class="fundocedup">

    <div class="container box fundo" id="tamanho" style="margin-top:60px; border-color: #A88D1F; ">
        <center>
            <img src="assets/cedup.png" alt="logo" width="170px" style="margin-bottom:20px;">
            <h4 class="letra">Controle de Atrasos</h4>
        </center>
        <form action="index1.php" method="post" style="margin-top:20px;">
            <div class="form-group">
                <label class="letra">Usuário</label>
                <input type="text" name="usuario" class="form-control" placeholder="Digite seu e-mail"
                    autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="letra">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha" autocomplete="off"
                    required>
            </div>
        
        <div style="text-align:right;">
            <button class=" btn btn-sm botao letra btn-block" type="submit">Entrar</button>
        </div>
        </form>

    </div>

    <div style="margin-top:20px;">
        <center>
            <p class="letra">Não possui cadastro? Clique <a href="cadastro_usuario_externo.php" style="color: #A88D1F;">aqui</a>!</p>
        </center>
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


</body>

</html>