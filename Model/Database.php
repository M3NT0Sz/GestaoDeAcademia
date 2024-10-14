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

    public function inserirAluno($alunos)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO aluno (nome, cpf, email, telefone, endereco, dataNascimento) VALUES ('" . $alunos->getNome() . "', '" . $alunos->getCpf() . "', '" . $alunos->getEmail() . "', '" . $alunos->getTelefone() . "', '" . $alunos->getEndereco() . "', '" . $alunos->getDataNascimento() . "')";
        mysqli_query($connection, $query);
    }

    public function getAlunoByNome($nome)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aluno WHERE nome LIKE '%" . $nome . "%'";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function deleteAlunoById($id)
    {
        $connection = $this->connectDB();
        $query = "DELETE FROM aluno WHERE id = " . $id;
        mysqli_query($connection, $query);
    }
}
