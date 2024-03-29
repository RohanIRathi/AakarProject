<?php
include('header_4.php');
include('navbar_4.php');
include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
include('../php-utils/signup.utils.php');

$link = connectionToDB($host, $username, $pass, $db);

if(isset($_POST['registerbtn'])) {
    signUpUser($link,'hod',$_SESSION['id']);
    echo $unsetData;
}
$result = getUserData($link,'hod',$_SESSION['id']);
?>

 <main style="margin-top: 30px;">
        <div class="modal fade" id="addhodprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add HOD Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <label> Last Name </label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label>Employee ID</label>
                                <input type="text" name="employee ID" class="form-control" placeholder="Enter Employee ID" required>
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="text" name="phone_no" class="form-control" pattern="[6-9]\d{9}" title="Enter Valid Number"placeholder="Enter Phone No." required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <input type="hidden" name="usertype" value="admin">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">HOD Profile
                        <button type="button" class="ml-3 btn btn-primary text-left" data-toggle="modal" data-target="#addhodprofile">Add</button>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Employee Id </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Phone No. </th>
                                    <th> Role </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

echo '<tr>
<td>'.$row['hod_id'].'</td>
<td>'.$row['first_name'].' '.$row['last_name'].'</td>
<td>'.$row['email'].'</td>
<td>'.$row['phone_no'].'</td>
<td>HOD</td>
</tr>';

}

?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
include('footer_4.php');
include('scripts_4.php');
?>
