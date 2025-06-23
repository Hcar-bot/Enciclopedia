<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personagens - Enciclopédia </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/personagens.css">
    </head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Historias</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?action=home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Historias</li>
            </ol>
        </nav>

        <?php if (isset($historias) && $historias->num_rows > 0): ?>
            <div class="row">
                <?php while ($row = $historias->fetch_assoc()): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                            <h5><?php echo htmlspecialchars($row['titulo']); ?></h5>
                            <p><?php echo nl2br(htmlspecialchars(substr($row['descricao'], 0, 100))) . '...'; ?></p>
                            <a href="index.php?action=detalhes_historia_publico&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">Ver Detalhes</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                Nenhuma historia postada
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="index.php?action=home" class="btn btn-secondary">Voltar para a Home</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>