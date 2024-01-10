<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Negado</title>
    <style>
      
        body {
            background-color: #181920;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
        }

        h1 {
            color: #A88D1F;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            background-color: #A88D1F;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Acesso Negado</h1>
        <p>Você não tem permissão para acessar esta página.</p>
        <p>Por favor, entre em contato com o administrador para obter assistência.</p>
       
    </div>
</body>

    <script>
        // Defina o tempo em milissegundos (5 segundos neste exemplo)
        var tempoAtraso = 5000;

        // Função que retorna para a página anterior
        function retornarParaPaginaAnterior() {
            window.history.back();
        }

        // Inicie o temporizador de atraso
        setTimeout(retornarParaPaginaAnterior, tempoAtraso);

        // Atualize o contador de tempo
        var elementoTempo = document.getElementById('tempo');
        elementoTempo.textContent = (tempoAtraso / 1000); // Exibe em segundos
    </script>