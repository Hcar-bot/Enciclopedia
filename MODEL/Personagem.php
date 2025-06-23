<?php

namespace MODEL;

class Personagem
{
    private $id;
    private $nome;
    private $tipo;
    private $descricao;
    private $imagem_url;
    private $data_criacao;
    private $data_atualizacao;

   
    public function __construct(
        $id = null,
        $nome,
        $tipo,
        $descricao,
        $imagem_url = null,
        $data_criacao = null,
        $data_atualizacao = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->imagem_url = $imagem_url;
        $this->data_criacao = $data_criacao;
        $this->data_atualizacao = $data_atualizacao;
    }

   
    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getTipo() { return $this->tipo; }
    public function getDescricao() { return $this->descricao; }
    public function getImagemUrl() { return $this->imagem_url; }
    public function getDataCriacao() { return $this->data_criacao; }
    public function getDataAtualizacao() { return $this->data_atualizacao; }

   
    public function setId($id) { $this->id = $id; }
    public function setNome($nome) { $this->nome = $nome; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setDescricao($descricao) { $this->descricao = $descricao; }
    public function setImagemUrl($imagem_url) { $this->imagem_url = $imagem_url; }
    public function setDataCriacao($data_criacao) { $this->data_criacao = $data_criacao; }
    public function setDataAtualizacao($data_atualizacao) { $this->data_atualizacao = $data_atualizacao; }
}