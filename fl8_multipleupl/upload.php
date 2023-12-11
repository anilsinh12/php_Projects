<?php
   if($_SERVER["REQUEST_METHOD"] === "POST")
   {
    if(!empty($_FILES['files']['name'][0])) 
    {
        foreach ($_FILES['files']['name'] as $key => $name) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $size = $_FILES['files']['size'][$key];
            $error = $_FILES['files']['error'][$key];

             
            if ($error === UPLOAD_ERR_OK) {
 
                $destination = './uploads/' . $name;
                move_uploaded_file($tmp_name, $destination);
                echo "File '$name' uploaded successfully.<br>";
            } else {
                echo "Error uploading file '$name': $error<br>";
            }
        }
    } else {
        echo "No files were uploaded.";
    }
}

?>