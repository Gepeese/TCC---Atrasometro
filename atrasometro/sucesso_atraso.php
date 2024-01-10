<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
    a.botao {
        background: #A88D1F;
    }

    a.letra {
        color: #FFFFFF;
    }
     button.botao{
            background-color: #A88D1F;
            color: #FFFFFF;
            align-items: center;
            border: none;
            border-radius: 5px;
            padding: 3px 3px;
            width: 110px;
            height: 33px;
            cursor: pointer;
            }
            button.letra{
                color: #FFFFFF;
            }
</style>

<div class="container" style="width: 500px; margin-top: 30px;">
    <center>
        <h4>Atraso adicionado com sucesso!</h4>
    </center>
    <div style="padding-top: 20px;">
        <center>
            <a href="menu.php" role="button" class="btn botao letra btn-sm">Voltar ao menu</a>
            <a href="atraso.php" role="button" class="btn botao letra btn-sm">Voltar tela de atraso</a>

            <?php
            // Verifique se o ID do atraso está definido
            if (isset($_GET['id_atraso'])) {
                $id_atraso = $_GET['id_atraso'];
                ?>
                <br>
                <br>
                <!-- Adicione um botão de impressão -->
               <button class="botao letra" onclick="abrirAutorizacao()">Imprimir</button>
                
                <script>
    function abrirAutorizacao() {
        // Recupere o ID do atraso
        var idAtraso = "<?php echo $id_atraso; ?>";

        // Redirecione para a página de autorização com o ID do atraso
        window.location.href = 'autorizacao.php?id_atraso=' + idAtraso;
    }
</script>


            

            <?php
            } else {
                echo "ID do atraso não foi recebido.";
            }
            ?>
        </center>
    </div>
</div>