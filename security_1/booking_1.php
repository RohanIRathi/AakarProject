<?php
    session_start();
    include('../php-utils/login.utils.php');
    userLogout();
    isValidUser(); 
    include('header_1.php'); 
    include('navbar_1.php');
?>

<?php 
    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);

    function showUpcomingData($link)
    {   
        $query = "SELECT * FROM visitor WHERE `dateofappointment` = '".date("m-d-y")."' AND `status` = 'BOOKED'";
        $result = mysqli_query($link,$query);
        if ($result == TRUE) {
            return $result;
        }
        else{
            echo "Error!";
        }
    } function showAcceptedOrRejectedEntry($link){
        $popAccepted[0] = '<div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Notifications
                </h6>
            </div>';
        $popAccepted[1] = '';
        $popAccepted[2] = '</div></div>';
        $query = "SELECT `id`,`first_name`,`last_name`,`status` from `visitor` WHERE `status` = 'ACCEPTED_1' OR `status` = 'REJECTED_1' OR `status` = 'REQUEST_SENT'";

        $result = mysqli_query($link,$query);

        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            if( strcmp($row['status'],'ACCEPTED_1') ===0 ) {
                $popAccepted[1] .= '<div class="alert alert-success" role="alert">
                <form method="POST">
                <button type="submit" name="closeNotification" class="btn">&#10006;</button>
                    Access to <b>'.$row['first_name'].' '.$row['last_name'].' </b> has been <b>GRANTED<b>. 

            
            <input type="hidden" name="id" value="'.$row['id'].'">
            <input type="hidden" name="status" value="acc">
            
            </form>

                </div>';
            } else if(strcmp($row['status'],'REJECTED_1') ===0) {
                $popAccepted[1] .= '<div class="alert alert-danger" role="alert">
                <form method="POST">
                <button type="submit" name="closeNotification" class="btn">&#10006;</button>
                    Access to <b>'.$row['first_name'].' '.$row['last_name'].'</b> has been <b>REJECTED<b>.

                    
            <input type="hidden" name="id" value="'.$row['id'].'">
            <input type="hidden" name="status" value="rej">
            </form>
                </div>';
            } else {
                $popAccepted[1] .=  '<div class="alert alert-primary" role="alert">
                Request to visit for <b> '.$row['first_name'].' '.$row['last_name'].' </b> is <b>PENDING</b>.
                </div>';
            }
            
        }
        if($popAccepted[0] != ''){
            return $popAccepted;
        } else {
            return NULL;
        }
    }
    $arr = showAcceptedOrRejectedEntry($link);

    if(isset($_POST['closeNotification'])) {
        $query = "UPDATE `visitor` SET `status` = '".(
            (strcmp($_POST['status'],'acc') == 0) ? "ONGOING" : "REJECTED_FINISHED"
        )."' WHERE `id` = ".$_POST['id'];
        //echo $query;
        if(mysqli_query($link,$query)) {
            //echo 'success';
        } else {
            //echo mysqli_error($link);
        }
        $arr = showAcceptedOrRejectedEntry($link);

    }

    
 ?>

<?php

if(isset($_POST['verify_btn'])) {
    //print_r($_POST);
    $query = "SELECT `tokenid` FROM `visitor` WHERE `id` = ".$_POST['id'];
    //echo $query;

    $result = mysqli_query($link,$query);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //echo '<br>Token id : '.$row['tokenid'];
    if(password_verify($_POST['scan_id'],$row['tokenid'])){
        echo '<div class="alert alert-success" role="alert">
            <b>Token Id is Valid. Request sent.</b>
            </div>';
        
        $query = "UPDATE `visitor` SET `status` = 'REQUEST_SENT',`start_time` = '".time()."' WHERE `id` = ".$_POST['id'];
        mysqli_query($link,$query);

    } else {
        echo '<div class="alert alert-danger" role="alert">
        <b>Token Id is Invalid.</b>
      </div>';
    }
}

?>
    <main style="margin-top: 30px;">
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointments
                        <a href="new_visitor_1.php"class="ml-3 btn btn-primary text-left">Add Walk-In Visitor</a>
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
                                    <th> TOKEN ID </th>
                                    <th> VERIFY TOKEN ID </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $dataArray=showUpcomingData($link);
                                    while ($data=mysqli_fetch_assoc($dataArray)) {
                                        
                                 ?>
                                <tr>
                                    <td><?php echo $data["first_name"]." ".$data["last_name"] ?></td>
                                    <td><?php echo $data["email"] ?></td>
                                    <td><?php echo $data["noofvisitors"] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",$data["time"]); ?></td>
                                    
                                    <form method="POST">
                                        <td>
                                            <input name="scan_id" placeholder="TOKEN ID" 
                                            type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;">
                                        </td>
                                        <td>
                                            <input type="hidden" name="id" value="<?php
                                            echo $data['id']; ?>">
                                            <button type="submit" name="verify_btn" class="btn btn-success"> VERIFY</button>
                                    </form>
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
        <?php
            
            if($arr != NULL) {
                echo $arr[0].$arr[1].$arr[2];
            }

        ?>
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