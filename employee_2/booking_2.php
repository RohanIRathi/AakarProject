<?php
    session_start();
    include('../php-utils/login.utils.php');
    userLogout();
    isValidUser();
    include('header_2.php'); 
    include('navbar_2.php'); 

?>

<?php 
    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $con = connectionToDB($host, $username, $pass, $db);

    function showData()
    {
        global $con;
        $query = "select * from visitor";
        $result = mysqli_query($con,$query);
        if ($result == TRUE) {
            return $result;
        }
        else{
            echo "Error!";
        }
    }

    
 ?>
    <main style="margin-top: 30px;">
        <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Visitor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form class="user" action="#" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="usernamee" class="form-control form-control-user" placeholder="Enter Name...">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                            <label>Date</label>
                                <input type="date" name="date" class="form-control form-control-user" placeholder="Enter Date of Visit">
                            </div>
                            <div class="form-group">
                            <label>Time</label>
                                <input type="time" name="time" class="form-control form-control-user" placeholder="Enter Time of Visit">
                            </div>
                            <div class="form-group">
                                <label>No.of Visitors</label>
                                <input type="number" name="no_of_visitor" class="form-control form-control-user" placeholder="Enter No.of Visitors">
                            </div>
                            <div class="form-group">
                                <label>ID Proof Photo</label>
                                <input type="file" id="img" name="img" accept="image/*" class="form-control form-control-user" placeholder="Enter Photo">
                            </div>
                            <div class="form-group">
                                <label>ID Proof No.</label>
                                <input type="text" name="Govt_ID" class="form-control form-control-user" placeholder="Enter ID No.">
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="text" name="Phone_no" class="form-control form-control-user" placeholder="Enter Phone No.">
                            </div>
                            <div class="form-group">
                                <label>Purpose Of Visit</label><br>
                                <label class="radio-inline  mr-3">
                                    <input type="radio" class="form-control form-control-user" name="optradio">Personal
                                </label>
                                <label class="radio-inline  mr-3">
                                    <input type="radio"class="form-control form-control-user" name="optradio">Industrial
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Hospitality</label><br>
                                <label class="radio-inline mr-3">
                                    <input type="radio" class="form-control form-control-user" name="optradio">Breakfast
                                </label>
                                <label class="radio-inline mr-3">
                                    <input type="radio" class="form-control form-control-user" name="optradio">Lunch
                                </label>
                                <label class="radio-inline  mr-3">
                                    <input type="radio"class="form-control form-control-user" name="optradio">Dinner
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-custom form-toggle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <span class="sr-only"> Toggle navigation</span>Conference Room 
                                </button>
                                <button class="btn btn-custom form-toggle" type="button" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls=""> 
                                <span class="sr-only"> Toggle navigation</span> None 
                                </button>
                                <hr>
                                <div id="collapseExample" class="navbar-collapse collapse">
                                    <div class="pt-2">
                                        <form action="">
                                            <div class="form-group">
                                                <label>Room Name</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Purpose of Room</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" required>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group pb-2">
                                                        <label>Start Time</label>
                                                        <input type="time" class="form-control form-control-user" placeholder="Start Time" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group pb-2">
                                                        <label>End Time</label>
                                                        <input type="time" class="form-control form-control-user" placeholder="End Time" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Visitor
                        <a href="new_visitor_2.php"class="ml-3 btn btn-primary text-left">Add</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> No.of Visitors </th>
                                    <th> Time </th>
                                    <th> EDIT </th>
                                    <th> SCAN </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $dataArray=showData();
                                    while ($data=mysqli_fetch_assoc($dataArray)) {
                                        
                                 ?>
                                <tr>
                                    <td><?php echo $data["id"]; ?></td>
                                    <td><?php echo $data["first_name"]." ".$data["last_name"] ?></td>
                                    <td><?php echo $data["email"] ?></td>
                                    <td><?php echo $data["noofvisitors"] ?></td>
                                    <td><?php echo $data["time"] ?></td>
                                    
                                    <td>
                                        <form action="#" method="post">
                                            <input type="hidden" name="edit_id" value="">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="#" method="post">
                                            <input type="hidden" name="scan_id" value="">
                                            <button type="submit" name="scan_btn" class="btn btn-danger"> SCAN </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </main>
<?php
include('footer_2.php'); 
include('scripts_2.php'); 
?>
        