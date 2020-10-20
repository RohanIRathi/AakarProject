<?php
session_start();
include('header_3.php');
include('navbar_3.php');
include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
include('../php-utils/signup.utils.php');

$link = connectionToDB($host, $username, $pass, $db);

if(isset($_POST['registerbtn'])) {

    signUpUser($link,'employee',$_SESSION['id']);

}

?>

    <main style="margin-top: 30px;">
        <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employee Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
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
                    <h6 class="m-0 font-weight-bold text-primary">Employee Registration
                        <button type="button" class="ml-3 btn btn-primary text-left" data-toggle="modal" data-target="#addadminprofile">Add</button>
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
                                    <th> Role </th>
                                    <th> EDIT </th>
                                    <th> DELETE </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="register_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
		<?php
		include('footer_3.php');
		include('scripts_3.php');
		?>
