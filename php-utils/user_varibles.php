<?php

    include('db/db.connection.php');
    include('db/db.variables.php');

    $mysqli = connectionToDB($host, $username, $pass, $db);

    $username = $mysqli -> real_escape_string($_POST['username']);
    $email = $mysqli -> real_escape_string($_POST['email']);
    $password = $mysqli -> real_escape_string($_POST['password']);
    $cpassword = $mysqli -> real_escape_string($_POST['confirmpassword']);

    if($password == $cpassword)
        echo "Password and confirm password do not match!";
    else
        echo "Passwords match!";
?>