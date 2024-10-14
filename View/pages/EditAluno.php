<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
</head>

<body>
    <form action="../processRecepcionista.php" method="post">
        <?php
        require_once "../../controller/Controller.php";
        $controller = new Controller();
        echo $controller->editAlunoById($_SESSION['id']);
        ?>
    </form>
</body>

</html>