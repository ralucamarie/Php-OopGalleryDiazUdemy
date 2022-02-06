<?php

if(isset($_POST['submit'])){
    // echo "<pre>";
    // print_r($_FILES['file_upload']);
    // echo "<pre>";

    $upload_errors = array(
        UPLOAD_ERR_OK => "There is no Error",
        UPLOAD_ERR_INI_SIZE =>"The upload file exceeds the upload max file allowed.",
        // UPLOAD_ERR_FORM_SIZE
        UPLOAD_ERR_NO_FILE => "There is no file selected!"
        // UPLOAD_ERR_NO_TMP_DIR
        // UPLOSD_ERR_CANT_WRITE
        // UPLOAD_ERR_EXTENSION

    );
    $temp_name=$_FILES['file_upload']['tmp_name'];
    $the_file=$_FILES['file_upload']['name'];
    $directory="uploads";

    if (move_uploaded_file($temp_name, $directory ."/".$the_file)){
        $the_message= "File uploaded successfully!";
    }else {
        $the_error=$_FILES['file_upload']['error'];
        $the_message = $upload_errors[$the_error];
    }






    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="file.php" enctype="multipart/form-data" method="post">
    <h2> 
        <?php
        if(!empty($upload_errors)){
            echo "$the_message";
        }
        ?>
    </h2>
    <input type="file" name="file_upload"><br>
    <input type="submit" name="submit">

</form>


</body>
</html>

<?php

// echo __FILE__ .'<br>';
// echo __LINE__.'<br>';
// echo __DIR__.'<br>';

// if (file_exists(__DIR__)){
//     echo "yes";
// }

//if is_file(__DIR__)
//if is_dir(__DIR__)

//echo file_exists(__FILE__) ? "yes" : "no";


