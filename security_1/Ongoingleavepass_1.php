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
                        <th> OUT Time </th>
                        <th> IN Time </th>
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
                <button type="submit" name="" class="btn btn-success">Start</button>
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
//280843
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
