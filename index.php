<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL','/Enciclopedia');

require_once __DIR__ . '/config/autoloader.php';

require_once __DIR__ . '/controllers/AuthController.php';

require_once __DIR__ . '/controllers/ControlHistoria.php';


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
        include_once 'views/personagens/public_list.php';
        break;

    case 'detalhes_personagem_publico':
        include_once 'views/personagens/detalhes_publico.php';
        break;

    case 'listar_personagens_admin':
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        include_once 'views/personagens/admin_list.php';
        break;

    case 'editar_personagem':
        include_once 'views/personagens/frmEdtPersonagem.php';
        break;

    case 'deletar_personagem':
        include_once 'views/personagens/opRemPersonagem.php';
        break;

case 'listar_historias_publico':
    $controller = new ControlHistoria();
    $controller->listagemPub();
    break;
case 'detalhes_historia_publico':
    $controller = new ControlHistoria();
    $controller->detailsPub();
    break;

case 'listar_historias_admin':
    $controller = new ControlHistoria();
    $controller->listagemAdmin();
    break;
case 'adicionar_historia': 
    $controller = new ControlHistoria();
    $controller->showFormAdd();
    break;
case 'processar_adicao_historia': 
    $controller = new ControlHistoria();
    $controller->processAdd();
    break;
case 'editar_historia': 
    $controller = new ControlHistoria();
    $controller->showFormEdit();
    break;
case 'processar_edicao_historia':
    $controller = new ControlHistoria();
    $controller->processEdit();
    break;
case 'deletar_historia': 
    $controller = new ControlHistoria();
    $controller->processDelete();
    break;

        case 'inserir_personagem': 
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: index.php?action=mostrar_login&erro=2");
        exit();
    }
    include_once 'views/personagens/frmInsPersonagem.php';
    break;

case 'processar_insercao_personagem': 
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: index.php?action=mostrar_login&erro=2");
        exit();
    }
    include_once 'views/personagens/opInsPersonagem.php'; 
    break;

    default:
        echo "<h1>Página não encontrada ou acesso não autorizado!</h1>";
        echo '<p><a href="index.php?action=home" class="btn btn-secondary">Voltar para a Home</a></p>';
        break;
}
?>