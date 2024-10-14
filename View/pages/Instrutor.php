<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Cadastrar Aula/Treino</h2>
    <form action="../processamentoInstrutor.php" method="post">
        <label for="nome">Nome da Aula/Treino:</label>
        <input type="text" name="nome" required><br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required><br><br>

        <label for="data">Data:</label>
        <input type="date" name="data" required><br><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" required><br><br>

        <label for="duracao">Duração (minutos):</label>
        <input type="number" name="duracao" required><br><br>

        <input type="submit" value="Cadastrar">

    </form>
    <?php
    if (isset($_SESSION['instrutor'])) {
        echo $_SESSION['instrutor'];
        unset($_SESSION['instrutor']);
    }
    ?>

<form action="../processamentoInstrutor.php" method="post">
        <input type="hidden" name="type" value="search">
        <input type="text" name="search" placeholder="Procurar">
        <input type="submit" value="🔎">
    </form>
    <?php

if ($_SESSION['searchAula'] != "") {
    echo $_SESSION['searchAula'];
    
} else {
    require_once "../../controller/Controller.php";

    $controller = new Controller();

    echo $controller->getAulas();
}
?>
</body>

</html>