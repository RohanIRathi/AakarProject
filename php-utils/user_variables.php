<?php

    include('db/db.variables.php');
    include('db/db.connection.php');

    $link = connectionToDB($host, $username, $pass, $db);
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
?>