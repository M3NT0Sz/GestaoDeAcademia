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

    public function getAlunoByID($id)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aluno WHERE id = " . $id;
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function updateAlunoById($alunos, $id)
    {
        $connection = $this->connectDB();
        $query = "UPDATE aluno SET nome = '" . $alunos->getNome() . "', cpf = '" . $alunos->getCpf() . "', email = '" . $alunos->getEmail() . "', telefone = '" . $alunos->getTelefone() . "', endereco = '" . $alunos->getEndereco() . "', dataNascimento = '" . $alunos->getDataNascimento() . "' WHERE id = " . $id;
        mysqli_query($connection, $query);
    }

    public function getExercicioByID($id)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM exercicio WHERE id = " . $id;
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function updateExercicioById($exercicio, $id)
    {
        $connection = $this->connectDB();
        $query = "UPDATE exercicio SET nome = '" . $exercicio->getNome() . "', descricao = '" . $exercicio->getDescricao() . "', repeticoes = '" . $exercicio->getRepeticoes() . "', series = '" . $exercicio->getSeries() . "' WHERE id = " . $id;
        mysqli_query($connection, $query);
    }

    public function inserirExercicio($exercicio)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO exercicio (nome, descricao, repeticoes, series) VALUES ('" . $exercicio->getNome() . "', '" . $exercicio->getDescricao() . "', '" .
            $exercicio->getRepeticoes() . "', '" . $exercicio->getSeries() . "')";
        mysqli_query($connection, $query);
    }

    public function getExercicioByNome($nome)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM exercicio WHERE nome LIKE '%" . $nome . "%'";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function InserirAulas($aulas)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO aula (nome_aula, descricao_aula, date_aula, hora_aula, duracao) VALUES ('" . $aulas->getNome() . "', '" . $aulas->getDescricao() . "', '" . $aulas->getData() . "', '" . $aulas->getHora() . "', '" . $aulas->getDuracao() . "')";
        mysqli_query($connection, $query);
    }

    public function getAulaByNome($nome)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aula WHERE nome_aula LIKE '%" . $nome . "%'";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function deleteExercicioById($id)
    {
        $connection = $this->connectDB();
        $query = "DELETE FROM exercicio WHERE id = " . $id;
        mysqli_query($connection, $query);
    }
}
