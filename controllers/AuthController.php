<?php

require_once __DIR__ . '/../MODEL/Usuario.php';
require_once __DIR__ . '/../DAL/Usuario.php';

use MODEL\Usuario as ModelUsuario;
use DAL\Usuario as DALUsuario;

class AuthController
{
    private $dalUsuario;

    public function __construct()
    {
        $this->dalUsuario = new DALUsuario();
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = $this->dalUsuario->autenticar($email);

        
            if ($usuario && password_verify($password, $usuario->getSenha())) {
               
                $_SESSION['user_id'] = $usuario->getId();
                $_SESSION['usuario_nome'] = $usuario->getNome();
                $_SESSION['logado'] = true;
                header('Location: index.php?action=dashboard');
                exit();
            } else {
                $erro = 'Credenciais inválidas.';
                include_once 'views/auth/login.php';
            }
        } else {
            include_once 'views/auth/login.php';
        }
    } 

    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=mostrar_login&mensagem=logout_sucesso');
        exit();
    } 
} 
?>