<?php

require_once __DIR__ . '/../config/database.php'; 

class Personagem {
    private $conn;
    private $table_name = "personagens";


    public $id;
    public $nome;
    public $descricao;
    public $imagem_url;
    public $tipo;
    public $data_criacao;
    public $data_atualizacao;

    
    public function __construct() {
        $this->conn = connect_db();
    }

    public function lerTodos() {
        $query = "SELECT id, nome, descricao, imagem_url, tipo, data_criacao, data_atualizacao
                  FROM " . $this->table_name . "
                  ORDER BY nome ASC"; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result(); 
    }

    
    public function lerUm($id) {
        $query = "SELECT id, nome, descricao, imagem_url, tipo, data_criacao, data_atualizacao
                  FROM " . $this->table_name . "
                  WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc(); 

        
        if ($row) {
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->descricao = $row['descricao'];
            $this->imagem_url = $row['imagem_url'];
            $this->tipo = $row['tipo'];
            $this->data_criacao = $row['data_criacao'];
            $this->data_atualizacao = $row['data_atualizacao'];
            return true;
        }
        return false;
    }

    public function criar() {
        
        $query = "INSERT INTO " . $this->table_name . "
                  SET nome=?, descricao=?, imagem_url=?, tipo=?";

        $stmt = $this->conn->prepare($query);

        
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->imagem_url = htmlspecialchars(strip_tags($this->imagem_url));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));

        
        $stmt->bind_param("ssss", $this->nome, $this->descricao, $this->imagem_url, $this->tipo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function atualizar() {
        $query = "UPDATE " . $this->table_name . "
                  SET nome=?, descricao=?, imagem_url=?, tipo=?
                  WHERE id=?";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->imagem_url = htmlspecialchars(strip_tags($this->imagem_url));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->id = htmlspecialchars(strip_tags($this->id)); 
    
        $stmt->bind_param("ssssi", $this->nome, $this->descricao, $this->imagem_url, $this->tipo, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deletar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id)); 
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>