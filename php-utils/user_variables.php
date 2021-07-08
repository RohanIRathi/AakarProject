<?php

    //$username = mysqli_real_escape_string($link,$_POST['username']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $password = password_hash($password,PASSWORD_BCRYPT);
    $firstName = mysqli_real_escape_string($link,$_POST['firstname']);
    $lastName = mysqli_real_escape_string($link,$_POST['lastname']);
    $employeeId = mysqli_real_escape_string($link,$_POST['employee_ID']);
    $phoneNo = mysqli_real_escape_string($link,$_POST['phone_no']);

    $userCred = array("email"=>$email,"password"=>$password,"firstName"=>$firstName,"lastName"=>$lastName,"employee_Id" => $employeeId,"phone_no"=>$phoneNo);
?>