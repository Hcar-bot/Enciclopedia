<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/PersonagemController.php'; 


$action = $_GET['action'] ?? 'home'; 


$public_actions = [
    'home',
    'mostrar_login',
    'login',
    'listar_personagens_publico', 
    'detalhes_personagem_publico' 
];

$requires_auth = !in_array($action, $public_actions);

if ($requires_auth && (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true)) {
    header("Location: index.php?action=mostrar_login&erro=2"); 
    exit();
}

switch ($action) {
    case 'home':
        echo "<h1>Bem-vindo à Enciclopédia!</h1>";
        echo "<p>Explore personagens, mundos e colecionáveis do seu jogo favorito.</p>";
        echo '<p><a href="index.php?action=listar_personagens_publico" class="btn btn-info">Ver Personagens</a></p>';
        echo '<p><a href="index.php?action=mostrar_login" class="btn btn-secondary">Área Administrativa (Login)</a></p>';
        break;

    case 'mostrar_login':
        $controller = new AuthController();
        $controller->login(); 
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        echo "<h1>Bem-vindo ao Dashboard Administrativo, " . $_SESSION['usuario_nome'] . "!</h1>";
        echo '<p><a href="index.php?action=listar_personagens_admin" class="btn btn-primary">Gerenciar Personagens</a></p>';
        echo '<p><a href="index.php?action=logout" class="btn btn-danger mt-3">Sair</a></p>';
        break;

    case 'listar_personagens_publico':
        $controller = new PersonagemController();
        $controller->listarPublico(); 
        break;

    case 'detalhes_personagem_publico':
        $controller = new PersonagemController();
        $controller->detalhesPublico(); 
        break;

    case 'listar_personagens_admin': 
        $controller = new PersonagemController();
        $controller->listarAdmin(); 
        break;

    case 'inserir_personagem': 
        $controller = new PersonagemController();
        $controller->inserir();
        break;

    case 'editar_personagem': 
        $controller = new PersonagemController();
        $controller->editar();
        break;

    case 'deletar_personagem': 
        $controller = new PersonagemController();
        $controller->deletar();
        break;

    default:
        echo "<h1>Página não encontrada ou acesso não autorizado!</h1>";
        echo '<p><a href="index.php?action=home" class="btn btn-secondary">Voltar para a Home</a></p>';
        break;
}
?>