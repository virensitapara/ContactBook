<?php 
    
    if(isset($_POST['save']))
    {
        include "config.php";
    
    
        $uname = $_POST['fullname'];
        $unumber = $_POST['number'];
        $uemail = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT email FROM user WHERE email = '{$uemail}'";
        $result = mysqli_query($conn,$sql) or die("Query Failed.");

        if(mysqli_num_rows($result)>0){
            echo "<p style='color:red;text-align:center;margin: 10px 0;'> UserName already Exists</p>";
        }
        else{
            $sql1 = "INSERT INTO user (username,email,number,password) 
                    VALUES ('{$uname}','{$uemail}','{$unumber}','{$password}')";

            if(mysqli_query($conn,$sql1)){
                $sql = "SELECT user_id, email FROM user WHERE email='{$uemail}'";
                          
                            $result = mysqli_query($conn,$sql)  or die ("Query Failed");

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    session_start();
                                    $_SESSION["username"] = $row["email"];
                                    $_SESSION["user_id"] = $row["user_id"];

                                    header("Location: {$hostname}/main.php");

                                }
                            }
                
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration</title>
</head>
<body>
    <div class="login-form">
        <h1>Registration Form</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <p>Full Name:</p>
            <input type="text" name="fullname" placeholder="Full Name">
            <p>Number:</p>
            <input type="text" name="number" placeholder="Number">
            <p>Email:</p>
            <input type="email" name="email" placeholder="Email">
        
            <p>Password:</p>
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="save">Registration</button>
        </form>
        <a href="index.php"> <button type="submit" name="login">LogIn</button></a>
    </div>
</body>
</html>