<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Personagem - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style.css"> </head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Adicionar Novo Personagem</h1>
        <form action="index.php?action=processar_insercao_personagem" method="POST">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=listar_personagens_admin">Gerenciar Personagens</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Novo</li>
            </ol>
        </nav>

        <div class="card p-4 shadow-sm">
          <form action="<?php echo BASE_URL; ?>router.php?action=processar_insercao_personagem " method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Personagem:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo (Espécie, Classe, etc.):</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagem_url" class="form-label">URL da Imagem:</label>
                    <input type="url" class="form-control" id="imagem_url" name="imagem_url" placeholder="http://exemplo.com/imagem.png">
                    <small class="form-text text-muted">Cole o link direto da imagem, se houver.</small>
                </div>
                
                <button type="submit" class="btn btn-success me-2">Salvar Personagem</button>
                <a href="index.php?action=listar_personagens_admin" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>