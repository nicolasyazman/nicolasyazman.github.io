<?php


        error_reporting(E_ALL);
        ini_set('display_errors', 'On');


        $dir    = './articles/metadata';
        $files1 = scandir($dir);
        $articles_content_folder = './articles/content'; 
        
        require '../../libraries/internal/Php/MyFileDecoders.php';
      //  use MyFileDecoders;
        use League\CommonMark\CommonMarkConverter;
        $markdown_converter = new CommonMarkConverter();

        foreach($files1 as $file) {
            $file_separated = explode(".", $file);
            if (count($file_separated) == 2 && $file_separated[1] == "json") {
                
                // Full file path of the metadata file
                $metadata_filepath = join("/",[$dir,$file]);

                $json_data = MyFileDecoders\decode_json_from_filepath($metadata_filepath);
                
                $article_title = $json_data["title"];
                $article_image = $json_data["image"];
                $article_full_name = $json_data["article_full_name"];
                $article_authorName = $json_data["author"];
                $article_category = $json_data["category"];
                //echo "<div>$article_title</div>";
                $article_full_path = join("/", [$articles_content_folder, $article_full_name]);    
                $article_card_html = file_get_contents('articles/article_card.html', true);

                $search = array(
                    '{$article_title}',
                    '{$article_content}',
                    '{$article_authorName}',
                    '{$article_image}',
                    '{$article_category}'
                );
                $replace = array(
                    $article_title,
                    $article_full_path,
                    $article_authorName,
                    $article_image,
                    $article_category
                );
                
                $article_card_html = str_replace($search, $replace, $article_card_html);

                echo $article_card_html;
                //include ('./articles/article_card.html');  
                // Open the associated .md file
                $article_content = MyFileDecoders\decode_markdown_from_filepath($article_full_path, $markdown_converter);

                echo $article_content;
                //echo $article_content;
            }
        }
    

?>