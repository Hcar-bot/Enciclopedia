<?php

if (!isset($historia) || !$historia instanceof MODEL\Historia) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>História não encontrada.</div></div>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($historia->getNome()); ?> - Detalhes da História</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center"><?php echo htmlspecialchars($historia->getNome()); ?></h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=home">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=listar_historias_publico">Histórias Públicas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($historia->getNome()); ?></li>
            </ol>
        </nav>

        <div class="card p-4 shadow-sm">
            <h2 class="card-title"><?php echo htmlspecialchars($historia->getNome()); ?></h2>
            <h5 class="card-subtitle mb-3 text-muted">Gênero: <?php echo htmlspecialchars($historia->getGen()); ?></h5>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($historia->getDesc())); ?></p>
            <hr>
            <small class="text-muted">Adicionado em: <?php echo htmlspecialchars($historia->getDataAdd()); ?></small><br>
            <small class="text-muted">Última atualização: <?php echo htmlspecialchars($historia->getDataUpdate()); ?></small>
            
            <div class="mt-4">
                <a href="<?php echo BASE_URL; ?>index.php?action=listar_historias_publico" class="btn btn-primary">Voltar para a Lista de Histórias</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>