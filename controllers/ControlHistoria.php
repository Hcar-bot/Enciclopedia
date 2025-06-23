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
        $id = $_GET['idH'] ?? null;

        if ($id !== null) { 
            $historia = $this->dalHistoria->SelectById((int)$id); 

            if ($historia) {
                require_once __DIR__ . '/../views/historias/detalhes_publicos.php'; 
            } else {
                echo "<h1>História não encontrada</h1>";
                echo '<p><a href="index.php?action=listar_historias_publico" class="btn btn-secondary">Voltar para a lista</a></p>';
            }
        } else {
            header("Location: index.php?action=listar_historias_publico");
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
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        $id = $_GET['idH'] ?? null;
        if ($id !== null) {
            $historia = $this->dalHistoria->SelectById((int)$id);
            if ($historia) {
                require_once __DIR__ . '/../views/historias/frmEdtHistoria.php';
            } else {
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=nao_encontrado");
                exit();
            }
        } else {
            header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=id_ausente");
            exit();
        }
    }

    public function processEdit(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['idH'] ?? null;
            $nome = $_POST['nomeH'] ?? '';
            $genero = $_POST['generoH'] ?? '';
            $descricao = $_POST['descricaoH'] ?? '';

            if (empty($id) || empty($nome) || empty($genero) || empty($descricao)) {
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=campos_vazios");
                exit();
            }

            try {
                $historiaExistente = $this->dalHistoria->SelectById((int)$id);
                if (!$historiaExistente) {
                    header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=nao_encontrado");
                    exit();
                }

                $historiaExistente->setNome($nome);
                $historiaExistente->setGen($genero);
                $historiaExistente->setDesc($descricao);

                $sucesso = $this->dalHistoria->Update($historiaExistente);

                if ($sucesso) {
                    header("Location: index.php?action=listar_historias_admin&mensagem=sucesso_editar");
                    exit();
                } else {
                    header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=falha_db");
                    exit();
                }
            } catch (Exception $e) {
                error_log("Erro ao processar edição de história: " . $e->getMessage());
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_editar&motivo=excecao");
                exit();
            }
        } else {
            header("Location: index.php?action=listar_historias_admin"); 
            exit();
        }
    }

    public function processDelete(): void
    {
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: index.php?action=mostrar_login&erro=2");
            exit();
        }
        $id = $_GET['idH'] ?? null; 

        if ($id !== null) {
            try {
                $sucesso = $this->dalHistoria->Delete((int)$id);

                if ($sucesso) {
                    header("Location: index.php?action=listar_historias_admin&mensagem=sucesso_deletar");
                    exit();
                } else {
                    header("Location: index.php?action=listar_historias_admin&mensagem=erro_deletar&motivo=falha_db");
                    exit();
                }
            } catch (Exception $e) {
                error_log("Erro ao processar deleção de história: " . $e->getMessage());
                header("Location: index.php?action=listar_historias_admin&mensagem=erro_deletar&motivo=excecao");
                exit();
            }
        } else {
            header("Location: index.php?action=listar_historias_admin&mensagem=erro_deletar&motivo=id_ausente");
            exit();
        }
    }
}




