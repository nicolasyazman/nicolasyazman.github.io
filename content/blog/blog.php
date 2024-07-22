<!DOCTYPE html>
<html>
  <head>
      <script src="../../libraries/external/jquery.js"></script> 
      <script> 
                $(function(){
                  $("#menu").load("../../structure/menu.html"); 
                });
      </script> 
  </head>
  <body>
    <div id="menu"></div>

            <?php
            
                    require __DIR__ . '../../../vendor/autoload.php';
                    use League\CommonMark\CommonMarkConverter;

                /**
                 * 
                 */
                function decode_markdown_from_filepath($file_path, $markdown_converter) {
                   
                    if ($file_path === null) {
                        return null;
                    }
    
                    // Read the file
                    $file_content = file_get_contents($file_path);
    
                    // Check if the file was read successfully
                    if ($file_content === false) {
                        //die('Error reading the JSON file');
                        return null;
                    }
    
                    // Decode the JSON file
                    $decoded_data = $markdown_converter->convert($file_content)->getContent();
    
                    // Check if the JSON was decoded successfully
                    if ($decoded_data === null) {
                        die('Error decoding the JSON file');
                    }
    
                        return $decoded_data;
                    
                   
                }

              function decode_json_from_filepath($file_path) {
                    if ($file_path === null) {
                        return null;
                    }

                    // Read the file
                    $file_content = file_get_contents($file_path);

                    // Check if the file was read successfully
                    if ($file_content === false) {
                        //die('Error reading the JSON file');
                        return null;
                    }

                    // Decode the JSON file
                    $decoded_data = json_decode($file_content, true);

                    // Check if the JSON was decoded successfully
                    if ($decoded_data === null) {
                        die('Error decoding the JSON file');
                    }
                    return $decoded_data;
                }

                $dir    = './articles/metadata';
                $files1 = scandir($dir);
                $articles_content_folder = './articles/content'; 
                
                $markdown_converter = new CommonMarkConverter();

                foreach($files1 as $file) {
                    $file_separated = explode(".", $file);
                    if (count($file_separated) == 2 && $file_separated[1] == "json") {
                        
                        // Full file path of the metadata file
                        $metadata_filepath = join("/",[$dir,$file]);

                        $json_data = decode_json_from_filepath($metadata_filepath);
                        
                        // Display data
                        echo "<pre>";
                        print_r($json_data);
                        echo "</pre>";
                        
                        $article_title = $json_data["title"];
                        $article_image = $json_data["image"];
                        $article_full_name = $json_data["article_full_name"];
                        echo "<div>$article_title</div>";
                        $article_full_path = join("/", [$articles_content_folder, $article_full_name]);

                        // Open the associated .md file
                        $article_content = decode_markdown_from_filepath($article_full_path, $markdown_converter);
                        echo $article_content;
                    }
                }

            ?> 


</body>
</html>