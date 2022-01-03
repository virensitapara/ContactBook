<?php

include "config.php";
session_start();

    if(isset($_FILES['fileToUpload']))
    {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = end(explode('.',$file_name));
        $extension = array("jpeg","jpg","png");

        if(in_array($file_ext,$extension) === false){
            $errors[] = "This Extension file is not allowed, Please choose a JPG or PNG file";
        }
        if($file_size > 2097125){
            $errors[] = "File size must be 2mb or lower";
        }

        $new_name = time(). "-".basename($file_name);
        $target = "upload/".$new_name;
        $image_name = $new_name;

        if(empty($errors) == true){
            move_uploaded_file($file_tmp,$target);
        }else{
            print_r($errors);
            die();
        }
    }

    $name = $_POST['name'];
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $othernotes = $_POST['othernote'];
    $author = $_SESSION['user_id'];
    
    $sql = "INSERT INTO contact(contact_name,contact_number,contact_email,contact_img,contact_note,user)
            VALUES('{$name}','{$phone}','{$email}','{$image_name}','{$othernotes}',{$author})";

    if(mysqli_query($conn,$sql)){
        header("location: {$hostname}/main.php");
    }else{
        echo "<div>SavePost Query Failed</div>";
    }

?>