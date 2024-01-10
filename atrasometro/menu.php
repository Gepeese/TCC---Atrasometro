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
    <title>Menu CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
            span.cedup{
            color: #A88D1F;
            }

            span.abilio{
            color: #fff;
            }

            nav.cedupcor{
                background: #181920;
            }
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

    <nav class="navbar navbar-light  cedupcor">
        <div class="container">
            <img src="assets/cedup3.png" width="50px" height="50px">
            <a class="navbar-brand" href="menu.php" style="font-weight: 700;"><!--<i class="fab fa-php"></i>-->&nbsp; <span class="cedup"> Cedup </span> <span class="abilio">Abílio Paulo</span></a>

            <?php 
            if($nivel != 3){

         ?>   
            <a href="atraso.php" class="btn btn-sm botao"><span style="color:#FFF">Tela - Atraso</span></a>
        <?php } ?>
            <a href="desloga.php" class="btn btn-sm botao"><span style="color:#FFF"><ion-icon name="power"></ion-icon> SAIR</span></a>

             <div style="color:#FFFFFF">
 <h5>Hora atual: <span id="horaAtual"></span></h5>
</div>

    <script>
        function atualizarSegundos() {
            var elementoHoraAtual = document.getElementById('horaAtual');
            var agora = new Date();
            var segundos = agora.getSeconds();

            // Formate os segundos com um zero à esquerda, se necessário
            var segundosFormatados = segundos < 10 ? "0" + segundos : segundos;

            elementoHoraAtual.textContent = agora.getHours() + ":" + agora.getMinutes(0) + ":" + segundosFormatados;
        }

        // Atualize os segundos a cada segundo (1000ms)
        setInterval(atualizarSegundos, 1000);

        // Inicialize a exibição dos segundos
        atualizarSegundos();
    </script>

        </div>
    </nav>


    <div class="container" style="margin-top:25px;">
        <div class="row">
            <?php 
            if($nivel != 3){
            ?>
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><ion-icon name="time"></ion-icon>&nbsp;Adicionar Atrasos</h5>
                        <p class="card-text">Adicione novos atrasos no sistema.</p>
                        <a href="formulario.php" class="btn btn-sm botao letra">Cadastrar atraso</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><ion-icon name="time"></ion-icon>&nbsp;Adicionar Aluno</h5>
                        <p class="card-text">Adicione novos alunos manualmente no sistema.</p>
                        <a href="adicionar_aluno.php" class="btn btn-sm botao letra">Cadastrar alunos</a>
                    </div>
                </div>
            </div>

            <?php } ?>

            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clipboard-list"></i>&nbsp;Lista de atrasos</h5>
                        <p class="card-text">Edite, liste, adicione e exclua os atrasos.</p>
                        <a href="listar_atrasos.php" class="btn btn-sm botao letra">Listar atrasos</a>
                    </div>
                </div>
            </div>






        

            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clipboard-list"></i>&nbsp;Lista de alunos</h5>
                        <p class="card-text">Edite, liste, adicione e exclua os alunos.</p>
                        <a href="listar_alunos.php" class="btn btn-sm botao letra">Listar alunos</a>
                    </div>
                </div>
            </div>




            <?php 
            if(($nivel == 1)||($nivel == 2)){
            ?>

            <!--

            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><ion-icon name="school"></ion-icon>&nbsp;Adicionar Alunos</h5>
                        <p class="card-text">Adicione novos alunos no sistema.</p>
                        <a href="adicionar_aluno.php" class="btn btn-sm botao letra">Cadastrar aluno</a>
                    </div>
                </div>
            </div>

        -->

        <!--
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-box"></i>&nbsp;Adicionar curso</h5>
                        <p class="card-text">Adicione novos cursos para o sistema.</p>
                        <a href="adicionar_curso.php" class="btn btn-sm botao letra">Adicionar curso</a>
                    </div>
                </div>
            </div>
        -->

         <!--
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-pencil-alt"></i>&nbsp Listar cursos</h5>
                        <p class="card-text">Edite, liste, adicione e exclua cursos cadastrados.</p>
                        <a href="listar_cursos.php" class="btn btn-sm botao letra">Listar cursos</a>
                    </div>
                </div>
            </div>
            -->

            <?php } ?>
            <?php 
            if(($nivel == 1)||($nivel == 2)){
            ?>

        <!--
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-edit"></i>&nbsp Cadastre uma turma</h5>
                        <p class="card-text">Adicione novas turmas no sistema.</p>
                        <a href="adicionar_turma.php" class="btn btn-sm botao letra" aria-disabled="true">Adicionar turma</a>
                    </div>
                </div>
            </div>
        -->

        <!--
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-id-card"></i>&nbspAdicionar funcionários</h5>
                        <p class="card-text">Adicione novos funcionários no sistema.</p>
                        <a href="adicionar_funcionario.php" class="btn btn-sm botao letra">Adicionar funcionário</a>
                    </div>
                </div>
            </div>
            <?php } ?>


            
        <!--
              <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-pencil-alt"></i>&nbsp Listar funcionários</h5>
                        <p class="card-text">Edite, liste, adicione e exclua funcionários cadastrados.</p>
                        <a href="listar_funcionarios.php" class="btn btn-sm botao letra">Listar funcionários</a>
                    </div>
                </div>
            </div>
        -->

        
            
        <!--
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-pencil-alt"></i>&nbsp Listar turmas</h5>
                        <p class="card-text">Edite, liste, adicione e exclua funcionários cadastrados.</p>
                        <a href="listar_turmas.php" class="btn btn-sm botao letra">Listar turmas</a>
                    </div>
                </div>
            </div>
        -->

            <?php 
            if(($nivel == 1)){
            ?>
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-check"></i>&nbsp Cadastrar usuários</h5>
                        <p class="card-text">Cadastre novos usuários no sistema.</p>
                        <a href="cadastro_usuario.php" class="btn btn-sm botao letra">Cadastrar novo</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php 
            if(($nivel == 1)){
            ?>
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-check"></i>&nbsp Aprovar usuários</h5>
                        <p class="card-text">Aprove os usuários que se cadastraram no sistema por meio externo.</p>
                        <a href="aprovar_usuario.php" class="btn btn-sm botao letra">Exibir lista</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    
        <?php
} else{
    header('Location:negado.php');
}
    


    ?>

</body>

</html>