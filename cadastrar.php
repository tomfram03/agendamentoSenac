<?php
include_once("conexao.php");

// Define o fuso horário para São Paulo (Brasília)
date_default_timezone_set('America/Sao_Paulo');

// Obtém a hora atual no fuso horário de São Paulo
$horaAtualSaoPaulo = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['horario'])) {
        $nome = $_POST['nome'];
        $dataSelecionada = $_POST['data']; // Data selecionada no formato "dd/mm"

        // Converte a data para o formato "Y-m-d" (AAAA-MM-DD)
        list($dia, $mes) = explode('/', $dataSelecionada);
        $anoAtual = date('Y');
        $dataFormatada = date('Y-m-d', strtotime("$anoAtual-$mes-$dia"));

        $horario = $_POST['horario'];

        // Verificar se já existe um compromisso com a mesma data e horário
        $sqlVerificar = "SELECT id FROM compromissos WHERE dia = ? AND horario = ?";
        $stmtVerificar = $conn->prepare($sqlVerificar);
        $stmtVerificar->bind_param("ss", $dataFormatada, $horario);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();

        if ($resultVerificar->num_rows > 0) {
            // Já existe um compromisso agendado para esta data e horário
            $response = array("message" => "Já existe um agendamento para esta data e horário.");
            echo json_encode($response);
            // Redireciona para a página agenda.php com a mensagem como parâmetro GET
            header("Location: index.php?message=" . urlencode($response["message"]));
        } else {
            // Inserir o novo compromisso no banco de dados
            $sql = "INSERT INTO compromissos (nome, dia, horario) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nome, $dataFormatada, $horario);

            if ($stmt->execute()) {
                // Após a inserção bem-sucedida do compromisso
                $response = array("success" => true, "message" => "Agendamento adicionado com sucesso.");
                echo json_encode($response);
                // Redireciona para a página agenda.php com a mensagem como parâmetro GET
                header("Location: index.php?message=" . urlencode($response["message"]));
                exit; // Certifique-se de encerrar o script após o redirecionamento
            } else {
                echo "Erro ao adicionar o agendamento: " . $conn->error;
            }
        }
    }
}



// Fecha a conexão com o banco de dados
$conn->close();
