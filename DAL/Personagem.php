<?php

namespace DAL;

use MODEL\Personagem as ModelPersonagem;
use PDO; 
use PDOException;


class Personagem
{
    private $conexao_pdo; 
    private $id;
    private $nome;
    private $tipo;
    private $descricao;
    private $imagem_url;
    private $data_criacao;
    private $data_atualizacao;

    public function __construct()
    {
        $this->conexao_pdo = Conexao::conectar();
    }

    public function setId($id): mixed {return $this-> id = $id;}
    public function getId(): mixed {return $this->id;}
    public function setNome($nome): mixed {return $this-> nome = $nome;}
    public function getNome(): mixed {return $this->nome;}
    public function setTipo($tipo): mixed {return $this-> tipo = $tipo;}
    public function getTipo(): mixed {return $this->tipo;}
    public function setDescricao($descricao): mixed {return $this-> descricao = $descricao;}
    public function getDescricao(): mixed {return $this->descricao;}
    public function setImagemUrl($imagem_url): mixed {return $this-> imagem_url = $imagem_url;}
    public function getImagemUrl(): mixed {return $this->imagem_url;}
    public function setDataCriacao($data_criacao): mixed {return $this-> data_criacao = $data_criacao;}
    public function getDataCriacao(): mixed {return $this->data_criacao;}
    public function setDataAtualizacao($data_atualizacao): mixed {return $this-> data_atualizacao = $data_atualizacao;}
    public function getDataAtualizacao(): mixed {return $this->data_atualizacao;}


    public function Select()
    {
        
        $conn = $this->conexao_pdo; 


        $stmt = $conn->prepare("SELECT * FROM personagens");
        $stmt->execute();
        return $stmt; 
    }


    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM personagens WHERE id = ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        if ($linha) {
            $personagem = new Personagem(); 
            $personagem->setId($linha['id']);
            $personagem->setNome($linha['nome']);
            $personagem->setTipo($linha['tipo']);
            $personagem->setDescricao($linha['descricao']);
            $personagem->setImagemUrl($linha['imagem_url']);
            $personagem->setDataCriacao($linha['data_criacao']);
            $personagem->setDataAtualizacao($linha['data_atualizacao']);
            return $personagem;
        }
        return null; 
    }

   public function Insert(ModelPersonagem $personagem)
    {
        try {
            $sql = "INSERT INTO Personagem (nome, tipo, descricao, imagem_url) VALUES (:nome, :tipo, :descricao, :imagem_url)";
            $stmt = $this->conexao_pdo->prepare($sql);


            $stmt->bindValue(':nome', $personagem->getNome());
            $stmt->bindValue(':tipo', $personagem->getTipo());
            $stmt->bindValue(':descricao', $personagem->getDescricao());
            $stmt->bindValue(':imagem_url', $personagem->getImagemUrl(), \PDO::PARAM_STR); 

            
            return $stmt->execute(); 
        } catch (PDOException $e) {
            error_log("Erro ao inserir personagem (DAL): " . $e->getMessage());
            return false; 
        }
    }

    // Método para atualizar um personagem existente
    public function Update(Personagem $personagem) // Recebe um objeto MODEL\Personagem
    {
        $sql = "UPDATE personagens SET nome = ?, tipo = ?, descricao = ?, imagem_url = ?, data_atualizacao = NOW() WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array(
            $personagem->getNome(),
            $personagem->getTipo(),
            $personagem->getDescricao(),
            $personagem->getImagemUrl(),
            $personagem->getId()
        ));
        $con = Conexao::desconectar();
        return $result;
    }

    // Método para deletar um personagem
    public function Delete(int $id)
    {
        $sql = "DELETE FROM personagens WHERE id = ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}