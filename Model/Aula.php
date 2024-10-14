<?php

class Aulas{
    private $nome;
    private $descricao;
    private $data;
    private $hora;
    private $duracao;

    public function __construct($nome, $descricao, $data, $hora, $duracao)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->hora = $hora;
        $this->duracao = $duracao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getDuracao()
    {
        return $this->duracao;
    }
}


?>