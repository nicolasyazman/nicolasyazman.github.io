<!DOCTYPE html>
<html>
  <head>
      <script src="../../libraries/external/jquery.js"></script> 
      <link rel="stylesheet" href="./articles/article_card.css" />
  </head>
  <body>

    <?php
        // Menu bar
        require '../../structure/menu.html';
    ?>

    <div id="menu"></div>

            <?php
                require './articles/load_articles.php';
            ?> 


</body>
</html>