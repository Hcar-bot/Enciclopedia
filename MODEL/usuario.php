<?php

namespace MODEL;

class Usuario
{
    private ?int $id;
    private ?string $nome;
    private ?string $username;
    private ?string $senha; 

    public function __construct()
    {
    
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }
}