<?php
include 'conexao.php'; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idaluno = $_POST['idaluno'];
    $dataAtraso = $_POST["data-atraso"];
    $motivo = $_POST["motivo"];
    
    // Configurar o fuso horário para Brasília, Brasil
    $brasiliaTimeZone = new DateTimeZone('America/Sao_Paulo');

    // Criar um objeto DateTime com o fuso horário de Brasília
    $dataHora = new DateTime('now', $brasiliaTimeZone);

    // Obter a hora atual
    $horaAtraso = $dataHora->format('H:i:s'); // Formato de hora: HH:MM:SS

    // Exibir a hora
    echo $horaAtraso;

    
    // Verifique se os campos não estão vazios
    if (!empty($idaluno) &&  !empty($dataAtraso) && !empty($motivo)) {
        // Preparar a instrução SQL de inserção
        $sql = "INSERT INTO atrasos(codaluno,data_atraso,motivo,hora_atraso) VALUES (?, ?, ?, ?)";
        
        // Preparar e executar a declaração usando a conexão
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
           
            $stmt->bind_param('isss',$idaluno, $dataAtraso, $motivo, $horaAtraso);
            
            if ($stmt->execute()) {

                 $id_atraso = $stmt->insert_id;
                header("Location: sucesso_atraso.php?id_atraso=$id_atraso");
                
            } else {
                header("Location: erro_atraso.php") . $stmt->error;
            }
            
            // Feche a declaração
            $stmt->close();
        } else {
            echo "Erro na preparação da declaração: " . $conexao->error;
        }
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
    
    // Feche a conexão com o banco de dados
    $conexao->close();
}
?>
