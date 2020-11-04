<?php
    session_start();
    include('../php-utils/login.utils.php');
    userLogout();
    isValidUser();
    include('header_3.php');
    include('navbar_3.php');

?>

<?php

    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);

    include('../php-utils/visitor.utils.php');


 ?>
        <main>
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Dashboard</h1>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Visitor</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="total_visitor_3.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Booked but not Visited</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="not_visited_3.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Notification</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="notification_3.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <main style="margin-top: 30px;">
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointments
                        <a href="new_visitor_3.php"class="ml-3 btn btn-primary text-left">Add</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
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
                                    $dataArray=showData($link);
                                    while ($data=mysqli_fetch_assoc($dataArray)) {

                                 ?>
                                <tr>
                                    <td><?php echo $data["first_name"]." ".$data["last_name"] ?></td>
                                    <td><?php echo $data["email"] ?></td>
                                    <td><?php echo $data["noofvisitors"] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",$data["time"]); ?></td>

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
include('footer_3.php');
include('scripts_3.php');
?>