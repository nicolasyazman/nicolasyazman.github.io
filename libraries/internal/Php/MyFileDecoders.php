<?php namespace MyFileDecoders;

        require __DIR__ . '/../../../vendor/autoload.php';
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

        
    

?>