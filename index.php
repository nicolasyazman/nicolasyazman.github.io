<!DOCTYPE html>
<html>
  <head>
      <title>Nostalgia</title>
      <script src="libraries/external/jquery.js"></script>  
      <link rel="stylesheet" href="/structure/menu.css" />
  </head>
  <body>
    <?php
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      require $root . '/structure/menu.html';
    ?>
    <div>
      <p>Hello world.</p>
    </div>
  </body>
</html>