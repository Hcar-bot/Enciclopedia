<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/Enciclopedia/DAL/Personagem.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/Enciclopedia/MODEL/Personagem.php";

use DAL\Personagem as DALPersonagem;

$personagem = null;


$id = $_GET['id'] ?? null;

if ($id) {
    $dalPersonagem = new DALPersonagem();
    $personagem = $dalPersonagem->SelectById((int)$id); 
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Personagem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/personagens.css">
</head>
<body>
    <div class="container">

        <h1 class="center-align">Detalhes do Personagem</h1>
        <div class="row">
            <?php if ($personagem): ?>
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <?php if ($personagem->getImagemUrl()): ?>
                                <img src="<?php echo htmlspecialchars($personagem->getImagemUrl()); ?>" alt="<?php echo htmlspecialchars($personagem-> getNome()); ?>" class="responsive-img">
                            <?php endif; ?>
                            <span class="card-title black-text"><?php echo htmlspecialchars($personagem->getNome()); ?></span>
                        </div>
                        <div class="card-content">
                            <p><strong>Tipo:</strong> <?php echo htmlspecialchars($personagem->getTipo()); ?></p>
                            <p><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($personagem->getDescricao())); ?></p>
                            <p><strong>Data de Criação:</strong> <?php echo htmlspecialchars($personagem->getDataCriacao()); ?></p>
                            <p><strong>Última Atualização:</strong> <?php echo htmlspecialchars($personagem->getDataAtualizacao()); ?></p>
                        </div>
                        <div class="card-action">
                            <a href="index.php?action=listar_personagens_publico" class="waves-effect waves-light btn blue"><i class="material-icons left">arrow_back</i>Voltar à Lista</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col s12 center-align">
                    <p>Personagem não encontrado ou ID inválido.</p>
                    <a href="index.php?action=listar_personagens_publico" class="waves-effect waves-light btn blue"><i class="material-icons left">arrow_back</i>Voltar à Lista</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>