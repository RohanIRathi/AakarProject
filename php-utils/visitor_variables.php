<?php
    
    include('db/db.connection.php');
    include('db/db.variables.php');

    $mysqli = connectionToDB($host, $username, $pass, $db);

    echo mysqli_connect_error($mysqli);

    $fname = $mysqli -> real_escape_string($_POST['fname']);
    $lname = $mysqli -> real_escape_string($_POST['lname']);
    $email = $mysqli -> real_escape_string($_POST['email']);
    $date = $mysqli -> real_escape_string($_POST['datetime']);
    $novisitors = $mysqli -> real_escape_string($_POST['no_of_visitor']);
    $photoid = $mysqli -> real_escape_string($_POST['img']);
    $photoidvalue = $mysqli -> real_escape_string($_POST['Govt_ID']);
    $phone = $mysqli -> real_escape_string($_POST['phone_no']);
    $purpose = $mysqli -> real_escape_string($_POST['otpradio']);
    $hospitality = $mysqli -> real_escape_string($_POST['optradio1']);
    if(!empty($_POST['conference']))
    {
        $conference = 'TRUE';
        $room = $mysqli -> real_escape_string($_POST['conference_room']);
        $roompurpose = $mysqli -> real_escape_string($_POST['room_purpose']);
        $start_time = $mysqli -> real_escape_string($_POST['start_time']);
        $end_time = $mysqli -> real_escape_string($_POST['end_time']);
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