<?php

use MODEL\Historia;
require_once 'config/Database.php';
require_once 'MODEL/Historia.php';

class HistoriaDAO{
    private $conn;

    public function __construct(){
        $db = new Database();
        $this -> conn = $db->getConnection();
    }

    public function getAllHistorias(){
        $historias = [];
        $sql = "SELECT id, nome, genero, `desc`as descricao, dataAdd, dataUpdate FROM historia";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $historias[] = new Historia(
                $row['id'],
                $row['nome'],
                $row['genero'],
                $row['descricao'],
                $row['dataAdd'],
                $row['dataUpdate']
            );
        }
      return $historias;
    }
}