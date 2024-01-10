<?php

include 'conexao.php';

$matricula = $_POST['matricula'];
$nomealuno = strtoupper($_POST['nomealuno']);
$num_curso = $_POST['num_curso'];

// Verifica se o curso já existe
$sqlVerificaCurso = "SELECT id_curso FROM cursos WHERE num_curso = '$num_curso'";
$resultVerificaCurso = mysqli_query($conexao, $sqlVerificaCurso);

$row = mysqli_fetch_assoc($resultVerificaCurso);

$id_curso = $row['id_curso'];

        // Insere o aluno usando o ID do curso
        $sql = "INSERT INTO alunos (matricula, nomealuno, cursoaluno) VALUES ('$matricula', '$nomealuno', $id_curso)";
        $inserir = mysqli_query($conexao, $sql);

?>


                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                    <style>
                        a.botao {
                            background: #A88D1F;
                        }

                        a.letra {
                            color: #FFFFFF;
                        }
                    </style>

                    <div class="container" style="width: 500px; margin-top: 30px;">
                        <center>
                            <h4>Aluno adicionado com sucesso!</h4>
                        </center>
                        <div style="padding-top: 20px;">
                            <center>
                                <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
                            </center>
                        </div>
                    </div>

