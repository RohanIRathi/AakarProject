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


    function isValidUser() {
        if(!array_key_exists('type',$_SESSION)) {
            echo "<script>window.location.href='../login.php';</script>";
            //header('Location : ./login.php');
            //exit();
        } else {
            $cur_dir = getcwd(); 
            $arr = explode('\\',$cur_dir);
            if(strcmp($_SESSION['type'],'Admin') == 0 && strcmp($arr[5],'admin_4') != 0) {

                echo "<script>window.location.href='../admin_4/booking_4.php';</script>";
                exit();

            } else if (strcmp($_SESSION['type'],'HOD') == 0 && strcmp($arr[5],'hod_3') != 0){

                echo "<script>window.location.href='./hod_3/booking_3.php';</script>";
                exit();

            } else if (strcmp($_SESSION['type'],'Employee') == 0 && strcmp($arr[5],'employee_2') != 0 ) {

                echo "<script>window.location.href='../employee_2/booking_2.php';</script>";
                exit();

            } else if(strcmp($_SESSION['type'],'Security') == 0 && strcmp($arr[5],'security_1') != 0 ) {

                echo "<script>window.location.href='../security_1/booking_1.php';</script>";
                exit();
                
            } 
        }
    }

?>