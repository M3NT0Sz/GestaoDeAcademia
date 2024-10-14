<?php
class Database
{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function connectDB()
    {
        return new mysqli($this->host, $this->user, $this->password, $this->database);
    }

    public function inserirRecepcionista($recepcionistas)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO recepcionista (nome, cpf, email, telefone, endereco, dataNascimento) VALUES ('" . $recepcionistas->getNome() . "', '" . $recepcionistas->getCpf() . "', '" . $recepcionistas->getEmail() . "', '" . $recepcionistas->getTelefone() . "', '" . $recepcionistas->getEndereco() . "', '" . $recepcionistas->getDataNascimento() . "')";
        mysqli_query($connection, $query);
    }
}
