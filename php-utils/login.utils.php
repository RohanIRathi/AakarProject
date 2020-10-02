<?php

    function checkValidPass($type,$email,$link,$password) {

        $type = strtolower($type);
        $query = "SELECT `id`,`password` FROM `".$type."` WHERE `email` = '".$email."'";
        $success = false;
        if($result = mysqli_query($link,$query)) {
            if($row = mysqli_fetch_array($result)) {
            //email exists, check password  
                //if(password_verify($_POST['password'],$row['password'])){   
                if(strcmp($password,$row['password']) == 0) {
                    //echo $row['id'];
                    $success = true;
                    //echo "Correct Password";
                } else {
                    $error = true;
                    //echo $row['password'].'<br>'.$password.'<br>';
                    //echo "Incorrect Password";
                }
            } else {
            //email does not exist
                $error = true;
                //echo "Email does not exist exists";
            }
        } else {
            echo mysqli_error($link);
            //echo "connection unsuccessful";
        }

        if($success) {
            return $row['id'];
        } else {
            return NULL;
        }
        
    }

?>