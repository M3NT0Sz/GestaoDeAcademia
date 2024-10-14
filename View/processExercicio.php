<?php
session_start();
require_once '../controller/Controller.php';
$controller = new Controller();

if($_POST['type'] == "insert"){
    if (!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['repeticoes']) && !empty($_POST['series'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $repeticoes = $_POST['repeticoes'];
        $series = $_POST['series'];
    
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
    
            $controller->editExercicio($id, $nome, $descricao, $repeticoes, $series);
        } else {
            $controller->cadastrarExercicio($nome, $descricao, $repeticoes, $series);
        }
        
            header('Location: ./Pages/Exercicio.php');
            die();
        }
}
    
if($_POST['type'] == "search"){
    if (!empty($_POST['search']) && $_POST['type'] == "search") {
        $search = $_POST['search'];
        $elements = $controller->getFilteredExercicios($search);
        $_SESSION['searchExercicio'] = $elements;
        header("Location: ./Pages/Exercicio.php");
        die();
    } else {
        $_SESSION['searchExercicio'] = "";
        header("Location: ./Pages/Exercicio.php");
        die();
    }

}
    
if($_POST['type'] == "delete"){
    if (!empty($_POST['id']) && $_POST['type'] == "delete") {
        $id = $_POST['id'];
        $controller->deleteExercicio($id);
        header("location: ./pages/Exercicio.php");
        die();
    }
}