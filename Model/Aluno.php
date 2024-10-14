<?php
class Aluno
{
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $dataNascimento;

    public function __construct($nome, $cpf, $email, $telefone, $endereco, $dataNascimento)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->dataNascimento = $dataNascimento;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
}
