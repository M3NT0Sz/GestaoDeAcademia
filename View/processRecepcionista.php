<?php
session_start();
require_once '../controller/Controller.php';
$controller = new Controller();

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
} else {
    $_SESSION['recepcionista'] = "Preencha todos os campos!";
    header('Location: ./Pages/Recepcionista.php');
    die();
}

if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $elements = $controller->getFilteredAlunos($search);
    $_SESSION['alunos'] = $elements;
    die();
} else {
    $_SESSION['alunos'] = "";
}

if (!empty($_POST['id']) && $_POST['type'] == "delete") {
    $id = $_POST['id'];
    $controller->deleteProduct($id);
    header("location: ./pages/Recepcionista.php");
    die();
}
