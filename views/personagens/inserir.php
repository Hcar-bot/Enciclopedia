<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Personagem - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/personagens.css">
</head>
<body>
    <?php
$nome = $_POST['nome'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$imagem_url = $_POST['imagem_url'] ?? '';

$mensagem_tipo = $mensagem['tipo'] ?? '';
$mensagem_texto = $mensagem['texto'] ?? '';
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container">
                    <h2 class="mb-4 text-center">Inserir Novo Personagem</h2>

                    <?php
                    if ($mensagem_tipo == 'sucesso') {
                        echo '<div class="alert alert-success text-center" role="alert">' . htmlspecialchars($mensagem_texto) . '</div>';
                    } elseif ($mensagem_tipo == 'erro') {
                        echo '<div class="alert alert-danger text-center" role="alert">' . htmlspecialchars($mensagem_texto) . '</div>';
                    }
                    ?>

                    <form action="index.php?action=inserir_personagem" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Personagem:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo (Ex: Herói, Inimigo, Chefe, Bot Resgatado):</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo htmlspecialchars($tipo); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="5"><?php echo htmlspecialchars($descricao); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imagem_url" class="form-label">URL da Imagem:</label>
                            <input type="url" class="form-control" id="imagem_url" name="imagem_url" value="<?php echo htmlspecialchars($imagem_url); ?>" placeholder="http://example.com/imagem.png">
                            <small class="form-text text-muted">Cole o link direto da imagem aqui.</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Adicionar Personagem</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="index.php?action=dashboard" class="btn btn-link">Voltar para o Dashboard</a>
                        <a href="index.php?action=listar_personagens_admin" class="btn btn-link">Ver Personagens (Admin)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
   