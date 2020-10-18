<?php
    
    include('db/db.connection.php');
    include('db/db.variables.php');

    $mysqli = connectionToDB($host, $username, $pass, $db);

    echo mysqli_connect_error($mysqli);

    $first_name = $mysqli -> real_escape_string($_POST['first_name']);
    $last_name = $mysqli -> real_escape_string($_POST['last_name']);
    $email = $mysqli -> real_escape_string($_POST['email']);
    $date = $mysqli -> real_escape_string($_POST['date']);
    $time = $mysqli -> real_escape_string($_POST['time']);
    $no_of_visitors = $mysqli -> real_escape_string($_POST['no_of_visitor']);
    $id_photo = $mysqli -> real_escape_string($_POST['id_photo']);
    $id_number = $mysqli -> real_escape_string($_POST['id_number']);
    $phone_no = $mysqli -> real_escape_string($_POST['phone_no']);
    $purpose = $mysqli -> real_escape_string($_POST['purpose']);
    $hospitality = $mysqli -> real_escape_string($_POST['hospitality']);
    if(!empty($_POST['conference']))
    {
        $conference = 'TRUE';
        $room_no = $mysqli -> real_escape_string($_POST['room_no']);
        $room_purpose = $mysqli -> real_escape_string($_POST['room_purpose']);
        $start_time = $mysqli -> real_escape_string($_POST['start_time']);
        $end_time = $mysqli -> real_escape_string($_POST['end_time']);
    }
    else
    {
        $conference = 'FALSE';
        $room_no = null;
        $room_purpose = null;
        $start_time = null;
        $end_time = null;
    }

?>