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
            $pdo = $this->conexao->conecta();
            $sql = "SELECT idH, nomeH, generoH, descricaoH, data_addH, data_updateH FROM historia WHERE idH = :idH";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idH', $id, \PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($row) {
                return new ModelHistoria(
                    $row['idH'],
                    $row['nomeH'],
                    $row['generoH'],
                    $row['descricaoH'],
                    $row['data_addH'],
                    $row['data_updateH']
                );
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            error_log("Erro no DB (DAL Historia::SelectById): " . $e->getMessage());
            return null; 
        } finally {
            $this->conexao->desconecta();
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

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro DAL/Historia::Insert - " . $e->getMessage());
            return false;
        }
    }

  public function Update(ModelHistoria $historia)
    {
        try {
            $pdo = $this->conexao->conecta();
            $sql = "UPDATE historia SET nomeH = :nomeH, generoH = :generoH, descricaoH = :descricaoH, data_updateH = NOW() WHERE idH = :idH";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':nomeH', $historia->getNome());
            $stmt->bindValue(':generoH', $historia->getGen());
            $stmt->bindValue(':descricaoH', $historia->getDesc());
            $stmt->bindValue(':idH', $historia->getId()); 

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            error_log("Erro no DB (DAL Historia::Update): " . $e->getMessage());
            return false;
        } finally {
            $this->conexao->desconecta();
        }
    }


public function Delete(int $id)
{
    try {
        $pdo = $this->conexao->conecta();
        $sql = "DELETE FROM historia WHERE idH = :idH";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':idH', $id);

        $stmt->execute();
        return true;
    } catch (\PDOException $e) {
        error_log("Erro no DB (DAL Historia::Delete): " . $e->getMessage());
        return false;
    } finally {
        $this->conexao->desconecta();
    }
}

}
