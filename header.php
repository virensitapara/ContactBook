<?php
include "config.php";
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: {$hostname}");
    }

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="main.php">Home</a>
                </li>
                <li>
                    <a href="add.php">Add</a>
                </li>
                <li>
                <a href="logout.php" class="admin-logout" > logout</a>
                </li>
            </ul>
        </div>
