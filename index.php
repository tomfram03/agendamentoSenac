<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclua a biblioteca jQuery -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Agendamento</title>
</head>

<body>
<div class="menu">
        <a href="index.php">Faça seu agendamento</a>
        <a href="https://www.sp.senac.br/senac-sorocaba" target="_blank" id="">SENAC Sorocaba</a>
        <a href="horariosDisponiveis.php" id="">Horários Ocupados</a>
    </div>

    <div class="formulario-container">
        <h1>Agendamento SENAC</h1>

        <!-- Mensagem do JavaScript -->
        <div id="mensagem"></div>

        <?php
        // Verifica se há uma mensagem de sucesso na URL (parâmetro GET)
        if (isset($_GET["message"])) {
            $mensagem = urldecode($_GET["message"]);
            echo $mensagem;
        }
        ?>
        <form method="post" action="cadastrar.php">
            <label for="nome" required>Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="data" required>Data:</label>
            <select id="data" name="data">
                <option value=""></option>
                <option value="12/09">12 de Setembro</option>
                <option value="13/09">13 de Setembro</option>
            </select>
            <label for="horario">Horário:</label>
            <select id="horario" name="horario">
                <?php
                include_once("obter_horarios_disponiveis.php");
                // echo $opcoes; 
                ?>
            </select>

            <button type="submit" onclick="ocultaMessage()">Adicionar</button>
        </form>
    </div>
    <script src="./js/main.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>