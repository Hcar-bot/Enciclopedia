<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../../index.php?action=mostrar_login&erro=2");
    exit();
}


use DAL\Personagem as DALPersonagem;
use MODEL\Personagem as ModelPersonagem; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $imagem_url = $_POST['imagem_url'] ?? null; 


    if (empty($nome) || empty($tipo) || empty($descricao)) {
        header("Location: ../../index.php?action=listar_personagens_admin&mensagem=erro_inserir&motivo=campos_vazios");
        exit();
    }

    try {
        
        $novoPersonagem = new ModelPersonagem(
            null,
            $nome,
            $tipo,
            $descricao,
            $imagem_url,
            null,
            null  
        );

        $dalPersonagem = new DALPersonagem();

        $sucesso = $dalPersonagem->Insert($novoPersonagem);

        if ($sucesso) {
            header("Location: ../../index.php?action=listar_personagens_admin&mensagem=sucesso_inserir");
            exit();
        } else {
            header("Location: ../../index.php?action=listar_personagens_admin&mensagem=erro_inserir&motivo=falha_db");
            exit();
        }

    } catch (Exception $e) {
        error_log("Erro ao inserir personagem: " . $e->getMessage()); 
        header("Location: ../../index.php?action=listar_personagens_admin&mensagem=erro_inserir&motivo=excecao");
        exit();
    }
} else {
    header("Location: ../../index.php?action=inserir_personagem");
    exit();
}
?>