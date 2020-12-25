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

if(!function_exists("signUpUser")) {

  function signUpUser($link,$type,$assignedBy) {

    include('../php-utils/user_variables.php');
    //print_r($userCred);
    $success = false; 
    $error = false;
    if(checkIfEmailAlreadyExists($userCred['email'],$type,$link)) {
      $error = 'User already exists!';
    } else {
      
      $query = "INSERT INTO `".$type."`( `id`,`email`, `password`,`first_name`,`last_name`".
      (
        (strcmp($type,'admin')==0 || strcmp($type,'security')==0) ? "" : 
        (
          (strcmp($type,'hod')==0) ? ",`admin_id`" : ",`hod_id`"
        )
      )
  
      .") VALUES ('".$userCred['employee_Id']."','".$userCred['email']."','".$userCred['password']."','".$userCred['firstName']."','".$userCred['lastName']."'".
  
      ( 
      (strcmp($type,'admin')==0 || strcmp($type,'security')==0) 
      ? "" : ",'".$assignedBy."'" 
      )
      
      .")";
      //echo '<br>'.$query;
  
      if(mysqli_query($link, $query)) {
        $success = true;
      } else {
        $error =  mysqli_error($link);
        //return array(false,'Something went wrong!');
      }
    }

    if($success) {
      echo '<div class="alert alert-success">
              <strong>User SignUp Successful!</strong> 
            </div>';
    } else if($error) {
        echo '<div class="alert alert-danger">
                <strong>'.$error.'</strong> 
              </div>';
    }
  }
}

if(!function_exists("getUserData")) {
  function getUserData($link,$type,$assignedBy) {

    $query = "SELECT * FROM `".$type."` ".
    (
      (strcmp($type,'employee')==0) ? "WHERE `hod_id` = ".$assignedBy : ""

    )
    .";";
    //echo $query;
    $result = mysqli_query($link,$query);
    if(!$result) {
      echo mysqli_error($link);
      return ;
    } 
    return $result;
    // while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //   echo '<br>';
    //   print_r($row);
    //   echo '<br>';
    // }

  }
}

?>