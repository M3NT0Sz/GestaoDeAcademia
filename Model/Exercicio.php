<?php
class Exercicio
{
    private $nome;
    private $descricao;
    private $repeticoes;
    private $series;

    public function __construct($nome, $descricao, $repeticoes, $series)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->repeticoes = $repeticoes;
        $this->series = $series;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getRepeticoes()
    {
        return $this->repeticoes;
    }

    public function getSeries()
    {
        return $this->series;
    }
}
