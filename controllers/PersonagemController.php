
<?php
require_once __DIR__ . '/../DAL/Personagem.php';


use DAL\Personagem as DALPersonagem;

class PersonagemController
{
    private $dalPersonagem;

    public function __construct()
    {
        $this->dalPersonagem = new DALPersonagem();
    }

    public function listarPublico()
    {
        $personagens = $this->dalPersonagem->Select(); 
        include_once 'views/personagens/public_list.php';
    }

    public function listarAdmin()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=mostrar_login');
            exit();
        }
        $personagens = $this->dalPersonagem->Select(); 
        include_once 'views/personagens/admin_list.php';
    }

    public function detalhesPublico()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $personagem = $this->dalPersonagem->SelectById($id); 
            if ($personagem) {
                include_once 'views/personagens/detalhes_publico.php';
            } else {
                echo "Personagem não encontrado.";
            }
        } else {
            echo "ID do personagem não fornecido.";
        }
    }


    public function inserir()
    {
   
        include_once 'views/personagens/inserir.php';
    }

    public function editar()
    {
        
        echo "Lógica de edição aqui (ainda será implementada com a nova arquitetura).";
    }

    public function deletar()
    {
        echo "Lógica de deleção aqui (ainda será implementada com a nova arquitetura).";
    }
}