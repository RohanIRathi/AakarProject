<?php
    session_start();
    include('./php-utils/db/db.variables.php');
    include('./php-utils/db/db.connection.php');
    include('./php-utils/login.utils.php');
    //if (!function_exists('connetionToDB')) { echo 'exists'; }
    $link = connectionToDB($host,$username,$pass,$db);
    $error = NULL;
    if(!empty($_POST["login_btn"])) {
        //echo 'Set!';
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $password = mysqli_real_escape_string($link,$_POST['passwordd']);
        $type = mysqli_real_escape_string($link,$_POST['option']);
        $userCredArr = checkValidPass($type,$email,$link,$password);
        if($userCredArr != NULL){
        
            $_SESSION['type'] = $type;
            $_SESSION['id'] = $userCredArr['id'];
            $_SESSION['username'] = $userCredArr['username'];

            if(strcmp($type,'Admin') == 0) {
                header('location: ./admin_4/booking_4.php');
                exit();
            } else if (strcmp($type,'HOD') == 0) {
                header('location: ./hod_3/booking_3.php');
                exit();
            } else if (strcmp($type,'Employee') == 0) {
                header('location: ./employee_2/booking_2.php');
                exit();
            } else {
                header('location: ./security_1/booking_1.php');
                exit();
            } 
        } else {
            $error = 'Invalid Credentials';
            $error = '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
    } 
    
    
?>
<!doctype html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	<!-- Custom styles for this template-->
    <link href="include/login.css" rel="stylesheet">
  <script src="include/email_validation.js"></script>
</head>
<body>
    <div class="container mt-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                        
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                                    </div>
                    
                                    <?php
                                        if($error){
                                            echo $error;
                                        }
                                    ?>

                                    <form class="user"name="form1" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control" name="option" placeholder='Choose Role'>
                                            <option  disabled>Choose Role</option>
                                            <option>Admin</option>
                                            <option>HOD</option>
                                            <option>Employee</option>
                                            <option>Security</option>
                                        </select>
                                        </div> 
                                        <input type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" value='Login'>  
                                        <hr>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
 </html>