<?php
    
    include('db/db.connection.php');
    include('db/db.variables.php');

    $mysqli = connectionToDB($host, $username, $pass, $db);

    echo mysqli_connect_error($mysqli);

    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $date = mysqli_real_escape_string($mysqli, $_POST['datetime']);
    $novisitors = mysqli_real_escape_string($mysqli, $_POST['no_of_visitor']);
    $photoid = mysqli_real_escape_string($mysqli, $_POST['img']);
    $photoidvalue = mysqli_real_escape_string($mysqli, $_POST['Govt_ID']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone_no']);
    $purpose = mysqli_real_escape_string($mysqli, $_POST['otpradio']);
    $hospitality = mysqli_real_escape_string($mysqli, $_POST['optradio1']);
    if(!empty($_POST['conference']))
    {
        $conference = 'TRUE';
        $room = mysqli_real_escape_string($mysqli, $_POST['conference_room']);
        $roompurpose = mysqli_real_escape_string($mysqli, $_POST['room_purpose']);
        $start_time = mysqli_real_escape_string($mysqli, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($mysqli, $_POST['end_time']);
    }
    else
    {
        $conference = 'FALSE';
        $room = null;
        $roompurpose = null;
        $start_time = null;
        $end_time = null;
    }

?>