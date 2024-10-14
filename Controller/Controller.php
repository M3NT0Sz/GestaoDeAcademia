<?php
require_once '../model/Database.php';
require_once '../model/Recepcionista.php';
class Controller
{
    private $database;

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "academia");
    }

    public function cadastrarRecepcionista($nome, $cpf, $email, $telefone, $endereco, $dataNascimento)
    {
        $recepcionistas = new Recepcionista($nome, $cpf, $email, $telefone, $endereco, $dataNascimento);
        $this->database->inserirRecepcionista($recepcionistas);
    }
}
