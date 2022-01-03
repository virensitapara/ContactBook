<?php
    include "config.php";
    session_start();

    if(isset($_SESSION['username'])){
        header("location: {$hostname}/main.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-form">
        <h1>Login Form</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <p>User Name</p>
            <input type="text" name="email" placeholder="Email">
            <p>Password</p>
            <input type="password" name="password" placeholder="Password">  
            <button type="submit" name="login" value="login">Login</button>
        </form>
        <a href="registration.php"> <button type="submit" name="register">Register</button></a>

        <?php
                        if(isset($_POST['login'])){
                            include "config.php";
                            $username = $_POST['email']; 
                            $password = $_POST['password'];

                           $sql = "SELECT user_id, email FROM user WHERE email='{$username}' AND password = '{$password}'";
                          
                            $result = mysqli_query($conn,$sql)  or die ("Query Failed");

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    session_start();
                                    $_SESSION["username"] = $row["email"];
                                    $_SESSION["user_id"] = $row["user_id"];

                                    header("Location: {$hostname}/main.php");

                                }
                            }
                            else{
                                echo '<div> Username and Password are not Matched </div>';
                            }
                        }
                        ?>
    </div>
</body>
</html>