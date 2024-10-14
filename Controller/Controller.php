<?php
require_once(__DIR__ . '/../model/Database.php');
require_once(__DIR__ . '/../model/Aluno.php');
require_once(__DIR__ . '/../model/Exercicio.php');
require_once(__DIR__ . '/../model/Aula.php');

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

    public function cadastrarAula($nome, $descricao, $data, $hora, $duracao)
    {
        $aulas = new Aulas($nome, $descricao, $data, $hora, $duracao);
        $this->database->inserirAulas($aulas);
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
                '<form method="POST" action="../processRecepcionista.php">' .
                '<input type="hidden" name="id" value="' . $aluno["id"] . '">' .
                '<input type="hidden" name="type" value="editar">' .
                '<input type="submit" value="Editar">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function getFilteredAluno(string $nome)
    {
        $alunos = $this->database->getAlunoByNome($nome);
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
                '<form method="POST" action="../processRecepcionista.php">' .
                '<input type="hidden" name="id" value="' . $aluno["id"] . '">' .
                '<input type="hidden" name="type" value="editar">' .
                '<input type="submit" value="Editar">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function editAlunoById($id)
    {
        $alunos = $this->database->getAlunoByID($id);
        $elements = '';
        foreach ($alunos as $aluno) {
            $elements .= '<input type="hidden" name="id" value="' . $aluno["id"] . '">' .
                '<input type="text" name="nome" value="' . $aluno["nome"] . '">' .
                '<input type="text" name="cpf" value="' . $aluno["cpf"] . '">' .
                '<input type="email" name="email" value="' . $aluno["email"] . '">' .
                '<input type="text" name="telefone" value="' . $aluno["telefone"] . '">' .
                '<input type="text" name="endereco" value="' . $aluno["endereco"] . '">' .
                '<input type="date" name="dataNascimento" value="' . $aluno["dataNascimento"] . '">' .
                '<input type="submit" value="Editar">';
        }

        return $elements;
    }

    public function updateAluno(int $id, string $nome, string $cpf, string $email, string $telefone, string $endereco, string $dataNascimento)
    {
        $alunos = new Aluno($nome, $cpf, $email, $telefone, $endereco, $dataNascimento);
        $this->database->updateAlunoById($alunos, $id);
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

    public function getAulas()
    {
        $aulas = $this->database->getAulaByNome("");
        $elements = '';
        foreach ($aulas as $aula) {
            $elements .= '<div>' . $aula["nome_aula"] . '</div>' .
                '<div>' . $aula["descricao_aula"] . '</div>' .
                '<div>' . $aula["date_aula"] . '</div>' .
                '<div>' . $aula["hora_aula"] . '</div>' .
                '<div>' . $aula["duracao"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processamentoInstrutor.php">' .

                '<input type="hidden" name="type" value="delete">' .
                '<input type="submit" value="X">' .
                '</form>' .
                '</div>' .
                '</div>';
        }

        return $elements;
    }

    public function getFilterAulas(string $nome)
    {
        $aulas = $this->database->getAulaByNome($nome);
        $elements = '';
        foreach ($aulas as $aula) {
            $elements .= '<div>' . $aula["nome_aula"] . '</div>' .
                '<div>' . $aula["descricao_aula"] . '</div>' .
                '<div>' . $aula["data_aula"] . '</div>' .
                '<div>' . $aula["hora_aula"] . '</div>' .
                '<div>' . $aula["duracao"] . '</div>' .
                '<div>' .
                '<form method="POST" action="../processamentoInstrutor.php">' .
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
