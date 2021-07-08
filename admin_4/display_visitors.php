<?php
include('header_4.php'); 
include('navbar_4.php'); 
include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
$link = connectionToDB($host, $username, $pass, $db);
$filter = $_GET['data'];
if(isset($_POST['search_btn'])) {
    if(strtotime($_POST['date']) > time()) {
        echo '<div class="alert alert-danger" role="alert">
        Enter Valid Date!
      </div>';
    } else {
        print_r($_POST);
        $newDate = date("d/m/Y", strtotime($_POST['date']));
        
        switch($filter) {
            case 'tot_reg':
                $query = "SELECT `id`, `first_name`, `last_name`, `email`, `noofvisitors`, `time`, `start_time`, `end_time`, `conference_room` FROM visitor WHERE `dateofappointment` LIKE '".date('d-m-y')."%'";
                break;
            case 'tot_visitors':
                $query = "SELECT `id`, `first_name`, `last_name`, `email`, `noofvisitors`, `time`, `start_time`, `end_time`, `conference_room` FROM visitor WHERE `status` = 'Accepted_1' OR `status` = 'ONGOING'";
                break;
            case 'emp_leave_pass':
                $query = "SELECT `employee_id`, `emp_name`, `hod_id`, `purpose`, `Purpose`, `start_time`, `end_time`,`actual_start_time`,`actual_end_time`,`reason` FROM `emp_leave_pass` WHERE (`status` = 'ONGOING' OR `status` = 'ACCEPTED_FIN') AND `date_of_leave` = '".$newDate."'";
                break;
            default:
                $query = false;
                $php_errormsg = '404 - PAGE NOT FOUND!';
        }
        if($query)
        {
            echo '<br>'.$query;
            $result = mysqli_query($link,$query);
            if(!$result)
                echo "<div class='alert alert-danger'>No data available!<br>".mysqli_error($link)."</div>";
        }
        elseif ($php_errormsg)
        {
            $result = false;
            echo "<div class='alert alert-danger'>".$php_errormsg."</div>";
        }
    }
    

}

?>
<main style="margin-top: 30px;">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointments
                        <button type="button" class="ml-3 btn btn-primary text-left" data-toggle="modal" data-target="#addadminprofile" href="new_visitor_4.php">Add</button>
                    </h6>
                    <form class="user" action="#" method="POST">
                        
                        <div class="form-group pb-2">
                            <label>Date Of Search</label>
                            <input type="date" class="form-control form-control-user" placeholder="Enter Date"
                            name="date"required >
                        </div>
                        <input type="submit" name="search_btn" value="Add" class="btn btn-primary btn-user btn-block" style="border-radius: 10rem;">
                    </form>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
<?php

if(isset($result) && strcmp($filter,'emp_leave_pass') ===0) {
echo '
<tr>
<th> EMP ID </th>
<th> EMP Name </th>
<th> HOD ID </th>
<th> Purpose </th>
<th> Requested Start Time </th>
<th> Requested End Time </th>
<th> Actual Start Time </th>
<th> Actual End Time </th>
<th> Reason </th>
</tr>
';
}

?>
                            
                        </thead>
<?php
    if(isset($result) && strcmp($filter,'emp_leave_pass') ===0)
    {
        echo "<div class='row'>
                <b>".str_repeat('&nbsp;', 5)."Date : ".$newDate."</b>
            </div>";
        while($row = $result -> fetch_assoc())
        {
            //print_r($row);
            $actual_end_time = 'NA'; 
            if($row['actual_end_time']) {
                $actual_end_time = date('h:i a',$row['actual_end_time']);
            }
            
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['employee_id']."</td>";
            echo "<td>".$row['emp_name']."</td>";
            echo "<td>".$row['hod_id']."</td>";
            echo "<td>".$row['Purpose']."</td>";
            echo "<td>".date('h:i a',strToTime($row['start_time']))."</td>";
            echo "<td>".date('h:i a',strToTime($row['end_time']))."</td>";
            echo "<td>".date('h:i a',$row['actual_start_time'])."</td>";
            echo "<td>".$actual_end_time."</td>";
            echo "<td>".(strcmp($row['reason'],'personal') === 0 ? "Personal" : "Professional")."</td>";
            /*echo "<td>".$row['id']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['noofvisitors']."</td>";
            echo "<td>".date('dS M, Y', $row['time'])."</td>";
            echo "<td>".$start_time."</td>";
            echo "<td>".$end_time."</td>";
            echo "<td>".$row['conference_room']."</td>";
            echo "</tr>";*/
            echo "</tbody>";
        }
    }
?>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</main>

<?php
include('footer_4.php'); 
include('scripts_4.php'); 
?>