<?php

    $username = mysqli_real_escape_string($link,$_POST['username']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $password = password_hash($password,PASSWORD_BCRYPT);
    $firstName = NULL;
    $lastName = NULL;


    $userCred = array("username"=>$username,"email"=>$email,"password"=>$password,"firstName"=>$firstName,"lastName"=>$lastName);
?>