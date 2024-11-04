<?php
require_once 'config/database.php';
require_once 'models/Aluno.php';

class AlunosController {
    private $db;
    private $aluno;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->aluno = new Aluno($this->db);
    }

    public function index() {
        $stmt = $this->aluno->read();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/alunos/index.php';
    }

    public function create() {
        if ($_POST) {
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->telefone = $_POST['telefone'];
            $this->aluno->endereco = $_POST['endereco'];
            $this->aluno->dataNascimento = $_POST['dataNascimento'];

            if ($this->aluno->create()) {
                header("Location: index.php");
            }
        }
        include 'views/alunos/create.php';
    }

    public function edit($id) {
        $this->aluno->id = $id;
        if ($_POST) {
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->telefone = $_POST['telefone'];
            $this->aluno->endereco = $_POST['endereco'];
            $this->aluno->dataNascimento = $_POST['dataNascimento'];

            if ($this->aluno->update()) {
                header("Location: index.php");
            }
        } else {
            $stmt = $this->aluno->read();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            include 'views/alunos/edit.php';
        }
    }

    public function delete($id) {
        $this->aluno->id = $id;
        if ($this->aluno->delete()) {
            header("Location: index.php");
        }
    }
}
?>