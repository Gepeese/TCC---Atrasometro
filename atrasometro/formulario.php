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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="script/mostranome.js"></script>
    <style>
         input.tamanhoBox {
            width: 80px;
            height: 40px;
        }
   
        body {
            background-color: #181920;
            color: #FFF;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #A88D1F;
            color: #FFF;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body {
            padding: 20px; /* Reduzindo o padding para diminuir o tamanho do formulário */
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 2px solid #A88D1F;
            border-radius: 5px;
            padding: 10px;
            color: #181920;
        }

        .btn-primary {
            background-color: #A88D1F;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background-color: #181920;
        }

        .btn-secondary {
            background-color: #A88D1F;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-secondary:hover {
            background-color: #181920;
        }

        label.letra{
            color: #181920;
        }
        </style>
        </head>
        <title>Cadastro de Atrasos</title>
      <?php 
     if (!isset($_POST['enviado']) || ($_POST['enviado'] == 0)) {   ?>
     <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Cadastro de Atrasos<br>Manual</h2>
                    </div>
                    <div class="card-body">
                        <form action="formulario.php" method="POST">
                            <div class="form-group">
                                <label for="matricula" class="letra">Turma:</label>
                                <input type="text" class="form-control tamanhoBox" name="turma" id="matric" size="5" placeholder="Turma" required onchange="verifica()">
                                <input type="hidden" name="enviado" value="1">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            </div>
                            <div class="form-group">
                                <a href="menu.php" name="enviado" value=0 class="btn btn-secondary btn-block">Menu Principal</a>
                            </div>
     
   <?php    } else {
    include_once("conexao.php");
    $turma = $_POST['turma'] ;
    $sql="SELECT 
    alunos.id_aluno,
    alunos.nomealuno
    FROM  
    alunos 
    JOIN 
    cursos ON cursos.id_curso = alunos.cursoaluno
    WHERE  
    cursos.num_curso=$turma
    ORDER BY alunos.nomealuno";
     $resultado = mysqli_query($conexao,$sql);
     
    ?>
    
 <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Cadastro de Atrasos<br>Manual</h2>
                    </div>
                    <div class="card-body">
                        <form action="processa_formulario.php" method="POST">
                            <div class="form-group">
                                <label for="matricula" class="letra">Turma:</label>
                                <input type="text" class="form-control tamanhoBox" name="turma" id="matric" value="<?php echo $_POST['turma'] ?>"  placeholder="Turma" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="nome" class="letra">Nome:</label>
                                <select multiple class="form-control" id="exibirAqui" name="idaluno">
                               <?php 
                                 while($dados = mysqli_fetch_array($resultado)){
                                    echo "<option value= $dados[id_aluno]>$dados[nomealuno]</option>";
                                 }
                               
                               ?>
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="data-atraso" class="letra">Data do Atraso:</label>
                                <input type="date" class="form-control" name="data-atraso" value=<?php echo date("Y-m-d"); ?> required>
                            </div>
                             <div class="form-group">
                                <label for="motivo" class="letra">Motivo do Atraso:</label>
                                <textarea class="form-control" name="motivo" rows="3" placeholder="Descreva o motivo do atraso"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            <br>
                            <div class="form-group">
                                <a href="formulario.php" name="enviado" value=0 class="btn btn-secondary btn-block">Voltar Cadastro</a>
                            </div>
                            <div class="form-group">
                                <a href="menu.php" name="enviado" value=0 class="btn btn-secondary btn-block">Menu Principal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php
} else{
    header('Location:negado.php');
}
?>
</body>
</html>