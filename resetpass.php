<?php
    include('../php-utils/login.utils.php');
    if(!function_exists("updatePass")) {
        function updatePass($id,$type,$link,$newPass) {
          $type = strtolower($type);
          $idColName;
          if($type == "hod") {
            $idColName = "hod_id";
          } else if($type == "employee") {
            $idColName = "employee_id";
          } else {
            $idColName = "id";
          }
          $newPass = password_hash($newPass,PASSWORD_BCRYPT);
          $query = "UPDATE `".$type."` SET `password` = '".$newPass."' WHERE `".$idColName."` = '".$id."'";
          //echo $query;

          $result = mysqli_query($link,$query);
            //echo mysqli_error($link); 
            echo '<div class="alert alert-success" role="alert">
            Password Successfully Updated!
          </div>';
        }
      }
    if(isset($_POST['reset_btn'])) {
        //print_r($_POST);
        $oldPass = mysqli_real_escape_string($link,$_POST['old_pass']);
        $newPass = mysqli_real_escape_string($link,$_POST['new_pass']);
        $userCredArr = checkValidPass($_SESSION['type'],$_SESSION['id'],$link,$oldPass);

        if($userCredArr!==NULL) {
            //echo 'passwords match<br>';
            updatePass($_SESSION['id'],$_SESSION['type'],$link,$newPass);
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Wrong Password!
          </div>';
        }
    } 
?>

<main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    <form class="user" method="POST" id="resetPassForm">
                                        <div class="form-group">
                                            <input type="password" name="old_pass" class="form-control form-control-user" placeholder="Enter Old Password" id="oldPass" 
                                            required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_pass" class="form-control form-control-user" placeholder="Enter New Password" id="newPass" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="renew_pass" class="form-control form-control-user" placeholder="Re-enter New Password" id="newPassR" required>
                                        </div>
                                        <input type="submit" name="reset_btn" class="btn btn-primary btn-user btn-block" value='UPDATE'>  
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
</main>

<script type='text/javascript'>
    var form = document.getElementById("resetPassForm");
    //console.log(form) ;
    form.onsubmit = (e) => {
        var oldPass = document.getElementById("oldPass").value;
        var newPass = document.getElementById("newPass").value;
        var newPassR = document.getElementById("newPassR").value;
        console.log('newPass : '+newPass+'\nNew Pass r : '+newPassR+'\nOld pass : '+oldPass);

        if(oldPass === newPass) {
            alert("Please Enter new Password.");
            e.preventDefault();
        }

        if(newPass !== newPassR) {
            alert("Passwords don't match!");
            e.preventDefault();
        }
    }
</script>