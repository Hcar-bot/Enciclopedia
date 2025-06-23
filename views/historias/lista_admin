<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Histórias - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Gerenciar Histórias</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php?action=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gerenciar Histórias</li>
            </ol>
        </nav>

        <?php
        if (isset($_GET['mensagem'])) {
            $mensagem = '';
            $classe_alerta = '';

            switch ($_GET['mensagem']) {
                case 'sucesso_inserir':
                    $mensagem = 'História adicionada com sucesso!';
                    $classe_alerta = 'alert-success';
                    break;
                case 'erro_inserir':
                    $motivo = $_GET['motivo'] ?? 'Desconhecido';
                    $mensagem = 'Erro ao adicionar história. Motivo: ' . htmlspecialchars($motivo);
                    $classe_alerta = 'alert-danger';
                    break;
                case 'sucesso_editar':
                    $mensagem = 'História atualizada com sucesso!';
                    $classe_alerta = 'alert-success';
                    break;
                case 'erro_editar':
                    $motivo = $_GET['motivo'] ?? 'Desconhecido';
                    $mensagem = 'Erro ao atualizar história. Motivo: ' . htmlspecialchars($motivo);
                    $classe_alerta = 'alert-danger';
                    break;
                case 'sucesso_deletar':
                    $mensagem = 'História deletada com sucesso!';
                    $classe_alerta = 'alert-success';
                    break;
                case 'erro_deletar':
                    $motivo = $_GET['motivo'] ?? 'Desconhecido';
                    $mensagem = 'Erro ao deletar história. Motivo: ' . htmlspecialchars($motivo);
                    $classe_alerta = 'alert-danger';
                    break;
            }
            echo '<div class="alert ' . $classe_alerta . ' alert-dismissible fade show" role="alert">' . $mensagem . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>

        <div class="mb-3 d-flex justify-content-end">
            <a href="<?php echo BASE_URL; ?>index.php?action=adicionar_historia" class="btn btn-success">Adicionar Nova História</a>
        </div>

        <?php if (!empty($historias)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Descrição (Prévia)</th>
                            <th scope="col">Criado Em</th>
                            <th scope="col">Atualizado Em</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historias as $historia): ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($historia->getId()); ?></th>
                                <td><?php echo htmlspecialchars($historia->getNome()); ?></td>
                                <td><?php echo htmlspecialchars($historia->getGen()); ?></td>
                                <td>
                                    <?php
                                    $descricaoCurta = substr($historia->getDesc(), 0, 100);
                                    if (strlen($historia->getDesc()) > 100) {
                                        $descricaoCurta .= '...';
                                    }
                                    echo nl2br(htmlspecialchars($descricaoCurta));
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($historia->getDataAdd()); ?></td>
                                <td><?php echo htmlspecialchars($historia->getDataUpdate()); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL; ?>index.php?action=editar_historia&idH=<?php echo $historia->getId(); ?>" class="btn btn-warning btn-sm me-1">Editar</a>
                                    <a href="<?php echo BASE_URL; ?>index.php?action=deletar_historia&idH=<?php echo $historia->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar esta história?');">Deletar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                Nenhuma história cadastrada ainda. Clique em "Adicionar Nova História" para começar!
            </div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>