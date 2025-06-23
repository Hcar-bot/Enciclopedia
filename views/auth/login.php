<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Enciclopédia </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/style.css">
    </head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="" alt="">
            <h3>Login</h3>
        </div>

        <?php
        if (isset($_GET['erro']) && $_GET['erro'] == 1) {
            echo '<div class="alert alert-danger text-center" role="alert">Email ou senha incorretos.</div>';
        }
        if (isset($_GET['logout']) && $_GET['logout'] == 1) {
            echo '<div class="alert alert-success text-center" role="alert">Você foi desconectado com sucesso.</div>';
        }
        ?>

      <form action="index.php?action=login" method="POST">
    <div class=".login">
        <input id="email_login" type="text" name="email" class="validate" required>
        <label for="email_login">Email:</label>
    </div>
    <br>
    <div class="input-field col s12">
        <input id="password_login" type="password" name="password" class="validate" required>
        <label for="password_login">Senha:</label>
    </div>
    <br>
    <button class=".btn-primary" type="submit" name="action">Entrar
    </button>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>