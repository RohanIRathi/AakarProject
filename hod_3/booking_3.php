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
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Visitor
                        <a href="new_visitor_3.php"class="ml-3 btn btn-primary text-left">Add</a>
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
include('footer_3.php'); 
include('scripts_3.php'); 
?>