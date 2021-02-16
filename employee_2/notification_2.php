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

function showPendingLeavePasses($link) {
  $query = "SELECT `leave_pass_id`,`Purpose`,`start_time`,`end_time` FROM `emp_leave_pass` WHERE `employee_id` = '".$_SESSION['id']."' AND `status` = 'REQ_SENT' ";

  if($result = mysqli_query($link,$query)) {
    $temp = "";
    while($row = mysqli_fetch_array($result)) {
      $temp .= '<div class="alert alert-primary" role="alert">
      Your Leave Pass request with <br> <b>Purpose : '.$row['Purpose'].'<br> Start Time : '.date('h:i a',strtotime($row['start_time'])).' <br> End Time : '.date('h:i a',strtotime($row['end_time'])).'<br></b> has been sent. 
    </div>';
    }
    return $temp;
  } else {
    echo mysqli_error($link);
    return NULL;
  }
}

function updateExpEmpReq($link) {
  $tenSecsBehind = mktime(date("G"), date("i"), date("s")-10, date("m")  , date("d"), date("Y"));
    //hour,minute,seconds,month,day,year
    //https://www.php.net/manual/en/function.mktime.php
    //echo date("F j, Y, g:i a",$tenSecsBehind);
    //echo '<br>'.$tenSecsBehind;
    $query = "UPDATE `emp_leave_pass` SET `status` = 'REQ_EXP' WHERE `status` = 'REQ_SENT' AND `timestamp` < ".$tenSecsBehind;

    if(mysqli_query($link,$query)) {
        //echo 'success';
    } else {
        echo mysqli_error($link);
    }
}

function getExpEmpReq($link) {
  $query = "SELECT `leave_pass_id`,`Purpose`,`start_time`,`end_time` from `emp_leave_pass` WHERE `employee_id` = '".$_SESSION['id']."' AND `status` = 'REQ_EXP'";
    $result = mysqli_query($link,$query);
    if($result == TRUE) {
      $expiredEmpReq = "";
      while($row = mysqli_fetch_array($result)) {
        $expiredEmpReq .= '<div class="alert alert-warning" role="alert">
        <form method="POST">
        Your Leave Pass request with <br> <b>Purpose : '.$row['Purpose'].'<br> Start Time : '.date('h:i a',strtotime($row['start_time'])).' <br> End Time : '.date('h:i a',strtotime($row['end_time'])).'<br></b> has been <b>EXPIRED</b>. 
        <input type="hidden" name="id" value="'.$row['leave_pass_id'].'">
        <button type="submit" name="closeEmpExp" class="btn">&#10006;</button>
            </form>
        </div>';
      }
      return $expiredEmpReq;
    } else {
      echo mysqli_error($link);
      return NULL;
    }
    
    
}




include('../notification.php');
include('footer_2.php');
include('scripts_2.php');
?>