<!DOCTYPE html>
<html>
  <head>
      <script src="/libraries/external/jquery.js"></script> 
      <link rel="stylesheet" href="/content/blog/articles/article_card.css" />
      <link rel="stylesheet" href="/structure/menu.css" />
      <link rel="stylesheet" href="/content/blog/blog.css" />
  </head>
  <body>

    <?php
        // Menu bar
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        require $root . '/structure/menu.html';
    ?>

    <div id="menu"></div>

            <div class="search-container">
                <form>
                    <input type="text" placeholder="Search.." name="search">
                </form>
            </div>        

            <?php
                $root = realpath($_SERVER["DOCUMENT_ROOT"]);
                require $root . '/content/blog/articles/load_articles.php';
            ?> 


</body>
</html>