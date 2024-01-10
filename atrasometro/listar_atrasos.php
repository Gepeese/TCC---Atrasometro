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
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
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

    <div class="container" style="margin-top: 40px">

        <center>
            <h3>Lista de Atrasos</h3>
        </center>
        <br>
        <br>
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">Nome do aluno</th>
                    <th scope="col" style="min-width: 120px;">Nº da matrícula</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horario</th>
                     <th scope="col">Motivo</th>

                    <th scope="col" style="min-width: 148px;">
                        <center>Ação</center>
                    </th>
                </tr>
            </thead>


            <?php
            include 'conexao.php';
            $sql = "SELECT * FROM `atrasos`";
            $sql = "SELECT 
            alunos.nomealuno,
            alunos.matricula,
            atrasos.data_atraso,
            atrasos.hora_atraso,
            atrasos.motivo,
            atrasos.id
            FROM
            alunos   
            JOIN
            atrasos ON atrasos.codaluno = alunos.id_aluno";
            $busca = mysqli_query($conexao,$sql);

            while ($array = mysqli_fetch_array($busca)) {
                
                $id = $array['id'];
                $matricula = $array['matricula']; 
                $nome = $array['nomealuno'];
                $data_atraso = date("d/m/Y", strtotime($array['data_atraso']));
                $hora_atraso = $array['hora_atraso'];
                $motivo = $array['motivo'];


    

        ?>
            <tr>
                <td style="vertical-align: inherit;"> <?php echo $nome ?> </td>
                <td style="vertical-align: inherit;"> <?php echo $matricula ?> </td>
                <td style="vertical-align: inherit;"> <?php echo $data_atraso ?> </td>
                <td style="vertical-align: inherit;"> <?php echo $hora_atraso ?> </td>
                <td style="vertical-align: inherit;"> <?php echo $motivo ?> </td>
                <td style="vertical-align: inherit;">
                    <center>
                        <?php 
                        if(($nivel == 1)||($nivel == 2)){
                        ?>
                        
                        <a href="editar_atraso.php?id=<?php echo $id ?>" role="button"
                            class="btn btn-dark btn-sm"><i class="far fa-edit"></i>&nbsp; Editar</a>
                        
                        <?php } ?>
                        <?php 
                        if(($nivel == 1)){
                        ?>
                        <a href="#" role="button" class="btn btn-danger btn-sm" onclick="confirmarExclusao(<?php echo $id; ?>)">
                <i class="far fa-trash-alt"></i>&nbsp; Excluir
            </a>
                        <?php } ?>
                    </center>
                </td>
                <script>
    function confirmarExclusao(id) {
        if (confirm("Tem certeza que deseja excluir este registro?")) {
            window.location.href = 'deletar_atraso.php?id=' + id;
        }
    }
</script>
                <?php } ?>

                
    
    
    <?php
    // Exiba o aviso para alunos com 3 ou mais atrasos
    if (!empty($alunosComAtrasos)) {
        echo "<p>Aviso: Os seguintes alunos têm 3 ou mais atrasos:</p>";
        echo "<ul>";
        foreach ($alunosComAtrasos as $aluno) {
            echo "<li>{$aluno['nomealuno']} - {$aluno['total_atrasos']} atrasos</li>";
        }
        echo "</ul>";
    }
    ?>
</div>
            </div>

            </tr>
        </table>

        <div style="text-align: right; margin-top:20px;">
            <a href="formulario.php" role="button" class="btn btn-success btn-sm">Cadastrar Novo atraso</a>
            <a href="relatorio.php" role="button" class="btn btn-dark btn-sm">Gerar Relatório</a>
            <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>

        </div>

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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>

    <script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                "search": "Pesquisar:"
            }
        });
    });
    </script>
    

        <?php
} else{
    header('Location:negado.php');
}



    ?>

</body>

</html>