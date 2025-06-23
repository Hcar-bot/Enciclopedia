<?php

namespace DAL;


use MODEL\Historia as ModelHistoria; 
use PDO; 
use PDOException; 

class Historia
{
    private $conexao_pdo;

    public function __construct()
    {
        $this->conexao_pdo = Conexao::conectar();
    }

    public function SelectAll(): array
    {
        try {
            $sql = "SELECT * FROM historia"; 
            $stmt = $this->conexao_pdo->prepare($sql);
            $stmt->execute();

            $historias = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
                $historias[] = new ModelHistoria(
                    $row['idH'] ?? null,
                    $row['nomeH'],
                    $row['generoH'],
                    $row['descricaoH'],
                    $row['data_addH'] ?? null,
                    $row['data_updateH'] ?? null
                );
            }
            return $historias;
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::SelectAll - " . $e->getMessage());
            return []; 
        }
    }

    public function SelectById(int $id): ?ModelHistoria
    {
        try {
            $sql = "SELECT * FROM historia WHERE idH = :idH";
            $stmt = $this->conexao_pdo->prepare($sql);
            $stmt->bindValue(':idH', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                
                return new ModelHistoria(
                    $row['idH'] ?? null,
                    $row['nomeH'],
                    $row['generoH'],
                    $row['descricaoH'],
                    $row['data_addH'] ?? null,
                    $row['data_updateH'] ?? null
                );
            }
            return null; 
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::SelectById - " . $e->getMessage());
            return null;
        }
    }

    
    public function Insert(ModelHistoria $historia): bool
    {
        try {
            $sql = "INSERT INTO historia (nomeH, generoH, descricaoH) VALUES (:nomeH, :generoH, :descricaoH)";
            $stmt = $this->conexao_pdo->prepare($sql);

            $stmt->bindValue(':nomeH', $historia->getNome());
            $stmt->bindValue(':generoH', $historia->getGen());
            $stmt->bindValue(':descricaoH', $historia->getDesc());

            return $stmt->execute(); // Retorna true ou false
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::Insert - " . $e->getMessage());
            return false;
        }
    }

    public function Update(ModelHistoria $historia): bool
    {
        try {
            $sql = "UPDATE historia SET nomeH = :nomeH, generoH = :generoH, descricaoH = :descricaoH, data_updateH = NOW() WHERE idH = :idH";
            $stmt = $this->conexao_pdo->prepare($sql);

            $stmt->bindValue(':nomeH', $historia->getNome());
            $stmt->bindValue(':generoH', $historia->getGen());
            $stmt->bindValue(':descricaoH', $historia->getDesc());
            $stmt->bindValue(':idH', $historia->getId(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::Update - " . $e->getMessage());
            return false;
        }
    }

    public function Delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM historia WHERE idH = :idH";
            $stmt = $this->conexao_pdo->prepare($sql);
            $stmt->bindValue(':idH', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::Delete - " . $e->getMessage());
            return false;
        }
    }
}
