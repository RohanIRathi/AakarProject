<?php

    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);
    //showing visitor accept or reject 
    function showNotifications($link){
        $query = "SELECT `id`,`first_name`,`last_name`,`email`,`noofvisitors`,`time` FROM `visitor` WHERE `visitee` = ".$_SESSION['id']." AND `status` = 'REQUEST_SENT' ";

        $result = mysqli_query($link,$query);

        $populate = '';
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $populate .= '<tr>
                <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['noofvisitors'].'</td>
                <td>'.date("F j, Y, g:i a",$row["time"]).'</td>

                <td>
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <button type="submit" name="accept_btn" class="btn btn-success">ACCEPT</button>
                </td>
                <td>
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <button type="submit" name="reject_btn" class="btn btn-danger"> REJECT </button>
                    
                </td>
        </tr>';
        }
        return $populate;
    }
    $populate = showNotifications($link);
    
    

?>

<?php
    //if accept or reject button is clicked
    if(isset($_POST['accept_btn']) || isset($_POST['reject_btn'])) {
        if(isset($_POST['accept_btn'])){
            $x = true;
        } else {
            $x = false;
        }
        //print_r($_POST);
        $query = "UPDATE `visitor`
        SET `status` = '".
        (
            ($x) ? "ACCEPTED_1" : "REJECTED_1"
        )
        ."' WHERE `id` = ".$_POST['id'];
        //echo $query;

        if(mysqli_query($link,$query)) {
            $populate = showNotifications($link);
        } else {
            echo mysqli_error($link);
        }
        
    }
    
    

?>

<?php
//showing leave passes ONLY FOR HOD

if($_SESSION['type'] === 'HOD'){
    echo 'hod<br>';
    $tomorrow  = mktime(0, 0, 0, date("m")+1  , date("d")+1, date("Y"));
    $yesterday  = mktime(0, 0, 0, date("m")-1  , date("d"), date("Y"));
    $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
    $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
    echo '<br>Tomorrow : '.$tomorrow.'<br>Yesterday : '.$yesterday;
    echo '<br>Last Month : '.$lastmonth;
    echo '<br>Next Year : '.$nextyear.'<br>';
    function fetchEmpLeavePass($link) {
        $lT = strtotime('today midnight');
        $rT = strtotime('tomorrow');
        $query = 'SELECT `emp_name`,`Purpose`,`start_time`,`end_time` FROM `emp_leave_pass` WHERE `hod_id` = '.$_SESSION['id'].' AND `timestamp` BETWEEN '.$lT.' AND '.$rT.' ';

        if($result = mysqli_query($link,$query)) {
            while($row = mysqli_fetch_array($result)) {
                echo '<br>';
                print_r($row);
                echo '<br>';
            }
        } else {
            echo '<br>error : '.mysqli_error($link);
        }
        
        
    }fetchEmpLeavePass($link);
}

?>
    
    <main style="margin-top: 30px;">
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Notifications
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <?php
                                if($populate != ''){
                                    echo '<tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> No.of Visitors </th>
                                    <th> Time </th>
                                    <th> ACCEPT </th>
                                    <th> REJECT </th>
                                </tr>';
                                } else {
                                    echo 'You have no Notifications. Kindly refresh the page to see if you have any new notifications.';
                                }
                            ?>
                                
                            </thead>
                            <tbody>
                                <form method="POST">
                                    <?php echo $populate;?>
                                </form>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid
        Tomorrow : 1612463400
Yesterday : 1609698600
Last Month : 1609698600
Next Year : 1643913000
 -->
    </main>