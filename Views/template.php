<html>
  <head>
    <title>Chart</title>
    <meta name="viewport" content="width=devive-width,initial-scale=1">
    <link rel="stylesheet" href="<?= BASE_URL?>assets/css/style.css">
  </head>
  <body>
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <div class="modal_bg" style="display: none;">
      <div class="modal_area">
        ***
      </div>
    </div>
    
    <script>
      var BASE_URL = '<?= BASE_URL ?>'
    </script>
    <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
    <script src="<?= BASE_URL?>assets/js/chat.js"></script>
    <script src="<?= BASE_URL?>assets/js/script.js"></script>
  </body>
</html>