<?php

require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $usuario = new Usuario(); 

            if ($usuario->autenticar($email, $senha)) {
                session_start(); 

                $_SESSION['logado'] = true;
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_nome'] = $usuario->nome_usuario;
                $_SESSION['usuario_email'] = $usuario->email;

                header("Location: index.php?action=dashboard"); 
                exit();
            } else {
                header("Location: index.php?action=mostrar_login&erro=1");
                exit();
            }
        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }

    public function logout() {
        session_start(); 
        session_unset();   
        session_destroy(); 
        header("Location: index.php?action=mostrar_login&logout=1");
        exit();
    }
}