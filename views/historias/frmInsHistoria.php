<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova História - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?> assets/style.css"> </head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Adicionar Nova História</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=listar_historias_admin">Gerenciar Histórias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Nova</li>
            </ol>
        </nav>

        <div class="card p-4 shadow-sm">
            <form action="<?php echo BASE_URL; ?>index.php?action=processar_adicao_historia" method="POST">
                <div class="mb-3">
                    <label for="nomeH" class="form-label">Nome da História:</label>
                    <input type="text" class="form-control" id="nomeH" name="nomeH" required>
                </div>
                <div class="mb-3">
                    <label for="generoH" class="form-label">Gênero:</label>
                    <input type="text" class="form-control" id="generoH" name="generoH" required>
                </div>
                <div class="mb-3">
                    <label for="descricaoH" class="form-label">Descrição da História:</label>
                    <textarea class="form-control" id="descricaoH" name="descricaoH" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-success me-2">Salvar História</button>
                <a href="<?php echo BASE_URL; ?>index.php?action=listar_historias_admin" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>