<html>
  <head>
    <title>Chart - Login</title>
    <meta name="viewport" content="width=devive-width,initial-scale=1">
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/login.css">
  </head>
  <body>
    <div class="container">
        <form action="<?= BASE_URL?>login/signin" method="post">
        <?php if(!empty($msg)): ?>
        <div class="warning">
          <?= $msg ?>
        </div>
      <?php endif;?>
            Usuário: <br>
            <input type="text" name="username"> <br><br>
            Senha: <br>
            <input type="password" name="pass"> <br><br>

            <input type="submit" value="Entrar">
        </form>
        <br>
        <a href="<?= BASE_URL?>login/signup">Cadastre-se</a>
    </div>
  </body>
</html>