<?php
session_start();
require_once '../controller/Controller.php';
$controller = new Controller();

if (!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['endereco']) && !empty($_POST['dataNascimento'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dataNascimento = $_POST['dataNascimento'];
    $controller->updateAluno($id, $nome, $cpf, $email, $telefone, $endereco, $dataNascimento);
    header("location: ./Pages/Recepcionista.php");
    die();
}

if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['endereco']) && !empty($_POST['dataNascimento'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dataNascimento = $_POST['dataNascimento'];
    $controller->cadastrarAluno($nome, $cpf, $email, $telefone, $endereco, $dataNascimento);
    $_SESSION['recepcionista'] = "Aluno cadastrado com sucesso!";
    header('Location: ./Pages/Recepcionista.php');
    die();
}

if ($_POST['type'] == "search") {
    if (!empty($_POST['search']) && $_POST['type'] == "search") {
        $search = $_POST['search'];
        $elements = $controller->getFilteredAluno($search);
        $_SESSION['searchAluno'] = $elements;
        header("Location: ./Pages/Recepcionista.php");
        die();
    } else {
        $_SESSION['searchAluno'] = "";
        header("Location: ./Pages/Recepcionista.php");
        die();
    }
}

if (!empty($_POST['id']) && $_POST['type'] == "delete") {
    $id = $_POST['id'];
    $controller->deleteAluno($id);
    header("location: ./pages/Recepcionista.php");
    die();
}

if (!empty($_POST['id']) && $_POST['type'] == "editar") {
    $id = $_POST['id'];
    $_SESSION['id'] = $id;
    header("location: ./pages/EditAluno.php");
    die();
}
