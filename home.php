<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Pagina Inicial</title>
</head>
<body>
    <header>
        <h1 class="tituloLogo">EncicloGames</h1>
    </header>
    <main>
    <div class="titulobox" style="justify-content: baseline;">
        <h1 class="titulo">Bem-vindo à Enciclopédia!</h1>
        <br>
        <p class="texto">Explore personagens, mundos e colecionáveis do seu jogo favorito.</p>
        <br><br>
        <div style="display: flex; gap: 15px;">
        <button class="button" onclick="location.href='index.php?action=listar_historias_publico'">Ver Histórias</button>
        <button class="button" onclick="location.href='index.php?action=listar_personagens_publico'">Ver Personagens</button>
        <button class="button" onclick="location.href='index.php?action=mostrar_login'">Área Administrativa (Login)</button>
            </div>
    </div>
  </main>
<footer class="rodapé" >
    <p>Todos os direitos reservados @ 2025 | FEMA </p>
</footer>
</body>
</html>