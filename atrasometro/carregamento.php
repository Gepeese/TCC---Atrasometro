<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Carregamento</title>
    <style>
        body {
            background:url(assets/aerea.png) no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .loader-container {
            text-align: center;
            background-color: #181920;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
        }

        .loader-bar-container {
            width: 100%;
            height: 20px;
            background-color: #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .loader-bar {
            width: 0;
            height: 100%;
            background-color: #A88D1F;
            border-radius: 10px;
            transition: width 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="loader-container">
        <img src="assets/cedup3.png" alt="logo" width="200px" style="margin-bottom:20px;">
         <h2 style="color: #FFF;">Carregando...</h2>
        <div class="loader-bar-container">
            <div class="loader-bar"></div>
        </div>
    </div>

    <script>
        // Simule o carregamento da página (tempo em milissegundos)
        var tempoDeCarregamento = 5000; // 3 segundos

        // Função para atualizar a barra de progresso
        function atualizarBarraDeProgresso() {
            var barraDeProgresso = document.querySelector('.loader-bar');
            var larguraAtual = 1;
            var incremento = 1;

            var intervalo = setInterval(function() {
                if (larguraAtual >= 100) {
                    clearInterval(intervalo);
                    // Redirecionar para a próxima página após o carregamento
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Substitua pelo URL da próxima página
                    }, 1000); // Aguarde 1 segundo antes de redirecionar
                } else {
                    larguraAtual += incremento;
                    barraDeProgresso.style.width = larguraAtual + '%';
                }
            }, tempoDeCarregamento / 100);
        }

        // Iniciar a animação da barra de progresso quando a página é carregada
        window.addEventListener('load', function() {
            atualizarBarraDeProgresso();
        });
    </script>
</body>
</html>
