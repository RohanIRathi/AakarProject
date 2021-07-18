<?php
    if(!function_exists("checkValidPass")) {
        // declare your function
        function checkValidPass($type,$empId,$link,$password) {
            $type = strtolower($type);
            $id = "";
            if($type == "hod") {
                $id = "hod_id";
            } else if($type == "employee") {
                $id = "employee_id";
            } else {
                $id = "id";
            }
            //echo ' id : '.$id.'<br>';
            $query = "SELECT `".$id."`,`password`,`first_name`,`last_name` FROM `".$type."` WHERE `".$id."` = '".$empId."'";
            $success = false;
            if($result = mysqli_query($link,$query)) {
                if($row = mysqli_fetch_array($result)) {
                //email exists, check password  
                    if(password_verify($password,$row['password'])){   
                    //if(strcmp($password,$row['password']) == 0) {
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
                $userCred['id'] = $row[$id]; 
                $userCred['first_name'] = $row['first_name'];
                $userCred['last_name'] = $row['last_name'];
                return $userCred;
            } else {
                return NULL;
            }
            
        }
    }

    if(!function_exists("isValidUser")) {
        // declare your function
        function isValidUser() {
            if(!array_key_exists('type',$_SESSION)) {
                echo "<script>window.location.href='../login.php';</script>";
                //header('Location : ./login.php');
                //exit();
            } else {
                $cur_dir = getcwd(); 
                //$arr = explode('\\',$cur_dir);
                $dirname = basename($cur_dir); 
                // echo $dirname;
                if(strcmp($_SESSION['type'],'Admin') == 0 && strcmp($dirname,'admin_4') != 0) {
    
                    echo "<script>window.location.href='../admin_4/booking_4.php';</script>";
                    exit();
    
                } else if (strcmp($_SESSION['type'],'HOD') == 0 && strcmp($dirname,'hod_3') != 0){
    
                    echo "<script>window.location.href='./hod_3/booking_3.php';</script>";
                    exit();
    
                } else if (strcmp($_SESSION['type'],'Employee') == 0 && strcmp($dirname,'employee_2') != 0 ) {
    
                    echo "<script>window.location.href='../employee_2/booking_2.php';</script>";
                    exit();
    
                } else if(strcmp($_SESSION['type'],'Security') == 0 && strcmp($dirname,'security_1') != 0 ) {
    
                    echo "<script>window.location.href='../security_1/booking_1.php';</script>";
                    exit();
                    
                } 
            }
        }
    }
    if(!function_exists("userLogout")) {
        // declare your function
        function userLogout() {
            if(isset($_POST['logout-btn'])) {
                session_destroy();
                header('location: ../login.php');
                exit;
            }
        }
    }
    


?>