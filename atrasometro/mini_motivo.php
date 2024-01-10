<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário 1</title>
    
    <!-- Bootstrap CSS (Você pode substituir pelo seu próprio se estiver usando) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
    // Lógica PHP aqui
    // ...
?>

<!-- Seu formulário aqui -->


<!-- Bootstrap JS (Você pode substituir pelo seu próprio se estiver usando) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script para abrir a mini janela após enviar o formulário -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Adiciona um ouvinte de evento ao formulário
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            // Abre a mini janela após o envio do formulário
            openMiniMotivo();
        });
    });

    function openMiniMotivo() {
        // Abre a mini janela usando JavaScript
        window.open('mini_motivo.php', '_blank', 'width=400,height=300,top=200,left=400');
    }
</script>

</body>
</html>
