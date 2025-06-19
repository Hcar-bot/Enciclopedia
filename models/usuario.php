<?php

require_once __DIR__ . '/../config/database.php'; 

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    
    public $id;
    public $nome_usuario;
    public $email;
    public $senha;
 

    
    public function __construct() {
        $this->conn = connect_db(); 
    }

 
    public function autenticar($email, $senha_digitada) {
        
        $query = "SELECT id, nome_usuario, email, senha
                  FROM " . $this->table_name . "
                  WHERE email = ?
                  LIMIT 0,1";

        
        $stmt = $this->conn->prepare($query);

       
        $stmt->bind_param("s", $email);

        $stmt->execute();

        
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            
            if (password_verify($senha_digitada, $row['senha'])) {

                $this->id = $row['id'];
                $this->nome_usuario = $row['nome_usuario'];
                $this->email = $row['email'];

                return true; 
            }
        }
        return false; 
    }

    public function criar() {
        
        $query = "INSERT INTO " . $this->table_name . "
                  SET
                    nome_usuario = ?,
                    email = ?,
                    senha = ?";

       
        $stmt = $this->conn->prepare($query);

        
        $this->nome_usuario = htmlspecialchars(strip_tags($this->nome_usuario));
        $this->email = htmlspecialchars(strip_tags($this->email));

        
        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);

        
        $stmt->bind_param("ssss", $this->nome_usuario, $this->email, $this->senha);

        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>