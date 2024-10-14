<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcionista</title>
</head>

<body>
    <form action="../processRecepcionista.php" method="post">
        <h3>Nome: <input type="text" name="nome"></h3>
        <h3>CPF: <input type="text" name="cpf"></h3>
        <h3>Email: <input type="email" name="email"></h3>
        <h3>Telefone: <input type="text" name="telefone"></h3>
        <h3>Endereço: <input type="text" name="endereco"></h3>
        <h3>Data de Nascimento: <input type="date" name="dataNascimento"></h3>
        <button>Cadastrar</button>
    </form>
    <?php
    if (isset($_SESSION['recepcionista'])) {
        echo $_SESSION['recepcionista'];
        unset($_SESSION['recepcionista']);
    }
    ?>

    <form action="../processRecepcionista.php" method="post">
        <input type="hidden" name="type" value="search">
        <input type="text" name="search" placeholder="Procurar">
        <input type="submit" value="🔎">
    </form>
    <?php

    if ($_SESSION['searchAluno'] != "") {
        echo $_SESSION['searchAluno'];
    } else {
        require_once "../../controller/Controller.php";
        $controller = new Controller();
        echo $controller->getAlunos();
    }
    ?>
</body>

</html>