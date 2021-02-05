<?php
include('header_2.php');
include('navbar_2.php');

function showAcceptedOrRejectedLeavePass($link) {
  $arr;
  $query = "SELECT `Purpose`,`start_time`,`end_time`,`status` FROM `emp_leave_pass` WHERE `employee_id` = '".$_SESSION['id']."' AND `status` = 'ACCEPTED_1' OR `status` = 'REJECTED_1'";

  if($result = mysqli_query($link,$query)) {
    while($row = mysqli_fetch_array($result)) {
      print_r($row);
    }
  } else {
    echo mysqli_error($link);
  }
  
} 


include('../notification.php');
include('footer_2.php');
include('scripts_2.php');
?>