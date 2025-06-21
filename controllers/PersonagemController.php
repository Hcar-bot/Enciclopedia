<?php

require_once __DIR__ . '/../models/Personagem.php';

class PersonagemController {
    private $personagemModel;

    public function __construct() {
        $this->personagemModel = new Personagem();
    }

    public function listarPublico() {
        $personagens = $this->personagemModel->lerTodos(); 
        require_once __DIR__ . '/../views/personagens/public_list.php'; 
    }

    public function detalhesPublico() {
        $id = $_GET['id'] ?? null; 

        if ($id) {
            if ($this->personagemModel->lerUm($id)) {
                $personagem = $this->personagemModel; 
                require_once __DIR__ . '/../views/personagens/detalhes_publico.php'; 
            } else {
                echo "<h1>Personagem não encontrado!</h1>";
                echo '<p><a href="index.php?action=listar_personagens_publico" class="btn btn-secondary">Voltar para a lista</a></p>';
            }
        } else {
            header("Location: index.php?action=listar_personagens_publico");
            exit();
        }
    }

    public function listarAdmin() {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }

        $personagens = $this->personagemModel->lerTodos();
        require_once __DIR__ . '/../views/personagens/admin_list.php'; 
    }

    
    public function inserir() {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }

        $mensagem = []; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->personagemModel->nome = $_POST['nome'] ?? '';
            $this->personagemModel->descricao = $_POST['descricao'] ?? '';
            $this->personagemModel->imagem_url = $_POST['imagem_url'] ?? '';
            $this->personagemModel->tipo = $_POST['tipo'] ?? '';

            if (empty($this->personagemModel->nome) || empty($this->personagemModel->tipo)) {
                $mensagem = ['tipo' => 'erro', 'texto' => 'Nome e Tipo são campos obrigatórios.'];
            } else {
                if ($this->personagemModel->criar()) {
                    $mensagem = ['tipo' => 'sucesso', 'texto' => 'Personagem adicionado com sucesso!'];
                    $this->personagemModel->nome = '';
                    $this->personagemModel->descricao = '';
                    $this->personagemModel->imagem_url = '';
                    $this->personagemModel->tipo = '';
                } else {
                    $mensagem = ['tipo' => 'erro', 'texto' => 'Erro ao adicionar personagem. Verifique o nome (pode ser duplicado).'];
                }
            }
        }
        require_once __DIR__ . '/../views/personagens/inserir.php';
    }

    public function editar() {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        echo "Página de Edição de Personagem (em construção)";
    }

    public function deletar() {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }

        $id = $_GET['id'] ?? null;
        if ($id && $this->personagemModel->id = $id) { 
            if ($this->personagemModel->deletar()) {
                header("Location: index.php?action=listar_personagens_admin&mensagem=sucesso_delete");
                exit();
            } else {
                header("Location: index.php?action=listar_personagens_admin&mensagem=erro_delete");
                exit();
            }
        } else {
            header("Location: index.php?action=listar_personagens_admin");
            exit();
        }
    }
}