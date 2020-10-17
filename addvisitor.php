<?php

    include('php-utils/visitor_variables.php');

    if($_SESSION['type'] == 'employee')
    {
        $employee = $mysqli -> real_escape_string($_SESSION['id']);
        $hod = 3;
        $admin = 3;
    }
    else if($_SESSION['type'] == 'hod')
    {
        $hod = $mysqli -> real_escape_string($_SESSION['id']);
        $employee = 3;
        $admin = 3;
    }
    else if($_SESSION['type'] == 'admin')
    {
        $admin = $mysqli -> real_escape_string($_SESSION['id']);
        $hod = 3;
        $employee = 3;
    }

    $query = "INSERT INTO `visitor` (`first_name`, `last_name`, `email`, `purpose`, `photo_id`, `time`, `noofvisitors`, `photo_id_no`, `hospitality`, `conference`, `conference_room`, `room_purpose`, `start_time`, `end_time`, `employee_id`, `hod_id`, `admin_id`) VALUES (`$fname`,`$lname`,`$email`,`$purpose`,`$photoid`,`$date`,`$novisitors`,`$photoidvalue`,`$hospitality`,`$conference`,`$room`,`$roompurpose`,`$start_time`,`$end_time`,`$employee`, `$hod`, `$admin`)";

    $run = mysqli_query($mysqli, $query);

?>