<?php
if (!isset($personagem) || !$personagem instanceof MODEL\Personagem) {
    echo "<div class='alert alert-danger'>Nenhum personagem encontrado para edição.</div>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personagem - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/personagens.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Editar Personagem</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=listar_personagens_admin">Gerenciar Personagens</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Personagem</li>
            </ol>
        </nav>

        <div class="card p-4 shadow-sm">
            <form action="<?php echo BASE_URL; ?>index.php?action=processar_edicao_personagem" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($personagem->getId()); ?>">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Personagem:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($personagem->getNome()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo htmlspecialchars($personagem->getTipo()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="5" required><?php echo htmlspecialchars($personagem->getDescricao()); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagem_url" class="form-label">URL da Imagem:</label>
                    <input type="url" class="form-control" id="imagem_url" name="imagem_url" value="<?php echo htmlspecialchars($personagem->getImagemUrl()); ?>">
                </div>
                
                <button type="submit" class="btn btn-warning me-2">Atualizar Personagem</button>
                <a href="<?php echo BASE_URL; ?>index.php?action=listar_personagens_admin" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>