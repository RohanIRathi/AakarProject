<?php
include('header_4.php'); 
include('navbar_4.php'); 
include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
$link = connectionToDB($host, $username, $pass, $db);
$filter = $_GET['data'];
switch($filter) {
    case 'tot_reg':
        $query = "SELECT `id`, `first_name`, `last_name`, `email`, `noofvisitors`, `time`, `start_time`, `end_time`, `conference_room` FROM visitor WHERE `dateofappointment` LIKE '".date('d-m-y')."%'";
        break;
    case 'tot_visitors':
        $query = 'SELECT * FROM visitor WHERE';
        break;
    case 'not_visited':
        $query = "SELECT `id`, `first_name`, `last_name`, `email`, `noofvisitors`, `time`, `start_time`, `end_time`, `conference_room` FROM visitor WHERE `status` = 'BOOKED' OR `status` = 'REQUEST_EXP_FIN'";
        break;
    default:
        $php_errormsg = '404 - PAGE NOT FOUND!';
}
if($query)
{
    echo $query;
    $result = mysqli_query($link,$query);
    if(!$result)
        echo "<div class='alert alert-danger'>No data available!</div>";
    // $row = mysqli_fetch_assoc($result);
    // echo $row;
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
                                <th> Date </th>
                                <th> Start Time </th>
                                <th> End Time </th>
                                <th> Room Name </th>
                            </tr>
                        </thead>
                        <?php
                            if($result)
                            {
                                while($row = $result -> fetch_assoc())
                                {
                                    $start_time = 'NA'; $end_time = 'NA';
                                    if(!$row['conference_room'])
                                        $row['conference_room'] = "NA";
                                    if($row['start_time'])
                                        $start_time = date("h:i A", $row['start_time']);
                                    if($row['end_time'])
                                        $end_time = date("h:i A", $row['end_time']);
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['noofvisitors']."</td>";
                                    echo "<td>".date('dS M, Y', $row['time'])."</td>";
                                    echo "<td>".$start_time."</td>";
                                    echo "<td>".$end_time."</td>";
                                    echo "<td>".$row['conference_room']."</td>";
                                    echo "</tr>";
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