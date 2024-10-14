<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio</title>
</head>

<body>
    <form action="../processExercicio.php" method="post">
        <?php
        require_once "../../controller/Controller.php";
        $controller = new Controller();
        echo $controller->editExercicioById($_SESSION['id']);
        ?>
    </form>
</body>

</html>