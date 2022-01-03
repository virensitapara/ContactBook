<?php
    include "config.php";

    if(empty($_FILES['new-image']['name'])){
        $image_name = $_POST['old_image'];
    }else{
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_ext = strtolower(end(explode('.',$file_name)));
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

    $sql = "UPDATE contact SET contact_name='{$_POST["name"]}', contact_number='{$_POST["number"]}', contact_email='{$_POST["email"]}', contact_img='{$image_name}' ,  contact_note='{$_POST["othernote"]}'
            WHERE contact_id ={$_POST["contact_id"]}";
    
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location: {$hostname}/main.php");
    }
    else{
        echo "Query Failed";
    }

?>