<?php
    session_start();
    include('header_1.php');
    include('navbar_1.php');

    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);

    include('../php-utils/visitor.utils.php');

    if(isset($_POST['out_btn'])) {
        $t=time();
        //echo date("F j, Y, g:i a",$t);
        $query = "UPDATE `visitor` SET `end_time` = '".$t."', `status` = 'ACCEPTED_FINISHED' WHERE `id` = ".$_POST['id'];

        if(mysqli_query($link,$query)) {
            //echo 'success';
        } else {
            echo mysqli_error($link);
        }
    }

?>
<main style="margin-top: 30px;">
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ongoing Appointments
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> No.of Visitors </th>
                                    <th> Time </th>
                                    <th> Out </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    $result = getOngoingData($link);
                    while ($row=mysqli_fetch_assoc($result)) {
                        echo '<form method="POST"><tr>
                        <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['noofvisitors'].'</td>
                        <td>'.date("F j, Y, g:i a",$row["time"]).'</td>
                        <td>
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <button type="submit" name="out_btn" class="btn btn-danger">OUT</button>
                        </td>
                        </tr></form>';
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
    include('footer_1.php');
    ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    </body>

    </html>