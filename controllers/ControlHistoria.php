<?php

use DAL\Historia as DALHistoria; 
use MODEL\Historia as ModelHistoria; 


class ControlHistoria
{
    private $dalHistoria; 

    public function __construct()
    {
        $this->dalHistoria = new DALHistoria(); 
    }

    public function listagemPub(): void
    {
        $historias = $this->dalHistoria->SelectAll(); 

        
        require_once __DIR__ . '/../views/historias/lista_publica.php'; 
    }

   public function detailsPub(): void
    {
        $id = filter_input(INPUT_GET, 'idH', FILTER_VALIDATE_INT);

        if ($id) {
            $historia = $this->dalHistoria->SelectById($id);
            if ($historia) {
                require_once __DIR__ . '/../views/historias/detalhes_publico.php';
            } else {
                header("Location: " . BASE_URL . "index.php?action=listar_historias_publico&erro=HistoriaNaoEncontrada");
                exit();
            }
        } else {
            header("Location: " . BASE_URL . "index.php?action=listar_historias_publico&erro=IDInvalido");
            exit();
        }
    }

    public function listagemAdmin(): void
{
    
    $historias = $this->dalHistoria->SelectAll();
    require_once __DIR__ . '/../views/historias/lista_admin.php'; 
}

    public function showFormAdd(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        require_once __DIR__ . '/../views/historias/frmInsHistoria.php';
    }

    public function processAdd(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nomeH'] ?? '';
            $genero = $_POST['generoH'] ?? '';
            $descricao = $_POST['descricaoH'] ?? '';

            if (empty($nome) || empty($genero) || empty($descricao)) {
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=campos_vazios");
                exit();
            }

            try {
                $novaHistoria = new ModelHistoria(
                    null, 
                    $nome,
                    $genero,
                    $descricao,
                    null, 
                    null  
                );

                $sucesso = $this->dalHistoria->Insert($novaHistoria);

                if ($sucesso) {
                    header("Location: index.php?action=listar_historias_admin&mensagem=sucesso_inserir");
                    exit();
                } else {
                    header("Location: index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=falha_db");
                    exit();
                }
            } catch (Exception $e) {
                error_log("Erro ao processar adição de história: " . $e->getMessage());
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=excecao");
                exit();
            }
        } else {
            header("Location: index.php?action=show_form_add_historia"); 
            exit();
        }
    }

    public function showFormEdit(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: " . BASE_URL . "index.php?action=mostrar_login&erro=2");
            exit();
        }

        $id = filter_input(INPUT_GET, 'idH', FILTER_VALIDATE_INT);

        if ($id) {
            $historia = $this->dalHistoria->SelectById($id);
            if ($historia) {
                require_once __DIR__ . '/../views/historias/frmEdtHistoria.php';
            } else {
                header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=HistoriaNaoEncontrada");
                exit();
            }
        } else {
            header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=IDInvalido");
            exit();
        }
    }
   

    public function processEdit(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: " . BASE_URL . "index.php?action=mostrar_login&erro=2");
            exit();
        }

        $idH = filter_input(INPUT_POST, 'idH', FILTER_VALIDATE_INT);
        $nomeH = filter_input(INPUT_POST, 'nomeH', FILTER_SANITIZE_SPECIAL_CHARS);
        $generoH = filter_input(INPUT_POST, 'generoH', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricaoH = filter_input(INPUT_POST, 'descricaoH', FILTER_SANITIZE_SPECIAL_CHARS);


        if ($idH && $nomeH && $generoH && $descricaoH) {
            $historia = new ModelHistoria($idH, $nomeH, $generoH, $descricaoH);
            
            if ($this->dalHistoria->Update($historia)) {
                header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=sucesso_editar");
                exit();
            } else {
                header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=falha_db");
                exit();
            }
        } else {
            header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=dados_invalidos");
            exit();
        }
    }

public function processDelete(): void
{
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: " . BASE_URL . "index.php?action=mostrar_login&erro=2");
        exit();
    }

    $idH = filter_input(INPUT_GET, 'idH', FILTER_VALIDATE_INT);

    if ($idH) {
        if ($this->dalHistoria->Delete($idH)) {
            header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=sucesso_deletar");
            exit();
        } else {
            header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_deletar&motivo=falha_db");
            exit();
        }
    } else {
        header("Location: " . BASE_URL . "index.php?action=listar_historias_admin&mensagem=erro_deletar&motivo=IDInvalido");
        exit();
    }
}

}




