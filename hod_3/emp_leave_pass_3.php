<?php
include('header_3.php');
include('navbar_3.php');

include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
$link = connectionToDB($host, $username, $pass, $db);
function fetchEmpLeavePass($link) {
    $lT = strtotime('today midnight');
    $rT = strtotime('tomorrow');
    $query = 'SELECT `leave_pass_id`,`emp_name`,`Purpose`,`start_time`,`end_time` FROM `emp_leave_pass` WHERE `hod_id` = '.$_SESSION['id'].' AND `status`="REQ_SENT" AND `timestamp` BETWEEN '.$lT.' AND '.$rT.' ';

    if($result = mysqli_query($link,$query)) {
        return $result;
    } else {
        echo '<br>error : '.mysqli_error($link);
    }
}

//if accept or reject button is clicked
if(isset($_POST['accept_btn']) || isset($_POST['reject_btn'])) {
  if(isset($_POST['accept_btn'])){
      $x = true;
  } else {
      $x = false;
  }
  //print_r($_POST);
  $query = "UPDATE `emp_leave_pass`
  SET `status` = '".
  (
      ($x) ? "ACCEPTED_1" : "REJECTED_1"
  )
  ."' WHERE `leave_pass_id` = ".$_POST['id'];
  //echo $query;

  if(mysqli_query($link,$query)) {
      $result = fetchEmpLeavePass($link);
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
                <h6 class="m-0 font-weight-bold text-primary">Leave Pass
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>   

<?php

$result = fetchEmpLeavePass($link);
//$rowcount = ​mysqli_num_rows($result);
$rowcount = $result->num_rows;
if($rowcount === 0) {
  echo 'There are no leave passes at the moment.';
} else {
  echo '<tr>
          <th>Emp Name</th>
          <th>Purpose</th>
          <th>Start Time</th>
          <th>End time</th>
          <th>Accept</th>
          <th>Reject</th>
        </tr>';
}

?>
                            
                            
<?php
if($rowcount > 0) {
  while($row = mysqli_fetch_array($result)) {
    echo '<form method="POST"> <tr><td>'.$row['emp_name'].'</td>';
    echo '<td>'.$row['Purpose'].'</td>';
    echo '<td>'.date('h:i a',strtotime($row['start_time'])).'</td>';
    echo '<td>'.date('h:i a',strtotime($row['end_time'])).'</td>';
    echo '<td>
            <input type="hidden" name="id" value="'.$row['leave_pass_id'].'">
            <button type="submit" name="accept_btn" class="btn btn-success">ACCEPT</button>
          </td>';
  echo '<td>
          <input type="hidden" name="id" value="'.$row['leave_pass_id'].'">
          <button type="submit" name="reject_btn" class="btn btn-danger"> REJECT </button>
          
        </td></tr></form>';
  }
}

?>
                        </thead>
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