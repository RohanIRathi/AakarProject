<?php

    $fname = $_POST['username'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $novisitors = $_POST['no_of_visitor'];
    $photoid = $_POST['img'];
    $photoidvalue = $_POST['Govt_ID'];
    $phone = $_POST['phone_no'];
    $purpose = $_POST['optradio'];
    $hospitality = $_POST['optradio'];
    if(isset($_POST['conference']))
    {
        $conference = 'TRUE';
        $room = $_POST['conference_room'];
        $roompurpose = $_POST['room_purpose'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
    }
    $query = "SELECT `username` FROM `employee` WHERE id = `$_SESSION['pk']`";
    $run = mysqli_query($conn, $query);

    if($run == TRUE)
    {
        $visitee = mysqli_fetch_assoc($run)['username'];
    }

    $query = "INSERT INTO `visitor`(`first_name`, `last_name`, `email`, `purpose`, `photo_id`, `time`, `noofvisitors`, `photo_id_no`, `hospitality`, `conference`, `conference_room`, `room_purpose`, `start_time`, `end_time`, `visitee`) VALUES (`$fname`,`$lname`,`$email`,`$purpose`,`$photoid`,`$date`,`$novisitors`,`$photoidvalue`,`$hospitality`,`$conference`,`$room`,`$roompurpose`,`$start_time`,`$end_time`,`$visitee`)";

?>