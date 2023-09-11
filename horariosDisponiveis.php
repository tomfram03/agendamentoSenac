<?php
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/horariosOcupados.css">
</head>
<div class="menu">
    <a href="index.php">Faça seu agendamento</a>
    <a href="https://www.sp.senac.br/senac-sorocaba" target="_blank" id="">SENAC Sorocaba</a>
    <a href="horariosDisponiveis.php" id="">Horários Ocupados</a>
</div>

<body>
    <div class="container">
        <h2>Horários Ocupados</h2>
        <?php
        include_once("horariosDisponiveis1.php");
        ?>
    </div>

</body>

</html>