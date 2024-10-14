<?php
require_once(__DIR__ . '/../model/Database.php');
require_once(__DIR__ . '/../model/Aluno.php');
require_once(__DIR__ . '/../model/Exercicio.php');

class Controller
{
    private $database;

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "academia");
    }

    public function cadastrarAluno($nome, $cpf, $email, $telefone, $endereco, $dataNascimento)
    {
        $alunos = new Aluno($nome, $cpf, $email, $telefone, $endereco, $dataNascimento);
        $this->database->inserirAluno($alunos);
    }

    public function cadastrarExercicio($nome, $descricao, $repeticoes, $series)
    {
        $exercicio = new Exercicio($nome, $descricao, $repeticoes, $series);
        $this->database->inserirExercicio($exercicio);
    }

    public function getAlunos()
    {
        $alunos = $this->database->getAlunoByNome("");
        $elements = '';
        foreach ($alunos as $aluno) {
            $elements .= '<div>' . $aluno["nome"] . '</div>' .
                '<div>' . $aluno["cpf"] . '</div>' .
                '<div>' . $aluno["email"] . '</div>' .
                '<div>' . $aluno["telefone"] . '</div>' .
                '<div>' . $aluno["endereco"] . '</div>' .
                '<div>' . $aluno["dataNascimento"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processRecepcionista.php">' .
                '<input type="hidden" name="id" value="' . $aluno["id"] . '">' .
                '<input type="hidden" name="type" value="delete">' .
                '<input type="submit" value="X">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function getFilteredAlunos(string $name)
    {
        $alunos = $this->database->getAlunoByNome($name);
        $elements = '';
        $alunos = $this->database->getAlunoByNome($name);
        foreach ($alunos as $aluno) {
            $elements .= '<div>' . $aluno["nome"] . '</div>' .
                '<div>' . $aluno["cpf"] . '</div>' .
                '<div>' . $aluno["email"] . '</div>' .
                '<div>' . $aluno["telefone"] . '</div>' .
                '<div>' . $aluno["endereco"] . '</div>' .
                '<div>' . $aluno["dataNascimento"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processRecepcionista.php">' .
                '<input type="hidden" name="id" value="' . $aluno["id"] . '">' .
                '<input type="hidden" name="type" value="delete">' .
                '<input type="submit" value="X">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function deleteAluno(int $id)
    {
        $this->database->deleteAlunoById($id);
    }


    public function getExercicios()
    {
        $exercicios = $this->database->getExercicioByNome("");
        $elements = '';
        foreach ($exercicios as $exercicio) {
            $elements .= '<div>' . $exercicio["nome"] . '</div>' .
                '<div>' . $exercicio["descricao"] . '</div>' .
                '<div>' . $exercicio["repeticoes"] . '</div>' .
                '<div>' . $exercicio["series"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processExercicio.php">' .
                '<input type="hidden" name="id" value="' . $exercicio["id"] . '">' .
                '<input type="hidden" name="type" value="delete">' .
                '<input type="submit" value="X">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function getFilteredExercicios(string $name)
    {
        $exercicios = $this->database->getExercicioByNome($name);
        $elements = '';
        foreach ($exercicios as $exercicio) {
            $elements .= '<div>' . $exercicio["nome"] . '</div>' .
                '<div>' . $exercicio["descricao"] . '</div>' .
                '<div>' . $exercicio["repeticoes"] . '</div>' .
                '<div>' . $exercicio["series"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processExercicio.php">' .
                '<input type="hidden" name="id" value="' . $exercicio["id"] . '">' .
                '<input type="hidden" name="type" value="delete">' .
                '<input type="submit" value="X">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function editExercicio(int $id, string $descricao, int $repeticoes, int $series)
    {
        $Product = new Product($name, $descricao, $repeticoes, $series);
        $this->database->updateExercicioById($exercicio, $id);
    }

    public function deleteExercicio(int $id)
    {
        $this->database->deleteExercicioById($id);
    }
}
