<?php

session_start();
require_once '../controller/Controller.php';
$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['type']) && $_POST['type'] === 'search') {
        if (!empty($_POST['search'])) {
            $search = $_POST['search'];
            $elements = $controller->getFilterAulas($search);
            $_SESSION['searchAula'] = $elements;
            header('Location: ./Pages/Instrutor.php');
            die();
        } else {
            $_SESSION['searchAula'] = "";
            header('Location: ./Pages/Instrutor.php');
            die();
        }
    } else {
        if (!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['data']) && !empty($_POST['hora']) && !empty($_POST['duracao'])) {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $duracao = $_POST['duracao'];
            $controller->cadastrarAula($nome, $descricao, $data, $hora, $duracao);
            $_SESSION['instrutor'] = "Aula cadastrada com sucesso!";
            header('Location: ./Pages/Instrutor.php');
            die();
        } else {
            $_SESSION['instrutor'] = "Preencha todos os campos!";
            header('Location: ./Pages/Instrutor.php');
            die();
        }
    }
}
?>
