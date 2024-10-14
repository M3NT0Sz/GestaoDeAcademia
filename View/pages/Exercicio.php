<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcionista</title>
</head>

<body>
    <form action="../processExercicio.php" method="post">
        <input type="hidden" name="type" value="insert">
        <h3>Nome: <input type="text" name="nome"></h3>
        <h3>Descrição: <input type="text" name="descricao"></h3>
        <h3>Repetiçoes: <input type="number" name="repeticoes"></h3>
        <h3>Séries: <input type="number" name="series"></h3>
        <input type="submit" value="Cadastrar">
    </form>
    <?php
    if (isset($_SESSION['exercicio'])) {
        echo $_SESSION['exercicio'];
        unset($_SESSION['exercicio']);
    }
    ?>

    <form action="../processExercicio.php" method="post">
        <input type="hidden" name="type" value="search">
        <input type="text" name="search" placeholder="Procurar">
        <input type="submit" value="🔎">
    </form>
    <?php

    if ($_SESSION['searchExercicio'] != "") {
        echo $_SESSION['searchExercicio'];
    } else {
        require_once "../../controller/Controller.php";

        $controller = new Controller();

        echo $controller->getExercicios();
    }
    ?>
</body>

</html>