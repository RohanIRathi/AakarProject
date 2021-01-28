<?php
include('header_2.php'); 
include('navbar_2.php'); 

if(isset($_POST['Submit_btn'])) {
    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);
    $purpose = mysqli_real_escape_string($link,$_POST['purpose']);
    $sT = mysqli_real_escape_string($link,$_POST['start_time']);
    $eT = mysqli_real_escape_string($link,$_POST['end_time']);

    $query = "SELECT `hod_id` from `employee` WHERE `employee_id` = '".$_SESSION['id']."'";

    $hodId = "";
    if($result = mysqli_query($link,$query)) {
        while($row = mysqli_fetch_array($result)) {
            $hodId = $row['hod_id'];
        }
    } else {
        echo mysqli_error($link);
    }
    $empName = $_SESSION['firstname'].' '.$_SESSION['lastname'];
    //echo 'hiii'.$hodId;
    $query = "INSERT INTO `emp_leave_pass`(`employee_id`,`emp_name`,`hod_id`,`Purpose`,`start_time`,`end_time`,`status`) VALUES ('".$_SESSION['id']."','".$empName."','".$hodId."','".$purpose."','".$sT."','".$eT."','REQ_SENT')";

    if(mysqli_query($link,$query)) {
        echo '<div class="alert alert-success" role="alert">
  <b>Request Sent!</b>
</div>';
    }

    echo mysqli_error($link);
}

?>

<main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Leave Pass</h1>
                                </div>
                                <form class="user" action="#" method="POST">
                                    <div class="form-group">
                                        <label>Purpose of leave</label>
                                        <input type="text" name="purpose" class="form-control form-control-user" placeholder="Purpose....">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Start Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="Start Time"
                                                name="start_time" required >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>End Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="End Time" 
                                                name="end_time"required>
                                            </div>
                                        </div>
                                    </div>       
                                    <button type="submit" name="Submit_btn" class="btn btn-primary btn-user btn-block"style="border-radius: 10rem;"> Submit To HOD </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include('footer_2.php'); 
include('scripts_2.php'); 
?>


