<?php
    include('header_1.php');
    include('navbar_1.php');
    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');
    $link = connectionToDB($host, $username, $pass, $db);
    function fetchUpcomingEmpLeaves($link) {
        $lT = strtotime('today midnight');
        $rT = strtotime('tomorrow');
        $query = "SELECT `leave_pass_id`,`employee_id`,`emp_name`,`start_time`,`end_time` FROM `emp_leave_pass` WHERE `status` = 'ACCEPTED_2' AND `timestamp` BETWEEN '".$lT."' AND '".$rT."'";
        $result = mysqli_query($link,$query);
        echo mysqli_error($link);
        if($result == TRUE) {
            return $result;
        } else {
            return NULL;
        }
    }

    function fetchOngoingEmpLeaves($link) {
        $query = "SELECT `leave_pass_id`,`employee_id`,`emp_name`,`start_time`,`end_time`,`actual_start_time` FROM `emp_leave_pass` WHERE `status` = 'ONGOING'";

        $result = mysqli_query($link,$query);
        if($result == TRUE) {
            return $result;
        } else {
            return NULL;
        }
    }

    if(isset($_POST['startEmpLeave'])) {
        $query = "UPDATE `emp_leave_pass` SET `actual_start_time` = '".time()."',`status` = 'ONGOING' WHERE `leave_pass_id` = ".$_POST['leave_pass_id'];

        mysqli_query($link,$query);
        echo $unsetData;
        echo $reloadPage;
    }

    if(isset($_POST['endEmpLeave'])) {
        $query = "UPDATE `emp_leave_pass` SET `actual_end_time` = '".time()."',`status` = 'ACCEPTED_FIN' WHERE `leave_pass_id` = ".$_POST['leave_pass_id'];

        mysqli_query($link,$query);
        echo $unsetData;
        echo $reloadPage;
    }
?>
<main style="margin-top: 30px;">
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Upcoming Employee Leaves
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> Emp Id </th>
                        <th> Emp Name </th>
                        <th> Expected Out Time </th>
                        <th> Expected In Time </th>
                        <th> Start </th>
                    </tr>
                </thead>
                <tbody>
<?php

$result = fetchUpcomingEmpLeaves($link);
if($result) {
    while($row = mysqli_fetch_array($result)) {
        $s = explode(':',$row['start_time']);
        $e = explode(':',$row['end_time']);
        $sT = mktime($s[0], $s[1], date("s"), date("m")  , date("d"), date("Y"));
        $eT = mktime($e[0],$e[1], date("s"), date("m")  , date("d"), date("Y"));
        echo 
        '<tr>
            <td>'.$row['employee_id'].'</td>
            <td>'.$row['emp_name'].'</td>
            <td>'.date("F j, Y, g:i a",$sT).'</td>
            <td>'.date("F j, Y, g:i a",$eT).'</td>
            <td>
                <form method="POST">
                    <button type="submit" name="startEmpLeave" class="btn btn-success">Start</button>
                    <input type="hidden" name="leave_pass_id" value="'.$row['leave_pass_id'].'"/>
                </form>
            </td>
        </tr>';
    }
}

?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ongoing Employee Leaves
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> Emp Id </th>
                        <th> Emp Name </th>
                        <th> Expected Out Time </th>
                        <th> Expected In Time </th>
                        <th> Actual Out Time </th>
                        <th> End </th>

                    </tr>
                </thead>
                <tbody>
<?php

$result = fetchOngoingEmpLeaves($link);
if($result == TRUE) {
    while($row = mysqli_fetch_array($result)) {
        $s = explode(':',$row['start_time']);
        $e = explode(':',$row['end_time']);
        $sT = mktime($s[0], $s[1], date("s"), date("m")  , date("d"), date("Y"));
        $eT = mktime($e[0],$e[1], date("s"), date("m")  , date("d"), date("Y"));
        $aet = $row['actual_start_time'];
        echo 
        '<tr>
            <td>'.$row['employee_id'].'</td>
            <td>'.$row['emp_name'].'</td>
            <td>'.date("F j, Y, g:i a",$sT).'</td>
            <td>'.date("F j, Y, g:i a",$eT).'</td>
            <td>'.date("F j, Y, g:i a",$aet).'</td>
            <td>
                <form method="POST">
                    <button type="submit" name="endEmpLeave" class="btn btn-danger">End</button>
                    <input type="hidden" name="leave_pass_id" value="'.$row['leave_pass_id'].'"/>
                </form>
            </td>
        </tr>';
    }
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
include('footer_1.php');
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>

</html>

<script>

    setTimeout(() => {
        location.reload();
    }, 60*1000);

</script>
