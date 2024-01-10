

<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php
       include_once("conexao.php");
       if (isset($_SESSION['logado']) && ($_SESSION['logado'] == 1)) {      
       $matricula = $_POST['codigo'] ;

       $sql="SELECT alunos.id_aluno,alunos.nomealuno,cursos.num_curso,cursos.nome_curso FROM  alunos JOIN cursos JOIN atrasos as a ON cursos.id_curso = alunos.cursoaluno WHERE  alunos.matricula =  '$matricula'";
       $resultado = mysqli_query($conexao,$sql);
       $dados = mysqli_fetch_assoc($resultado);
       $idaluno = $dados['id_aluno'];
       $nome= $dados['nomealuno'];
       $numcurso = $dados['num_curso'];
       $nomecurso = $dados['nome_curso'];

       // Verifica o número de atrasos do aluno
        $sqlNumeroAtrasos = "SELECT COUNT(*) as qtd_atrasos FROM atrasos WHERE codaluno IN (SELECT id_aluno FROM alunos WHERE matricula = '$matricula')";
        $resultadoNumeroAtrasos = mysqli_query($conexao, $sqlNumeroAtrasos);

                    if (!$resultadoNumeroAtrasos) {
                echo "Erro na consulta ao banco de dados: " . mysqli_error($conexao);
            } else {
                $qtdAtrasos = mysqli_fetch_assoc($resultadoNumeroAtrasos)['qtd_atrasos'];

                // Se o número de atrasos for maior ou igual a 3, define a flag para mostrar o alerta
                if ($qtdAtrasos >= 3) {
                    $mostrarAlerta = true;
                }
            }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
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
    <title>Cadastro de Atrasos</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Cadastro de Atrasos</h2>
                    </div>
                    <div class="card-body">
                        <form action="processa_formulario.php" method="POST" onsubmit="verificarAtrasos()">
                            <div class="form-group">
                                <label for="matricula" class="letra">Matrícula:</label>
                                <input type="text" class="form-control" name="matricula" value=<?php echo $matricula ?> valuplaceholder="Digite sua matrícula" required disabled>
                                <input type="hidden" class="form-control" name="idaluno" value=<?php echo $idaluno ?>>
                              
                            </div>
                            <div class="form-group">
                                <label for="nome" class="letra">Nome:</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo "$nome" ?>"  placeholder="Digite seu nome" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="data-atraso" class="letra" >Turma - Curso</label>
                                <input type="text" class="form-control" name=""  value="<?php echo $numcurso.' - '.$nomecurso; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="data-atraso" class="letra" >Data do Atraso:</label>
                                <input type="date" class="form-control" name="data-atraso"  value=<?php echo date("Y-m-d"); ?> required>
                            </div>
                            <div class="form-group">
                                <label for="motivo" class="letra">Motivo do Atraso:</label>
                                <textarea class="form-control" name="motivo" rows="3" placeholder="Descreva o motivo do atraso"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            <br>
                            <div class="form-group">
                                <a href="atraso.php" class="btn btn-secondary btn-block">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function verificarAtrasos() {
        <?php if ($mostrarAlerta) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Atenção!',
                html: 'Este aluno já possui 3 ou mais atrasos!<br> Encaminhar para o SOE.',
                confirmButtonColor: '#A88D1F',
            }).then((result) => {
                // Se o usuário pressionou o botão "OK", redirecione para a próxima tela
                if (result.isConfirmed) {
                    window.location.href = 'atraso.php';
                }
            });

            // Evita o envio imediato do formulário
            return false;
        <?php endif; ?>
    }

    // Adiciona um ouvinte de evento ao botão de envio do formulário
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', verificarAtrasos());
    });
</script>

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