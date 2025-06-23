
<?php


use DAL\Personagem as DALPersonagem;

$dalPersonagem = new DALPersonagem();
$personagens = $dalPersonagem->Select(); 


$all_personagens = []; 
$personagens_count = 0; 



if ($personagens instanceof \PDOStatement) {
    $all_personagens = $personagens->fetchAll(\PDO::FETCH_ASSOC);
    $personagens_count = count($all_personagens);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Personagens - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/personagens.css">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Gerenciar Personagens</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gerenciar Personagens</li>
            </ol>
        </nav>

        <div class="text-end mb-3">
            <a href="index.php?action=inserir_personagem" class="btn btn-success">Adicionar Novo Personagem</a>
        </div>

        <?php
        if (isset($_GET['mensagem'])) {
            if ($_GET['mensagem'] == 'sucesso_delete') {
                echo '<div class="alert alert-success text-center" role="alert">Personagem excluído com sucesso!</div>';
            } elseif ($_GET['mensagem'] == 'erro_delete') {
                echo '<div class="alert alert-danger text-center" role="alert">Erro ao excluir personagem.</div>';
            }
        }
        ?>

      <?php


if (isset($personagens) && $personagens) { 
    $has_results = false;
    if ($personagens instanceof \PDOStatement) { 
        $first_row = $personagens->fetch(\PDO::FETCH_ASSOC);
        if ($first_row) {
            $has_results = true;
            
            $all_personagens = $personagens->fetchAll(\PDO::FETCH_ASSOC);
            $personagens_count = count($all_personagens);
        }
    }
}
?>

<?php if ($personagens_count > 0): ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Criação</th>
                    <th>Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($all_personagens as $row):
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars(substr($row['descricao'], 0, 80))) . (strlen($row['descricao']) > 80 ? '...' : ''); ?></td>
                        <td>
                            <?php if (!empty($row['imagem_url'])): ?>
                                <img src="<?php echo htmlspecialchars($row['imagem_url']); ?>" alt="<?php echo htmlspecialchars($row['nome']); ?>" style="max-width: 50px; height: auto;">
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['data_criacao']); ?></td>
                        <td><?php echo htmlspecialchars($row['data_atualizacao'] ?? 'N/A'); ?></td>
                        <td class="action-buttons">
                            <a href="index.php?action=editar_personagem&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?action=deletar_personagem&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este personagem?');">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>


    <div class="alert alert-info text-center" role="alert">
        Nenhum personagem cadastrado ainda. <a href="index.php?action=inserir_personagem">Clique aqui para adicionar um.</a>
    </div>
<?php endif; ?>

        <div class="text-center mt-4">
            <a href="index.php?action=dashboard" class="btn btn-secondary">Voltar para o Dashboard</a>
            <a href="index.php?action=logout" class="btn btn-danger">Sair</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>