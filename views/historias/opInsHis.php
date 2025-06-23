<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../../index.php?action=mostrar_login&erro=2");
    exit();
}

use DAL\Historia as DALHistoria;
use MODEL\Historia as ModelHistoria; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $genero = $_POST['genero'] ?? ''; 
    $descricao = $_POST['descricao'] ?? '';
    $dataAdd = $_POST['data_add'] ?? date('Y-m-d'); 
    $dataUpdate = $_POST['data_update'] ?? date('Y-m-d');

    if (empty($nome) || empty($genero) || empty($descricao)) {
        header("Location: ../../index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=campos_vazios");
        exit();
    }

    if (strlen($descricao) > 6000) {
        header("Location: ../../index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=descricao_longa");
        exit();
    }

    try {
        $novaHistoria = new ModelHistoria(
            null,
            $nome,
            $genero,
            $descricao,
            $dataAdd,
            $dataUpdate
        );

        $dalHistoria = new DALHistoria();
        $sucesso = $dalHistoria->Insert($novaHistoria);

        if ($sucesso) {
            header("Location: ../../index.php?action=listar_historias_admin&mensagem=sucesso_inserir");
            exit();
        } else {
            header("Location: ../../index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=falha_db");
            exit();
        }
    } catch (Exception $e) {
        error_log("Erro ao inserir história: " . $e->getMessage());
        header("Location: ../../index.php?action=listar_historias_admin&mensagem=erro_inserir&motivo=excecao");
        exit();
    }
} else {
    header("Location: ../../index.php?action=inserir_historia");
    exit();
}
?>