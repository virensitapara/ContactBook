<?php

    $contact_id = $_POST["id"];

    include 'config.php' ;
    $sql = "DELETE from contact WHERE contact_id = '{$contact_id}'";
  
    // $result = mysqli_query($conn,$sql) or die("Query Failed.");

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }

?>