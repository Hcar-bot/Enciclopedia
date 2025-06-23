<?php

class database{
    private $host = 'localhost';
    private $db_name = 'jogos';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection(){
      $this -> conn = null;
      try{
         $this -> conn = new PDO("mysql:host" . $this -> host, ";db_name=" . $this -> db_name, $this -> username, $this -> password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception){
        echo "Erro de Conexão: " . $exception -> getMessage();
        die();
      }
      return $this -> conn;
    }
}
?>