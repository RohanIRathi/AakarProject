<?php

if(!function_exists("checkIfEmailAlreadyExists")) {

  function checkIfEmailAlreadyExists($email,$type,$link) {
    $query = "SELECT `email` from `".$type."` WHERE `email` = '".$email."'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    if($row) {
      return true;
    } return false;
  }

}

?>