<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórias </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/style.css"> </head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center"> Histórias </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Histórias</li>
            </ol>
        </nav>

        <?php if (!empty($historias)):  ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($historias as $historia): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($historia->getNome()); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($historia->getGen()); ?></h6>
                                <p class="card-text">
                                    <?php
                                    
                                    $descricaoCurta = substr($historia->getDesc(), 0, 150);
                                    if (strlen($historia->getDesc()) > 150) {
                                        $descricaoCurta .= '...';
                                    }
                                    echo nl2br(htmlspecialchars($descricaoCurta));
                                    ?>
                                </p>
                                <a href="<?php echo BASE_URL; ?>index.php?action=detalhes_historia_publico&idH=<?php echo $historia->getId(); ?>" class="btn btn-primary btn-sm">Ver Detalhes</a>
                            </div>
                            <div class="card-footer text-muted">
                                Adicionado em: <?php echo htmlspecialchars($historia->getDataAdd()); ?>
                                <?php if (!empty($historia->getDataUpdate()) && $historia->getDataUpdate() != $historia->getDataAdd()): ?>
                                    <br>Atualizado em: <?php echo htmlspecialchars($historia->getDataUpdate()); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                Nenhuma história cadastrada ainda.
            </div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>