<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/Enciclopedia/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/Enciclopedia/MODEL/Usuario.php";

use DAL\Conexao;
use MODEL\Usuario as ModelUsuario;

class Usuario
{
    public function autenticar(string $email) 
    {
        $sql = "SELECT id, nome_usuario, email, senha FROM usuarios WHERE email = ? LIMIT 1;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($email)); 
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        if ($linha) {
            $usuario = new ModelUsuario();
            $usuario->setId($linha['id']);
            $usuario->setNome($linha['nome_usuario']); 
            $usuario->setUsername($linha['email']);    
            $usuario->setSenha($linha['senha']);
            return $usuario;
        }
        return null;
    }
}