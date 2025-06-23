<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Dashboard Administrativo</title>
</head>
<body>
    <header>
        <h1 class="tituloLogo">EncicloGames</h1>
    </header>
    <main>
    <div class="titulobox2">
        <h1 class="titulo">Bem-vindo ao Dashboard Administrativo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
        <br>
        <p class="texto" style="font-size: 18px;">Escolha o que deseja fazer hoje</p>
        <br><br>
        <div style="display: flex; gap:15px;">
        <button class="button" onclick="location.href='index.php?action=listar_personagens_admin'">Gerenciar Personagens</button>
        <button class="buttonHisto" onclick="location.href='index.php?action=listar_historias_admin'">Gerenciar Histórias</button>
        <button class="buttonSair" onclick="location.href='index.php?action=logout'">Sair</button>
        </div>
    </div>
  </main>
<footer class="rodapé" >
    <p>Todos os direitos reservados @ 2025 | FEMA </p>
</footer>
</body>
</html>