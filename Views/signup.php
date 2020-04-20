<html>
  <head>
    <title>Chart - Cadastrar</title>
    <meta name="viewport" content="width=devive-width,initial-scale=1">
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/login.css">
  </head>
  <body>
    <div class="container">
      <h4>Cadastro</h4>
      <?php if(!empty($msg)): ?>
        <div class="warning">
          <?= $msg ?>
        </div>
      <?php endif;?>
        <form action="<?= BASE_URL?>login/signup" method="post">
            Usuário: <br>
            <input type="text" name="username"> <br><br>
            Senha: <br>
            <input type="password" name="pass"> <br><br>

            <input type="submit" value="Cadastrar">
        </form>
        <br>
        <a href="<?= BASE_URL?>login">Logar</a>
    </div>
  </body>
</html>