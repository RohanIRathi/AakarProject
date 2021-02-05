<?php
include('header_2.php');
include('navbar_2.php');
$link;
function showAcceptedOrRejectedLeavePass($link) {
  $query = "SELECT `leave_pass_id`,`Purpose`,`start_time`,`end_time`,`status` FROM `emp_leave_pass` WHERE `employee_id` = '".$_SESSION['id']."' AND `status` = 'ACCEPTED_1' OR `status` = 'REJECTED_1'";
  $arr = "";
  if($result = mysqli_query($link,$query)) {
    while($row = mysqli_fetch_array($result)) {
      $x = false;
      if($row['status'] === 'ACCEPTED_1') {
        $x = true;
      }
      $arr .= '
      <div class="alert alert-'.(
        ($x ? 'success' : 'danger')
      ).'" role="alert" >
        <form method="POST">
            Your Leave Pass request with <br> <b>Purpose : '.$row['Purpose'].'<br> Start Time : '.date('h:i a',strtotime($row['start_time'])).' <br> End Time : '.date('h:i a',strtotime($row['end_time'])).'<br></b> has been<b> '.(($x ? 'ACCEPTED' : 'REJECTED')).'</b>
        <input type="hidden" name="id" value="'.$row['leave_pass_id'].'"/>
        <input type="hidden" name="status" value="'.(
          ($x ? 'acc' : 'rej')).'"/>
          <button type="submit" name="closeNotificationEmp" class="btn">&#10006;</button>
        </form>

      </div>';
    }
    return $arr;
  } else {
    echo mysqli_error($link);
    return NULL;
  }
  
} 



include('../notification.php');
include('footer_2.php');
include('scripts_2.php');
?>