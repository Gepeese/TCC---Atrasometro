<?php
// Inclua o arquivo de conexão
include("conexao.php");

// Consulta SQL para recuperar os dados dos atrasos dos alunos
$sql = "SELECT
alunos.matricula,
alunos.nomealuno,
atrasos.codaluno,
atrasos.motivo,
atrasos.data_atraso,
atrasos.hora_atraso
From alunos join atrasos where alunos.id_aluno = atrasos.codaluno";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Relatório de Atrasos de Alunos</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            color: #A88D1F;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #000000;
            background-color: #FFFFFF;
            padding: 10px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #FFFFFF;
            color: #000000;
        }

        table, th, td {
            border: 1px solid #A88D1F;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f1faee;
        }

        tr:nth-child(odd) {
            background-color: #C0C0C0;
        }

        @media print {
            body {
                background-color: white;
                color: #000;
            }
           #imprimirButton, #imprimirText {
            display: none;
        }
        a#esconderlink{
             display: none;

        }
            h1 {
                background-color: white;
                color: #000;
            }

            table {
                border: 1px solid #000000;
            }
        }

        button {
            background-color: #A88D1F;
            color: #FFFFFF;
            align-items: center;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
        }
        div.center-button {
            text-align: center;
        }
         a.botao{
            background-color: #A88D1F;
            color: #FFFFFF;
            align-items: center;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            width: 140px;
            height: 45px;
            cursor: pointer;
            }
            a.letra{
                color: #FFFFFF;
            }
    </style>
</head>
<body>

    <script>
window.onload = function () {


var chart = new CanvasJS.Chart('chartContainer', {
    animationEnabled: true,
    theme: 'light2',
    title:{
        text: 'Relatorio de lucro'
    },
    axisY: {
        title: 'Lucro(R$)'
    },
    data: [{        
        type: 'column',  
        showInLegend: true,
        legendMarkerColor: 'grey',
        legendText: 'Lucro obtido',
        dataPoints: [      
            { y: ".$valores[0].", label: 'Janeiro' },
            { y: ".$valores[1].",  label: 'Feveiro' },
            { y: ".$valores[2].",  label: 'Março' },
            { y: ".$valores[3].",  label: 'Abril' },
            { y: ".$valores[4].",  label: 'Maio' },
            { y: ".$valores[5].", label: 'Junho' },
            { y: ".$valores[6].",  label: 'Julho' },
            { y:".$valores[7].",  label: 'Agosto' },
          { y: ".$valores[8].",  label: 'Setembro' },
          { y: ".$valores[9].",  label: 'Outubro' },
          { y: ".$valores[10].",  label: 'Novembro' },
          { y: ".$valores[11].",  label: 'Dezembro' }
        ]
    }]
});
chart.render();


}

</script>
</body>
</html>