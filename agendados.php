<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclua a biblioteca jQuery -->
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/table.css">
    <title>Agendamento</title>
</head>

<body>
    <div class="menu">
        <a href="exportarXLS.php">Exportar para Excel</a>
        <a href="#botao2" id="imprimirRelatorio">Imprimir Relatório</a>
    </div>

    <script>
        // Adicione um ouvinte de evento ao botão
        document.getElementById('imprimirRelatorio').addEventListener('click', function() {
            // Chame a função de impressão do navegador
            window.print();
        });
    </script>

    <?php
    // Verifica se há uma mensagem de sucesso na URL (parâmetro GET)
    if (isset($_GET["message"])) {
        $mensagem = urldecode($_GET["message"]);
        echo $mensagem;
    }
    ?>

    <div class="tabela-container">
        <h2>Agendados</h2>
        <!-- Lista de compromissos na agenda -->
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Horário</th>
            </tr>
            <?php
            include "cadastrar.php";
            ?>

        </table>
    </div>

    <script src="./js/main.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>